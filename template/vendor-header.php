<?php
  require_once("db.php");
  require_once("functions/dbandler.php");
  require_once("login-process.php");

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" type="text/css" href="../style.css">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
   

  <div class="container-fluid">
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg bg-primary">

                <div>
                 <?php
//STORE THE LOGGED IN USER IN A VARIABLE
                 //THEN SELECT ALL FROM THE VENDOR REGISTRATION TABLE 
                     $theVendId = loggedIn();

               

       $vendDetails = "SELECT * FROM vendor_registration WHERE vendor_id = $theVendId ";


                    $queryVendDet = mysqli_query($db_connect,$vendDetails);


                    if (!$queryVendDet) {
                      
                      die("could not query queryVendDet" .mysqli_error($db_connect));
                    }

                    //FETCH THE DETAILS OF THE VENDOR

                    $fetchVendDetails = mysqli_fetch_assoc($queryVendDet);

                    //FETCH THE USER COMPANY NAME FROM THE DATABASE AND DISPAY IT ON BROWSER

                    $fetchVendCompName = $fetchVendDetails['comp_name'];

                    echo"<div style='padding-top:10px;'><a href='../vendor_index.php' style='color:white; text-decoration:none; font-size:20px; '>$fetchVendCompName</a></div>";

                    

                 ?>

                </div>
                   <div>
                      <!--we can change this to the company logo later -->
                      <h3 class="text-center">THE CLEANERS</h3>
                   </div>

                  
                 
             </div>
          

        </div>
    

  </div>










  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
