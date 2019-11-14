<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MayCad\MFA\MFA;

//Operations
$mfa = new MFA(['sender' => '93138706', 'receiver' => '93138706', 'amount' => 5000, 'password' => '123456']);

//histories
//$mfa = new MFA(['sender' => '93138706', 'limit' => 3, 'password' => '123456']);


print_r($mfa->process());