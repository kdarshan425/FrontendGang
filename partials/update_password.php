<?php
include 'dbconnect.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];
    date_default_timezone_set('Asia/Calcutta'); 
    $today= date("Y-m-d H:i:s"); // time in India
    
    $existsql = "select * from `reset_password` where `token` = '$token' ";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    $email = $row['email'];
    $present_token = $row['token'];
    $status = $row['status'];
    $created_time = $row['created'];

    include 'dbconnect.php';
    $sql5= "SELECT TIMESTAMPDIFF(MINUTE, '$created_time', '$today')AS `Output` ";
    $result5 = mysqli_query($conn, $sql5);
    while($row = mysqli_fetch_assoc($result5)){
        $timer = $row['Output'];                
    
    }
    if($timer<1441){
    
        if($token==$present_token){

            $sql1 =  "UPDATE `reset_password` SET `status`= '1' WHERE `token` = '$token'";
            $result = mysqli_query($conn, $sql1);
            if($result){  
            ?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
.payment{
    height:100%;
    width:100%;
    text-align:center;
    vertical-align:center;
    justify-content:center;
}

.innerpayment{
    padding:100px 30px 30px 30px;
}

@media screen and (max-width: 800px) {
    .innerpayment{
    padding:130px 30px 30px 30px;
}
}
.input-field {
  border: 0.5px gray solid;
  max-width: 380px;
  width: 100%;
  margin: 10px 0;
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
#disabled{
background:red;
}
input:disabled {
    background-color: -internal-light-dark(rgba(239, 239, 239, 0.3), rgba(59, 59, 59, 0.7));
    border-color: rgba(118, 118, 118, 0.3);
}
.forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 0rem 1rem;
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
  width: 200px;
  box-shadow: 2px 1px 4px 2px rgba(0,0,0,0) !important;
  transition: ease-in-out 1s !important;
}

.forum-btn.btn-f:hover{
  background-color:#6c63ff;
  color: white;
  width: 200px;
  box-shadow:inset 1px 1px 4px 2px rgba(0,0,0,0) !important;
  text-decoration: none;
  
}
</style>
</head>
<body>
<?php    
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';

    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];
    if($pass==$cpass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);  
        $sql3 = "UPDATE `users` SET `user_pass` = '$hash' WHERE `user_email` = '$email';";
        $result3 = mysqli_query($conn, $sql3);
        
        if($result3){
            $showError = "Password reseted successfully";
            header("Location: /frontendgang/register.php?reset=$showError"); 
        }
        else{
            echo'
                <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
                    
                    <strong>Password not updated !</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                    
                </div>';
           }
    }
    else{
        echo'
            <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
                
                <strong>Password and confirm password does not matched !</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                
            </div>';
       }

}
?>


<div class="payment">
    <div class="innerpayment">
        <div class="head" style="padding-bottom:50px;">
        <h3 style="font-family: 'Orbitron', sans-serif;color: #8888A0;">Reset Your Password</h3>
        </div>
     
        <form method="post" action="<?php $_SERVER["REQUEST_URI"] ?>"  id="contact-form">       

            <div>
                <label style="font-weight:bold;" for="lname">New Password</label><br>
                <input class="input-field" name="signupPassword" type="password" placeholder="Password" required  ><br> <br>
            </div>
            <div>
                <label style="font-weight:bold;" for="lname">Confirm New Password</label><br>
                <input class="input-field" name="signupcPassword" type="password" placeholder="Confirm-Password" required><br> <br>
            </div>
            <div style="padding-top:30px;"><button type="submit" class="forum-btn btn-f">Submit</button> <br> <br></div>
            
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
            }
            else{
                echo' Not able to activate account, Please Contact Us.';
            }
        }
        else{
        echo'<h3>Token does not matched<h3>';
        }
    }
    else{
        echo'<h3>Link has been Expired, Please Resend Email Verification link By doing SignIn<h3>';
    }

}
else{
    echo'<h3>This link cannot open<h3>';
}
?>