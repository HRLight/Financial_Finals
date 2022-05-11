<head>
    <style>
        .wrappe{
             width: 70%;
             float: left;
              margin-left: 15px;

        }
        
        table tr :last-child{
           width: 40%;
           text-align: center;
        }
         table td :last-child{
           width: 40%;
           text-align: center;
        }
       
    </style>
     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
            </script>
        </head>
        <body>
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM fnc_chart_accounts";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                             echo '<table id="example11" class="table table-borderless table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Account Name  </th>";
                                        echo "<th>Account Type</th>";
                                        echo '<th class="text-center" style="width:15px;">Action</th>';
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Acc_Name'] . "</td>";
                                        echo "<td>" . $row['Account_type'] . "</td>";
                                        echo '<td >';
                                            echo '<a href="read.php?id='. $row['PK_Account_id'] .'" class="btn btn-warning" title="Post to Journal" data-toggle="tooltip style="width:15%;"><span>Post</span></a>';
                                            echo ' ';

                                            echo '<a href="update.php?id='. $row['PK_Account_id'] .'" class="btn btn-success" title="Edit Record" data-toggle="modal" data-target="#updateModal" style="width:15%;"><span>Edit</span></a>';
                                            echo ' ';

                                            echo '<a href="delete.php?id='. $row['PK_Account_id'] .'" class="btn btn-danger" title="Delete Record" data-toggle="tooltip" style="width:15%;"><span>Delete</span></a>';
                                        echo "</td>";
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

  
</body>