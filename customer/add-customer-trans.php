
<?php
     require_once("../db.php");
     require_once("../functions/dbandler.php");
     require_once("../login-process.php");
     require_once("process-add-cust-trans.php");

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


 
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg bg-danger">
                                 <h1 style="text-align:center">Add Customer Transaction</h1>

                            </div>
                                 <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                              <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                  <label>
                                       Customer Name :
                                  </label>

                                  <input type="text" class="form-control" >
                              </div>

                              <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                  <label>
                                       Phone :
                                  </label>

                                  <input type="text" class="form-control">
                              </div>


                              <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                  <label>
                                       Address
                                  </label>

                                  <textarea class="form-control"></textarea>
                              </div>
                            

                              <div class="table table-responsive" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2" id="formToDuplicate">
                              
<div class="table table-responsive" style="margin-top:20px;">
<table class="table table-responsive table-striped table-bordered">
<thead>
	<tr>
    	
         <td>Inventory Name</td>
         <td>Quantity</td>
    	<td>Price</td>
    	<td>Total</td>
    	<td>Delete</td>
    </tr>
</thead>
<tbody id="TextBoxContainer">
</tbody>
<tfoot>
  <tr>
    <th colspan="5">
    <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;</button></th>
  </tr>
</tfoot>
</table>
</div>
</div>


                              

                              <div style="margin-top :10px;" class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <input type="submit" class="btn btn-block btn-default" value="ADD TRANSACTION" style="width:200px;">
                              </div>

                              <div style="margin-top :10px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                                  <a href="view-all-customer.php" class="btn btn-block btn-danger" style="width:200px">back</a>
                              </div>
                              




                            </div>
                                 </form>
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
  
 
$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});
function GetDynamicTextBox(value) {
    return '<td><select name="" class="form-control"><option> Select</option><option> Male</option><option> Female</option></select></td>' + '<td><input name = "DynamicTextBox" type="text" value = "' + value + '" class="form-control" /></td>' + '<td><input name = "DynamicTextBox" type="text" value = "' + value + '" class="form-control" /></td>' + '<td><input name = "DynamicTextBox" type="text" value = "' + value + '" class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i></button></td>'
}



</script>




