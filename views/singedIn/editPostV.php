<?php

unsetSession('error'); ?>
<div class="editPostV d-flex flex-column shadow-lg p-2 m-2 h-75  rounded bg-dark createPost upload-btn-wrapper">

    <form action="/" method="post">
        <button type="submit" name="home" class="close text-white text-lg">X</button>
    </form>

    <form class="d-flex align-items-center flex-column" action="app/Posts/editPost.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="postId" value="<?php echo $_POST['postId'] ?>">
        <label for="imgs"><img class="img-fluid m-0 p-0" id="thumbnil"></label>
        <div class="custom-file  text-center upload mb-3">
            <div class="upload-btn-wrapper m-0 p-0 ">
                <button class="btn">Chose a image</button>
                <input type="file" class="w-100 h-100 m-0 p-0" id="imgs" name="img" onchange='showMyImage(this)'>
            </div>
        </div>

        <textarea class="my-2 rounded" name='postText' id='posttText' rows='2'></textarea>
        <labe for="posttText"></label>

            <button class="btn mt-1 pull-right btn-lg" type="submit">Edit post</button>
    </form>
</div>