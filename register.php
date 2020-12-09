<?php
 try{

$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');
if (isset($_POST['register'])){
    $first = $_POST['first'];
    $second = $_POST['second'];
    $patronic = $_POST['patronic'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $dob =  $_POST['dob'];
    $password =  $_POST['password'];
    $inter_pass =  $_POST['inter_pass'];
    $id_card =  $_POST['id_card'];
    $id = 9;
        $sql = "INSERT INTO customer VALUES (?, ?, ?, ?, ?, ?, ? ,? ,? ,?, ?) ";
        $myPDO->prepare($sql)->execute([$id, $first, $second, $patronic,$email, $address, $dob, $id_card, $inter_pass, $password , 'images/profile.png']);
        setcookie('email',$email, time() + 86400 );
        setcookie('password',$password, time() + 86400 );
        setcookie('id',$id, time() + 86400 );
       
        header("location: index.php");
}
 }catch(PDOException $e){
    echo $e->getMessage();
 }

?>