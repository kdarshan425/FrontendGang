<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontendGang | Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .search.input-field {
  max-width: 380px;
  width: 100%;
  margin: 10px 0;
  height: 35px;
  border-radius: 0px;  
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}
.search.input-field input::placeholder {
  color: #aaa;
  font-weight: bold;
}

.search.input-field {
    max-width: 380px;
    width: 100%;
    margin: 10px 0;
    height: 35px;
    border-radius: 0px;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
    font-weight: bold;
}
.forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 0rem 0rem;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 3.5rem;
  cursor: pointer;
  overflow: hidden;
  width: 100px;
  font-family: 'Orbitron', sans-serif;
}


.forum-btn.btn-f{
  background-color:#6c63ff;
  color: white;
  width: 100px;
  
  transition: ease-in-out 1s !important;
}

.forum-btn.btn-f:hover{
  background-color:#6c63ff;
  color: white;
 
  text-decoration: none;
  
}

.inneradmin{
    padding:150px 30px 60px 30px;
}

@media screen and (max-width: 800px) {
    .inneradmin{
    padding:180px 30px 90px 30px;
}
}
    </style>
</head>
<body>
    <?php include 'dbconnect.php';?>  
      
    <?php
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
    
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $email = $_POST['email'];
        $token = bin2hex(random_bytes(12));
        $sql3 = "SELECT * FROM `users` WHERE `user_email` = '$email';";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3)!=0) {
            $sql = "INSERT INTO `reset_password` (`id`, `email`, `token`, `status`, `created`) VALUES (NULL, '$email', '$token', '0', current_timestamp());";
            $result = mysqli_query($conn, $sql);
                
            if($result){    
                include('../smtp/PHPMailerAutoload.php');
                $to = "$email";
                $subject = "Reset password link By FrontGang";
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
                    font-size: 15px;
                    line-height: 30px;
                    text-align: left;
                    font-family: "Archivo", sans-serif;
                    color: #8888A0;
                }

                    </style>
                </head>
                <body>
                    <div class="containerbk " style="height:100%;width:100%">
                    <center>
                        <div style=" max-width:600px;padding:30px;" >            
                            <h3 style="font-size:30px;font-family: "Orbitron", sans-serif;"> FrontendGang !</h3>
                            <div style="padding-top: 10px;">
                                <h4 style="text-align:start;">
                                Hi '.$email.',
                                We are glad to have you as a part of FrontendGang! 
                                One of the biggest community of Web Developement.
                                </h4>
                                <h4 style="text-align:start;">
                                You recently requested to reset your password for your FrontendGang account. 
                                Use the button below to reset it. This password reset is only valid for the next 24 hours.                            
                                </h4>
                                <div style="padding:40px;">
                                <a style="color:white" href="http://localhost/frontendgang/partials/update_password.php?token='.$token.'" class="btn1">Reset Password</a>
                                </div>  
                                <h4>Or click below<br> 
                                http://localhost/frontendgang/partials/update_password.php?token='.$token.'</h4>
                                <h4>If you did not request a password reset, please ignore this email or <a href="http://localhost/frontendgang/contactus.php">contact support</a> if you have questions.<h4>
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
                    echo $mail->ErrorInfo;
                    echo "Email sending failed please <a href='http://localhost/frontendgang/contactus.php'>contact here</a>";
                }else{
                    $showError = "Email sent successfully";   
                    echo "Email successfully sent to $to Please Verify email address";             
                    echo "<script>window.location.href='/frontendgang/partials/_varification.emailsent.php?email=$to';</script>";
                    exit;
                }
                               
            }
            else{
                echo'
                <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
                
                <strong>Not able to add in database reset_password!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                
                </div>';
            }
        }       
        else{
            echo'
            <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
            
            <strong>This email does not exist please do Signup!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            
            </div>';
        }
    }
    ?>
    <div class="container">
        <div class="inneradmin">
            <div style="padding-top:0px;" class="container ch-head" style="text-align: center;">
                <h2>Forgot Password</h2>
            </div>
            <div class="container">
            <form method="post" action="<?php $_SERVER["REQUEST_URI"] ?>"  id="contact-form" style="text-align:center;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter Email</label>
                    <center><input name="email" type="email" class="search form-control input-field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="  Email"  required> </center>
                </div>                        
                <div style="padding-top:30px;padding-bottom:30px;">
                    <button type="submit"  class="forum-btn btn-f">Submit</button>
                </div>                
            </form>
            </div>
        </div>        
    </div>    
    
    <script src="../abc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>