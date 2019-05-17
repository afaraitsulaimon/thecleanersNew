<?php

  require_once("../db.php");
  require_once("../functions/dbandler.php");
   require_once("process-edit-inventory.php");




  

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>

<?php
    
    //CHECK IF YOU CLICK ON THE BUTTON FOR A PARTICULAR IF
//FROM THE ADD NEW INVENTORY WHICH GET THE INVENTORY IDAS STORED AS STATE ON THE CLICK BUTTON SIDE

    if (isset($_GET['state'])) {
      
        $theInventEditId = $_GET['state'];


        //THE SELECT ALL THE DETAILS FOR THE PARTICULAR INVENTORY CLICKED

        $inventoryForEdit = "SELECT * FROM vendor_inventory WHERE vendor_inv_id = $theInventEditId";


        $queryInventForEdit = mysqli_query($db_connect,$inventoryForEdit);


        if (!$queryInventForEdit) {
          
          die("could not query QUERYINVENTFOREDIT " .mysqli_error($db_connect));
        }


        //THEN FETCH THE DETAILS AND STORE IT IN A VARIABLE

        $fetchInventForEdit = mysqli_fetch_assoc($queryInventForEdit);

      
      $detailsProduct = $fetchInventForEdit['inventory_name'];
      $detailsPrice = $fetchInventForEdit['price'];
      $detailsId = $fetchInventForEdit['vendor_inv_id'];




       
    }

?>

     <div id="editInventoryBG">



    <div class="container-fluid">
          <div class="row">
          
    <div class="col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3 theEditInvent">


<?php

    if (isset($errorEditedMessage)) {
      
      echo "<div class='alert alert-danger'>{$errorEditedMessage}</div>";
    }
?>
    

       <h1>EDIT INVENTORY</h1>
    	  <form class="form-group" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    	  	  <label>Product Type:</label>
    	  	  <input type="text" name="editedProductType" class="form-control" value="<?php if (isset($fetchInventForEdit)) {
               echo $detailsProduct;
            }

            ?>">

    	  	  <label>Price:</label>
    	  	  <input type="text" name="editedPrice" class="form-control" value="<?php

            if (isset($fetchInventForEdit)) {
               echo $detailsPrice;
            }

              ?>">


            <!-- HIDDEN INPUT TO HOLD THE ID OF THE ONE YOU WANT TO EDIT -->

            <input type="hidden" name="idEdit" value="<?php if (isset($fetchInventForEdit)) {
               echo $detailsId;
            } ?>">
              
              <button class="viewAllTransButton"><a href="add-inventory.php">View all Inventory</a></button>

              <button type="submit" name="editNewInvent" class="editInventButton">Edit</button>
             
    	  	  <button class="cancelInventButton" ><a href="../vendor_index.php">Cancel</a></button>

            
    	  </form>
    
                	</div>

                </div>
          	
          </div>
    	



 <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

  <script type="text/javascript" src="../js/bootstrap.min.js"></script>


  <!--MY JAVASCRIPT -->

<script type="text/javascript" src='../jsfile/jquery.js'></script>
<script type="text/javascript" src='../jsfile/script.js'></script>
</body>
</html>