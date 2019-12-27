<?php
require __DIR__.'/../autoload.php';

if(isset($_FILES['img'], $_POST['postText'] )){
    $img = $_FILES['img'];
    $post = filter_var($_POST['postText'], FILTER_SANITIZE_STRING) ;
    print_r($img);
    
    
    if($img['size'] > 2000000 ){
        $_SESSION['error']['fileSize'] = 'image to big';
        //redirect('/');
    }
    
    if (in_array($img['type'],['image/jpeg', 'image/png'])) {
        $_SESSION['error']['type'] = 'only accept jpeg and png images';
        //redirect('/');
    }
    

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