<div class="newAcc container-fluid-row p-2 rounded">
    <form action="/" method="post" class="backBtn">
        <button type="submit" name="back" class="btn btn-outline-primary"><img src="assets/Images/icons/right.svg"><span>Back</span></button>
    </form>

    <h1 class="text-center">New User</h1>
    <h4 class="text-danger text-center"> <?php echo $_SESSION['error']['account']; ?></h4>
    <h4 class="text-success text-center"> <?php echo  $_SESSION['Account']; ?></h4>

    <form class="addAccount flex" action="app/users/creatAccount.php" method="post" enctype="multipart/form-data">

        <div class="imgUpload custom-file mb-5 text-center column ">
            <label for="imgs"><img class="col" id="thumbnil"></label>
            <div class="upload-btn-wrapper w-100">
                <button class="btn btn-dark">Upload profile image</button>
                <input type="file" id="imgs" name="img" required onchange='showMyImage(this)'>
            </div>
        </div>


        <div class="form-group">
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
            <textarea class="form-control" name="biography" id="textArea" placeholder="write something about yourself"></textarea>
        </div>

        <button type="submit" name="addAcc" class=" btn btn-dark w-50">Create Account</button>

    </form>

</div>
<?php unsetSession('Account'); ?>