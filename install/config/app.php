<?php

return [
    'url'      => dirname($_SERVER['SCRIPT_NAME']),
    'index'    => 'index.php?route=',
    'timezone' => 'UTC',
    'key'      => hash('md5', 'U-CMS Installer ' . VERSION),
    'language' => 'pt_BR',
    'encoding' => 'UTF-8'
];
