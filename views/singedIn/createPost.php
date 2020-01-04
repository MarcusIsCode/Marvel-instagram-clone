<div class="d-flex flex-column shadow-lg p-2 m-2 mt-3 rounded bg-dark createPost upload-btn-wrapper">
    <form  action="/" method="post">
        <button type="submit" name="home" class="close text-white text-lg">X</button>
    </form>

    <form class="d-flex align-items-center flex-column mt-2" action="/app/Posts/postDB.php" method="post" enctype="multipart/form-data">
    <label for="imgs"><img class="img-fluid" id="thumbnil"></label>
    <div class="custom-file  text-center upload mb-3">
            <div class="upload-btn-wrapper pb-2">
                <button class="btn">Chose a image</button>
                <input type="file" id="imgs" name="img" required onchange='showMyImage(this)'>
            </div>
        </div>

        <textarea class=" mt-4 rounded" name='postText' id='postText' rows='3'></textarea>
        <label class="" for="postText"></label>

        <button class="btn mt-1 pull-right btn-lg" type="submit">Share</button>
    </form>
</div>