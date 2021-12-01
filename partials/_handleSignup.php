<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $user_name = $_POST['userName'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    $token = bin2hex(random_bytes(12));

    //Check whether the email is already exist in the database
    $existsql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);

    $existsql1 = "select * from `users` where user_name = '$user_name'";
    $result1 = mysqli_query($conn, $existsql1);
    $numRows1 = mysqli_num_rows($result1);

    $sql6= "SELECT * FROM `setup` WHERE `setup`.`account_status` = 'active'";
    $result6 = mysqli_query($conn, $sql6);
    $numRows6 = mysqli_num_rows($result6);

    if($numRows6!=0){
    
        while($row = mysqli_fetch_assoc($result6)){
            $setup_id = $row['id'];
            $verification_email = $row['verification_email'];
            $verification_email_password = $row['verification_email_password'];
            $api_key = $row['api_key'];
            $company_name = $row['company_name'];
            $payment_description = $row['payment_description'];
            $logo_url = $row['logo_url'];
        }
    }
    else{
        echo'<b>Please do setup first</b><br>';
    }

    if($numRows>0){
        $showError = "Email already exist!";                

    }
    elseif ($numRows1>0) {
        $showError = "Username already exist!";
      }
    else{
        if($pass==$cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);  
            $sql = "INSERT INTO `users` (`sno`, `user_email`, `user_name`, `user_pass`, `token`,`account_status`, `timestamp`) VALUES (NULL, '$user_email', '$user_name', '$hash','$token', 'Inactive',  current_timestamp());";
            $result = mysqli_query($conn, $sql);
            
            if($result){ 
              
                include('../smtp/PHPMailerAutoload.php');
                $to = "$user_email";
                $subject = "Email Verification By FrontGang";
                $msg='

                <!DOCTYPE html>
                <html lang="en">
                <head>    
                    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
                    <title>Welcome To FrontendGang!</title>
                    <style>
                    .btn1 {
                    position: relative; 
                    border:none;       
                    padding: 1rem 1rem;
                    font-size: 1.15rem;
                    font-weight: 500;
                    letter-spacing: 0.25px;
                    line-height: 2.5rem;
                    cursor: pointer;
                    overflow: hidden;    
                    text-align: center;
                    font-family: "Archivo", sans-serif;
                    background: #6c63ff;
                    color: white;
                    text-decoration:none;
                }
                h3{
                    font-size: 30px;
                }
                h4{
                    font-size: 17px;
                    line-height: 30px;
                    text-align: left;
                    font-family: "Archivo", sans-serif;
                    color: #8888A0;
                }

                    </style>
                </head>
                <body>
                    <div class="container " style="height:100%;width:100%">
                    <center>
                        <div style=" max-width:600px;padding:30px;" >            
                            <h3 style="font-size:30px;    font-family: "Orbitron", sans-serif;">Welcome To FrontendGang !</h3>
                            <div style="padding-top: 10px;">
                                <h4 style="text-align:start;">
                                Hi '.$user_name.',
                                We are glad to have you as a part of FrontendGang! 
                                One of the biggest community of Web Developement.
                                </h4>
                                <h4 style="text-align:start;">
                                Please complete your signup process by verifying your E-mail address below,
                                </h4>
                                <div style="padding:40px;">
                                <a style="color:white" href="http://localhost/frontendgang/partials/_verification.php?token='.$token.'" class="btn1">Verify Email</a>
                                </div> 
                                <h4>Or click below<br> 
                                http://localhost/frontendgang/partials/_verification.php?token='.$token.'</h4>  
                                <h4>Best Of luck ! and Happy Coding !</h4>             
                            </div>
                        </div>
                    </center>        
                    </div>
                </body>
                </html>

                ';
                
                
                $mail = new PHPMailer(); 
                // $mail->SMTPDebug  = 3;
                $mail->IsSMTP(); 
                $mail->SMTPAuth = true; 
                $mail->SMTPSecure = 'tls'; 
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587; 
                $mail->IsHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Username = $verification_email;
                $mail->Password = $verification_email_password;
                $mail->SetFrom($verification_email);
                $mail->Subject = $subject;
                $mail->Body =$msg;
                $mail->AddAddress($to);
                $mail->SMTPOptions=array('ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>false
                ));
                if(!$mail->Send()){
                    $showError="not able to send the email";
                    echo $mail->ErrorInfo;
                    echo "Email sending failed please <a href='http://localhost/frontendgang/contactus.php'>contact here</a>";
                }else{
                    $showError = "Email sent successfully";   
                    echo "Email successfully sent to $to Please Verify email address";             
                    echo "<script>window.location.href='/frontendgang/partials/_varification.emailsent.php?email=$to';</script>";
                    exit;
                }
                      
            }
        }
        else{
            $showError = "Password Does not match !";
        }    
    }
    echo "<script>window.location.href='/frontendgang/register.php?signupsuccess=false&error=$showError';</script>";
    exit;
    
}
?>