  <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2><b>Collection List</b></h2>
               <a href="#edit" data-toggle="modal"  class="btn btn-success btn-md" style="float:right;"><span class="glyphicon glyphicon-edit"></span>Add Collection</a>
                  <?php include('modal.php'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_collection` ORDER BY `PK_Account_id`  DESC";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                         echo "<th>Image</th>";
                                         echo "<th>Name</th>";
                                        echo "<th>Account No.</th>";
                                        echo "<th>Discription</th>";
                                        echo "<th>Particular</th>";
                                         echo "<th>Ref#</th>";
                                        echo "<th>Date Receive</th>";
                                          echo "<th>Mode of Payment</th>";
                                        echo "<th>Amount</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                      echo "<td>";
                                         echo "
                                         <embed src='data:".$row['document_mine'].";base64,".base64_encode($row['document_data'])."' width='100'/></li>";
          
                                        echo "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['Account_no'] . "</td>";
                                        echo "<td>" . $row['Description'] . "</td>";
                                        echo "<td>" . $row['Particular'] . "</td>";
                                         echo "<td>" . $row['Ref_no'] . "</td>";
                                         echo "<td>" . $row['Date_recieve'] . "</td>";
                                          echo "<td>" . $row['Payment_type'] . "</td>"; 
                                        echo "<td>" . $row['Amount'] . "</td>";
                                            
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


                                     $sq = "SELECT SUM(`Amount`) AS sum FROM `fnc_collection`;";
                                      if($resul = mysqli_query($con, $sq)){
                                        if(mysqli_num_rows($resul) > 0){
                                           while($rows = mysqli_fetch_array($resul)){
                                 echo "<thead>";
                                echo '<tr class="bg-secondary">';
                                echo '<td colspan="8">Total Amount </td>';
                                echo "<td>P " . $rows['sum'] . "</td>";
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
