<?php

/**
 * ulAdmin actions
 */

use System\config;
use System\input;
use System\request;
use System\route;
use System\session;
use System\view;

Route::action('auth', function () {
    if (Auth::guest()) {
        return Response::redirect('uladmin/login');
    }
});

Route::action('guest', function () {
    if (Auth::user()) {
        $page = in_array(Config::meta('dashboard_page'), ['panel', 'pages', 'posts']) ? Config::meta('dashboard_page')
            : 'panel';

        return Response::redirect('uladmin/' . $page);
    }
});

Route::action('csrf', function () {
    if (Request::method() == 'POST') {
        if ( ! Csrf::check(Input::get('token'))) {
            Notify::error(['Invalid token']);

            return Response::redirect('uladmin/login');
        }
    }
});

Route::action('install_exists', function () {
    if (file_exists('install') && ! Session::get('messages.error')) {
        Notify::error(['Please remove the install directory before publishing your site']);
    }
});

/**
 * ulAdmin routing
 */
Route::get('uladmin', function () {
    if (Auth::guest()) {
        return Response::redirect('uladmin/login');
    }

    $page = in_array(Config::meta('dashboard_page'), ['panel', 'pages', 'posts']) ? Config::meta('dashboard_page')
        : 'panel';

    return Response::redirect('uladmin/' . $page);
});

/*
    Log in
*/
// Why check if we haven't deleted the install directory, BEFORE we've logged in?
// Isn't that just unlocking the door for the burglars to enter?
//Route::get('uladmin/login', array('before' => 'install_exists', 'main' => function() {
Route::get('uladmin/login', [
    'before' => 'guest',
    'main'   => function () {
        if ( ! Auth::guest()) {
            return Response::redirect('uladmin/posts');
        }

        $vars['token'] = Csrf::token();
        if ( ! array_key_exists('messages', $vars)) {
            $vars['messages'] = "";
        }

        return View::create('users/login', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    }
]);

Route::post('uladmin/login', [
    'before' => 'csrf',
    'main'   => function () {
        $attempt = Auth::attempt(Input::get('user'), Input::get('pass'));

        if ( ! $attempt) {
            Notify::error(__('users.login_error'));

            return Response::redirect('uladmin/login');
        }

        // check for updates
       /* Update::version();

        if (version_compare(Config::get('meta.update_version'), VERSION, '>')) {
            return Response::redirect('uladmin/upgrade');
        }
*/
        $page = in_array(Config::meta('dashboard_page'), ['panel', 'pages', 'posts']) ? Config::meta('dashboard_page')
            : 'panel';

        return Response::redirect('uladmin/' . $page);
    }
]);

/*
    Log out
*/
Route::get('uladmin/logout', function () {
    Auth::logout();
    Notify::notice(__('users.logout_notice'));

    return Response::redirect('uladmin/login');
});

/*
    Amnesia
*/
Route::get('uladmin/amnesia', [
    'before' => 'guest',
    'main'   => function () {

        $vars['token'] = Csrf::token();

        return View::create('users/amnesia', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    }
]);

Route::post('uladmin/amnesia', [
    'before' => 'csrf',
    'main'   => function () {
        $email = Input::get('email');

        $validator = new Validator(['email' => $email]);
        $query     = User::where('email', '=', $email);

        $validator->add('valid', function ($email) use ($query) {
            return $query->count();
        });

        $validator->check('email')
                  ->is_email(__('users.email_missing'))
                  ->is_valid(__('users.email_not_found'));

        if ($errors = $validator->errors()) {
            Input::flash();

            Notify::error($errors);

            return Response::redirect('uladmin/amnesia');
        }

        $user = $query->fetch();
        Session::put('user', $user->id);

        $token = noise(8);
        Session::put('token', $token);

        $uri     = Uri::full('uladmin/reset/' . $token);
        $subject = __('users.recovery_subject');
        $msg     = __('users.recovery_message', $uri);

        mail($user->email, $subject, $msg);

        Notify::success(__('users.recovery_sent'));

        return Response::redirect('uladmin/login');
    }
]);

/*
    Reset password
*/
Route::get('uladmin/reset/(:any)', [
    'before' => 'guest',
    'main'   => function ($key) {

        $vars['token'] = Csrf::token();
        $vars['key']   = ($token = Session::get('token'));

        if ($token != $key) {
            Notify::error(__('users.recovery_expired'));

            return Response::redirect('uladmin/login');
        }

        return View::create('users/reset', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    }
]);

Route::post('uladmin/reset/(:any)', [
    'before' => 'csrf',
    'main'   => function ($key) {
        $password = Input::get('pass');
        $token    = Session::get('token');
        $user     = Session::get('user');

        if ($token != $key) {
            Notify::error(__('users.recovery_expired'));

            return Response::redirect('uladmin/login');
        }

        $validator = new Validator(['password' => $password]);

        $validator->check('password')
                  ->is_max(6, __('users.password_too_short', 6));

        if ($errors = $validator->errors()) {
            Input::flash();

            Notify::error($errors);

            return Response::redirect('uladmin/reset/' . $key);
        }

        User::update($user, ['password' => Hash::make($password)]);

        Session::erase('user');
        Session::erase('token');

        Notify::success(__('users.password_reset'));

        return Response::redirect('uladmin/login');
    }
]);

/*
    Upgrade
*/
Route::get('uladmin/upgrade', [
    'before' => 'auth',
    'main'   => function () {
        $vars['token'] = Csrf::token();

        $version = Config::meta('update_version');

        $vars['version'] = Update::touch();

        return View::create('upgrade', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    }
]);

Route::post('uladmin/upgrade', [
    'before' => 'auth',
    'main'   => function () {
        // Update programmatically

        $version = Config::meta('update_version');
        $url     = 'https://codeload.ulteriorti.com.br/cms/u-cms/zip/%s';

        $success  = Update::upgrade(sprintf($url, $version), $version);
        $error    = substr($success, -strlen('error')) == "ERROR";
        $messages = explode('|-|', $success);

        return Response::json([
            'success'  => substr($success, 0, strpos($success, '|-|')) == 'true',
            'error'    => $error,
            'messages' => $messages
        ]);
    }
]);

/*
    List extend
*/
Route::get('uladmin/extend', [
    'before' => 'auth',
    'main'   => function ($page = 1) {

        $vars['token'] = Csrf::token();

        return View::create('extend/index', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    }
]);

Route::post('uladmin/get_fields', [
    'before' => 'auth',
    'main'   => function () {
        $input = Input::get(['id', 'pagetype']);

        // get the extended fields
        $vars['fields'] = Extend::fields('page', -1, $input['pagetype']);

        $html  = View::create('pages/fields', $vars)->render();
        $token = '<input name="token" type="hidden" value="' . Csrf::token() . '">';

        return Response::json([
            'token' => $token,
            'html'  => $html
        ]);
    }
]);

/*
    Upload an image
*/
Route::post('uladmin/upload', [
    'before' => 'auth',
    'main'   => function () {
        $folder = uniqid();
        $uploader = new Uploader(PATH . 'content/', ['png', 'jpg', 'bmp', 'gif', 'pdf']);
        $filepath = $uploader->upload($_FILES['file']);
        $uri      = rtrim(Config::app('url'), '/') . '/content/'.basename($filepath);
        $output   = ['uri' => $uri];

        return Response::json($output);
    }
]);

/*
    404 error
*/
Route::error('404', function () {
    return Response::error(404);
});
