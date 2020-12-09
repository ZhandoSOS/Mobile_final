<?php
if(isset($_COOKIE['email'])){
    setcookie('email', "blabla", time()-1 );
    setcookie('password', "blabla", time()-1 );
    setcookie('id', "blabla", time()-1 );
    header("location: index.php");
}


?>


