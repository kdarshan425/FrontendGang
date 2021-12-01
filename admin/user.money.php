<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '../partials/dbconnect.php';       
        
        $chal_id = $_POST['challenge_id'];
        $user_email = $_POST['email_user'];

        echo $chal_id;
        echo $user_email;
         
        $existsql = "select * from `user_success_payment` where user_challenge_id = '$chal_id'";
        $result = mysqli_query($conn, $existsql);
        $numRows = mysqli_num_rows($result);
    
        if($numRows>0){
            $showError = "Request Already Sent, Please wait till the community respond!";   
            header("Location:  challenge.submission.php?challenge_id=$chal_id&&error=$showError");
    
        }
        else{
            $sql4 =  "INSERT INTO `user_success_payment` (`id`, `user_email`, `user_challenge_id`, `status`, `timestamp`) VALUES (NULL, '$user_email', '$chal_id', 'Pending', current_timestamp());";
            $result4 = mysqli_query($conn, $sql4);
    
            if($result4){  
                $showError = "Request sent successfully, You'll get your reward soon!";            
                header("Location:  challenge.submission.php?challenge_id=$chal_id&&addedsuccess=$showError");
            }
            else{
                $showError = "Something went wrong!";   
                header("Location:  challenge.submission.php?challenge_id=$chal_id&&error=$showError");
            }    
        }
       
}

?>