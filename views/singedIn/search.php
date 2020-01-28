<?php
unset($_SESSION['showFeed']);
?>

<div class="search d-flex flex-column align-items-center p-5 w-100">

    <form method="post" class="searchForm d-flex justify-content-between w-75">
        <input class="rounded w-75 p-0 mr-3" type="text" name="search" id="search" autocomplete="off" required>

        <button type="submit" class="btn border bg-dark text-white w-15">Search</button>
    </form>

    <div class="foundUsers w-75 mt-3">
    </div>

</div>
