<?php
if (isset($_POST['post'])) {
    require __DIR__ . '/navigation/createPost.php';
}
if (isset($_POST['profile'])) {
    require __DIR__ . '/navigation/profile.php';
}

?>

<nav>
    <form action="/" method="post">
        <button type="submit" name="profile"><img src="" class="profileImg"></button>
        <button type='submit' name='post'>+</button>
        <?php require __DIR__ . '/out.php' ?>
    </form>
</nav>