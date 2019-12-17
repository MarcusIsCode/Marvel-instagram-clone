<?php

declare(strict_types=1);

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$id = $_SESSION["user"]['id'];
$id = (int) $id;


?>

<body>
    <?php if (!$_SESSION) {
        require __DIR__ . '/views/loggin_out/login.php';
    } else {
        require __DIR__ . '/views/loggin_out/out.php';
      
    } ?>
    
</body>
<?php require __DIR__ . '/views/fotter.php' ?>