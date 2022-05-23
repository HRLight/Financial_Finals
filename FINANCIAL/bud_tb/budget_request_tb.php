<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  require_once "./config.php";

    if(isset($_POST['approved']))
    {   
         $amt = $_POST['amt'];
        $name = $_POST['fname'];
        $dept = $_POST['dept'];
         $status = "Approved";
         $qr="UPDATE `fnc_budget_allo` SET `amount`=`amount`-'$amt' WHERE `department`='$dept'";
         $qr_run = mysqli_query($con1, $qr);
        $query = "UPDATE `fnc_budget_request` SET `Remarks`='$status' WHERE Requestor='$name'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            if ($qr_run) {
               echo '<script type="text/javascript">
                    swal("Approved", "Budget", "success").then(function() {
                    window.location = "./budget_req.php";});
                  </script>';

            }
            else{
              echo '<script> alert("Data Not Updated"); </script>';
            }  
            
            }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
            
    }
     if(isset($_POST['declined']))
    {   
    
        $name = $_POST['fname'];
        $dept = $_POST['dept'];
         $status = "Declined";

        $query = "UPDATE `fnc_budget_request` SET `Remarks`='$status' WHERE Requestor='$name'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
             echo '<script type="text/javascript">
                    swal("Declined", "Budget", "error").then(function() {
                    window.location = "./budget_req.php";});
                  </script>';
           
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
      
?>




<!-- MODAl FOR APPROVE AND DECLINE BUDGET -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Budget Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form  method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Requestors Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="dept" id="dept" class="form-control" readonly>
                        </div>

                       

                        <div class="form-group">
                            <label>Porpose</label>
                            <input type="text" name="por" id="por" class="form-control"
                                placeholder="Enter Your Email" readonly>
                        </div>
                       
                         <div class="form-group">
                            <label> Status </label>
                            <input type="text" name="status"  id="statu" class="form-control"
                              placeholder="Enter Your Email" readonly>
                        </div>
                         <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amt" id="amt" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="approved" class="btn btn-success btn-sm">Aproved</button>
                        <button type="submit" name="declined" class="btn btn-danger btn-sm">Decline</button>
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
              <h4><b>Budget Request List</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_budget_request` WHERE Remarks='Pending'";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                             echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Requestor </th>";
                                         echo "<th>Department</th>";
                                      
                                        echo "<th>Purpose   </th>";
                                       
                                        echo "<th>Status</th>";
                                          echo "<th>Amount</th>";
                                        echo "<th><center>Action</center></th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        
                                        echo "<td>" . $row['Requestor'] . "</td>"; 
                                        echo "<td>" . $row['Department'] . "</td>";
                                        echo "<td>" . $row['Purpose'] . "</td>";
                                        echo "<td>" . $row['Remarks'] . "</td>";
                                         echo "<td>" . $row['Amount'] . "</td>";
                                        echo '<td ><center>';

                                           
                                             echo ' <button type="button" class="btn btn-primary btn-sm editbtn" style="width:100%;" > select </button>';
                                           
                                        echo "</td>";
                                    echo "</center></tr>";
                                }
                               
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                       $sq = "SELECT SUM(`Amount`) AS sum FROM `fnc_budget_request` WHERE Remarks='Pending'";
                                    if($resul = mysqli_query($conn, $sq)){
                                        if(mysqli_num_rows($resul) > 0){

                                           while($rows = mysqli_fetch_array($resul)){
                                 echo "<thead>";
                                echo '<tr  class="bg-secondary">';
                                echo '<td colspan="4">Total Amount </td>';
                                echo '<td colspan="2"> P ' . $rows['sum'] . "</td>";
                                echo "</tr>";
                                 echo "</thead>";
                             echo "</tbody>";                            
                            echo "</table>";
                                }
                             }

                       }

                    ?>
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
                $('#statu').val(data[3]);
                $('#amt').val(data[4]);
             
                
                
            });
        });
    </script>
   
    