<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit179d3a428449acc2707960946f11c12d
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '7c9b72b4e40cc7adcca6fd17b1bf4c8d' => __DIR__ . '/..' . '/indigophp/hash-compat/src/hash_equals.php',
        '43d9263e52ab88b5668a28ee36bd4e65' => __DIR__ . '/..' . '/indigophp/hash-compat/src/hash_pbkdf2.php',
        'e40631d46120a9c38ea139981f8dab26' => __DIR__ . '/..' . '/ircmaxell/password-compat/lib/password.php',
        'ee4cee3195e093bfc91e7754af9eefd5' => __DIR__ . '/..' . '/peridot-php/leo/src/Interfaces/_interface.bdd.php',
        '206ca77198d5b3fc3441fe595964d13a' => __DIR__ . '/..' . '/ulteriorti/filtrainput.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Peridot\\Scope\\' => 14,
            'Peridot\\Leo\\' => 12,
            'Peridot\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Peridot\\Scope\\' => 
        array (
            0 => __DIR__ . '/..' . '/peridot-php/peridot-scope/src',
        ),
        'Peridot\\Leo\\' => 
        array (
            0 => __DIR__ . '/..' . '/peridot-php/leo/src',
        ),
        'Peridot\\' => 
        array (
            0 => __DIR__ . '/..' . '/peridot-php/peridot/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'SecurityLib' => 
            array (
                0 => __DIR__ . '/..' . '/ircmaxell/security-lib/lib',
            ),
        ),
        'R' => 
        array (
            'RandomLib' => 
            array (
                0 => __DIR__ . '/..' . '/ircmaxell/random-lib/lib',
            ),
        ),
        'E' => 
        array (
            'Evenement' => 
            array (
                0 => __DIR__ . '/..' . '/evenement/evenement/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PHP_Timer' => __DIR__ . '/..' . '/phpunit/php-timer/src/Timer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit179d3a428449acc2707960946f11c12d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit179d3a428449acc2707960946f11c12d::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit179d3a428449acc2707960946f11c12d::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit179d3a428449acc2707960946f11c12d::$classMap;

        }, null, ClassLoader::class);
    }
}
