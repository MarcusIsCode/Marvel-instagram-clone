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

} 

$insert = 'INSERT INTO users (email, password, profile_bio, profile_image, profile_name) VALUES
 (:email,:password,:profile_bio,:profile_image,:profile_name)';
print_r($insert);
echo '<br><br>';
$statement = $pdo->prepare($insert);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
//$statment->bindParam(':email', $email, PDO::PARAM_STR);
/* $statement->execute([
    ':email'=> $email,
    ':password'=>$password,
    ':profile_bio'=>$heroName,
    ':profile_image'=>$bio,
    ':profile_name'=>$img,
]
); */
//$newUser = $statment->fetchAll(PDO::FETCH_ASSOC);
//print_r($user);
?>
