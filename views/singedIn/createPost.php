<?php unsetSession('error'); ?>
<div class="createPost d-flex flex-column shadow-lg mt-3 pb-2 rounded bg-dark createPost upload-btn-wrapper">
    <form  class="m-2" action="/" method="post">
        <button type="submit" name="home" class="close text-white text-lg">X</button>
    </form>

    <form class="d-flex align-items-center flex-column" action="/app/Posts/postDB.php" method="post" enctype="multipart/form-data">
    <label for="imgs"><img class="img-fluid" id="thumbnil"></label>
    <div class="custom-file  text-center upload mb-3">
            <div class="upload-btn-wrapper pb-2">
                <button class="btn">Chose a image</button>
                <input type="file" id="imgs" name="img" required onchange='showMyImage(this)'>
            </div>
        </div>

        <textarea class=" my-3 rounded" name='postText' id='postText' placeholder="include some text" rows='2'></textarea>
        <labe for="postText"></label>

        <button class="btn mt-1 pull-right btn-lg" type="submit">Share</button>
    </form>
</div>