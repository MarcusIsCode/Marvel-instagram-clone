<?php
require __DIR__ . '/../autoload.php';
$statement = $pdo->prepare('SELECT * FROM  users WHERE id=:id');
$statement -> execute([
    ':id' => $id
    ]);
$userInfo  = $statement->fetch(PDO::FETCH_ASSOC);

print_r($userInfo);
if (isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm'])) {    
  echo 'yes1';
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $bio = filter_var($_POST['bio'],FILTER_SANITIZE_STRING);
    $img = $_POST['img'];
    $name = $_POST['name'];
    $img = $_FILES['img'];
    
    if($_POST['password'] === $_POST['password2']){    
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }else{
        $_SESSION['error']['update'] = "new password doesn't match";
        // redirect and sesion message passswrod no match;
    }
    checkImg($img, '/');
    checkMail($pdo, $email,'update');

   
    if(password_verify($_POST['passwordConfirm'], $userInfo['password'])){
       
        $statement = $pdo->prepare('UPDATE users
        SET email=:email,
            password =:password,
            profile_bio=:profile_bio,
            profile_image=:profile_image, 
	        profile_name=:profile_name
        WHERE id=:id');
        

        $statement->execute([
            ':email'=>(!empty($_POST['email'])? :$userInfo['email']),
            ':password' => (!empty($_POST['password']) ? $password : $userInfo['password']),
            ':profile_bio' => (!empty($_POST['bio']) ? $bio : $userInfo['profile_bio']),
            ':profile_image'=> (!empty($_FILES['img']) ? $email : $userInfo['profile_image']), 
	        ':profile_name'=> (!empty($_POST['name']) ? $email : $userInfo['profile_name']),
            ':id' => $id
            ]);

      
    }


}else{

    $_SESSION['error']['update'] = 'wrong password';
    redirect('/');

}
