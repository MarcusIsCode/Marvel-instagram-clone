<?php
require __DIR__ . '/../autoload.php';

//name,post_img,text,user_id, post_id,date

$posts = 'SELECT users.profile_name,
                posts.*
            FROM posts
                    LEFT JOIN users ON  posts.user_id = users.id' ;
 
$statement = $pdo -> prepare($posts);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
//posts + username
$statement->execute();
$getPosts = $statement->fetchAll(PDO::FETCH_ASSOC);


//comment
$comment =  'SELECT post_id,comment,comment_name FROM comment_posts WHERE post_id=:post_id';
$statementComment = $pdo->prepare($comment);
$c=1;
for ($v=0; $v < count($getPosts) ; $v++) { 
    
    $statementComment->execute([
    ':post_id'=>$c
        ]);
    
     $getComment = $statementComment->fetchAll(PDO::FETCH_ASSOC);
     //print_r($getComment);
    
     for ($x=0; $x < count($getComment); $x++) {
         $getPosts[$v]['comments']['name'][] = $getComment[$x]['comment_name'];
        $getPosts[$v]['comments']['comment'][] = $getComment[$x]['comment'];
         
        };
        
    $c++;        
}



//likes
$likes = 'SELECT post_id,count(likes) FROM like_posts WHERE post_id = :post_id';
$statementLike = $pdo->prepare($likes);
    $l = 1;
for ($i=0; $i < count($getPosts) ; $i++) { 
    
    $statementLike ->execute([
        ':post_id'=>$l
    ]);
    $l++;
    $getLike  = $statementLike->fetch(PDO::FETCH_ASSOC);

    if($getLike['post_id'] === $getPosts[$i]['post_id'] ){    
        $getPosts[$i]['like'] = $getLike['count(likes)'];
    }else{
        $getPosts[$i]['like'] = '0';
    }
}








//all post data from db sent to json
$json = json_encode($getPosts);
file_put_contents(__DIR__.'/getData.json', $json);

redirect('/');
?>