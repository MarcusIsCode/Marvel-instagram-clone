<?php
require __DIR__.'/../autoload.php';

if(isset($_FILES['img'], $_POST['postText'] )){
    $img = $_FILES['img'];
    $post = filter_var($_POST['postText'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES) ;


$imgPath = __DIR__. '/../../assets/Images/post_img/';

SaveCheckImg ($id,'post',$img,'/',$imgPath);


$newPost = 'INSERT INTO posts(user_id,post_img, text,date) VALUES
 (:user_id,:post_img,:text,:date)';
$statement  = $pdo -> prepare($newPost);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
    $date = date('Y-m-d G:i');
    

 $statement->execute([
    ':user_id' => $id,
    ':post_img' => $_SESSION['imgPath'],
    ':text' => $post,
    ':date'=> $date
    ]);



unsetSession('imgPath');
redirect('../Get/getData.php');
}
?>