<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Journal Entry</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry`  WHERE `jornal_code`=0 ORDER BY Acc_no ASC";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                            echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                          echo "<th><center>Date</center></th>";
                                            echo "<th><center>Account No.</center></th>";
                                        echo "<th><center>Particulars</center></th>";
                                       
                                             echo "<th><center>Debit</center></th>";
                                         echo "<th><center>Credit</center></th>";
                                     
                                        
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                      
                                       if ($row['credit']==0) {
                                         echo "<td><center>  </center></td>"; 
                                          echo "<td><center>" . $row['Acc_no'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Particulars'] . "</center></td>"; 
                                        $a = $row['debit'];
                                         echo "<td><center>" . $row['debit'] . "</center></td>";
                                        echo "<td><center>" . $row['credit'] . "</center></td>";
                                       
                                        echo "</tr>";
                                }else{
                                       echo "<tr>";
                                          echo "<td><center>" . $row['date_created'] . "</center></td>"; 
                                         echo "<td><center>" . $row['Acc_no'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Particulars'] . "</center></td>"; 
                                        echo "<td><center>" . $row['debit'] . "</center></td>";
                                        echo "<td><center>" . $row['credit'] . "</center></td>";
                                       
                                       
                                    echo "</tr>";
                                        echo '<tr class="bg-dark">';
                                     echo '<td colspan="3"><center>Total</center></td>';

                                     echo "<td><center>" .$a. "</center></td>";
                                          echo "<td><center>" . $row['credit'] . "</center></td>";
                                      echo "</tr>";

                                    }


                                }
                            
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    ?>


                          <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry`  WHERE `jornal_code`=1 ORDER BY Acc_no ASC";
                                    if($result = mysqli_query($con, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                           
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                      
                                       if ($row['debit']==0) {
                                         echo "<td><center>  </center></td>"; 
                                          echo "<td><center>" . $row['Acc_no'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Particulars'] . "</center></td>"; 
                                       $a=$row['credit'];
                                         echo "<td><center>" . $row['debit'] . "</center></td>";
                                        echo "<td><center>" . $row['credit'] . "</center></td>";
                                       
                                        echo "</tr>";
                                }else{
                                       echo "<tr>";
                                          echo "<td><center>" . $row['date_created'] . "</center></td>"; 
                                         echo "<td><center>" . $row['Acc_no'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Particulars'] . "</center></td>"; 
                                        echo "<td><center>" . $row['debit'] . "</center></td>";
                                        echo "<td><center>" . $row['credit'] . "</center></td>";
                                      
                                       
                                    echo "</tr>";
                                        echo '<tr class="bg-dark">';
                                     echo '<td colspan="3"><center>Total</center></td>';

                                     echo "<td><center>" .$a. "</center></td>";
                                          echo "<td><center>" . $row['debit'] . "</center></td>";
                                      echo "</tr>";

                                    }


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
