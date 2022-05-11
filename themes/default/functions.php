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

function twitter_url()
{
    return 'https://twitter.com/' . twitter_account();
}

function total_articles()
{
    return total_posts();
}
