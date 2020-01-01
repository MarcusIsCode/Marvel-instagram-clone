<div class="m-1 row text-white border-bottom border-white">

    <!--Tanke använda json för att vissa detta-->
    <img src="<?php echo $_SESSION['user']['profile_image'] ?>">
    <h2> Name: <?php echo $_SESSION['user']['profile_name'] ?></h2>
    <h2>Email: <?php echo $_SESSION['user']['email'] ?></h2>
    <p>Bio:<?php echo $_SESSION['user']['profile_bio'] ?></p>

</div>

<div class="form-group m-5 pb-5 text-white">
    <form class="addAccount" action="app/users/uppdateAccount.php" method="post">
        <h2>Change Acount settings</h2>
        <hr class="style1 bg-white">
        <label for="imgs"><img class="img-fluid" id="thumbnil"></label>
        <div class="custom-file  text-center upload">
            <div class="upload-btn-wrapper pb-2">
                <button class="btn">Upload new profile image</button>
                <input type="file" id="imgs" name="img" required onchange='showMyImage(this)'>
            </div>
        </div>

        <div class="form-group border-top border-white">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="Name" id="name" placeholder="New name">

            <label for="emailCreat">Email</label>
            <input class="form-control" type="email" name="email" id="emailCreat" placeholder="New Email">


        </div>

        <div class="form-group border-top border-bottom pb-4 px-1 mt-2 border-white text-center">
            <label for="password" class="text-center">Password</label>
            <input class="form-control" type="password" name="password" id="password1" placeholder="New password" autocomplete="off">

            <label for="password2"></label>
            <input class="form-control" type="password" name="password2" id="password2" placeholder="Repeat New Password" autocomplete="off">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="bio" id="textArea" placeholder="write somthing about yourself"></textarea>
            <label for="textArea"></label>
        </div>


        <div class="bg-danger p-3 rounded confirm hide text-center">

            <h5 class="pb-3">Write your password to confirm changes</h5>
            <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" placeholder="password" autocomplete="off">
            <label for="passwordConfirm"></label>
            <div class="mt-1 btn-group">
                <button type="submit" class="btn-outline-light bg-transparent rounded p-2 ">confirm</button>
                <button type='button' class='btn-outline-light bg-transparent rounded p-2 closeBtn'>cancel</button>
            </div>
        </div>
    </form>
    <button type="submit" class="btn-outline-light bg-transparent rounded p-2 updateAccount">Update Account</button>

</div>