<?php
require __DIR__ . '/../autoload.php';


if (isset($_POST['password'], $_POST['password2']) &&  $_POST['password'] == $_POST['password2']) {
/*  echo $_POST['password'];
echo $_POST['password2'];
echo 'räääääät för fanm'; */

redirect('/');
}else{
    echo 'nello';
     echo $_POST['password'];
echo $_POST['password2'];

}
