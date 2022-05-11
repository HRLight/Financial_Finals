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
                                    $sql = "SELECT * FROM `fnc_journal_entry` ORDER BY id ASC";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                            echo '<table id="example11" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                       
                                        echo "<th><center>Particulars</center></th>";
                                         echo "<th><center>Account No.</center></th>";
                                             echo "<th><center>Debit</center></th>";
                                         echo "<th><center>Credit</center></th>";
                                     
                                        
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    
                                        echo "<td><center>" . $row['Particulars'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Acc_no'] . "</center></td>"; 
                                        echo "<td><center>" . $row['credit'] . "</center></td>";
                                        echo "<td><center>" . $row['debit'] . "</center></td>";
                                       
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
