

<?php
  

    require_once("../db.php");
  require_once("../functions/dbandler.php");


      if (isset($_POST['delete-inventory'])) {
      	
        //GET THE CLICKED INVENTORY FOR DELETE THORUGH THE HIDDEN INPUT IN THE ADD-INVENTORY

        $idToDelete = $_POST['theInventoryId'];
        
        //DELETE THE DETAILS

        $sqlIdToDelete = "SELECT * FROM vendor_inventory WHERE vendor_inv_id = $idToDelete";


      $resultIdToDelete = mysqli_query($db_connect,$sqlIdToDelete);


      if (!$resultIdToDelete) {
      	
      	die("could not query the Result" .mysqli_error($db_connect));
      }


//FETCH THE ID TO DELETE AND STORE IT IN VARIABLE
//THEN DELETE IT

      $fetchTheResult = mysqli_fetch_array($resultIdToDelete);

      $inventoryId = $fetchTheResult['vendor_inv_id'];
  
  
     
     //THEN PROCEED TO DELETE

      $inventoryToDelete = "DELETE FROM vendor_inventory WHERE vendor_inv_id = $inventoryId";



      $queryInventDeleted = mysqli_query($db_connect,$inventoryToDelete);

     if (!$queryInventDeleted) {
     	
     	die("could not query QUERYINVENTDELETED" .mysqli_error($db_connect));
     }

   header("location:add-inventory.php?statusDelete=deleted");
   exit();
   





      }


?>