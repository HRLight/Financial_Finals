   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
 require_once "config.php";

if(isset($_POST['insertdata']))
{
    $dept = $_POST['dept'];
    $amt = $_POST['amt'];
    $s_date = date('y-m-d',strtotime($_POST['s_date']));
    $e_date = date('y-m-d',strtotime($_POST['e_date']));
  
     $rec = $_POST['rec'];

    

    $query = "INSERT INTO `fnc_budget_allo`(`id`, `department`, `amount`, `start_date`, `end_date`, `reccurrence`, `document`) VALUES ('','$dept','$amt','$s_date','$e_date','$rec','')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
         echo '<script type="text/javascript">
                    swal("", "Data Saved", "success").then(function() {
                    window.location = "budget_allo.php";});
                  </script>';
      
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }

    
}

?>
     <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Allocate Budget </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Department </label>
                            <input type="text" name="dept" class="form-control" placeholder="Enter Department" required>
                        </div>

                        <div class="form-group">
                            <label> Amount </label>
                            <input type="text" name="amt" class="form-control" placeholder="Enter Amount" required>
                        </div>

                        <div class="form-group">
                            <label>Start Date </label>
                            <input type="date" name="s_date" class="form-control" placeholder="00/00/0000" required>
                        </div>

                        <div class="form-group">
                            <label> End Date</label>
                            <input type="date" name="e_date" class="form-control"  placeholder="00/00/0000" required>
                        </div>
                        <div class="form-group">
                            <label> Recurrence </label>
                            <input type="text" name="rec" class="form-control" placeholder="Enter Recurrence" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Budget Allocation</b></h4>
  <button class="btn btn-primary btn-lg" style="float:right;" data-toggle="modal" data-target="#studentaddmodal">Allocate Budget</button>
                           
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe">
                        <?php include('chart.php'); ?><br><br>
                      
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_budget_allo`;";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                           echo '<table id="example11" class="table table-bordered table-hover">';
                                echo '<thead class="bg-successs">';
                                        echo "<tr>";
                                         echo "<th>Department</th>";
                                         echo "<th>Amount</th>";
                                         echo "<th>Start Date</th>";
                                        echo "<th>End Date</th>";
                                        echo "<th>Recurrence</th>";
                                        
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['amount'] . "</td>";
                                        echo "<td>" . $row['start_date'] . "</td>"; 
                                        echo "<td>" . $row['end_date'] . "</td>";
                                        echo "<td>" . $row['reccurrence'] . "</td>";
                                        
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
</div>
</div>
