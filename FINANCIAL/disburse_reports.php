<?php include('includes/header.php'); ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-light">
    <!-- Left navbar links -->
    <?php include('includes/navbar.php'); ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
   <?php include('includes/sidebar.php'); ?>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><b>Disbursement Reports</b></h4>
                 <button onclick="window.print()" class="btn btn-outline-success" style="float:right;" ><i class="fas fa-print"></i> &nbsp;Print Reports</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="wrappe"  >
                                 <div class="table-responsive-sm">
                                  
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `fnc_budget_request` WHERE Remarks='Release'";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                             echo '<table id="example11" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Requestor</th>";
                                         echo "<th>Department</th>";
                                        echo "<th>Discription</th>";
                                       
                                        echo "<th>Date</th>";
                                        echo "<th>Payment Type</th>";
                                        echo "<th>Amount</th>";
                                       
                                      
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['Requestor'] . "</td>";
                                        echo "<td>" . $row['Department'] . "</td>";
                                        echo "<td>" . $row['Purpose'] . "</td>";
                                         
                                        echo "<td>" . $row['Date'] . "</td>";
                                         echo "<td>" . $row['Payment_type']. "</td>";
                                         echo "<td>" . $row['Amount'] . "</td>";
                                       
                                      
                                              
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No Disburse Records were found.</em></div>';
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php 
include('includes/scripts.php');
?>
</body>
</html>