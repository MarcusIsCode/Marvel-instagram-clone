<?php
require __DIR__ . '/../autoload.php';
//header('Content-Type: application/json');



$posts = 'SELECT * FROM posts where post_id =:post_id;';
 
$statement = $pdo -> prepare($posts);
$statement->execute([
    ':post_id' => 17
]);
$getPosts = $statement ->fetchAll(PDO::FETCH_ASSOC);
print_r($getPosts);
$json = json_encode($getPosts);
file_put_contents(__DIR__.'/getData.json', $json);
/* 
print_r($json);

print_r($getPosts);
 */
?>