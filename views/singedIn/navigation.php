<?php
/* if (isset($_POST['home'])) {
        unsetPost('profile', 'post');
        unsetSession('profile', 'post');
}
 */

$navButtons = ['profile', 'post', 'edit'];
nav($navButtons, 'profile', __DIR__ . '/profile.php');
nav($navButtons, 'post', __DIR__ . '/createPost.php');
nav($navButtons, 'edit', __DIR__ . '/editPostV.php');
?>
<nav class="fixed-bottom border-top mt-1 border-primary nav bg-dark">
        <form class="d-flex justify-content-around bd-highlight w-100" action="/" method="post">
                <button class="btn bg-dark meh" type="submit" name="home"><img src="assets\Images\icons\home-sign.svg"></button>
                <button class="btn bg-dark" type="submit" name="post">
                        <div class="postBtn">
                                <p>+</p>
                        </div>
                </button>
                <button class="btn bg-dark" type="submit" name="profile"> <img src="assets\Images\icons\user.svg" class="prfBorder"></button>
        </form>
</nav>

<script>
        const meh = document.querySelector('.meh');
        const me2 = document.querySelectorAll('post');

        meh.addEventListener('click',e=>{
                e.preventDefault()
                foreach.
                me2.style.display="none";
        })
</script>