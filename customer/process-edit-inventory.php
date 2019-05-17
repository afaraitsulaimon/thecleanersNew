<?php

  require_once("../db.php");
  require_once("../functions/dbandler.php");
  require_once("../login-process.php");



if (isset($_POST['editNewInvent'])) {
	
//STORE THE KEYED IN VALUE IN THE INPUT FIELD 

	$newProductName = sanitize($_POST['editedProductType']);

	$newPrice = sanitize($_POST['editedPrice']);

	$idValue = $_POST['idEdit'];


	//STORE ERROR VARIABLE 

	$errorEdited = array();
	
	//CHECK IF THE INPUT FIELD IS EMPTY OR IF NOTHING IS ENTERED

	if (empty($newProductName)) {
			
			$errorEdited[] = "Enter Product Type";
		}	


    if (empty($newPrice)) {
    	
    	$errorEdited[] = "Enter Price";
    }


//IF THEIR IS NO ERROR 
  if (empty($errorEdited)) {
  	
  	   //UPDATE THE PARTICULAR DETAILS

  	$updateDetails = "UPDATE vendor_inventory SET inventory_name = '$newProductName' , price = '$newPrice' WHERE vendor_inv_id = $idValue ";




  	$queryUpdates = mysqli_query($db_connect,$updateDetails);



  	if (!$queryUpdates) {
  		
  		die("could not query the UPDATEDETAILS ".mysqli_error($db_connect));
  	}

  	

 
header("location:add-inventory.php?statusEdit=success");
exit();

  }else{

  	$errorEditedMessage = "<ul>";

  	foreach ($errorEdited as $errorEditeds) {
  		
  		$errorEditedMessage .= "<li>$errorEditeds</li>";
  	}

  	$errorEditedMessage .= "</ul>";
  }









}
  

?>