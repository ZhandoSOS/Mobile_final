<?php
 try{

$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');

$sql = "SELECT * FROM customers where customer_id=$_COOKIE[id]";
foreach($myPDO->query($sql)as $row){
   print "<br/>";
   print $row['customer_last_name'];
}

 }catch(PDOException $e){
    echo $e->getMessage();
 }

?>