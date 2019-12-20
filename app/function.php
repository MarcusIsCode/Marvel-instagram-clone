<?php
/**
 unset all given sessions
 **/
if (!function_exists('unsetSession')) {
    function unsetSession(){
    $argument  = func_get_args();
    foreach($argument as $arg){
        unset($arg);
        
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



?>