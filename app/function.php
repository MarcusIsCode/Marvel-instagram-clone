<?php
//unset all given sessions
if (!function_exists('unsetSession')) {
    function unsetSession(){
    $argument  = func_get_args();
    
    foreach($argument as $arg){
        unset($_SESSION[$arg]);
        
        }
    }
}
if (!function_exists('unsetPost')) {
    function unsetPost()
    {
        $argument  = func_get_args();

        foreach ($argument as $arg) {
            unset($_POST[$arg]);
        }
    }
}

if (!function_exists('redirect') ){
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect($path)
    {
        header("Location: ${path}");
        exit;
    }
}
if(!function_exists('nav')){


function nav(array $navBtn, string $name, string $path){
     foreach ($navBtn as $btn){
       if($btn === $name){
         continue;
       }else{
           unsetSession($btn);   
       }
    }
    if (isset($_POST[$name])) {
        $_SESSION[$name] = true;
    }
    if (isset($_SESSION[$name])) {
        return require $path;
    }
}
}


if($_SESSION["user"]){
$id = $_SESSION["user"]['id'];
$id = (int) $id;
}else{
    $id = null;
};


?>