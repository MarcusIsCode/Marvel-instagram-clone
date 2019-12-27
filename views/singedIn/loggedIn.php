<?php
$_SESSION['a'] = false;
if (isset($_POST['profile'])) {
    $_SESSION['a'] = true;
}
if(isset($_POST['home'])){
    unsetPost('profile');
    unsetSession('a');
}


if(isset($_SESSION['a'])){
    require __DIR__. '/profile.php';
}

require __DIR__ . '/navigation.php';
//require __DIR__. '/profile.php';

//require __DIR__ . '/../../app/Get/getData.php';
?>