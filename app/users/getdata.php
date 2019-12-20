<?php 
$id = $_SESSION["user"]['id'];
$id = (int) $id;
echo $id;
echo  'hello';

$posts = 'SELECT * FROM posts';
 
$statement = $pdo -> prepare($posts);

$statement->execute();
$getPosts = $statement ->fetch(PDO::FETCH_ASSOC);
print_r($getPosts);
 ?>