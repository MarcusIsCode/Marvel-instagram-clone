<?php  
declare(strict_types=1);

require __DIR__ . '/app/autoload.php';

$statement = $pdo->prepare('SELECT *FROM users where id = 1');

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}


require __DIR__ . '/views/header.php';
?>

<body>
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