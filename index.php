<?php
require __DIR__. '/app/autoload.php';
$statement = $pdo -> prepare('SELECT *FROM users where id = 1');

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}
$statement->execute();

$meh = $statement -> fetchAll(PDO::FETCH_ASSOC);
echo $meh[0]['email'];

require __DIR__ .'/views/header.php'; 
?>

<body>
<p>hello everybooody</p>    
</body>
<?php require __DIR__. '/views/fotter.php' ?>

