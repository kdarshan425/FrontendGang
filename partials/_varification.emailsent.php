<html lang="en">
<head>    
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>Welcome To FrontendGang!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <style>
    .containerbk{
        height:auto;
        width:100%;
        padding-top:0px;
    }

    @media screen and (max-width: 800px) {
        .containerbk{
        height:100%;
        width:100%;
        padding-top:0px;
    }
}

    
    .btn1 {
    position: relative; 
    border:none;       
    padding: 0rem 1rem;
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
    font-size: 20px;
    line-height: 30px;
    text-align: left;
    font-family: "Archivo", sans-serif;
    color: #8888A0;
}

    </style>
</head>
<body>
<?php 
include 'dbconnect.php';
if(isset($_GET['email'])){
    $email = $_GET['email'];
}
if(isset($_GET['emailsent'])){
    $message = $_GET['emailsent'];
    echo'
        <div style="margin-bottom: 0rem;" class="alert alert-success alert-dismissible fade show" role="alert">
        
         <strong>Verification resended successfully</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
         
        </div>';
}

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
    $token = bin2hex(random_bytes(12));

    include 'dbconnect.php';
    $existsql = "UPDATE `users` SET `token` = '$token' where `user_email` = '$email' ";
    $result = mysqli_query($conn, $existsql); 
    
    if($result){        
                 
        
        include('../smtp/PHPMailerAutoload.php');
        $to = "$email";
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
                        Hi '.$email.',
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
        echo"Some Error Occured Field doesnt updated please <a href='http://localhost/frontendgang/contactus.php'>contact here</a>";
    }

    
}
?>
    <div class="container">
    <center>   
        <div style="max-width:600px;padding:30px;" >            
            <h3 style="padding-top: 30px; padding-bottom: 30px;font-size:30px;font-family: 'Orbitron', sans-serif;">Welcome To FrontendGang !</h3>
            <div style="padding-top: 10px;">
                <h4 style="text-align:start;">
                Hi <?php echo $email; ?>,<br>
                We are glad to have you as a part of FrontendGang! 
                One of the biggest community of Web Developement.
                </h4>
                <h4 style="text-align:start;">
                Please complete your signup process by verifying your E-mail address ,<br>
                If Email not recieve Please Click Below
                </h4>
                <div style="padding:40px;">
                <form method="post" action="<?php $_SERVER["REQUEST_URI"] ?>"  id="contact-form" method="post">
                    <button class="btn1" style="color:white" type="submit" name="resend" >Resend Email</button>      
                </form>                          
                </div>   
                <h4>Best Of luck ! and Happy Coding !</h4>   
                <h4>or goto <a href="http://localhost/frontendgang/index.php">Home</a></h4>          
            </div>
        </div>
    </center>        
    </div>
</body>
</html>
<script>
    setTimeout(function () {
  
    // Closing the alert
    $('.alert').alert('close');
    }, 5000);

</script>
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

