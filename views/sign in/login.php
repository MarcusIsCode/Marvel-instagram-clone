<?php

//page reguire this when there isn't a session 

?>
<div class=" mt-3 container-fluid">
    <div class="p-2 container-fluid-col rounded signIn">
        <h1 class="text-center">Instagram-clone</h1>
        <form  action="app/users/login.php" method="post">
            <h4 class="text-center"><?php echo $_COOKIE['messageLog'] ?> </h4>

            <div class="form-group">
                <label for="email"></label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email"  required>

                <label for="password"></label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
            </div><!-- /form-group -->
            <button type="submit" class="btn btn-dark form-control">Sign in</button>
        </form>
    </div>
    <?php require __DIR__ . '/addAc.php'; ?>
</div>


