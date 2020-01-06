<?php
require __DIR__ . '/../autoload.php';
$postId = $_POST['postId'];

if(isset($_POST['like'])){
    $likeDb = 'INSERT INTO like_posts(user_id,post_id,likes)
             VALUES(:user_id,:post_id,1)';
  
    $removeLike = 'DELETE FROM like_posts WHERE post_id = :post_id';
    
    $likeNum = $_SESSION['like'] +=1;
        if($likeNum ===1){
            $statement = $pdo -> prepare($likeDb);
            if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        $statement -> execute([
        ':user_id' => $id,
        ':post_id'=> $postId,
        ]);
        redirect('/');
       }
           
       if($likeNum ===2){
        $statement = $pdo->prepare($removeLike);
        $statement->execute([
            ':post_id' => $postId
        ]);
        unsetSession('like');
        redirect('/');
       }
  
}


if(isset($_POST['commentSub'])){
  
    $text = filter_var($_POST['comment'], FILTER_SANITIZE_STRING); //check if empty
    if(empty($text)){
        redirect('/');
    }else{
        $comment = 'INSERT INTO comment_posts(user_id,post_id,comment)
             VALUES(:user_id,:post_id,:comment)';
        $statement = $pdo->prepare($comment);
        $statement ->execute([
            ':user_id' => $id,
            ':post_id' => $postId,
            ':comment' => $text
        ]);
       redirect('/');     
    }

}

?>