<?php
/* if (isset($_POST['home'])) {
        unsetPost('profile', 'post');
        unsetSession('profile', 'post');
}
 */

$navButtons = ['profile', 'post'];
nav($navButtons, 'profile', __DIR__ . '/profile.php');
nav($navButtons, 'post', __DIR__ . '/createPost.php')


?>
<nav class="nav bg-dark">
        <form action="/" method="post">
                <button class="btn bg-dark" type="submit" name="home"><img src="assets\Images\icons\icons8-home-48.png"></button>
                <button class="btn bg-dark" type="submit" name="profile"> <img src="assets\Images\icons\user.svg" class="prfBorder"></button>
                <button class="btn bg-dark" type="submit" name="post">
                        <div class="postBtn">
                                <p>+</p>
                        </div>
                </button>
        </form>
        <?php require __DIR__ . '/out.php' ?>
</nav>