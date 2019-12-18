<?php 
declare(strict_types=1);
session_start();
// Set the default timezone to coordinated universal time.
date_default_timezone_set('UTC');
// Set the default character encoding to UTF-8.
mb_internal_encoding('UTF-8');
//setcookie('account','Welcome loggin to comfirm your account');
setcookie('message', "", time() + 30);
$messageLogin = $_COOKIE['message'];
$messageAcount = $_COOKIE['message'];

require __DIR__.'/function.php';



$db = sprintf('sqlite:%s/database/instagram_clone.db',__DIR__ );

$pdo = new PDO($db);


?>