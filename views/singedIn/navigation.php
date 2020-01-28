<?php

$navButtons = ['home', 'profile', 'post', 'edit', 'search'];
nav($navButtons, 'home',  __DIR__ . '/home.php');
nav($navButtons, 'profile', __DIR__ . '/profile.php');
nav($navButtons, 'post', __DIR__ . '/createPost.php');
nav($navButtons, 'edit', __DIR__ . '/editPostV.php');
nav($navButtons, 'search', __DIR__ . '/search.php');
?>

<nav class="fixed-bottom d-flex border-top mt-1 border-primary nav bg-dark">
    <form class="d-flex justify-content-around bd-highlight w-100" action="/" method="post">
        <button class="btn bg-dark" type="submit" name="home"><img src="assets\Images\icons\home-sign.svg"></button>
        <button class="btn bg-dark" type="submit" name="search"><img src="assets\Images\icons\search.svg"></button>
        <button class="btn bg-dark" type="submit" name="post">
            <div class="postBtn">
                <p>+</p>
            </div>
        </button>
        <button class="btn bg-dark" type="submit" name="profile"><img src="assets\Images\icons\user.svg" class="prfBorder"></button>
    </form>
</nav>
