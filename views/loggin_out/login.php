<?php

//page reguire this when there isn't a session 

?>

<form class="loggin" action="app/users/login.php" method="post">
 <p><?php echo $message ?> </p>
    <div class="form-gruop">
        <label for="email"></label>
        <input class="input" type="email" name="email" id="email" placeholder="Email" required>
    </div><!-- /form-group  -->

    <!-- password-->
    <div class="form-group">
        <label for="password"></label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
    </div><!-- /form-group -->

    <button type="submit" class="btn btn-primary">Login</button>
</form>