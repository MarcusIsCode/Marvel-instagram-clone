<div class="p-0  bg-dark  d-flex container text-white border-bottom border-white">
    <div class="w-50 bg-dark p-1 border-right rounded">
        <img class=" w-100 rounded" src="<?php echo $_SESSION['user']['profile_image'] ?>">
    </div>
    <div class="pl-1">
        <p class="m-0 mt-1 border-bottom"> Name: <?php echo $_SESSION['user']['profile_name'] ?></p>
        <p class="m-0 mt-1 border-bottom">Email: <?php echo $_SESSION['user']['email'] ?></p>
        <p class="m-0 mt-1">Bio:<?php echo $_SESSION['user']['profile_bio'] ?></p>
    </div>
</div>
<div>
    <?php require __DIR__ . '/out.php' ?>
</div>

<div class="form-group m-5 pb-5 text-white">
    <form class="addAccount" action="app/users/uppdateAccount.php" method="post">
        <h2>Change Account settings</h2>
        <hr class="style1 bg-white">

        <label for="imgs"><img class="img-fluid" id="thumbnil"></label>
        <div class="custom-file  text-center upload">
            <div class="upload-btn-wrapper pb-2">
                <button class="btn">Upload new profile image</button>
                <input type="file" id="imgs" name="img" onchange='showMyImage(this)'>
            </div>
        </div>

        <div class="form-group border-top border-white">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="New name">

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
            <div class="mt-1 ml-5 w-75 d-flex justify-content-between">
                <button type="submit" class="btn-outline-light bg-transparent rounded p-2 ">confirm</button>
                <button type='button' class='btn-outline-light bg-transparent rounded p-2 closeBtn'>cancel</button>
            </div>
        </div>
    </form>
    <button type="submit" class="btn-outline-light bg-transparent rounded p-2 updateAccount">Update Account</button>

</div>