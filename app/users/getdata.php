<?php 
$id = $_SESSION["user"]['id'];
$id = (int) $id;

$posts = 'SELECT * FROM posts where user_id =:user_id';
 
$statement = $pdo -> prepare($posts);
$statement->execute([
    'user_id' => $id
]);

$getPosts = $statement ->fetchAll(PDO::FETCH_ASSOC);


print_r($getPosts);
echo $id;
?>