<?php

declare(strict_types=1);
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


    if (!$_SESSION['user']) {
        //login and create account
        $_COOKIE['messageLog'] = $_SESSION['error']['signIn'];
        $_COOKIE['messageAc'] = $_SESSION['error']['account'];
        
        require __DIR__ . '/views/sign in/login.php';
        unsetSession('error');
    } else {

  
        echo '<main>';
        require __DIR__ . '/views/singedIn/loggedIn.php';
        echo '</main>'; 
    }
    ?>
    <?php
    require __DIR__ . '/views/footer.php' 
    ?>