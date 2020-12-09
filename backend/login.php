<?php
 try{

$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');

if(!empty($_POST['register'])){
$sql = "SELECT * FROM customer";
$email = trim($_POST['email_login']);
$password = trim($_POST['password_login']);

foreach($myPDO->query($sql)as $row){
   if(($row['customer_email'] == $email) && ( ($row['customer_password'] == $password))){
       session_start();
       header("Location: index.html");
   }
   header("Location: index_sign.html");
}
}
 }catch(PDOException $e){
    echo $e->getMessage();
 }

?>