<?php
  require_once "./config.php";

    
    if(isset($_POST['approved']))
    {   
         $amt = $_POST['amt'];
        $name = $_POST['fname'];
        $dept = $_POST['dept'];
         $status = "Release";
        $payment = $_POST['Payment'];

        $query = "UPDATE `fnc_budget_request` SET `Remarks`='$status' ,`Payment_type`='$payment'  WHERE Requestor='$name'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
        
               echo '<script type="text/javascript">
                    swal("Approved", "Budget", "success").then(function() {
                    window.location = "./budget_req.php";});
                  </script>';

           
           
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
            
    }  ?>