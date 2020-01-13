<?php
//check if it's been liked
require __DIR__ . '/../autoload.php';
$postId = $_POST['postId'];

if(isset($_POST['like'])){
    $likeDb = 'INSERT INTO like_posts(user_id,post_id,likes)VALUES(:user_id,:post_id,1)';
    $removeLike = 'DELETE FROM like_posts WHERE post_id = :post_id AND user_id=:user_id';
    $checkId = 'SELECT * FROM like_posts WHERE post_id=:post_id AND user_id=:user_id';

        $statement = $pdo -> prepare($checkId);
            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }
        $statement -> execute([
        ':post_id'=> $postId,
        ':user_id'=>$id
        ]);

        $fetchPost = $statement->fetch(PDO::FETCH_ASSOC);
          //checks if database isn't empty to remove the like
          //1 like for one user for one post.
        if(!empty($fetchPost)){    
            $statementDel = $pdo->prepare($removeLike);
             $statementDel->execute([
            ':post_id' => $postId,
            ':user_id' => $id
            
            ]);
            redirect('../Get/getData.php');
         }  
            $statementAdd = $pdo->prepare($likeDb);
            $statementAdd->execute([
                ':post_id' => $postId,
                ':user_id' => $id
                    ]);
            redirect('../Get/getData.php');
            }
             
    

if(isset($_POST['commentSub'])){
  
    $text = filter_var($_POST['comment'], FILTER_SANITIZE_STRING); //check if empty
    if(empty($text)){
        redirect('/');
    }else{
        $comment = 'INSERT INTO comment_posts(user_id,post_id,comment,comment_name)
             VALUES(:user_id,:post_id,:comment,:comment_name)';
        $statement = $pdo->prepare($comment);
        $statement ->execute([
            ':user_id' => $id,
            ':post_id' => $postId,
            ':comment' => $text,
            ':comment_name' => $_SESSION['user']['profile_name']
        ]);
        redirect('../Get/getData.php');   
    }

}

?>