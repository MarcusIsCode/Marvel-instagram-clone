<?php
require __DIR__ . '/../autoload.php';

$postId = $_POST['postId'];
if(isset($_FILES['img'])|| isset($_POST['postText'])){

    $uppDatePost = 'UPDATE posts
        SET post_id=:post_id,
            user_id =:user_id,
            post_img=:post_img,
            text=:text,
	        date=:date
        WHERE post_id=:post_id';

   $getPost = 'SELECT * FROM posts WHERE post_id =:post_id';
   $statement = $pdo -> prepare($getPost);
       $statement -> execute([
        ':post_id' => $postId
    ]);
    $getPost = $statement->fetch(PDO::FETCH_ASSOC);

    if(!empty($_POST['postText'])){
        $text = filter_var($_POST['postText'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    }

    if($_FILES['img']['size'] > 0){
        $img = $_FILES['img'];
        unlink('../..'.$getPost['post_img']);
        $imgPath = __DIR__ . '/../../assets/Images/post_img/';
       saveCheckImg($id,'post',$img,'/',$imgPath);
    }

    $date = date('Y-m-d G:i');

    $statementUpdate = $pdo -> prepare($uppDatePost);
    if (!$statementUpdate) {
        die(var_dump($pdo->errorInfo()));
    }
    $statementUpdate-> execute([
        ':post_id'=>$postId,
        ':user_id'=>$id,
        ':post_img'=>($_FILES['img']['size'] > 0? $_SESSION['imgPath']: $getPost['post_img']),
        ':text'=>  (!empty($_POST['postText'])?$text:$getPost['text'] ),
	    ':date'=>$date
    ]);
   redirect('../Get/getData.php');
    unsetSession('imgPath');
}else{
    redirect('/');
}
