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


if(isset($_POST['comment'])){
    echo 'comment¨'; //check if empty
}

?>