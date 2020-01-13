<?php
require __DIR__ . '/../autoload.php';
$postId =  $_POST['postId'];
if(isset($_POST['delete'])){
    $getPost = 'SELECT * FROM posts WHERE post_id =:post_id';

    $statementPost = $pdo->prepare($getPost);
    $statementPost->execute([
        ':post_id' => $postId
    ]);
    $getPost = $statementPost->fetch(PDO::FETCH_ASSOC);
    
    
    if($getPost['user_id'] === (string)$id){
        $deletePost = 'DELETE FROM posts WHERE post_id =:post_id';
        $deleteLike = 'DELETE FROM like_posts WHERE post_id =:post_id';
        $deleteComments = 'DELETE FROM comment_posts WHERE post_id =:post_id';
        unlink('../..' . $getPost['post_img']);
        
        $statementComments = $pdo->prepare($deleteComments);
        $statementComments->execute([
            ':post_id' => $postId
            ]);
        $statementLike = $pdo->prepare($deleteLike);
        $statementLike->execute([
            ':post_id' => $postId
        ]);
        $statementDelPost = $pdo->prepare($deletePost);
        $statementDelPost->execute([
            ':post_id' => $postId
        ]);

        redirect('../Get/getData.php');
    }else{
        redirect('/');
    }    





}


?>