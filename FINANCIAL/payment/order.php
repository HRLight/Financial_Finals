<?php session_start(); ?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Freight Payment</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
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
<?php
require_once '../config.php';
    $email=$_SESSION['email'];
     $from=$_SESSION['s_city'];
      $to=$_SESSION['r_city'];
       $ref=$_SESSION['ref_no'];
        $name=$_SESSION['s_fname'];
        $price=$_SESSION['price'];
       

  ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <form action="in.php" method="POST">
                <div class="d-flex justify-content-between align-items-center"> <span class="text-uppercase">Order Summary</span> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="d-flex flex-column"><small>From</small> <span class="font-weight-bold"><?php echo "<label>" . $from. "</label>"; ?></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column"> <small>To</small> <span class="font-weight-bolder"><?php echo "<label>" . $to. "</label>"; ?></span> </div>
                    </div>
                </div>
                <div class="mt-3 d-flex flex-column"> <small>Ref#:</small> <span class="font-weight-bolder"><?php echo "<label>" . $ref. "</label>"; ?></span> </div>
                <div class="mt-3"> <small>Receptiants Name</small>
                     <div class="d-flex flex-column"><span class="font-weight-bolder"><?php echo "<label>" .$name. "</label>"; ?></span> </div>

                </div>

                <div class="mt-3"> <label class="radio"> <input type="radio" name="week" value="1" checked> <span>Total Amount</span> </label> </div>
                <div class="mt-3 text-center fee align-items-center">
                    <h3 class="mb-0 font-weight-light"><?php echo "<label> P" . $price. "</label>"; ?></h3>
                </div>
                <div class="mt-3"> <small>Payment Method</small>
                    <div class="d-flex flex-row"> <label class="radio1"> <input type="radio" name="payment" value="bank"> <span><img src="icons8-gcash.svg"> GCASH</span> </label> <label class="radio1">  </label> </div>
                </div>
                <div class="mt-3 mr-2">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="inputbox"> <small>Number</small> <input type="text" class="form-control" name="" placeholder="+63"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="password"> <small>OTP Code</small> <input type="password" class="form-control" name="password" placeholder="******"> </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 mr-2">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="inputbox"> <small>MPIN</small> <input type="password" class="form-control" name="pin" placeholder="****"> </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mr-2 mt-4">
                <div class="mt-3 mr-2 d-flex justify-content-end align-items-center">  <button type="submit" name="pay" class="btn btn-success"><i class="fa fa-info"></i>&nbsp; Pay Now</button> </div>
            </div>
        </div>
    </div>
    </form>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src=''></script>
                                <script type='text/Javascript'></script>
                                </body>
                            </html>