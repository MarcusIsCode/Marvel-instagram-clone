<?php 
require __DIR__ . '/../autoload.php';

//if password dosn't match
if(isset($_POST['password'],$_POST['password2']) &&  $_POST['password'] !== $_POST['password2']){
   redirect('/');
}


if (isset($_POST['email'], $_POST['password'])) {
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$heroName =filter_var($_POST['heroName'],FILTER_SANITIZE_STRING);
$bio = filter_var($_POST['biography'],FILTER_SANITIZE_STRING);
$img = $_POST['img']; // LOOK HOW TO SANTIZE IMG

/**check if account exist with email and redirect to home page */
$check = 'SELECT email FROM users where email = :email';
$statement =$pdo -> prepare($check);
$statement-> execute(['email' => $email]);
$checkEmail = $statement -> fetchAll(PDO::FETCH_ASSOC); 

for ($i=0; $i < sizeof($checkEmail) ; $i++) { 
     if ($checkEmail[$i]['email'] === $email){  
         $_SESSION['account'] = 'false';
         redirect('/'); //add message here for rederict
         
     }

}

    /*create account */
$insert = 'INSERT INTO users (email, password, profile_bio, profile_image, profile_name) VALUES
 (:email,:password,:profile_bio,:profile_image,:profile_name)';
$statement = $pdo->prepare($insert);

$statement->execute([
    ':email'=> $email,
    ':password'=>$password,
    ':profile_bio'=> $bio,
    ':profile_image'=> $img,
    ':profile_name'=>$heroName,
    ]
); 
redirect('/'); 
} 
?>
