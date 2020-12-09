<?php
 try{

$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');
$user = '';
$sql_get_user = "SELECT user as user";
foreach($myPDO->query($sql_get_user)as $row){
   $user = $row['user'];
}
if(!empty($_POST['register'])){
   $sql = "SELECT * FROM customer";
   $email = trim($_POST['email_login']);
   $password = trim($_POST['password_login']);
   $c = 0;
      foreach($myPDO->query($sql)as $row){
         if(($user == $email) && ($user == $password)){
          $c++;
          header("location: admin.php");
         }
         if(($row['customer_email'] == $email) && ($row['customer_password'] == $password)){
            setcookie('email',$email, time() + 86400 );
            setcookie('password',$password, time() + 86400 );
            setcookie('id',$row['customer_id'], time() + 86400 );
          $c++;
          header("location: index.php");
         }
         
      }
      
      if(!isset($_COOKIE['email']) && $c==0){
        header("location: index_sign.html");
      }

   }

 }catch(PDOException $e){
    echo $e->getMessage();
 }

?>