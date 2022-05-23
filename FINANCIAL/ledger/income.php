

  <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Income Statement</b></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                    <h6></h6>
                            <!-- type the main content here ! -->
  
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                 

                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry` WHERE jornal_code=4";
                                    if($result = mysqli_query($link, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                             echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Revenue</th>";
                                        echo "<th>Amount</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){


                                    echo "<tr>";
                                        echo "<td>" . $row['Particulars'] . "</td>"; 
                                        echo "<td>" . $row['credit'] . "</td>";
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
                       $sq = "SELECT SUM(`credit`) AS sum FROM `fnc_journal_entry` WHERE jornal_code=4";
                        $resul = mysqli_query($conn, $sq);

                                           while($rows = mysqli_fetch_array($resul)){
                                 echo "<thead>";
                                echo '<tr  class="bg-secondary">';
                                echo '<td >Total Amount </td>';
                                $revenue=$rows['sum'];
                                echo '<td> P ' . $rows['sum'] . "</td>";
                                echo "</tr>";
                                 echo "</thead>";
                                }


                    ?>

                          <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_journal_entry` WHERE jornal_code=2";
                                    if($result = mysqli_query($con, $sql)){
                                       if(mysqli_num_rows($result) > 0){
                               echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Expenses</th>";
                                        echo "<th>Amount</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                while($row = mysqli_fetch_array($result)){
                                     
                                    echo "<tr>";
                                        echo "<td>" . $row['Particulars'] . "</td>"; 
                                        echo "<td>" . $row['debit'] . "</td>";
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

                          $sq = "SELECT SUM(`debit`) AS sum FROM `fnc_journal_entry` WHERE jornal_code=2";
                                $resul = mysqli_query($conn, $sq);
                                while($rows = mysqli_fetch_array($resul)){
                                 echo "<thead>";
                                echo '<tr  class="bg-secondary">';
                                echo '<td >Total Amount </td>';
                                $expenses=$rows['sum'];
                                echo '<td> P ' . $rows['sum'] . "</td>";
                                echo "</tr>";
                                 echo "</thead>";
                             
                                   }
                       $netincome=$revenue-$expenses;
                            echo "<thead>";
                                echo '<tr  class="bg-secondary">';
                                echo '<td >Net Income </td>';
                                echo '<td> P ' . $netincome . "</td>";
                                echo "</tr>";
                                 echo "</thead>";
                         echo "</tbody>";                            
                            echo "</table>";
                    ?>


                </div>  
     </div>
    