<?php
require __DIR__ .'/../autoload.php';


if(isset($_POST['email'],$_POST['password'] )){
 $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
 


    $statment = $pdo -> prepare('SELECT * FROM  users WHERE email =:email');
    $statment -> bindParam(':email', $email, PDO::PARAM_STR);
    $statment->execute();
    $user = $statment -> fetch(PDO::FETCH_ASSOC);
   
    if(!$user){
        redirect('/');
    };
    //die(var_dump(($user['password'])));

    //die(var_dump(password_verify($_POST['password'], $user['password'])));
     if ($_POST['password'] === $user['password']) {
       
        unset($user['password']);
        $_SESSION['user']= $user;
        
        redirect('/');
        
    }else{
        redirect('/');
    }
    
}
 
?>