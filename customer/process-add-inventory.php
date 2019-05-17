<?php
    require_once("../db.php");
  require_once("../functions/dbandler.php");
  require_once("../login-process.php");


     if (isset($_POST['addNewInvent'])) {
   
    


     //THE VALUES INPUT FROM THE FORM SIDE
     //STORE IT HAS A VARIABLE     	
          $theProductType = sanitize($_POST['cloth_type']);
          $theProductTypePrice = sanitize($_POST['cloth_price']);

          //STORE ARRAY FOR ERROR

          $addInventError = array();


          //STORE THE VENDOR ID IN A VARIABLE

   


          //CHECK IF ANY OF THE INPUT BOX IS EMPTY
          //IF IT IS EMPTY THROW THE ERROR STORE IN THE ARRAY

          if (empty($theProductType)) {
          	
          	$addInventError[]= "Enter product type e.g Suit,Shirt,Agbada e.t.c";
          }

          if (empty($theProductTypePrice)) {
          	
          	$addInventError[] = "Enter the price ";
          }

          

     //CHECK IF NO EMPTY ERROR..MEANS IF ALL FIELD ARE FILLED
      //THEN INSERT THE DETAILS INTO DATABASE
      
      if (empty($addInventError)) {


      	$vendInventId = loggedIn();



   //SELECT THE VENDOR ID
   $theVendors_Id = "SELECT * FROM vendor_registration WHERE vendor_id = $vendInventId";

   $queryTheVendors = mysqli_query($db_connect,$theVendors_Id);

     if (!$queryTheVendors) {
       
       die("could not query QUERYTHEVENDORS" .mysqli_error($db_connect));
     }


     //FETCH THE ID AND STORE IT IN A VARIABLE

     $fetchVendInvent = mysqli_fetch_assoc($queryTheVendors);

     $theIdInvent = $fetchVendInvent['vendor_id'];
          	
          	$inventDetails = "INSERT INTO vendor_inventory(inventory_name,price,vend_id) VALUES('$theProductType','$theProductTypePrice','$theIdInvent')";

            $queryInventDetails = mysqli_query($db_connect,$inventDetails);

            header("location:add-inventory.php?result=success");

            if (!$queryInventDetails) {
              
              die("could not query queryInventDetails " .mysqli_error($db_connect) );
            }



          }else{


            $theError = "<ul>";

            foreach($addInventError as $addInventErrors ) {
              
              $theError .= "<li></li>";
            }
              

              $theError .= "</ul>";

               } 
















     }
     


?>