<?php
require __DIR__ . '/../autoload.php';
$statement = $pdo->prepare('SELECT * FROM  users WHERE id=:id');
$statement -> execute([
    ':id' => $id
    ]);
$userInfo  = $statement->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm'])) {    
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
    
    $imgPath = __DIR__ . '/../../assets/Images/profile_img/';
    if(!empty($img)){
        saveCheckImg($id,'profile',$img, '/',$imgPath);
    }    
    
    if(!empty($email)){
        checkMail($pdo, $email,'update');
    }
    
    if(password_verify($_POST['passwordConfirm'], $userInfo['password'])){
       
        $statement = $pdo->prepare('UPDATE users
        SET email=:email,
            password =:password,
            profile_bio=:profile_bio,
            profile_image=:profile_image, 
	        profile_name=:profile_name
        WHERE id=:id');
        $statement->execute([
            ':email'=>(!empty($_POST['email'])? $email:$userInfo['email']),
            ':password' => (!empty($_POST['password']) ? $password : $userInfo['password']),
            ':profile_bio' => (!empty($_POST['bio']) ? $bio : $userInfo['profile_bio']),
            ':profile_image'=> (!empty($_FILES['img'])?$img : $userInfo['profile_image']), 
	        ':profile_name'=> (!empty($_POST['name']) ? $name: $userInfo['profile_name']),
            ':id' => $id
            ]);
       // $_SESSION['user']['profile_img'] (!empty($_FILES['img'])?$img : $userInfo['profile_image']);
        $_SESSION['user']['profile_name'] = (!empty($_POST['name'])? $name:$userInfo['name']);
        $_SESSION['user']['email'] = (!empty($_POST['email']) ? $bio : $userInfo['email']);
        $_SESSION['user']['profile_bio']=(!empty($_POST['bio']) ? $bio : $userInfo['profile_bio']);   
         redirect('/');
    }

}else{

    $_SESSION['error']['update'] = 'wrong password';
    redirect('/');

}
