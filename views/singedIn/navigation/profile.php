<?php if (isset($_POST['settings'])) {
    echo 'mohoha';
} ?>
<div class="profile">

    <form action="/" method="post">
        <button type="submit">x</button>
    </form>

    <img src="<?php echo $_SESSION['user']['profile_image'] ?>">
    <h2> <?php echo $_SESSION['user']['profile_name'] ?></h2>
    <h2> <?php echo $_SESSION['user']['email'] ?></h2>
    <p><?php echo $_SESSION['user']['profile_bio'] ?></p>

    <form action="\" method="post">
        <button type="submit" name='settings'>Account settings</button>
    </form>
</div>