<?php
require __DIR__ . '/../autoload.php';
$postId = $_POST['postId'];
$comment = $_POST['comment'];

$checkId = 'DELETE FROM comment_posts WHERE post_id=:post_id AND comment=:comment';

$statement = $pdo->prepare($checkId);
if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->execute([
    ':post_id' => $postId,
    ':comment' => $comment
]);

    $fetchPost = $statement->fetchAll(PDO::FETCH_ASSOC);

redirect('../Get/getData.php');   


?>