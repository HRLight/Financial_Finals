<!-- For Add Collected Sales -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <center><h3>Add Collection</h3></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                <form method="POST"  enctype="multipart/form-data">
                    <div>  
                      <div class="from-control">
                            <label style="position:relative; top:7px;">Name:</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Name" required>
                        </div>


                           <div class="form-group">
                                <label style="position:relative; top:7px;">Discription</label>
                                <textarea type="text" name="desc" class="form-control" placeholder="Discription" required></textarea>
                            </div>

                         <div class="form-group">
                         <label style="position:relative; top:7px;" >Particulars</label>
                                 <select type="button" class="form-control"  name="Particulars">
                                 <option value="Delivery Sales">Collected Sales</option>
                                 <option value="Asset Sales">Asset Sales</option>
                            </select>
                        </div>

                            <div class="form-group">
                                <label style="position:relative; top:7px;">Ref No:</label>
                                <input type="text" name="ref" class="form-control" placeholder="Reference No:" required>
                            </div>


                            <div class="form-group">
                            <label style="position:relative; top:7px;">Amount:</label>
                            <input type="text" name="amt" class="form-control" placeholder="Amount"  required>
                             </div>


                             <div class="form-group">
                            <label style="position:relative; top:7px;">Payment:</label>
                            <select type="select" class="form-control"  name="Payment">
                               
                                <option value="Bank">Bank Transfer</option>
                                <option value="gcash">GCash</option>
                                <option value="Paypal">PayPal</option>
                                <option value="Paymaya">Paymaya</option>
                                <option value="credit">Credit Card</option>
                                <option value="debit">Debit Card</option>
                            </select>
                            </div>
                             <div class="custom-file">
                                    <input type="file" name="myfile" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
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
    $fullname=$_POST['fullname'];
    $desc=$_POST['desc'];
    $par=$_POST['Particulars'];
    $ref=$_POST['ref'];
    $amt=$_POST['amt'];
    $payment=$_POST['Payment'];
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));

// dito 
$sql = "INSERT INTO `fnc_collection`(`PK_Account_id`, `Name`, `Account_no`,`journal_code`, `Particular`, `Ref_no`, `Payment_type`, `Amount`, `Description`,`document_name`, `document_mine`, `document_data`) VALUES ('','$fullname','SINV-$i','$i','$par','$ref','$payment','$amt','$desc','$name','$type','$data')";

$sqlentry="INSERT INTO `fnc_journal_entry` (`id`, `Acc_no`, `Particulars`, `description`, `account_category`, `account_name`, `credit`, `debit`, `jornal_code`) VALUES('', '$i', 'Accounts Recievable', '$desc', 'Asset', 'Accounts Recievable', '       ', '$amt', 3),
                        ('', '$i', '$par', '$desc', 'Revenue', '$par', '$amt', '', 4);";


$ql = "UPDATE `cr1_booked` SET status ='8' WHERE ref_no='$ref'";
if ($link->query($sql) === TRUE and $conn->query($ql) === TRUE and $con1->query($sqlentry) === TRUE) {


   echo '<script type="text/javascript">
                    swal("", "Succesfully Encoded", "success").then(function() {
                    window.location = "./col_list.php";});
                  </script>';
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}

}
?>