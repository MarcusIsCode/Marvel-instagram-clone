<?php
/**
 unset all given sessions
 **/
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

if($_SESSION["user"]){
$id = $_SESSION["user"]['id'];
$id = (int) $id;
}else{
    $id = null;
};


?>