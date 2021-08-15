<?php
$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../partials/dbconnect.php';
    
   
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    
    $existsql = "select * from `users` where `user_email` = '$email' and `position` IN ('Founder','Challenger','Intern')";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $dno = $row['sno'];
    
    if($numRows==1){
        while($row){
            if(password_verify($pass, $row['user_pass'] )){
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminemail'] = $email;
                $_SESSION['ano'] = $dno;
                $_SESSION['position'] = $row['position'];
                echo "<script>window.location.href='/frontendgang/admin/admin.homepage.php?signinsuccess=true';</script>";
                exit;
            }
            else{
                $showError = "Password does not matched";
                echo "<script>window.location.href='/frontendgang/admin/admin.php?signinsuccess=false && error=$showError';</script>";
                exit;
            }
        }
             

    }
    else{
            $showError = "Email not found!";
            header("Location: /frontendgang/admin/admin.php?signinsuccess=false && error=$showError"); 
            
        }


    

}
?>