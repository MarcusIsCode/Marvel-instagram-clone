<?php
require __DIR__.'/../autoload.php';

if(isset($_POST['img'], $_POST['postText'] )){
    $img = $_POST['img'];
    $post = $_POST['postText'];


$newPost = 'INSERT INTO posts(user_id,post_img, text) VALUES
 (:user_id,:post_img,:text)';

$statement  = $pdo -> prepare($newPost);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$statement->execute([
    ':user_id' => $id,
    ':post_img' => $img,
    ':text' => $post
]);
redirect('/');
}
?>