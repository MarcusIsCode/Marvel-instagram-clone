<?php
declare(strict_types=1);
require __DIR__ . '/app/autoload.php';
?>

<body>
    <?php
        
    if (!$_SESSION['user']) {
        //login and create account
        require __DIR__ . '/views/sign in/headerOut.php';
        $_COOKIE['messageLog'] = $_SESSION['error']['signIn'];
        $_COOKIE['messageAc'] = $_SESSION['error']['account'];
        require __DIR__ . '/views/sign in/login.php';
        unsetSession('error');  
    
            
    } else {
        // logged in
        require __DIR__ . '/views/singedIn/loggedIn.php';
        } 
       ?>
   
</body>
<?php require __DIR__ . '/views/footer.php' ?>

