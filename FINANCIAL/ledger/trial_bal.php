<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Trial Balance</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_trail_bal`;";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                            echo '<table id="example11" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                       
                                        echo "<th>Account Name</th>";
                                         echo "<th>Ref#</th>";
                                          echo "<th>Debit</th>";
                                         echo "<th>Credit</th>";
                                        
                                        
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    
                                        echo "<td>" . $row['acc_name'] . "</td>"; 
                                        echo "<td>" . $row['Acc_no'] . "</td>"; 
                                        echo "<td>" . $row['credit'] . "</td>";
                                        echo "<td>" . $row['debit'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
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