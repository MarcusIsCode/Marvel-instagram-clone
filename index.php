<?php

declare(strict_types=1);
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


if (!isset($_SESSION['user'])) {
    //login and create account
    if (isset($_POST['addAcc'])) {
        $_SESSION['account'] = true;
    }
    if (isset($_POST['back'])) {
        $_SESSION['account'] = false;
    }

    if (isset($_SESSION['account']) === true) {
        $_COOKIE['messageAc'] = $_SESSION['error']['account'];
        require __DIR__ . '/views/sign in/addAc.php';
    } else {
        $_COOKIE['messageLog'] = $_SESSION['error']['signIn'];
        require __DIR__ . '/views/sign in/login.php';
    }


    unsetSession('error');
} else {

    $_SESSION['showFeed'] = 'show';

    echo '<main>';

    require __DIR__ . '/views/singedIn/loggedIn.php';

    if (isset($_GET['profile'])) {
        unset($_SESSION['showFeed']);
        require __DIR__ . '/views/singedIn/profile.php';
    }

    if (isset($_SESSION['showFeed'])) {
        require __DIR__ . '/views/singedIn/home.php';
    }

    echo '</main>';
}

require __DIR__ . '/views/footer.php';
