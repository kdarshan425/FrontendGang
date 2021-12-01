<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>FrontendGang | Update Profile</title>
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
    <?php include 'partials/dbconnect.php';
    session_start();
   
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){?>
<?php
$method = $_SERVER['REQUEST_METHOD'];
?>
 <?php
    if (isset($_POST['submit'])) {
        if($method=='POST'){
        $profileid = $_SESSION['sno'];
        

        // Insert into thread db
        $Name = $_POST['Name'];
        $City = $_POST['City'];
        $State = $_POST['State'];
        $Country = $_POST['Country'];
        $Gender = $_POST['Gender'];
        $Website = $_POST['Website'];
        $Bio = $_POST['Bio'];
        $Github = $_POST['Github'];
        $Youtube = $_POST['Youtube'];
        $LinkedIn = $_POST['LinkedIn'];
        $Twitter = $_POST['Twitter'];
        
        $Name = str_replace("<", "&lt;", $Name);
        $Name = str_replace(">", "&gt;", $Name); 
        $Name = str_replace("'", "\\'", $Name);

        $City = str_replace("<", "&lt;", $City);
        $City = str_replace(">", "&gt;", $City); 
        $City = str_replace("'", "\\'", $City);

        $State = str_replace("<", "&lt;", $State);
        $State = str_replace(">", "&gt;", $State); 
        $State = str_replace("'", "\\'", $State);

        $Country = str_replace("<", "&lt;", $Country);
        $Country = str_replace(">", "&gt;", $Country); 
        $Country = str_replace("'", "\\'", $Country);

        $Website = str_replace("<", "&lt;", $Website);
        $Website = str_replace(">", "&gt;", $Website); 
        $Website = str_replace("'", "\\'", $Website);

        $Bio = str_replace("<", "&lt;", $Bio);
        $Bio = str_replace(">", "&gt;", $Bio);
        $Bio = str_replace("'", "\\'", $Bio);
        
        $Github = str_replace("<", "&lt;", $Github);
        $Github = str_replace(">", "&gt;", $Github); 
        $Github = str_replace("'", "\\'", $Github);

        $Youtube = str_replace("<", "&lt;", $Youtube);
        $Youtube = str_replace(">", "&gt;", $Youtube); 
        $Youtube = str_replace("'", "\\'", $Youtube);

        $LinkedIn = str_replace("<", "&lt;", $LinkedIn);
        $LinkedIn = str_replace(">", "&gt;", $LinkedIn); 
        $LinkedIn = str_replace("'", "\\'", $LinkedIn);

        $Twitter = str_replace("<", "&lt;", $Twitter);
        $Twitter = str_replace(">", "&gt;", $Twitter); 
        $Twitter = str_replace("'", "\\'", $Twitter);
        
        $sql1 =  "UPDATE users SET `Name` = '$Name', `City`= '$City', `State`= '$State',`Country`='$Country',`Gender`= '$Gender',`Website`='$Website', `Bio`='$Bio' , `Github_link`='$Github' , `Youtube_link`='$Youtube',`LinkedIn_link`='$LinkedIn',`Twitter_link` = '$Twitter' WHERE `sno` = $profileid";
        $result = mysqli_query($conn, $sql1);

        if($result){
           header("Location: /frontendgang/profile.php");
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
    }?>

    
    <div class="container">
    <div class="container">
            <div class="container-1">
            
            <div style="padding:30px;" class="submit-form">
               <center><h1 style="color:#8888A0;font-family: 'Orbitron', sans-serif;">Edit Profile</h1></center>
            </div>
            <form method="post" action="<?php $_SERVER["REQUEST_URI"]?>" enctype="multipart/form-data"> 
                
                        <div class="profile-info" > <b> Persnal Info :</b> </div>
                        <div class="mb-3">
                            <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Name <span style="color:red;font-size:18px;">*</span></label>
                            <div class="input-group flex-nowrap">                
                                <input name="Name" type="text" class="form-control" placeholder="Name" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping" required>
                            </div>                
                        </div>                        
                        <div class="mb-3">
                            <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Location <span style="color:red;font-size:18px;">*</span></label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group flex-nowrap">                
                                        <input name="City" type="text" class="form-control" placeholder="City" aria-label="Code-link" aria-describedby="addon-wrapping" required>
                                    </div>          
                                </div>
                                <div class="col">
                                    <div class="input-group flex-nowrap">                
                                        <input name="State" type="text" class="form-control" placeholder="State" aria-label="Code-link" aria-describedby="addon-wrapping" required>
                                    </div>          
                                </div>
                                <div class="col">
                                    <div class="input-group flex-nowrap">                
                                        <input name="Country" type="text" class="form-control" placeholder="Country" aria-label="Code-link" aria-describedby="addon-wrapping" required>
                                    </div>          
                                </div>
                            </div>                                  
                        
                        <div style="padding-top:10px;" class="form-check form-check-inline">
                            <label for="formFileMultiple" class="form-label"><b>Gender <span style="color:red;font-size:18px;">*</span></b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Gender1" value="Male" required>
                                <label class="form-check-label" for="Gender1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Gender2" value="Female" required>
                                <label class="form-check-label" for="Gender2">
                                    Female
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Gender3" value="Other" required>
                                <label class="form-check-label" for="Gender3">
                                    Other
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="mb-3">
                    <div class="profile-info" ><b>Bio:</b></div>
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Website</label>
                    <div class="input-group flex-nowrap">                
                        <input name="Website" type="text" class="form-control" placeholder="Website" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping">
                    </div>                
                </div>
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Bio</label>
                    <div class="input-group flex-nowrap">                
                        <input name="Bio" type="text" class="form-control" placeholder="Something about yourself" aria-label="live-url" aria-describedby="addon-wrapping">
                    </div>                
                </div>
                <div class="mb-3">
                    <div class="profile-info" ><b>Links:</b></div>
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Github-Link</label>
                    <div class="input-group flex-nowrap">                
                        <input name="Github" type="text" class="form-control" placeholder="Github-Link" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping">
                    </div>                
                </div>   
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Youtube-Link</label>
                    <div class="input-group flex-nowrap">                
                        <input name="Youtube" type="text" class="form-control" placeholder="Youtube-Link" aria-label="live-url" aria-describedby="addon-wrapping">
                    </div>                
                </div>      
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">LinkedIn-Profile-Link</label>
                    <div class="input-group flex-nowrap">                
                        <input name="LinkedIn" type="text" class="form-control" placeholder="LinkedIn-Profile-Link" aria-label="live-url" aria-describedby="addon-wrapping">
                    </div>                
                </div>   
                <div class="mb-3">
                    <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Twitter-Profile-Link</label>
                    <div class="input-group flex-nowrap">                
                        <input name="Twitter" type="text" class="form-control" placeholder="Twitter-Profile-Link" aria-label="live-url" aria-describedby="addon-wrapping">
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
    <?php
    
        }
        else{
            ?>
               <div class="container" style="padding-top:10%;">
                    <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                        <center>
                        <h3 style="font-family: 'Orbitron', sans-serif;">Login To Continue</h3>
                        <div style="padding:20px;">
                        <a href="register.php" style="background:#6c63ff;color:white;padding:10px;" class="dropdown-btn4 regbtn">REGISTER</a>
                        </div>
                        </center>
                    </div>
                </div>
               <?php 
        }
    ?>
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