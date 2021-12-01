<?php
include 'partials/dbconnect.php';
session_start();
if (isset($_GET['certificate_id']) && is_numeric($_GET['certificate_id'])) {
    $certificate_id = $_GET['certificate_id'];
    $user_id = $_SESSION['sno'];
    
    $query = "INSERT INTO `certficate_status` (`certificate_id`, `user_id`, `status`, `timestamp`) VALUES ('$certificate_id', '$user_id', '1', current_timestamp());";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    header('location: basecamp.certificate.php?keyid=Narshadshabasu34 && certificate_id='.$certificate_id.'');
}
?>  