<?php
//header('Content-Type: application/json');



$posts = 'SELECT * FROM posts where user_id =:user_id;';
 
$statement = $pdo -> prepare($posts);
$statement->execute([
    'user_id' => $id
]);
$getPosts = $statement ->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($getPosts);
file_put_contents(__DIR__.'/getData.json', $json);
/* 
print_r($json);

print_r($getPosts);
 */
?>