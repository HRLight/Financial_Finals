<!-- MODAl REQUEST FROM FOR BUDGET REQUEST -->
    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form  method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Requestors Name</label>
                            <input type="text" name="fnam" id="fnam" class="form-control" placeholder="Enter Name"required>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="det" id="det" value="FINANCIALS" class="form-control" placeholder="Enter Department"required>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="am" id="am" class="form-control"
                                placeholder="Enter Course" required>
                        </div>

                        <div class="form-group">
                            <label>Porpose</label>
                            <input type="text" name="po" id="po" class="form-control"
                                placeholder="Enter Your Email"required>
                        </div>

                       
                         <div class="form-group">
                            <label> Upload Here!  </label>
                            <input type="file" name="statu" value="stats" id="status" class="form-control"
                              placeholder="Enter Your Email"required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="save" class="btn btn-success btn-sm">Save</button>
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
              <h4><b>Accounts Payable</b></h4>
            </div>
            <!-- /.card-header --> 

            <div class="card-body">
                    <div class="wrappe">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert">
                        Expenses
                    </button>
                                 <div class="table-responsive-sm">
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_budget_request` WHERE Remarks='Approved'";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                             echo '<table id="example11" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Department</th>";
                                      
                                        echo "<th>Purpose   </th>";
                                        echo "<th>Payment_type   </th>";
                                        echo "<th>Amount</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['Department'] . "</td>";
                                       
                                        echo "<td>" . $row['Purpose'] . "</td>";
                                        echo "<td>" . $row['Payment_type'] . "</td>";
                                        echo "<td>" . $row['Amount'] . "</td>";
                                        echo "</tr>";
                                }
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No Payable records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                     $sq = "SELECT SUM(`Amount`) AS sum FROM  `fnc_budget_request` WHERE Remarks='Approved'";
                                    if($resul = mysqli_query($con, $sq)){
                                        if(mysqli_num_rows($resul) > 0){

                                           while($rows = mysqli_fetch_array($resul)){
                                 echo "<thead>";
                                echo '<tr  class="bg-secondary">';
                                echo '<td colspan="3">Total Amount </td>';
                                echo '<td colspan="1"> P ' . $rows['sum'] . "</td>";
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



        </div>
    </div>
</div>
