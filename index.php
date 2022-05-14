<?php
//Esse cms CMS é uma fork do AnchorCMS para uso próprio da Ulterior Tecnologia
//Programador: Denis Souza

define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));
define('VERSION', '0.22.514b');
define('MIGRATION_NUMBER', 220);

define('PATH', __DIR__ . DS);
define('APP', PATH . 'cms' . DS);
define('SYS', PATH . 'system' . DS);
define('EXT', '.php');

/** @noinspection PhpIncludeInspection */
require APP . 'composer_check' . EXT;
/** @noinspection PhpIncludeInspection */
require SYS . 'start' . EXT;
