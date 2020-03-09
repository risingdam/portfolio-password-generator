<?php

/*
 *  Register autoload
 */
 
spl_autoload_register(function ($class) {
    require_once APP_ROOT . '/class/class.' . $class . '.php';
});

/*
 *  Load model
 */
 
require_once APP_ROOT . '/model/password.php';

// EOF
