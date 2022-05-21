<!-- For Add Collected Sales -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <center><h3>Add Collection</h3></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Name:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Discription</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="desc" class="form-control" placeholder="Discription" required>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;" >Particulars</label>
                        </div>
                        <div class="col-lg-10">
                           <select type="button" class="btn dropdown-toggle" style="width: 610px;" name="Particulars">
                               
                                <option value="Delivery Sales">Collected Sales</option>
                                <option value="Asset Sales">Asset Sales</option>
                            </select>
                        </div>
                    </div>
                
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Ref No:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="ref" class="form-control" placeholder="Reference No:" required>
                        </div>
                    </div>
                     <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Amount:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="amt" class="form-control" placeholder="Amount"  required>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                     <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Payment:</label>
                        </div>
                        <div class="col-lg-10">
                            <select type="select" class="btn dropdown-toggle" style="width: 610px;" name="Payment">
                               
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash on Delivery">Cash on Delivery</option>
                            </select>
                        </div>
                    </div>

                         <div style="height:20px;"></div>
                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active bg-primary" id="gcash-tab" data-toggle="tab" href="#gcash" role="tab" aria-controls="gcash" aria-selected="true">GCASH</a>
                                    </li>

                                    <li class="nav-item">
                                      <a class="nav-link bg-primary" id="paymaya-tab" data-toggle="tab" href="#paymaya" role="tab" aria-controls="paymaya"
                                     aria-selected="false">PAYMAYA</a>
                                    </li>
                                     <li class="nav-item">
                                      <a class="nav-link bg-success" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal"
                                     aria-selected="false">PAYPAL</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link bg-primary" id="credit-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit"
                                     aria-selected="false">CREDIT CARD</a>
                                    </li>
                                       <li class="nav-item">
                                      <a class="nav-link bg-success" id="debit-tab" data-toggle="tab" href="#debit" role="tab" aria-controls="debit"
                                     aria-selected="false">DEBIT CARD</a>
                                    </li>
                                </ul>

                                <!-- For Gcash payment-->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="gcash" role="tabpanel" aria-labelledby="gcash-tab">
                                         <div style="height:20px;"></div>
                                         <div>

                                            <table  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                      <th colspan="4" class="bg-primary">Gcash</th>  
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">
                                                             <label>Account Name</label>
                                                            <input type="name" class="form-control" name="name" placeholder="Account Name">
                                                        </th>
                                                        <th>
                                                          <label>Phone Number</label>
                                                            <input type="number" class="form-control" name="number" placeholder="+63"></th>
                                                    </tr>
                                                    <tr>
                                                         <th colspan="2">
                                                          <label>Ref No.</label>
                                                            <input type="text " class="form-control" name="number" ></th>

                                                            <th>
                                                          <label>Amount</label>
                                                            <input type="number" class="form-control" name="number"></th> 
                                                    </tr>
                                                    <tr>
                                                        
                                                        <th><label>Date Of Payment</label>
                                                         <input type="date" class="form-control" name="number"></th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        
                                          </div>
                                                                           
                                    </div>
                                 
                                
                             <!-- end of Gcsh Payment-->



                             <!-- Start of PayPal Payment-->

                                 <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                    <div style="height:20px;"></div>
                                      <table  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                      <th colspan="4" class="bg-success">Paypal</th>  
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">
                                                             <label>Account Name</label>
                                                            <input type="name" class="form-control" name="name" placeholder="Account Name">
                                                        </th>
                                                        <th>
                                                          <label>Email</label>
                                                            <input type="email" class="form-control" name="number" placeholder="sample@gmail.com"></th>
                                                    </tr>
                                                    <tr>
                                                         <th colspan="2">
                                                          <label>Ref No.</label>
                                                            <input type="text" class="form-control" name="number" ></th>

                                                            <th>
                                                          <label>Amount</label>
                                                            <input type="number" class="form-control" name="number"></th> 
                                                    </tr>
                                                    <tr>
                                                        <th> <label>Date Of Payment</label>
                                                         <input type="date" class="form-control" name="number"></th>
                                                    </tr>
                                                </thead>

                                            </table>
                                    <div class="row">
                                </div>
                              </div>

                              <!-- End of Paypal Payment-->


                                <!-- Start of Paymaya Payment-->
                                 <div class="tab-pane fade" id="paymaya" role="tabpanel" aria-labelledby="paymaya-tab">
                                    <div style="height:20px;"></div>
                                      <table  class="table table-hover">
                                                <thead>
                                                    <tr>
                                                      <th colspan="4" class="bg-success">PayMaya</th>  
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">
                                                             <label>Account Name</label>
                                                            <input type="name" class="form-control" name="name" placeholder="Account Name">
                                                        </th>
                                                        <th>
                                                          <label>Email</label>
                                                            <input type="email" class="form-control" name="number" placeholder="sample@gmail.com"></th>
                                                    </tr>
                                                    <tr>
                                                         <th colspan="2">
                                                          <label>Ref No.</label>
                                                            <input type="text" class="form-control" name="number" ></th>

                                                            <th>
                                                          <label>Amount</label>
                                                            <input type="number" class="form-control" name="number"></th> 
                                                    </tr>
                                                    <tr>
                                                        <th> <label>Date Of Payment</label>
                                                         <input type="date" class="form-control" name="number"></th>
                                                    </tr>
                                                </thead>

                                            </table>
                                      </div>
                                 </div>
                                 <!-- End Paymaya-->
                        </div> 

                </div>
                <div class="modal-footer">
                     
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="pay" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
                </form>
            </div>
        </div>
 </div>
 <!-- End of Modal -->
 <?php
//for Add Collection List
require_once './config.php';
if (isset($_POST['pay']))
  {
    function generatekey(){
  $keyLenght=8;
  $str="1234567890";
  $randStr=substr(str_shuffle($str),0,$keyLenght);
  return $randStr;
}
$i=generatekey();
    $name=$_POST['name'];
    $desc=$_POST['desc'];
     $par=$_POST['Particulars'];
      $ref=$_POST['ref'];
       $amt=$_POST['amt'];
        $payment=$_POST['Payment'];

$sql = "INSERT INTO `fnc_collection`(`PK_Account_id`, `Name`, `Account_no`, `Particular`, `Ref_no`, `Payment_type`, `Amount`, `Description`) VALUES ('','$name','SINV-1010$i','$par','$ref','$payment','$amt','$desc') , ('','Colected sales','SINV-1010$i','0','$ref','$payment','$amt','$desc')";


$ql = "UPDATE `cr1_booked` SET status ='Paid' WHERE ref_no='$ref'";
if ($link->query($sql) === TRUE and $conn->query($ql) === TRUE) {
   echo '<script type="text/javascript">
                    swal("", "Succesfully Encoded", "success").then(function() {
                    window.location = "./col_list.php";});
                  </script>';
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}

}
?>