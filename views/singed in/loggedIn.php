<?php
echo '<br><br>' . $message . $_SESSION['user']['profile_name'];
require __DIR__ .'/headerIn.php'; 
require __DIR__. '/Posts/createPost.php';
require __DIR__. '/../../app/users/getData.php';

?>