<?php   session_start(); ?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Freight Payment</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
body {
    background-color: white;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif
}

.modal-body {
    background-color: #fff;
    border-color: #fff
}

.close {
    color: #000;
    cursor: pointer
}

.close:hover {
    color: #000
}

.form-check-input:checked {
    background-color: #8f37aa;
    border-color: #8f37aa
}

.form-check-input:focus {
    border-color: #8bbafe;
    outline: 0;
    box-shadow: none
}

label.radio {
    cursor: pointer
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    padding: 7px 12px;
    border: 2px solid #8f37aa;
    display: inline-block;
    color: #8f37aa;
    border-radius: 3px;
    text-transform: capitalize
}

label.radio input:checked+span {
    border-color: #8f37aa;
    background-color: #8f37aa;
    color: #fff
}

.fee {
    padding: 8px;
    border: 1px solid #eee;
    border-radius: 4px;
    box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.2);
    margin-right: 8px
}

label.radio1 {
    cursor: pointer;
    width: 100%;
    margin-right: 7px
}

label.radio1 input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio1 span {
    padding: 20px 12px;
    border: 2px solid #8f37aa;
    display: inline-block;
    color: #8f37aa;
    border-radius: 3px;
    text-transform: capitalize;
    width: 100%
}

label.radio1 input:checked+span {
    border-color: #8f37aa;
    background-color: #8f37aa;
    color: #fff
}

.form-control {
    border: 2px solid #ced4da
}

.form-control:focus {
    box-shadow: none;
    border-color: #8f37aa
}

.pay {
    color: #fff;
    background-color: #8f37aa;
    border-color: #8f37aa;
    border-radius: 3px;
    padding: 8px
}

.pay:hover {
    color: #fff;
    background-color: #8f37aa;
    border-color: #8f37aa;
    border-radius: 3px;
    padding: 8px
}

.cancel {
    text-decoration: none;
    color: #8f37aa
}
.box {
    border-color: black;
    border-radius: 4px;
}
</style>
                                </head>  
                                <body oncontextmenu='return false' class='snippet-body'>
                        <form action="payment.php" method="POST">
                            <div class="box">
                          <div class="form-group">
                            <center><h5><b>E-Ship Company</b></h5></center>
                            <center><a>Please Provide the details </a> <br><label>below to pay!</label><br></center>
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Code</label>
                            <input type="password" name="code" class="form-control" id="exampleInputPassword1" placeholder="Enter 4 Digit Code">
                          </div><br>
                         <button type="submit" name="pay" class="btn btn-success"><i class="fa fa-info"></i>&nbsp; Pay Now</button>
                            
                          </div>
                        </form>

                    <?php
                    require_once '../config.php';
                  
                    if (isset($_POST['pay']))
                            {
                                $email =  $_POST['email'];
                                $code = mysqli_real_escape_string($link, $_POST['code']);
                                $query = mysqli_query($link, "SELECT * FROM `cr1_booked` WHERE   email='$email'");
                                $row        = mysqli_fetch_array($query);
                                $num_row    = mysqli_num_rows($query);
                                if ($num_row > 0) 
                                    {           
                                        $id=$row['book_id'];
                                        $_SESSION['email']=$row['email'];
                                        $_SESSION['s_city']=$row['s_city'];
                                        $_SESSION['bo']=$id;
                                         $_SESSION['r_city']=$row['r_city'];
                                        $_SESSION['ref_no']=$row['ref_no'];
                                        $_SESSION['s_fname']=$row['s_fname'];
                                        $_SESSION['price']=$row['price'];
                                        
                                              echo '<script type="text/javascript">
                    swal("' . $row['s_fname'] .'", "Welcome to Payment Transaction", "success").then(function() {
                    window.location = "order.php";});
                  </script>';
                                        exit();
                                    }
                                   
                                else
                                    {
                                        echo '<script type="text/javascript">
                                swal("INVALID!", "Email and code is incorrect!", "error");
                              </script>';
                                    }
                            }
                      ?>

                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script>
                                </body>
                            </html>