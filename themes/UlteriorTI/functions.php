<?php

/*
    Custom theme functions

    Note: we recommend you prefix all your functions to avoid any naming
    collisions or wrap your functions with if function_exists braces.
*/
function numeral($number, $hideIfOne = false)
{
    if ($hideIfOne === true and $number == 1) {
        return '';
    }

    $test = abs($number) % 10;
    $ext = ((abs($number) % 100 < 21 and abs($number) % 100 > 4) ? 'th' : (($test < 4) ? ($test < 3) ? ($test < 2) ? ($test < 1) ? 'th' : 'st' : 'nd' : 'º' : 'th'));
    return $number . $ext;
}

function count_words($str)
{
    return count(preg_split('/\s+/', strip_tags($str), null, PREG_SPLIT_NO_EMPTY));
}

function pluralise($amount, $str, $alt = '')
{
    return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function relative_time($date)
{
    if (is_numeric($date)) {
        $date = '@' . $date;
    }

    $user_timezone = new DateTimeZone(Config::app('timezone'));
    $date = new DateTime($date, $user_timezone);

    // get current date in user timezone
    $now = new DateTime('now', $user_timezone);

    $elapsed = $now->format('U') - $date->format('U');

    if ($elapsed <= 1) {
        return 'Just now';
    }

    $times = array(
        31104000 => 'ano',
        2592000 => 'mese',
        604800 => 'semana',
        86400 => 'dia',
        3600 => 'hora',
        60 => 'minuto',
        1 => 'segundo'
    );

    foreach ($times as $seconds => $title) {
        $rounded = $elapsed / $seconds;

        if ($rounded > 1) {
            $rounded = round($rounded);
            return $rounded . ' ' . pluralise($rounded, $title) . ' atrás';
        }
    }
}

function twitter_account()
{
    return site_meta('twitter', 'idiot');
}


function total_articles()
{
    return total_posts();
}

function insta_url() {
return 'https://instagram.com/' . site_meta('acc_insta');
}

function twitter_url() {
return 'https://twitter.com/' . site_meta('acc_twitter');
}

function facebook_url() {
return 'https://facebook.com/' . site_meta('acc_facebook');
}

/* Page-Work */
function cat_page() {
	return site_meta('title', 'wert');
}

function article_category_id_destaque() {
    if($category = Registry::prop('article', 'category')) {
      $categories = Registry::get('all_categories');
      return $categories[$category]->id;
    }
  }

function custom_posts_page() {
  // only run on the first call
  if( ! Registry::has('rwar_post_archive')) {
    // capture original article if one is set
    if($article = Registry::get('article')) {
      Registry::set('original_article', $article);
    }
  }

  if( ! $posts = Registry::get('rwar_post_archive')) {
    $posts = Post::where('status', '=', 'published')->get();

    Registry::set('rwar_post_archive', $posts = new Items($posts));
  }

  if($result = $posts->valid()) {
    // register single post
    Registry::set('article', $posts->current());

    // move to next
    $posts->next();
  }
  else {
    // back to the start
    $posts->rewind();

    // reset original article
    Registry::set('article', Registry::get('original_article'));

    // remove items
    Registry::set('rwar_post_archive', false);
  }

  return $result;
}
function rwar_destaques($limit = 9) {
	// only run on the first call
	if( ! Registry::has('rwar_destaques')) {
		// capture original article if one is set
		if($article = Registry::get('article')) {
			Registry::set('original_article', $article);
		}
	}

	if( ! $posts = Registry::get('rwar_destaques')) {
    $posts = destaques::where('status', '=', 'published')->sort('updated', 'desc')->take($limit)->get();
		Registry::set('rwar_destaques', $posts = new Items($posts));
	}

	if($result = $posts->valid()) {
		// register single post
		Registry::set('article', $posts->current());

		// move to next
		$posts->next();
	}
	else {
		// back to the start
		$posts->rewind();

		// reset original article
		Registry::set('article', Registry::get('original_article'));

		// remove items
		Registry::set('rwar_destaques', false);
	}

	return $result;
}

function rwar_latest_posts($limit = 4) {
	// only run on the first call
	if( ! Registry::has('rwar_latest_posts')) {
		// capture original article if one is set
		if($article = Registry::get('article')) {
			Registry::set('original_article', $article);
		}
	}

	if( ! $posts = Registry::get('rwar_latest_posts')) {
		$posts = Post::where('status', '=', 'published')->sort('created', 'desc')->take($limit)->get();

		Registry::set('rwar_latest_posts', $posts = new Items($posts));
	}

	if($result = $posts->valid()) {
		// register single post
		Registry::set('article', $posts->current());

		// move to next
		$posts->next();
	}
	else {
		// back to the start
		$posts->rewind();

		// reset original article
		Registry::set('article', Registry::get('original_article'));

		// remove items
		Registry::set('rwar_latest_posts', false);
	}

	return $result;
}