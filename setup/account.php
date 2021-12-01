<?php
session_start();
if(isset($_SESSION["founderloggedin"]) && $_SESSION["founderloggedin"]==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontendGang | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .admin{
    height:100%;
    width:100%;
    display:flex;
    text-align:center;
    vertical-align:center;
    justify-content:center;
}

.inneradmin{
    padding:100px 30px 30px 30px;
}

@media screen and (max-width: 800px) {
    .inneradmin{
    padding:130px 30px 30px 30px;
}
}

.input-field {
  max-width: 380px;
  width: 100%;
  margin: 10px ;
  height: 35px;
  border-radius: 0px;  
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}
.input-field input::placeholder {
  color: #aaa;
  font-weight: bold;
}

.input-field {
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
    </style>
</head>
<body>    
    <?php
    if(isset($_GET['error'])){
        $err = $_GET['error'];
        echo'
        <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
        
         <strong><b>'. $err .'</b></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
         
        </div>
  
  
      ';
      }
      ?>
    <div class="admin">        
        <div class="inneradmin">
            <div class="head" style="padding-bottom:50px;">
                <h3 style="font-family: 'Orbitron', sans-serif;color: #8888A0;">Hi Admin, Setup Founder Position!</h3>
            </div>
            <form action="<?php $_SERVER["REQUEST_URI"]?>" method="post">
                <div class="mb-3">                    
                    <center> <input name="signupEmail" placeholder="Email" type="email" class="form-control input-field" id="exampleInputEmail1" aria-describedby="emailHelp" required></center>
                </div>
                <div class="mb-3">
                    <center> <input name="userName" placeholder="Username" type="text" class="form-control input-field" id="exampleInputEmail1" aria-describedby="emailHelp" required></center>
                </div>
                <div class="mb-3">
                    <center><input name="signupPassword" placeholder="Password" type="password" class="form-control input-field" id="exampleInputPassword1" required></center>
                </div>
                <div class="mb-3">
                    <center><input name="signupcPassword" placeholder="Confirm password" type="password" class="form-control input-field" id="exampleInputPassword1" required></center>
                </div>

                <div style="padding-top:30px;"><button type="submit" name="submit" class="forum-btn btn-f">Submit</button></div>                
            </form>
        </div>
    </div>

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
<?php 
$method = $_SERVER['REQUEST_METHOD'];
if (isset($_POST['submit'])) {
    if($method=='POST'){
    include '../partials/dbconnect.php';
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
            $sql = "INSERT INTO `users` (`sno`, `user_email`, `position`, `user_name`, `user_pass`, `token`,`account_status`, `timestamp`) VALUES (NULL, '$user_email', 'Founder', '$user_name', '$hash','$token', 'Inactive',  current_timestamp());";
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
    echo "<script>window.location.href='/frontendgang/setup/account.php?signupsuccess=false&error=$showError';</script>";
    exit;
}
}
?>
<?php }
else{
    include 'founder.php';
}?>
