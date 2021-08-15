<?php
//This code checks if the product is added to cart. 
function check_if_generated($cid) {
    include 'dbconnect.php';
    $user_id = $_SESSION['sno']; // $_SESSION['id'] We'll get the user_id from the session
    // We will select all the entries from the user_items table where the item_id is equal to the item_id we passed to this function, user_id is equal to the user_id in the session and status is 'Added to cart'
    $query = "SELECT * FROM `certficate_status` WHERE `certificate_id` ='$cid' AND `user_id` ='$user_id' and `status`='2';";
    $result = mysqli_query($conn, $query) ;    
// We'll check if the no.of rows in the result and no.of rows returned by the mysqli_num_rows($result) is true. If yes then it return 0 else it returns 0
    if (mysqli_num_rows($result) >= 1) {
        return 1;
    } 
    else {
        return 0;
    }
}

?>