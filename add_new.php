<?php 
try{

    $myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');
    if (isset($_POST['add'])){
        $hotel_name = $_POST['hotel_name'];
        $features = $_POST['features'];
        $country = $_POST['country'];
        $sea_name = $_POST['sea_name'];
        $location = $_POST['location'];
        $quantity = 10;
        $price = $_POST['price'];
        $sales = 0; 
        $id = 11;

		  $file=$_FILES['file'];
		  $fileName=$_FILES['file']['name'];
		  $fileTmp=$_FILES['file']['tmp_name'];
		  $fileSize=$_FILES['file']['size'];
		  $fileEr=$_FILES['file']['error'];
		  
		  $fileExt= explode('.', $fileName);
		  $filleAcext= strtolower(end($fileExt));
		  
		  $allowed=array('jpg', 'png', 'jpeg', 'docx', 'xls', 'csv', 'pdf', 'svg');
		  
		  if(in_array($filleAcext,  $allowed)){
			  if($fileEr===0){
				  if($fileSize<1000000){
					  $newf=uniqid('', true).".".$filleAcext;
					  $filed='images/'.$newf;
					  move_uploaded_file( $fileTmp, $filed);
                      $sql = "INSERT INTO resting_place VALUES (?, ?, ?, ?, ?, ?, ? ,? ,?, ?) ";
                      $myPDO->prepare($sql)->execute([$id, $hotel_name, $location, $country,$features, $sea_name, $quantity, $price, $sales, $filed ]);
                header("location: admin.php");
				  }
				  else {
					    echo "Your file is too big!";
					  
				  }
			  }
			  else {
				  
				   echo "There is an error!";
			  }
		  }
		  else{
			  echo "You cannot allowed  file of this type!";
		  }
		  
	  }
	  
	}catch(PDOException $e){
        echo $e->getMessage();
     }  
	  ?>