<?php
    require_once("../db.php");
  require_once("../functions/dbandler.php");
  require_once("../login-process.php");
  require_once("process-add-inventory.php");
  require_once("process-delete-inventory.php");
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


<div id="addInventoryBG">



    <div class="container-fluid">
          <div class="row">
          
    <div class="col-lg-offset-3 col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3 theAddInvent">

    <?php

          if (isset($_GET['result']) && $_GET['result'] == 'success') {
            
               echo "<div class='alert alert-success'>Inventory Added</div>";
          }elseif (isset($theError)) {
           

           echo "<div class='alert alert-danger'>$theError</div>";

          }
    ?>

       <h1>ADD INVENTORY</h1>
    	  <form class="form-group" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    	  	  <label>Product Type:</label>
    	  	  <input type="text" name="cloth_type" class="form-control">

    	  	  <label>Price:</label>
    	  	  <input type="text" name="cloth_price" class="form-control">
              
              <button class="viewAllTransButton"><a href="#view-all-inventory.php">View all Inventory</a></button>
              <button type="submit" name="addNewInvent" class="addInventButton">Add</button>

    	  	  <button class="cancelInventButton" ><a href="../vendor_index.php">Cancel</a></button>
    	  </form>
    
                	</div>

                </div>
          	
          </div>
    	
    
	

  <!-- TO DISLAY THE INVENTORY DOWN HERE-->



         <div class="container-fluid">
              <div class="row">
                   <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 viewAllTable">


                   <?php
    //RESULT FOR EDITING INVENTORY

                   if (isset($_GET['statusEdit']) && $_GET['statusEdit']=='success') {
      
      echo "<div class='alert alert-success'>SUCESSFULLY UPDATED</div>";
    }

                   ?>



                   <?php

  //RESULT FOR DELETING AN INVENTORY
           if (isset($_GET['statusDelete']) && $_GET['statusDelete'] == 'deleted') {
             
             echo "<div class='alert alert-danger'>Details Deleted</div>";
           }
                   ?>
                       

  <?php

    $idOfVendor = loggedIn();

  $theAddedVendInventory = "SELECT * FROM vendor_inventory WHERE vend_id = $idOfVendor";

 
 $queryResult = mysqli_query($db_connect,$theAddedVendInventory);

 if (!$queryResult) {
   
   die("could not query THE QUERYRESULT" .mysqli_error($db_connect));
 }


//display the table header

       $table = "<table class='table table-striped' id='view-all-inventory.php'>";  
       $table .=  "<tr>";  
       $table .= "<th>Product Type</th>"; 
       $table .= "<th>Price</th>"; 
       $table .= "<th>DELETE</th>"; 
       $table .= "<th>EDIT</th>";
       $table .= "</tr>";

//WHILE THE RESULT IS STILL TRUE and STORE IN TABLE DATA
 //THEN FETCH THE DEATILS FROM THE VENDOR_INVENTORY TABLE


while($fetchTheResult = mysqli_fetch_assoc($queryResult)
) {
 

    $table .= "<tr>";
    $table .= "<td>{$fetchTheResult['inventory_name']}</td>";
    $table .= "<td>{$fetchTheResult['price']}</td>";
    
    $table .= "<form method='POST'>";
    $table .= "<td><button type='submit' name='delete-inventory' class='' onclick = 'return deleteconfig()'>Delete</button></td>";
    $table .= "<td><button name='edit-inventory'><a href='edit-inventory.php?state= {$fetchTheResult['vendor_inv_id']} '>EDIT</a></button></td>";
    $table .= "<input type='hidden' name='theInventoryId' value='$fetchTheResult[vendor_inv_id]'>";
    $table .= "</form>";
    $table .= "</tr>";
}

   $table .= "</table>";

   echo $table;

            


  ?>


  <span><a href="../vendor_index.php">Return to My Home</a></span>
                   </div>
                
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