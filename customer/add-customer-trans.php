;
<?php
     require_once("../db.php");
     require_once("../functions/dbandler.php");
     require_once("../login-process.php");
     $id = $_SESSION['vend_id'] ;
   
   $sql = "SELECT * FROM vendor_inventory WHERE vend_id = $id ";
     $runSql = mysqli_query($db_connect,$sql);
     $options ="";
     while($result= mysqli_fetch_assoc($runSql)){ 
      $options .= "<li><a href='?id={$result['vendor_inv_id']}'>{$result['inventory_name']}</a></li>";           
     }
     if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT price FROM vendor_inventory WHERE vendor_inv_id = $id ";
      $runSql = mysqli_query($db_connect,$sql);
      $myPrice = mysqli_fetch_assoc($runSql);
   }
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">

   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
   <div id="theAddCustTransactionPage">
   	         <div class="container">
   	               <div class="row">
   	                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2" >



   	                     <h1>Add Customer Transaction</h1>
                           <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class='form-group transactionForms'>
                              
                       <label>Customer Name:</label>
                       <input type="text" name="" class="form-control">

                       <label>Customer Address:</label>
                       <textarea class="form-control"></textarea>

                       <label>Phone:</label>
                       <input type="text" name="" class="form-control form-main">
                        
                        <!-- WHERE THE NEW TRANSACTION IS SHOWN AFTER THE CLICK OF THE + TO ADD NEW TRANSACTION-->

                        <div id="theNewTransact">
                           <label>Product Type:</label>
                           <div class="dropdown">
                           <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <?php echo $options;?>
                           </ul>
                           </div>

                           <label>Quantity:</label>
                           <input type="text" name="" class="form-control">

                           <label>Price:</label>
                           <input type="text" name="" value = "<?= isset($myPrice)?$myPrice['price']:"" ?>" class="form-control"> 

                           <label>Total</label>
                           <input type="text" name="" class="form-control">

                           <button>X</button>


                        </div>

                        <!-- WHERE TO CREATE NEW FORM AFTER THE CLICK OF +-->
                        <div id='newForm'></div>

            
                       
                       

                    <button>Add Transaction</button> 
                        <button><a href="view-all-customer.php">Return</a></button>



                           </form>

                           <a class="btn btn-primary add-more-btn">Add</a>
   	                    </div>
   	               	
   	               </div>
   	         	
   	         </div>
   	     	

   	     </div>



   	     <script type="text/javascript" src="../bootstrap/js/jquery-3.3.1.min.js"></script>

   	     <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

         <!--MY OWN JAVASCRIPT -->

   <script type="text/javascript" src="../jsfile/jquery.js"></script>
    <script type="text/javascript" src="../jsfile/script.js"></script>


   </div>
</body>
</html>

<script>
  
  //script for adding new transaction form for customer 
//in the add customer transaction page

$('.add-more-btn').click(function() {
  var clone = $('.transactionForms').clone('#theNewTransact');
  $('#newForm').append(clone);
});

</script>