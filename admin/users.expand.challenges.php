<?php
session_start();
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"]==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="admin.header.styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link rel="stylesheet" type="text/css" href="admin.homepage.styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
    <title>FrontendGang | Challange</title>
    <style>
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
.card-title {
    font-family: 'Archivo', sans-serif !important;
}
h5 {
    font-family: 'Archivo', sans-serif !important;
}
</style>
</head>
<body>
    <?php include '../partials/dbconnect.php';?>
    <?php include 'admin.header.php'; ?>
    <div class="container " style="text-align:center;font-family: 'Orbitron', sans-serif;color: #8888A0;text-align: center;padding-top:20px;">
        <h2>CHALLENGE</h2>
    </div>
    
    <div class="container" style="padding-top:30px;">
    <div class="container" style="padding-bottom:30px;">
    <?php 
    
    $id = $_GET['challenge_id'];
    $sql = "SELECT * FROM `challenges_by_users` WHERE `id`=$id ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['id'];           
        $languages = $row['language'];
        $level = $row['level'];            
        $heading = $row['title'];
        $desc = $row['chal_desc'];
        $live_url = $row['live_url'];
        $code_url = $row['code_url'];
        $challenged_by = $row['challenged_by'];	
        $file = $row['user_file'];
    
        echo'
            <div class="row" style="box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%)">
                <div class="col-xs-12 col-sm-6 col-lg-6 my-3">
                <div>              
                    <div class="card-body chal-card-body" style="text-align:center; padding: 2.15rem;">
                        <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Heading : '.$heading.'</h5>
                        <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Challenged by : '.$challenged_by .'</h5>                    
                        ';
                        if (!empty($live_url)){
                            echo'
                            <div >
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Live Preview : <a href="'.$live_url.'">View</a></h5>                        
                            </div>';
                         }
                         if (!empty($code_url)){
                            echo'
                            <div >
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Code Preview : <a href="'.$code_url.'">Code</a></h5>
                            </div>';
                         }echo'
                        <a href="../users_challenges/'.$heading.'/'.$file.'" >Download</a>                    
                    </div>
                </div>
                <div style="text-align:center;padding-bottom:30px;">
                    <form action="delete.challenge.php" method="post" style="text-align:center;">
                        <input type="hidden" value="'.$id.'" name="User_challenge_id" placeholder="'.$id.'" />
                        <div style="padding-top:0px;"><button type="submit" class="forum-btn btn-f">Delete</button></div> 
                    </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6 my-3">
                    <div class="card-body chal-card-body" style="text-align:center; padding: 2.15rem;">
                        <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Challenge Description</h5>     
                        <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">'.$desc .'</h5>         
                    </div>
                    <form action="addposition.php" method="post" style="text-align:center;">
                        <input type="hidden" value="'.$challenged_by.'" name="email_user" placeholder="'.$challenged_by.'" />
                        <label for="formFileMultiple" style="font-weight:600;" class="form-label">Position<span style="color:red;font-size:18px;">*</span></label>
                        <div class="form-check form-check-inline">                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Founder" required>
                                <label style="font-weight:600;" class="form-check-label" for="exampleRadios1">
                                    Founder
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Challenger" required>
                                <label style="font-weight:600;" class="form-check-label" for="exampleRadios2">
                                    Challenger
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Intern" required>
                                <label style="font-weight:600;" class="form-check-label" for="exampleRadios3">
                                    Intern
                                </label>
                            </div>
                        </div>
                        <div style="padding-top:30px;padding-bottom:30px;"><button type="submit"  class="forum-btn btn-f">Submit</button></div>                
                    </form>
                    
                </div>
            </div>

            ';
             
    }
     
}
    
   ?>
</div>
</div>
    
<?php
if (isset($_POST['submit'])) {
        if($method=='POST'){

        include '../partials/dbconnect.php';
        $email = $_POST['email'];
        $pos = $_POST['exampleRadios'];
        
    
        $email = str_replace("<", "&lt;", $email);
        $email = str_replace(">", "&gt;", $email); 
        $email = str_replace("'", "\\'", $email);

        $sql4 =  " UPDATE `users` SET  `position` = '$pos' WHERE `user_email`= '$email' ;";
        $result4 = mysqli_query($conn, $sql4);

        if($result4){
            header("Location: users.expand.challenges.php?challenge_added=true"); 
            echo'Added';
        }
        else{
            echo'Error';
        }
    }
}

?>
    
    <script src="../abc.js"></script>
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