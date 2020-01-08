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
        $files1 = scandir(__DIR__. '/assets/Images/profile_img');
        print_r($files1);
        foreach($files1 as $file){
            if(substr($file,0,1) === $id){
                
                   echo $file;
               
            };
            
            
            echo $h ."<br>";
        }
        
        require __DIR__ . '/views/singedIn/loggedIn.php';
    }
    
    require __DIR__ . '/views/footer.php' 
    ?>