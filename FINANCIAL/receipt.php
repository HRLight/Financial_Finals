   <?php
// Check existence of id parameter before processing further
if(isset($_GET["s_contact"]) && !empty(trim($_GET["s_contact"]))){
    // Include config file
    require_once "config.php";
    // Prepare a select statement
    $sql = "SELECT * FROM `cr1_booked` WHERE s_contact=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["s_contact"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $ref = $row["ref_no"];
                $s_fname = $row["s_fname"];
                $r_fname = $row["r_fname"];
                $s_add= $row["s_add"];
                 $r_add= $row["r_add"];
                  $description= $row["description"];

                  
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<?php include('includes/header.php'); ?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-green navbar-light">
    <!-- Left navbar links -->

    <?php include('includes/navbar.php'); ?>
  </nav>
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
    <!-- Main content -->
 

            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> E-SHIP, Inc.
                    <small class="float-right"><?php echo "Date : " .date("d/m/y") ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $row["s_fname"]; ?></strong><br>
                   <?php echo $row["s_add"]; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                 <address>
                    <strong><?php echo $row["r_fname"]; ?></strong><br>
                   <?php echo $row["r_add"]; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Ref #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?php echo $row["Qty"]; ?></td>
                      <td><?php echo $row["type"]; ?></td>
                      <td><?php echo $row["ref_no"]; ?></td>
                      <td><?php echo $row["description"]; ?></td>
                      <td><?php echo $row["price"]; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                    </tr>
                    <tr>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp; </td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp; </td>
                      <td></td>
                      <td>Sub Total </td>
                      <td><?php echo $row["price"]; ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                       <button onclick="window.print()" class="btn btn-default" style="float:right;" ><i class="fas fa-print"></i>Print</button>
               
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
