<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


if (!isset($_SESSION['user'])) {
    //login and create account
    if (isset($_POST['addAcc'])) {
        $_SESSION['account'] = true;
    }
    if (isset($_POST['back'])) {
        $_SESSION['account'] = false;
    }

    if (isset($_SESSION['account']) && $_SESSION['account'] === true) {
        if (isset($_SESSION['error']['account'])) {
            $_COOKIE['messageAc'] = $_SESSION['error']['account'];
        }

        require __DIR__ . '/views/sign in/addAc.php';
    } else {
        if (isset($_SESSION['error']['account'])) {
            $_COOKIE['messageLog'] = $_SESSION['error']['signIn'];
        }

        require __DIR__ . '/views/sign in/login.php';
    }

    unsetSession('error');
} else {

    $_SESSION['showFeed'] = 'show';

    echo '<main>';

    if (isset($_POST['search'])) {
        require __DIR__ . '/views/singedIn/search.php';
    }

    if (isset($_POST['post'])) {
        require __DIR__ . '/views/singedIn/createPost.php';
    }

    if (isset($_POST['edit'])) {
        require __DIR__ . '/views/singedIn/editPostV.php';
    }

    if (isset($_GET['profile']) || isset($_POST['profile'])) {
        require __DIR__ . '/views/singedIn/profile.php';
    }

    if (isset($_SESSION['showFeed'])) {
        require __DIR__ . '/views/singedIn/home.php';
    }

    echo '</main>';
}

?>

<?php if (isset($_SESSION['user']['id'])) : ?>
    <nav class="fixed-bottom d-flex border-top mt-1 border-primary nav bg-dark">
        <form class="d-flex justify-content-around bd-highlight w-100" action="/" method="post">
            <button class="btn bg-dark" type="submit" name="home" id="home"><img src="assets\Images\icons\home-sign.svg"></button>
            <button class="btn bg-dark" type="submit" name="search"><img src="assets\Images\icons\search.svg"></button>
            <button class="btn bg-dark" type="submit" name="post">
                <div class="postBtn">
                    <p>+</p>
                </div>
            </button>
            <button class="btn bg-dark" type="submit" name="profile"><img src="assets\Images\icons\user.svg" class="prfBorder"></button>
        </form>
    </nav>
<?php endif; ?>

<?php

require __DIR__ . '/views/footer.php';

?>
