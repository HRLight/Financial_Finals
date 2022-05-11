<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'phpcrud');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
       

        $query = "UPDATE fnc_student SET Remarks='APPROVED'  WHERE Requestor='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>