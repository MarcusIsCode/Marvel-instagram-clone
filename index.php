<?php

declare(strict_types=1);
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$id = $_SESSION["user"]['id'];
$id = (int) $id;


?>

<body>
    <?php
    if (!$_SESSION['user']) {
        //loggin and create acount
         
                $messageAcount = ($_SESSION['account'] === 'false' ? 'Account alredy exist ' : " ");
                $messageLogin = ($_SESSION['login'] === 'false' ? 'Wrong password ': " ");
                require __DIR__ . '/views/loggin_out/login.php';
                
                
            } else {

                //when login out  
                echo '<br><br>'. $message . $_SESSION['user']['profile_name'];
                require __DIR__ . '/views/loggin_out/out.php';//loggout
        } 
       ?>
   
</body>
<?php require __DIR__ . '/views/fotter.php' ?>

