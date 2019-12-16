<?php

declare(strict_types=1);

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';
//die(var_dump($_SESSION["user"]));
//die(var_dump())
//$_SESSION["user"] = $user;
$id = $_SESSION["user"]['id'];
$id = (int) $id;
//unset($_SESSION['user']);

if ($id === 1) {
    echo 'hello';
}

?>

<body>
    <?php if($_SESSION){
        echo 'whatt the hell is going on';
    }else{
        echo'nonoo';
    } ?>
    <form action="app/users/login.php" method="post">
    <button type="subbmit">unset</button>
    </form>
    <form action="app/users/login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="email" required>
            <small class="form-text text-muted">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text text-muted">Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>
<?php require __DIR__ . '/views/fotter.php' ?>