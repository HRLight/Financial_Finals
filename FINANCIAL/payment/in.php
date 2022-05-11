<?php
require_once '../config.php';
session_start();

$ref=$_SESSION['ref_no'];
$price=$_SESSION['price'];
function generatekey(){
  $keyLenght=8;
  $str="1234567890";
  $randStr=substr(str_shuffle($str),0,$keyLenght);
  return $randStr;
}
$i=generatekey();


if (isset($_POST['pay']))
  {
$sql = "INSERT INTO fnc_collection (PK_Account_id, Account_no, Ref_no,   Amount, Description, Particular)
VALUES ('', 'SINV-1010$i','$ref', '$price', 'Received', 'Collected Sales')";
$ql = "UPDATE `cr1_booked` SET status ='Paid' WHERE ref_no='$ref'";

if ($link->query($sql) === TRUE and $conn->query($ql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

}

?>