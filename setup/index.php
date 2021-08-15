<?php
session_start();
if(isset($_SESSION["founderloggedin"]) && $_SESSION["founderloggedin"]==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>FrontendGang | Setup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    html{
        width:100%;
        height:100%;
    }
    @media (max-width: 570px){
        form {
            padding: 0 0rem !important;
        }}
        .user-image{
              height:200px;
              width:200px;
        }

        .profile-info{
            padding-top:50px;
            padding-bottom:20px;
            color:#8888A0;
            size:2.5rcm;
            font-family: 'Orbitron', sans-serif;
        }
        .exp-btn{
            position: relative;
            border: 2px solid;
            border-radius: 0px;
            padding: 1rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.25px;
            line-height: 1.5rem;
            cursor: pointer;
            overflow: hidden;
            transition: all .3s, outline 0s;
            transition: all .3s, outline 0s;
            width: 150px;
            font-family: 'Orbitron', sans-serif;
        }
        
        .exp-btn.btn--voi{
            background-color:#6c63ff;
            color:white;
        }
        
        .exp-btn.btn--voi:hover {
            background-color: white;
            color: #6c63ff;
            text-decoration: none;
        }
        
      </style>
</head>
<body>
    <?php include '../partials/dbconnect.php';    
   
    ?>
<?php
$method = $_SERVER['REQUEST_METHOD'];
?>
 <?php
    if (isset($_POST['submit'])) {
        if($method=='POST'){
        $profileid = $_SESSION['sno'];        

        // Insert into thread db
        $verification_email = $_POST['verification_email'];
        $verification_email_password = $_POST['verification_email_password'];
        $key = $_POST['key'];
        $company_name = $_POST['company_name'];        
        $payment_description = $_POST['payment_description'];
        $logo_url = $_POST['logo_url'];
        
        
        $verification_email = str_replace("<", "&lt;", $verification_email);
        $verification_email = str_replace(">", "&gt;", $verification_email); 
        $verification_email = str_replace("'", "\\'", $verification_email);

        $verification_email_password = str_replace("<", "&lt;", $verification_email_password);
        $verification_email_password = str_replace(">", "&gt;", $verification_email_password); 
        $verification_email_password = str_replace("'", "\\'", $verification_email_password);

        $key = str_replace("<", "&lt;", $key);
        $key = str_replace(">", "&gt;", $key); 
        $key = str_replace("'", "\\'", $key);

        $company_name = str_replace("<", "&lt;", $company_name);
        $company_name = str_replace(">", "&gt;", $company_name); 
        $company_name = str_replace("'", "\\'", $company_name);

        $payment_description = str_replace("<", "&lt;", $payment_description);
        $payment_description = str_replace(">", "&gt;", $payment_description); 
        $payment_description = str_replace("'", "\\'", $payment_description);

        $logo_url = str_replace("<", "&lt;", $logo_url);
        $logo_url = str_replace(">", "&gt;", $logo_url); 
        $logo_url = str_replace("'", "\\'", $logo_url);

        $sql= "SELECT * FROM `setup`";
        $result2 = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result2);

        if($numRows<1){
            $sql1 =  "INSERT INTO `setup` (`id`, `verification_email`, `verification_email_password`,`account_status`, `api_key`, `company_name`, `payment_description`, `logo_url`, `timestamp`) VALUES (NULL, '$verification_email', '$verification_email_password', 'active', '$key', '$company_name', '$payment_description', '$logo_url', CURRENT_TIMESTAMP);";
            $result = mysqli_query($conn, $sql1);
    
            
                
            if($result){
               header("Location: /frontendgang/setup/account.php");
               echo'
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congrats!</strong> Your profile updated successfully !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                </div>
               ';
                
            } else {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Nope!</strong> Some problem occured try again!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ' ;
            }
        }

        else{                     
            $sql3 =  "UPDATE `setup` SET `verification_email` = '$verification_email', `verification_email_password` = '$verification_email_password', `api_key` = '$key', `company_name` = '$company_name', `payment_description` = '$payment_description', `logo_url` = '$logo_url' WHERE `setup`.`account_status` = 'active';";
            $result3 = mysqli_query($conn, $sql3);
            if($result3){                
                echo'
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Congrats!</strong> Your account updated successfully !
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     
                 </div>
                ';
                 
             } else {
                 echo '
                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Nope!</strong> Some problem occured try again!
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                 ' ;
             }
        }
           
        
    }
    }?>

    
    <div class="container">
    <div class="container">
            <div class="container-1">
            
            <div style="padding:30px;" class="submit-form">
               <center><h1 style="color:#8888A0;font-family: 'Orbitron', sans-serif;">Setup Your Project</h1></center>
            </div>

           <?php
           $sql6= "SELECT * FROM `setup` WHERE `setup`.`account_status` = 'active'";
           $result6 = mysqli_query($conn, $sql6);
           $numRows6 = mysqli_num_rows($result6);
            
            if($numRows6!=0){
                echo'<div class="profile-info"><b>Your current details</b><br></div>';
                while($row = mysqli_fetch_assoc($result6)){
                    $id = $row['id'];
                    $verification_email = $row['verification_email'];
                    $verification_email_password = $row['verification_email_password'];
                    $api_key = $row['api_key'];
                    $company_name = $row['company_name'];
                    $payment_description = $row['payment_description'];
                    $logo_url = $row['logo_url'];

                    echo'email= '.$verification_email.'<br>';
                    echo'password= '.$verification_email_password.'<br>';
                    echo'apikey= '.$api_key.'<br>';
                    echo'company name= '.$company_name.'<br>';
                    echo'payment description= '.$payment_description.'<br>';
                    echo'logo url= '.$logo_url.'<br>';

                    }
            }
            ?>
            
            <form method="post" action="<?php $_SERVER["REQUEST_URI"]?>" enctype="multipart/form-data">               
                    
                <div class="mb-3">   
                    <div class="profile-info" ><b>Verification Email Id:</b></div>                     
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Verification Email address</label>
                    <div class="input-group flex-nowrap">                
                        <input name="verification_email" type="email" class="form-control" placeholder="verification email id" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping">
                    </div>  
                </div>
                <div class="mb-3">                        
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Verification Email password</label>
                    <div class="input-group flex-nowrap">                
                        <input name="verification_email_password" type="text" class="form-control" placeholder="verification email password" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping">
                    </div>  
                </div>                  
                    
                
                <div class="mb-3">
                    <div class="profile-info" ><b>Razorpay Payment details for integration:</b></div>
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Key</label>
                    <div class="input-group flex-nowrap">                
                        <input name="key" type="text" class="form-control" placeholder="key" aria-describedby="inputGroup-sizing-lg" aria-label="key" aria-describedby="addon-wrapping">
                    </div>                
                </div>
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Company Name</label>
                    <div class="input-group flex-nowrap">                
                        <input name="company_name" type="text" class="form-control" placeholder="Company Name" aria-label="Company name" aria-describedby="addon-wrapping">
                    </div>                
                </div>
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Small description about transaction</label>
                    <div class="input-group flex-nowrap">                
                        <input name="payment_description" type="text" class="form-control" placeholder="payment_description" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping">
                    </div>                
                </div>   
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Company Logo Url</label>
                    <div class="input-group flex-nowrap">                
                        <input name="logo_url" type="text" class="form-control" placeholder="logo_url" aria-label="live-url" aria-describedby="addon-wrapping">
                    </div>                
                </div>                 
                <div class="container">
                <div style="padding:50px;" class="cont-but">
                <center>
                <button class="exp-btn btn--voi" type="submit" name="submit" >Update</button>
                </center>
                </div>
                </div>        
            </form>
                      
            </div>
        </div>
        
    </div>
    
    <script>
     setTimeout(function () {
  
    // Closing the alert
    $('.alert').alert('close');
    }, 5000);
    </script>

    <script src="abc.js"></script>
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
<?php }
else{
    include 'founder.php';
}?>