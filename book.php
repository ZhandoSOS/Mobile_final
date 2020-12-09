<?php
 try{
    if (isset($_COOKIE['email'])){
$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');

    $start = date("d/m/Y", strtotime($_POST['start']));
    $end =  date("d/m/Y", strtotime($_POST['end']));
    $rest_id = $_POST['id']; 
    $quantity = $_POST['quantity'];
  
    $id = 23;
    
    $first = "";
    $second = "";
    $patronic = "";
    $address = "";
    $email = "";
    $dob = "2020-12-12";
    $inter_pass = "";
    $id_card = "";
    $price = 0;
    $hotel_name = "";
    $country = "";
    $address = "";
    $sql1 = "SELECT * FROM customer where customer_id=$_COOKIE[id]";
    foreach($myPDO->query($sql1)as $row){
    $first = $row['customer_first_name'];
    $second = $row['customer_last_name'];
    $patronic = $row['customer_patronic_name'];
    $address = $row['customer_address'];
    $email = $row['customer_email'];
    $dob =  $row['date_of_birth'];
    $id_card = $row['id_card'];
    $inter_pass = $row['international_passport'];
    }

    $sql2 = "SELECT  * from resting_place WHERE rest_place_id = $rest_id ";
    if(($myPDO->query($sql2))->rowCount()){
    foreach($myPDO->query($sql2)as $row){
       $hotel_name =  $row['hotel_name'];
       $country = $row['country'];
       $address =  $row['location'];
       $price = $row['price'];
    }
    }



        $sql = "INSERT INTO service VALUES (?, ?, ?, ?, ?, ? ,? ) ";
        $myPDO->prepare($sql)->execute([$id, $start, $end, $price, $quantity, $_COOKIE['id'], $rest_id ]);


        require_once __DIR__ . '/vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $data ="<div  style="."background-image:url('images/ticket.jpg') ;background-size: cover; background-position: center;background-repeat: no-repeat; border: #3c3c3c solid 1px; padding: 15px; color: #3c3c3c".">
			  <p></p>
			  <h4> Electronic Ticket  </h4>
			   <h4> Passenger:  $first  $second  $patronic  </h4>
			   <p>Born Year: $dob <p>
			   <p>id card : $id_card| international_passport: $inter_pass<p>
			   <p> You have ordered service for $quantity person and need to pay $price tg Your travel starts on $start and ends $end</p>
			    <p>Destination  Address: $country | $address | hotel name: $hotel_name </p>
    <h5>Our Contact info: </h5>
	 <p>Traveland Company | Almaty,Manasa 34/1 </p><p>info@traveland.com </p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	 </div>";
        $mpdf->WriteHTML($data);
        $mpdf->Output('ticket.pdf');
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        
        
        $mail->isSMTP();                                    
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                              
        $mail->Username = 'ainur.is1701@gmail.com';             
        $mail->Password = 'dipper.pines25';                         
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        
        $mail->setFrom('ainur.is1701@gmail.com', 'Traveland | Travel Agency');
        $mail->addAddress($_COOKIE['email'], 'Traveler');     // Add a recipient
        $mail->addReplyTo('ainur.is1701@gmail.com');
    
        $mail->addAttachment('ticket.pdf');         // Add attachments
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject ="Thank you for using our booking service!";
        $mail->Body    = "You have ordered service for $quantity person and need to pay $price tg \n Your travel starts on $start and ends $end";
       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
        
        header("location: index.php");
    }
    else{
        header("location: index_sign.html");
    }
 }catch(PDOException $e){
    echo $e->getMessage();
 }
?>