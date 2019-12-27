<?php
if (isset($_POST['post'])) {
    require __DIR__ . '/Posts/createPost.php';
}

?>

<nav>
    <form action="/" method="post">
        <img src="" class="profileImg">
        <button type='submit' name='post'>+</button>
        <?php require __DIR__ . '/out.php' ?>
    </form>
</nav>