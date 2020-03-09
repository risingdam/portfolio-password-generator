<?php

/*
 *  New password
 */

$pwd = new Password();

/*
 *  Generate 6 passwords
 */

$password[1] = $pwd->make(['pattern' => 0, 'repeat' => 3 ]);
$password[2] = $pwd->make(['pattern' => 1, 'repeat' => 3 ]);
$password[0] = mb_strlen($password[1]);

$password[4] = $pwd->make(['pattern' => 0, 'repeat' => 2 ]);
$password[5] = $pwd->make(['pattern' => 1, 'repeat' => 2 ]);
$password[3] = mb_strlen($password[4]);

$password[7] = $pwd->make(['pattern' => 0, 'repeat' => 1 ]);
$password[8] = $pwd->make(['pattern' => 1, 'repeat' => 1 ]);
$password[6] = mb_strlen($password[7]);

/*
 *  Load view
 */

require_once APP_ROOT . '/view/password.php';

// EOF
