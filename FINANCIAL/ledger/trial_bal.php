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
                                    $sql = "SELECT * FROM `fnc_journal_entry` ORDER BY Acc_no ASC";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                            echo '<table id="" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Date</th>";
                                          echo "<th>Discription</th>";
                                         echo "<th>Ref. Code.</th>";
                                          echo "<th>Amount</th>";
                                        
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    
                                        echo "<td><b>" . $row['Particulars'] . "</b><br>". $row['date_created']. "</td>"; 
                                         echo "<td>" . $row['description'] . "</td>"; 
                                        echo "<td>" . $row['Acc_no'] . "</td>"; 
                                        if ( $row['credit']==0) {
                                            $a= $row['debit'];
                                           echo "<td>" . $row['debit'] . "</td>";
                                        }else{
                                            $b=$row['credit'];
                                        echo "<td>-" . $row['credit'] . "</td>";
                                       }
                                    echo "</tr>";
                                }
                                echo '<tr class="bg-dark">';
                                     $c=$a-$b;
                                      echo '<td colspan="3"> Total</td>';
                                      echo "<td>" .$c. "</td>";
                                      echo "</tr>";
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