<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include 'config.php';
    if(isset($_POST['save']))
    {   
        $id = $_POST['code'];
        $query = " UPDATE `fnc_collection` SET `Account_no`='CRM-$id',`Amount`=0 WHERE `journal_code`='$id';";
        $query_run = mysqli_query($conn, $query);

         $query2 = " UPDATE `fnc_journal_entry` SET `credit`=0,`debit`=0 WHERE `Acc_no`='$id';";
        $query_run2 = mysqli_query($con1, $query2);
        if($query_run)
        {
            if ( $query_run2) {
                
            
           echo '<script type="text/javascript">
                    swal("Success", "Void", "success").then(function() {
                    window.location = "journal_entry.php";});
                  </script>';
            }
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
<!-- MODAl REQUEST FROM FOR BUDGET REQUEST -->
    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Voiding Process</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form  method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="number" name="code" id="fnam" class="form-control" placeholder="Enter Name"required>
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
              <h4><b>Journal Entry</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert">
                       Voiding
                    </button>
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry`  WHERE `jornal_code`=3 OR `jornal_code`=4 ORDER BY Acc_no ASC";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                            echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                             echo "<th><center>Date</center></th>";
                                             echo "<th><center>Journal Code</center></th>";
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
                                          echo "<td><center>" . date("M d, Y",strtotime($row['date_created'])) . "</center></td>"; 
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
                                    $sql = "SELECT * FROM `fnc_journal_entry`  WHERE `jornal_code`=1 OR `jornal_code`=2 ORDER BY Acc_no ASC";
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
