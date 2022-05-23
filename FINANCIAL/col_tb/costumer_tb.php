<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail(){
       

        $to=$_GET['email'];//Receivers Email
        $body='<!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Freight</title>
                    </head>
                    <body>
                        <div style="padding-bottom: 300px;  margin-left: 500px; border: 5px outset green;
                      background-color: lightblue; darkblue;  width: 500px; height:500px; ">
                        
                             <h1 style="background-color:green;">Hello This From Starship Company</h1>
                             <h3>Thank You For Puchasing Our Servive !</h3>
                             <p> We would Like to Inform You for your regarding of your payment </p>
                             <p>You Can Choose from the Following!</p>
                             <h4>GCASH</h4><p>Name: Frieght Starship </p><p>NO: 09070368238 </p>
                              <h4>Paymaya</h4><p>Name: Frieght Starship </p><p>NO: 09070368238 </p>
                              <h4>Paypal</h4><p>Name: Frieght Starship </p><p>NO: 09070368238 </p>
                              <h4>BANK Account</h4><p>Name: Frieght Starship </p><p>NO: 1234 5678 9876 5432 </p>

                               <p>Please Provide The Proff of payment to this email!</p>
                                   <p>Using Screenshot of the reciept!!!! </p>

                    </div>
                    </body>
                    </html>';//body message
        $name = "Freight"; // Name of your website or yours
          // mail of reciever
        $subject = "For Payment";
       
        $from = "hersonbontilao30@gmail.com";  // you mail
        $password = "Hersonbontilao123#";  // your mail password

        // Ignore from here
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();
        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
             echo '<script type="text/javascript">
                    swal("Message", "sent", "success").then(function() {
                    window.location = "customer.php";});
                  </script>';
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }

        // sendmail();  // call this function when you want to

        if (isset($_GET['sendmail'])) {
            sendmail();
        }
?>

 <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header  p-3 mb-2 bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> Send A Confirmation  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form  method="GET">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Full Name </label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label> Address </label>
                            <input type="text" name="lname" id="lname" class="form-control"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label> Mobile </label>
                            <input type="text" name="course" id="course" class="form-control"
                                placeholder="Enter Course" disabled>
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter Your Email" readonly >
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="sendmail" class="btn btn-primary"><i class="fas fa-location-arrow"></i>Send Email</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
 <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2><b>Booking Customer</b></h2>
            </div>
          
                     <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Email For Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form  method="Get">
              <div class="modal-body">
                     <a>
                         This is From E-Ship Company we would like to infrom you regarding from payment that our link for Payment is here: Thank you for trusting us.
                     </a>
                     </div>
              <div class="modal-footer">
               
                <button type="submit"  name="sendmail" class="btn btn-primary">Send</button>
              </div>
               </form>
            </div>
          </div>
        </div>
          <div class="card-body">
                    <div class="wrappe">
                                 <div class="table-responsive-sm">
                                   <?php
                                    // Include config file
                                    require_once "config.php";
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM `cr1_booked`";
                                    if($result = mysqli_query($link, $sql)){
                                        if(mysqli_num_rows($result) > 0){
                            echo '<table id="example1" class="table table-bordered table-hover ">';
                                echo '<thead class="bg-success">';
                                        echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Mobile no.</th>";
                                        echo "<th>Email</th>";
                                         echo "<th>Re#</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th>Action</th>";
                                        echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['s_fname'] . "</td>";
                                       echo "<td>" . $row['s_add'] . "</td>";
                                       echo "<td>" . $row['r_contact'] . "</td>";
                                        echo "<td>" . $row['s_email'] . "</td>";
                                         echo "<td>" . $row['ref_no'] . "</td>";
                                       echo "<td>" . $row['price'] . "</td>";
                                    
                                         echo '<td><center>';
                                        $stat=$row['status'];
                                        if ($stat=="Paid") {
                                            echo ' <button type="button" class="btn btn-outline-primary btn-sm editbtn" style="width:50%;" disabled> <i class="fas fa-location-arrow"> </button>';
                                        }else{
                                            echo ' <button type="button" class="btn btn-outline-primary btn-sm editbtn" style="width:50%;"><i class="fas fa-location-arrow"> </button>';
                                        }
                                            
                                            echo '</center></td>';
                                    echo "</tr>";
                                }
                            
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }


                        $sq = "SELECT SUM(`price`) AS sum FROM `cr1_booked`;";
                                    if($resul = mysqli_query($con, $sq)){
                                        if(mysqli_num_rows($resul) > 0){

                                           while($rows = mysqli_fetch_array($resul)){
                                echo '<thead>';
                                echo '<tr  class="bg-secondary">';
                                echo '<td colspan="5">Total Amount </td>';
                                echo '<td colspan="3"> P ' . $rows['sum'] . "</td>";
                                echo "</tr>";
                                  echo "</thead>";
                             echo "</tbody>";                            
                            echo "</table>";
                                }
                             }

                       }

                    ?>
             </div>  
     </div>
 </div>
</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
 <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#fname').val(data[0]);
                $('#lname').val(data[1]);
                $('#course').val(data[2]);
                $('#email').val(data[3]);
                
            });
        });
    </script>
   