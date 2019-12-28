
<div class="profile">

    <!--Tanke använda json för att vissa detta-->
    <img src="<?php echo $_SESSION['user']['profile_image'] ?>">
    <h2> Name: <?php echo $_SESSION['user']['profile_name'] ?></h2>
    <h2>Email: <?php echo $_SESSION['user']['email'] ?></h2>
    <p>Bio:<?php echo $_SESSION['user']['profile_bio'] ?></p>


    <div class="profileSettings">
        <form class="addAccount" action="app/users/uppdateAccount.php" method="post">
            <h2>Change Acount settings</h2>
            <div class="form-gruop">
                <label for="emailCreat"></label>
                <input class="input" type="email" name="email" id="emailCreat" placeholder="New Email">

                <label for="name"></label>
                <input class="input" type="text" name="name" id="name" placeholder="New name">

            </div>

            <div class="form-group">
                <label for="password"></label>
                <input class="form-control" type="password" name="password" id="password1" placeholder="New password" autocomplete="off">

                <label for="password2"></label>
                <input class="form-control" type="password" name="password2" id="password2" placeholder="Repeat New Password" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="textArea"></label>
                <textarea class="textArea" name="bio" id="textArea" placeholder="write somthing about yourself"></textarea>
            </div>
            <div class="form-group">
                <label for="profileImg"></label>
                <input type="file" name="img" id="profileImg" src="" alt="" placeholder="profilepic">
            </div>

            <div class="confirm hide">
                <h3>Write your password to confirm changes</h3>
                <label for="passwordConfirm"></label>
                <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="password" autocomplete="off">
                
                <button type="submit" class="btn">confirm</button>

            </div>
        </form>
        <button type="submit" class="updateAccount">Update Account</button>

    </div>
</div>
</div>
