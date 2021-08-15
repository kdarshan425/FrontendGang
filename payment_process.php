<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "frontendgang";

$conn = mysqli_connect($servername, $username, $password, $database)  or die(mysqli_error($con));

if(isset($_POST['payment_id']) && isset($_POST['amt']) && isset($_POST['name'])){   
    $payment_id = $_POST['payment_id'];
    $amt = $_POST['amt'];
    $name = $_POST['name'];
    $payment_status="Completed";
    $added_on=date('Y-m-d h:i:s');
    $query = "INSERT INTO `payment` ( `name`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES ('$name', '$amt', '$payment_status', '$payment_id', '$added_on') ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    
}
?>