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
//unset all given posts
if (!function_exists('unsetPost')) {
    function unsetPost()
    {
        $argument  = func_get_args();

        foreach ($argument as $arg) {
            unset($_POST[$arg]);
        }
    }
}

if(!function_exists('saveCheckImg')){
/* 
$img is the file array that is checked with filesize and type.

$redirectPath is to redirect back when there is an error.

$folderPath is where the image will be saved
*/
function saveCheckImg(array $img, string $redirectPath,string $folderPath):string
    {
    $error =[];
        if ($img['size'] > 2000000) {
              $error[] = $img['name'].'exceeded filesize the filesize limit';
          
        }

        if (!in_array($img['type'], ['image/jpeg', 'image/png'])) {
            $error = 'only accept jpeg and png images';
        }
        if(!empty($error)){
            for ($i = 0; $i < 2; $i++) {

                $_SESSION['error']['img'] = $error[$i];
            }
            redirect($redirectPath);
        }else{
            $newImagePath  = $folderPath . date('B') . '-' . $img['name'];
           // move_uploaded_file($img['tmp_name'],$newImagePath);
            return $_SESSION['imgPath'] = $newImagePath;
            
        }
        
    }
    
}

if(!function_exists('checkMail')){

     
    function checkMail($pdo, string $email, string $type){
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
// requires the chosen site to the page.
//: example click on profile button, profile page appears

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