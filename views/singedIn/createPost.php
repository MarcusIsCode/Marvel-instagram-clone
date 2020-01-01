
<div class="createPost upload-btn-wrapper">
    <form action="/../../app/Posts/postDB.php" method="post" enctype="multipart/form-data">
        <label for="imgs"><img id="thumbnil"></label>
        <input type="file" name="img" id="imgs" required onchange='showMyImage(this)' width=200px;>
       
        <label for=" postText"></label>
        <textarea name='postText' id='postText'></textarea>
       
        <button type="submit">create</button>
    </form>
</div>
