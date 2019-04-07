<?php

require_once 'vendor/autoload.php';

$user_admin = new App\Admin\User();
var_dump($user_admin);
echo '<hr/>';
$user_manager = new App\Manager\User();
var_dump($user_manager);
echo '<hr/>';
$user = new App\User();
var_dump($user);
