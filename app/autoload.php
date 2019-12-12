<?php 
declare(strict_types=1);


$path = sprintf('sqlite:%s/database/instagram_clone.db',__DIR__ );

$pdo = new PDO($path);

?>