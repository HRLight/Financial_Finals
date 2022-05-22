<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Trial Balance</b></h4>
            </div>
                 <div class="card-body">
        <div class="callout border-success shadow rounded-0">
            <h4 class="text-muted">Filter Date</h4>
            <form method="POST" id="filter">
            <div class="row align-items-end">
                <div class="col-md-4 form-group">
                    <label for="from" class="control-label">Date From</label>
                    <input type="date" id="from" name="from"  class="form-control form-control-sm rounded-0" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="to" class="control-label">Date To</label>
                    <input type="date" id="to" name="to"  class="form-control form-control-sm rounded-0" required>
                </div>
                <div class="col-md-4 form-group">
                    <button class="btn btn-default bg-dark btn-flat btn-sm" name="search"><i class="fa fa-filter"></i> Filter</button>
                    <button class="btn btn-default border btn-flat btn-sm" id="print" type="button"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            </form>
        </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   
                                   <?php
                                    // Include config file
                                    require_once "config.php";


                                    if (isset($_POST['search'])) {
                                        $from = date("Y-m-d", strtotime($_POST['from']));
                                        $to=date("Y-m-d", strtotime($_POST['to']));
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry` WHERE date(`date_created`) BETWEEN '$from' AND '$to' ORDER BY Acc_no ASC";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                                            echo '<table class="table table-bordered table-hover">';
                                                echo '<thead class="bg-success">';
                                                        echo "<tr>";
                                                        echo "<th>Date</th>";
                                                          echo "<th>Description</th>";
                                                         echo "<th>Ref. Code.</th>";
                                                          echo "<th>Amount</th>";
                                                        echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td><b>" . $row['Particulars'] . "</b><br>". date("M d, Y",strtotime($row['date_created'])). "</td>"; 
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

}else{
                                 // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry` ORDER BY Acc_no ASC";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                                            echo '<table  class="table table-bordered table-hover ">';
                                                echo '<thead class="bg-success">';
                                                        echo "<tr>";
                                                        echo "<th>Date</th>";
                                                          echo "<th>Description</th>";
                                                         echo "<th>Ref. Code.</th>";
                                                          echo "<th>Amount</th>";
                                                        
                                                        echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    
                                        echo "<td><b>" . $row['Particulars'] . "</b><br>". date("M d, Y",strtotime($row['date_created'])). "</td>"; 
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
}

                    ?>





             </div>  
     </div>
    
</div>
</div>
</div>