<?php
require __DIR__.'/../autoload.php';

if(isset($_FILES['img'], $_POST['postText'] )){
    $img = $_FILES['img'];
    $post = filter_var($_POST['postText'], FILTER_SANITIZE_STRING) ;


$imgPath = __DIR__. '/../../assets/Images/post_img/';

SaveCheckImg ('post',$img,'/',$imgPath);


$newPost = 'INSERT INTO posts(user_id,post_img, text) VALUES
 (:user_id,:post_img,:text)';
$statement  = $pdo -> prepare($newPost);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}


 $statement->execute([
    ':user_id' => $id,
    ':post_img' => $_SESSION['imgPath'],
    ':text' => $post
    ]);
    
unsetSession('imgPath');
redirect('/');
}
?>