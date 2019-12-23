<?php
require __DIR__.'/../autoload.php';
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
echo $rootDir;
if(isset($_FILES['img'], $_POST['postText'] )){
    $img = $_FILES['img'];
    $post = filter_var($_POST['postText'], FILTER_SANITIZE_STRING) ;
 
    die(var_dump(__DIR__.$img));
    

$newPost = 'INSERT INTO posts(user_id,post_img, text) VALUES
 (:user_id,:post_img,:text)';

$statement  = $pdo -> prepare($newPost);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

/* $statement->execute([
    ':user_id' => $id,
    ':post_img' => $img,
    ':text' => $post
]);
redirect('/'); */
}
?>