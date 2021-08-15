<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '../partials/dbconnect.php';       
        
        $email = $_POST['email_user'];
        $pos = $_POST['exampleRadios'];
        
        
        
        echo $pos;
        echo $email;
        
       
         $sql4 =  " UPDATE `users` SET  `position` = '$pos' WHERE `user_email`= '$email' ;";
         $result4 = mysqli_query($conn, $sql4);

        if($result4){            
            header("Location: users.challenges.php?Challenge_added=true"); 
        }
        else{
            echo'Error';
        }
    
}

?>