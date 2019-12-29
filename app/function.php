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
//check if image is right type and size if not redirect with session message
if(!function_exists('checkImg')){
    function checkImg(array $img, string $path)
    {
        if ($img['size'] > 2000000) {
            return $_SESSION['error']['fileSize'] = 'image to big';
          redirect($path);  
        }

        if (in_array($img['type'], ['image/jpeg', 'image/png'])) {
            $_SESSION['error']['type'] = 'only accept jpeg and png images';
            redirect($path);
        }
    }
}
if(!function_exists('checkMail')){
    function checkMail($pdo, $email,$type){
        $emailCheck = 'SELECT email, profile_name FROM users where email = :email';
        $statementEmail = $pdo->prepare($emailCheck);
        $statementEmail->execute([':email' => $email]);
        $checkEmail = $statementEmail->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < sizeof($checkEmail); $i++) {
            if ($checkEmail[$i]['email'] === $email) {
                $_SESSION['error'][$type] = 'email already exists';
                redirect('/');
            }
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