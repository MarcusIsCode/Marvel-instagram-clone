<?php
if (isset($_POST['unPost'])) {
    unsetPost('post');
}

?>


<div class="createPost">
    <form action="/" method="post">
    <button typ='submit' name="unPost">X</button>
    </form>
    
    <form action="/../../app/Posts/postDB.php" method="post" enctype="multipart/form-data">
        <label for="imgs"><img id="thumbnil"></label>
        <input type="file" name="img" id="imgs" required onchange='showMyImage(this)' width=200px;>
       
        <label for=" postText"></label>
        <textarea name='postText' id='postText'></textarea>
       
        <button type="submit">create</button>
    </form>
</div>
