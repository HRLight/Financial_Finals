<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Accounts Payable</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe">
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
                                        echo "<th>Department</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th>Purpose   </th>";
                                        echo "<th>Payment_type   </th>";
                                        echo "<th>Status</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['Department'] . "</td>";
                                        echo "<td>" . $row['Amount'] . "</td>";
                                        echo "<td>" . $row['Purpose'] . "</td>";
                                        echo "<td>" . $row['Payment_type'] . "</td>";
                                        echo '<td class="btn btn-link"><center>' .$row['Remarks'].'</center></td>';
                                        echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No Payable records were found.</em></div>';
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
