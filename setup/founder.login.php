<?php
$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../partials/dbconnect.php';
    
   
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    
    $existsql = "select * from `users` where `user_email` = '$email' and `position` IN ('Founder')";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $dno = $row['sno'];
    
    if($numRows==1){
        while($row){
            if(password_verify($pass, $row['user_pass'] )){
                session_start();
                $_SESSION['founderloggedin'] = true;
                $_SESSION['founderemail'] = $email;
                $_SESSION['fno'] = $dno;
                $_SESSION['fposition'] = $row['position'];
                echo "<script>window.location.href='/frontendgang/setup/index.php?signinsuccess=true';</script>";
                exit;
            }
            else{
                $showError = "Password does not matched";
                echo "<script>window.location.href='/frontendgang/setup/founder.php?signinsuccess=false && error=$showError';</script>";
                exit;
            }
        }
             

    }
    else{
            $showError = "Email not found!";
            header("Location: /frontendgang/setup/founder.php?signinsuccess=false && error=$showError"); 
            
        }


    

}
?>