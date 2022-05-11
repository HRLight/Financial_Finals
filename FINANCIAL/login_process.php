<?php
require_once 'config.php';
if (isset($_POST['LOGIN']))
        {
            $username = mysqli_real_escape_string($link, $_POST['User']);
            $password = mysqli_real_escape_string($link, $_POST['Pass']);
            $query = mysqli_query($link, "SELECT * FROM user_mgt WHERE  password='$password' and username='$username'");
            $row        = mysqli_fetch_array($query);
            $num_row    = mysqli_num_rows($query);
            if ($num_row > 0) 
                {           
                    $_SESSION['id']=$row['id'];
                    
                    echo'<script type="text/javascript">
                    swal({
                          title: "Good job!",
                          text: "You clicked the button!",
                          icon: "success",
                          button: "Aww yiss!",
                        });</script>';
                        header('location:dashboard.php');
                }
            else
                {
                    echo 'Invalid Username and Password Combination';
                }
        }
  ?>

