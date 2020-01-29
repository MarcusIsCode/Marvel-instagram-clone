<?php
?>
<div class="signIn">
    <h1 class="text-center">Instagram-clone</h1>
    <div class="signInInputBox p-2 rounded">

        <form action="app/users/login.php" method="post">
            <h4 class="text-center"><?php if (isset($_SESSION['error']['signIn'])) {
                                        echo $_SESSION['error']['signIn'];
                                    } ?> </h4>

            <div class="form-group">
                <label for="email"></label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>

                <label for="password"></label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
            </div><!-- /form-group -->
            <button type="submit" class="btn btn-dark form-control">Sign in</button>
        </form>
        <form action="/" method="post">
            <button type="submit" name="addAcc" class="btn btn-dark form-control">New user</button>
        </form>
    </div>


</div>
