<?php

unsetSession('error'); ?>
<div class="editPostV d-flex flex-column shadow-lg p-2 m-2 mt-3 rounded bg-dark createPost upload-btn-wrapper">

    <form action="/" method="post">
        <button type="submit" name="home" class="close text-white text-lg">X</button>
    </form>
    <!--change here-->

    <form class="d-flex align-items-center flex-column mt-2" action="app/Posts/editPost.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="postId" value="<?php echo $_POST['postId'] ?>">
        <label for="imgs"><img class="img-fluid" id="thumbnil"></label>
        <div class="custom-file  text-center upload mb-3">
            <div class="upload-btn-wrapper pb-2">
                <button class="btn">Chose a image</button>
                <input type="file" id="imgs" name="img" onchange='showMyImage(this)'>
            </div>
        </div>

        <textarea class=" mt-4 rounded" name='postText' id='posttText' rows='3'></textarea>
        <labe for="posttText"></label>

            <button class="btn mt-1 pull-right btn-lg" type="submit">Edit</button>
    </form>
</div>