<form class="addAccount" action="app/users/creatAccount.php" method="post">
    <h2>creat account</h2>
    <h4><?php echo $messageAcount ?></h4>
    <div class="form-gruop">
        <label for="emailCreat"></label>
        <input class="input" type="email" name="email" id="emailCreat" placeholder="Email" required>

        <label for="heroName"></label>
        <input class="input" type="text" name="heroName" id="heroName" placeholder="Your Hero name" required>

    </div><!-- /form-group  -->

    <div class="form-group">
        <label for="password"></label>
        <input class="form-control" type="password" name="password" id="password1" placeholder="Password" autocomplete="off" required>

        <label for="password2"></label>
        <input class="form-control" type="password" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="textArea"></label>
        <textarea class="textArea" name="biography" id="textArea" placeholder="write somthing about yourself hero"></textarea>
    </div>
    <div class="form-group">
        <label for="profileImg"></label>
        <input type="file" name="img" id="profileImg" src="" alt="" placeholder="profilepic">
    </div>
    <button type="submit" class="btn">Creat Account</button>
</form>