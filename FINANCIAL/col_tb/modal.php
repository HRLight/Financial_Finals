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

$sql = "INSERT INTO `fnc_collection`(`PK_Account_id`, `Name`, `Account_no`, `Particular`, `Ref_no`, `Payment_type`, `Amount`, `Description`) VALUES ('','$name','SINV-1010$i','$par','$ref','$payment','$amt','$desc')";

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