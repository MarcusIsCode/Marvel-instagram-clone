<?php
require __DIR__ .'/../autoload.php';

//Posted password and email
if(isset($_POST['email'],$_POST['password'] )){
 $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
 


    $statment = $pdo -> prepare('SELECT * FROM  users WHERE email =:email');
    $statment -> bindParam(':email', $email, PDO::PARAM_STR);
    $statment->execute();
    $user = $statment -> fetch(PDO::FETCH_ASSOC);
   //check if user exists
    if(!$user){
        $_SESSION['login'] = 'false';
        redirect('/');
    };
   //check password
     if (password_verify($_POST['password'], $user['password'])) {
       
        unset($user['password']);
        $_SESSION['user']= $user;
        $_SESSION['login'] = 'true';
        redirect('/');
    }else{
        //if password is wrong
        $_SESSION['login'] = 'false';
        redirect('/');
    }
    
}
 
?>