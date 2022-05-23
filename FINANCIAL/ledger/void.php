<?php

include 'config.php';
    if(isset($_POST['save']))
    {   
        $id = $_POST['code'];
        $query = " UPDATE `fnc_collection` SET `Account_no`='CRM-$id',`Amount`=0 WHERE `journal_code`='$id';";
        $query_run = mysqli_query($conn, $query);
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