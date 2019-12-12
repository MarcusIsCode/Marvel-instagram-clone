<?php
require __DIR__. '/app/autoload.php';
$statement = $pdo -> prepare('SELECT *FROM users where id = 1');

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->execute();

$meh = $statement -> fetchAll(PDO::FETCH_ASSOC);
echo $meh[0]['email']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>