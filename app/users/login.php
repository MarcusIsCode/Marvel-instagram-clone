<?php
require __DIR__ . '/../autoload.php';

//Posted password and email
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $statement = $pdo->prepare('SELECT * FROM  users WHERE email =:email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    //check if user exists
    if (!$user) {
        $_SESSION['error']['signIn'] = 'User doesn\'t exist';
        redirect('/');
    };
    //check password
    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);
        $_SESSION['user'] = $user;

        $_SESSION['firstTime'];

        redirect('/');
    } else {
        //if password is wrong
        $_SESSION['error']['signIn'] = 'Wrong password';
        redirect('/');
    }
}
