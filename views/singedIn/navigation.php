<?php
if (isset($_POST['home'])) {
        unsetPost('profile', 'post');
        unsetSession('profile', 'post');
}
$navButtons = ['profile', 'post'];

nav($navButtons, 'profile', __DIR__ . '/profile.php');
nav($navButtons, 'post', __DIR__ . '/createPost.php')


?>
<nav>
        <form action="/" method="post">
                <button type="submit" name="home">Home</button>
                <button type="submit" name="profile"> <img src="" class="navigate profileBtn"></button>
                <button type="submit" name="post">
                        <div class="navigate  postBtn">+</div>
                </button>        
        </form>
        <?php require __DIR__ . '/out.php' ?>
</nav>