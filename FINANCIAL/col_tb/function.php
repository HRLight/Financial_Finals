 <?php
//for Add Collection List
require_once './config.php';

function generatekey(){
  $keyLenght=8;
  $str="1234567890";
  $randStr=substr(str_shuffle($str),0,$keyLenght);
  return $randStr;
}
$i=generatekey();
if (isset($_POST['pay']))
  {
    $name=$_POST['name'];
    $desc=$_POST['desc'];
     $par=$_POST['Particulars'];
      $ref=$_POST['ref'];
       $amt=$_POST['amt'];
        $payment=$_POST['Payment'];
         


$sql = "INSERT INTO `fnc_collection`(`PK_Account_id`, `Name`, `Account_no`, `Particular`, `Ref_no`, `Payment_type`, `Amount`, `Description`) VALUES ('','$name','SINV-1010$i','$par','$ref','$payment','$amt','$desc')";

$ql = "UPDATE `cr1_booked` SET status ='Paid' WHERE ref_no='$ref'";
if ($con->query($sql) === TRUE and $conn->query($ql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
}
?>