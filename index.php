<?php
declare(strict_types=1);
require __DIR__ . '/app/autoload.php';
?>

<body>
    <?php
       
   
    if (!$_SESSION['user']) {
        //login and create account
        require __DIR__ . '/views/sign in/headerOut.php';
        $_COOKIE['messageAc'] = ($_SESSION['account'] === 'false' ? 'Account already exist ' : " ");
        $_COOKIE['messageLog'] = ($_SESSION['login'] === 'false' ? 'Wrong password ': " ");
                require __DIR__ . '/views/sign in/login.php';
        unsetSession('account','login');  
            } else {


                require __DIR__ . '/views/singedIn/loggedIn.php';
        } 
       ?>
   
</body>
<?php require __DIR__ . '/views/footer.php' ?>

