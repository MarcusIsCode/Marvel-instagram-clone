<?php require __DIR__ . '/../header.php' ?>
<div class="profile hide">

    <form action="/" method="post">
        <button type="submit" name=>x</button>
    </form>

    <img src="<?php echo $_SESSION['user']['profile_image'] ?>">
    <h2> <?php echo $_SESSION['user']['profile_name'] ?></h2>
    <h2> <?php echo $_SESSION['user']['email'] ?></h2>
    <p><?php echo $_SESSION['user']['profile_bio'] ?></p>


    <div class="profileSettings">
        <form class="addAccount" action="app/users/uppdateAccount.php" method="post">
            <h2>Change Acount settings</h2>
            <div class="form-gruop">
                <label for="emailCreat"></label>
                <input class="input" type="email" name="email" id="emailCreat" placeholder="New Email">

                <label for="heroName"></label>
                <input class="input" type="text" name="heroName" id="heroName" placeholder="New name">

            </div>

            <div class="form-group">
                <label for="password"></label>
                <input class="form-control" type="password" name="password" id="password1" placeholder="New password" autocomplete="off">

                <label for="password2"></label>
                <input class="form-control" type="password" name="password2" id="password2" placeholder="Repeat New Password" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="textArea"></label>
                <textarea class="textArea" name="biography" id="textArea" placeholder="write somthing about yourself"></textarea>
            </div>
            <div class="form-group">
                <label for="profileImg"></label>
                <input type="file" name="img" id="profileImg" src="" alt="" placeholder="profilepic">
            </div>
            <button type="submit" class="btn">Uppdate Account</button>
        </form>

    </div>
    <button type="submit" name='settings'>Account settings</button>
</div>
</div>
<?php require __DIR__ . '/../footer.php' ?>