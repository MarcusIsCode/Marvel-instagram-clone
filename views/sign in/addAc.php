<div class="container-fluid-row p-2 my-1 rounded signIn">
    <h2 class="text-center">New User</h2>
    <form class="addAccount" action="app/users/creatAccount.php" method="post">
        <h4><?php echo $_COOKIE['messageAc'] ?></h4>
        <label for="imgs"><img class="img-fluid" id="thumbnil"></label>
        <div class="custom-file text-center upload">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload profile image</button>
                <input type="file" id="imgs" name="img" required onchange='showMyImage(this)'>
            </div>
        </div>

        <div class="form-gruop">
            <label for="emailCreat"></label>
            <input class="form-control" type="email" name="email" id="emailCreat" placeholder="Email" required>

            <label for="heroName"></label>
            <input class="form-control" type="text" name="heroName" id="heroName" placeholder="Name" required>

        </div>

        <div class="form-group">
            <label for="password"></label>
            <input class="form-control" type="password" name="password" id="password1" placeholder="Password" autocomplete="off" required>

            <label for="password2"></label>
            <input class="form-control" type="password" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="textArea"></label>
            <textarea class="form-control" name="biography" id="textArea" placeholder="write somthing about yourself hero"></textarea>
        </div>
        <button type="submit" class=" btn btn-dark">Create Account</button>
    </form>
</div>