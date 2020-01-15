<?php 
require __DIR__ . '/../autoload.php';
//if password dosn't match
if(isset($_POST['password'],$_POST['password2']) &&  $_POST['password'] !== $_POST['password2']){
    $_SESSION['error']['account'] ="password doesn't match";
    redirect('/');
}


if (isset($_POST['email'], $_POST['password'])) {
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$name =filter_var($_POST['heroName'],FILTER_SANITIZE_STRING);
$bio = filter_var($_POST['biography'],FILTER_SANITIZE_STRING);
$img = $_FILES['img'];

/**check if account exist with email and redirect to home page */
checkMail($pdo, $email,'account');



$tempID = 'SELECT id FROM users ORDER BY id DESC LIMIT 0, 1';
$statement1 = $pdo ->prepare($tempID);
$statement1->execute();
$getId = $statement1->fetch(PDO::FETCH_ASSOC);
$newId = $getId['id'];
$newId = (int)$newId +1;

$imgPath = __DIR__ . '/../../assets/Images/profile_img/';
saveCheckImg($newId,'profile',$img,'/',$imgPath);
    /*create account */
$insert = 'INSERT INTO users (email, password, profile_bio, profile_image, profile_name) VALUES
 (:email,:password,:profile_bio,:profile_image,:profile_name)';

$statement = $pdo->prepare($insert);

    $statement->execute([
        ':email'=> $email,
        ':password'=>$password,
        ':profile_bio'=> $bio,
        ':profile_image'=> $_SESSION['imgPath'],
        ':profile_name'=>$name,
        ]
    );  
 $_SESSION['Account'] = " Welcome ". $name . "Sign in to see your Account";
unsetSession('imgPath');  
redirect('/'); 
} 
?>
