<?php
$challenge_id = $_GET['id'];
include 'partials/dbconnect.php';
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['sno'];
    
    $query = "INSERT INTO `users_challenges` (`challenge_id`, `user_id`, `status_challenge`) VALUES ('$item_id', '$user_id', 'Started');";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    header('location: interchallenge.php?challenge_id='.$item_id.'');
}
?>  