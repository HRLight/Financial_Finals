<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
  require_once "../config.php";

    
    if(isset($_POST['approved']))
    {   
    
    
        $name = $_POST['fname'];
        $dept = $_POST['dept'];
         $status = $_POST['status'];

        $query = "UPDATE `fnc_budget_request` SET `Remarks`='$status' WHERE Requestor='$name'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
             echo '<script type="text/javascript">
                    swal("Message", "sent", "success").then(function() {
                    window.location = "../budget_req.php";});
                  </script>';
           
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
      
?>