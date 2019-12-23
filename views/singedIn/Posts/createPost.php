<div class="createPost">
    <p><?php ?></p>
    <form action="/../../app/Posts/postDB.php" method="post" enctype="multipart/form-data">

        <label for=" imgs"><img id="showImg"></label>
        <input type="file" name="img" id="imgs" required>
        <label for="postText"></label>
        <textarea name='postText' id='postText' required></textarea>
        <button type="submit">create</button>
    </form>
</div>