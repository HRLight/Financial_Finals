<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  require_once "./config.php";

    if(isset($_POST['approved']))
    {   

                          function generatekey(){
                                $keyLenght=8;
                                $str="1234567890";
                                $randStr=substr(str_shuffle($str),0,$keyLenght);
                                  return $randStr;
                                }

                                 $journal_code=generatekey();
                                 $amt = $_POST['amt'];
                                 $amt2=$amt;
                                 $por=$_POST['por'];


                                $name = $_POST['fname'];
                                $dept = $_POST['dept'];
                                 $status = "Release";
                                $payment = $_POST['Payment'];




        $query = "UPDATE `fnc_budget_request` SET `Remarks`='$status' ,`Payment_type`='$payment'  WHERE Requestor='$name'";
        $query_run = mysqli_query($con, $query);


        $sqlentry="INSERT INTO `fnc_journal_entry` (`id`, `Acc_no`, `Particulars`, `description`, `account_category`, `account_name`, `credit`, `debit`, `jornal_code`) VALUES('', '$journal_code', 'Accounts Payable', '$payment', 'Equity', 'Accounts Payable', '$amt', '', 1),
                                    ('', '$journal_code', '$por', '$payment', 'Expenses', '$por', '', '$amt', 2);";


         if ($link->query($sqlentry) === TRUE) {
             
         
            if ($dept=="LOG1") {
                 $query1 = "UPDATE `log1_budget` SET `Total`=`Total`+ '$amt' ,`remaining` = `remaining`+'$amt2' WHERE `id`=1;";
                 $query_run1 = mysqli_query($conn, $query1);
                   if($query_run)
               {
        
               echo '<script type="text/javascript">
                    swal("Budget", "Release", "success").then(function() {
                    window.location = "./disburse.php";});
                  </script>';

                  }

        } else {

        if($query_run)
        {
               echo '<script type="text/javascript">
                    swal("Budget", "Release", "success").then(function() {
                    window.location = "./disburse.php";});
                  </script>';
           
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
            
    }  

}
}
?>
<!-- UPDATE FOR DISBURSEMENT MODAL -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 mb-2 bg-success text-white" >
                    <h5 class="modal-title" id="exampleModalLabel">Release Budget</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">

                    <div class="modal-body">

                        <div class="form-group">
                            <label> Requstors Name </label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                placeholder="Enter First Name" readonly>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <input type="text" name="dept" id="dept" class="form-control"
                                placeholder="Enter Last Name" readonly>
                        </div>

                        <div class="form-group">
                            <label> Discription </label>
                            <input type="text" name="por" id="por" class="form-control"
                                placeholder="Enter Course" readonly>
                        </div>

                        <div class="form-group">
                            <label> Amount </label>
                            <input type="text" name="amt" id="amt" class="form-control"
                                placeholder="Enter Phone Number" readonly>
                        </div>
                           <div class="form-group">
                            <label> Date Approve </label>
                            <input type="text" name="date" id="date" class="form-control"
                                placeholder="Enter Phone Number"readonly>
                        </div>
                           <div class="form-group">
                            <label> Type of Payment </label>
                             <select type="select" class="btn dropdown-toggle" style="width: 100%;" name="Payment">
                               
                                <option value="Cash">Cash</option>
                                 <option value="Cheque">Cheque</option>
                                <option value="Bank Tranfer">Bank Transfer</option>
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                       <button type="submit" name="approved" class="btn btn-success btn-sm">Save</button>
                        
                         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Disburse Budget</b></h4>
               <a href="./disburse_reports.php" type="button" class="btn btn-outline-success btn-sm" style="float:right;" data-dismiss="modal">Reports</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_budget_request` WHERE Remarks='Approved'";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                             echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Requestor</th>";
                                         echo "<th>Department</th>";
                                        echo "<th>Discription</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Payment Type</th>";
                                         echo "<th>Remarks</th>";
                                        echo '<th><center>Action</center></th>';
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['Requestor'] . "</td>";
                                        echo "<td>" . $row['Department'] . "</td>";
                                        echo "<td>" . $row['Purpose'] . "</td>";
                                         echo "<td>" . $row['Amount'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
                                         echo "<td>" . $row['Payment_type']. "</td>";
                                        echo "<td>" . $row['Remarks'] . "</td>";
                                        echo '<td><center>';
                                             echo ' <button type="button" class="btn btn-primary btn-sm editbtn" style="width:100%;" > Release </button>';
                                             echo '</center></td>';
                                              
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No Disburse Records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    ?>
             </div>  
     </div>
</div>
</div>
</div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#fname').val(data[0]);
                $('#dept').val(data[1]);
                $('#por').val(data[2]);
                $('#amt').val(data[3]);
                $('#date').val(data[4]);
            });
        });
    </script>