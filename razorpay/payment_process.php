<?php
include '../partials/dbconnect.php';

session_start();

if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($conn,"INSERT INTO `payment` ( `name`, `amount`, `payment_status`, `added_on`) VALUES ('$name', '$amt', '$payment_status', '$added_on')");
    $_SESSION['OID']=mysqli_insert_id($conn);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"UPDATE `payment` set `payment_status`='complete',`payment_id`='$payment_id' where `id`='".$_SESSION['OID']."'");
}
?>

<!-- 
if(isset($_POST['payment_id']) && isset($_POST['amt']) && isset($_POST['name'])){   
    $payment_id = $_POST['payment_id'];
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $payment_status="Completed";
    $added_on=date('Y-m-d h:i:s');
    $query = "INSERT INTO `payment` ( `name`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES ('$name', '$amt', '$payment_status', '$payment_id', '$added_on') ";
    mysqli_query($connn, $query) or die(mysqli_error($conn));
    
}
?> -->