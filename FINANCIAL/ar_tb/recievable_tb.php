<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Accounts Receivable</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `cr1_booked` WHERE status='Verify'";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                             echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>Adress</th>";
                                        echo "<th>Mobile no.</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th><center>Action</center></th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                     echo "<tr>";
                                        echo "<td>" . $row['s_fname'] . "</td>";
                                       echo "<td>" . $row['s_add'] . "</td>";
                                       echo "<td>" . $row['r_contact'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                       echo "<td>" . $row['price'] . "</td>";
                                       echo '<td><center>';
                                        echo '<a href="receipt.php?s_contact='. $row['s_contact'] .'" class="btn btn-primary btn-sm" title="Print Receipt" data-toggle="tooltip"><span>Receipt</span></a>';
                                             
                                       echo '</center></td>';
                                    echo "</tr>";

                                }
                                
                            
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }



                      $sq = "SELECT SUM(`Amount`) AS sum FROM `fnc_budget_request` WHERE Remarks='Release'";
                                    if($resul = mysqli_query($con, $sq)){
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
    
</div>
</div>
</div>
