
<?php
	require_once('../db.php');
	require_once('../functions/dbandler.php');
	require_once('../login-process.php');


if (isset($_POST['customerReg'])) {
	
      //CREATE A VARIABLE THAT STORES THE INPUTTED DETAILS FROM TE FORM

      	$newCustFirstName = sanitize($_POST['customerFirstName']);
      	$newCustLastName = sanitize($_POST['customerLastName']);

          if (isset($_POST['gender']) && $_POST['gender']=='male') {
          	
          	$newCustGender = $_POST['gender'];
          }

         
          if (isset($_POST['gender']) && $_POST['gender']=='female') {
          	
          	$newCustGender = $_POST['gender'];
          }

           
           $newCustEmail = sanitize($_POST['customerEmail']);
           $newCustPhone = sanitize($_POST['customerPhoneNo']);
           $newCustDOB = sanitize($_POST['customerDOB']);

           $newCustAdd = sanitize($_POST['customerAddress']);

           //CREATE A VARIABLE THAT STORES THE ERROR IN AN ARRAY

           $newCustError = array();


        //CHECK IF ANY OF THE INPUT BOX IS EMPTY
           //IF IT IS EMPTY.. THROW THE ERROR OUT

           if (empty($newCustFirstName)) {
           	
           	$newCustError[] = "Enter Customers First Name";
           }


           if (empty($newCustLastName)) {
           	
           	$newCustError[] = "Enter Customers Surname or Last Name";
           }

         
           if (!isset($_POST['gender'])) {
           	
           	   $newCustError[] = "Select one gender please";
           }

           if (empty($newCustEmail)) {
           	
           	  $newCustError[]  = "Enter Customer Email";
           }


           if (empty($newCustPhone)) {
           	
           	  $newCustError[]  = "Enter Customer Phone Number";
           }




           if (empty($newCustAdd)) {
           	
           	  $newCustError[]  = "Enter Customer Home or Office Address";
           }


           //SELECT THE ID OF THE LOGIN VENDOR
           //SO THAT YOU CAN STORE IT IN THE DATABASE

           $vendorsId = loggedIn();

           $theVendor = "SELECT * FROM vendor_registration WHERE vendor_id = $vendorsId";

          $queryVendor = mysqli_query($db_connect,$theVendor);

          if (!$queryVendor) {
          	
          	die("could not query queryVendor" .mysqli_error($db_connect));
          }
         
         //FETCH THE ID AND STORE IT AS A VARIABLE

          $fetchVendId = mysqli_fetch_assoc($queryVendor);

          $theVendID = $fetchVendId['vendor_id'];






           // THEN IF NO ERROR IS FOUND
           // INSERT DETAILS INTO TE DATABASE

           if (empty($newCustError)) {
           	
           	   $customerDetails = "INSERT INTO customer_registration(cust_first_name,cust_last_name,cust_email,cust_phone,cust_address,cust_dob,cust_gender,cust_vend_id,cust_reg_date) VALUES('$newCustFirstName', '$newCustLastName', '$newCustEmail', '$newCustPhone', '$newCustAdd', '$newCustDOB', '$newCustGender', '$theVendID', NOW())";

           	   

           	   $queryCustDetails = mysqli_query($db_connect,$customerDetails);

           	   header("location:add_customer.php?status=successReg");
           	   exit();
           }else{


           	$errorDetails = "<ul>";

           	foreach ($newCustError as $newCustErrors) {
           		
           		$errorDetails .= "<li>$newCustErrors</li>";
           	}

           	  $errorDetails .= "</ul>";
           }















}

?>
