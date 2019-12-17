<?php 
require __DIR__ . '/../autoload.php';

//if password dosn't match
if(isset($_POST['password'],$_POST['password2']) &&  $_POST['password'] !== $_POST['password2']){
    redirect('/');
}


if(isset($_POST['email'],$_POST['password'])){
    //echo 'yey';
}else{
    //echo 'nono';
}

$statment = $pdo->prepare('SELECT * FROM  users;');
//$statment->bindParam(':email', $email, PDO::PARAM_STR);
$statment->execute();
$newUser = $statment->fetchAll(PDO::FETCH_ASSOC);
//print_r($user);
?>
