<?php 
try{

    $myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');
    if (isset($_POST['submit'])){
    
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
                      $sql = "UPDATE customer SET photo = '$filed' where customer_id = '$_COOKIE[id]'";
                      $myPDO->query($sql);
                header("location: index.php");
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