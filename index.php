<?php

declare(strict_types=1);
require __DIR__ . '/app/autoload.php';


$id = $_SESSION["user"]['id'];
$id = (int) $id;


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

                //when login out  
                echo '<br><br>'. $message . $_SESSION['user']['profile_name'];
                require __DIR__ . '/views/singed in/headerIn.php';
                require __DIR__ . '/views/singed in/loggedIn.php';
                require __DIR__ . '/views/singed in/out.php'; 
        
        } 
       ?>
   
</body>
<?php require __DIR__ . '/views/footer.php' ?>

