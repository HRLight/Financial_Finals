<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Chart of Accounts</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_chart_accounts`;";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                             echo '<table id="example11" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th><center>Account Number</center></th>";
                                        echo "<th><center>Account Name</center></th>";
                                         echo "<th><center>Account Category</center></th>";
                                        
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td><center>" . $row['Acc_no'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Acc_Name'] . "</center></td>"; 
                                        echo "<td><center>" . $row['Account_type'] . "</center></td>";
                                       
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
     <div class="nav-bar" style="float:right;">
            <nav aria-label="...">
                  <ul class="pagination">
                    <li class="page-item disabled">
                      <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                      <span class="page-link"> 2
                        <span class="sr-only">(current)</span>
                      </span>
                    </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                       </li>
                     </ul>
                </nav>
       </div>
   </div>
</div>
</div>
