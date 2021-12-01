<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/challenges.style.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>FrontendGang | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .Profile-img-back{
        width:100%;
        padding-left: 25%;
        padding-top:50px;
    }
    @media screen and  (max-width: 600px) {
        .Profile-img-back{
        width:100%;
        padding-left: 25%;
        padding-top:20px;
    }
    }
    .Profile-img{
        height:150px;
         width:150px;
         border: 5px solid #ced4da;
          border-radius:50%;
        text-align:center;
    }
    .Profile-img h4 {
    font-size: 6rem;
    padding-top: 10px;
    }

    p,h5{font-family: 'Archivo', sans-serif;}

    h4, h1{
        font-family: 'Orbitron', sans-serif;
    }
        .user-image{
           
              height:200px;
              width:200px;
        }

        .row.profile{
            border:2px solid #ced4da;
            background:#f2f2ff;
            padding-bottom:30px;
        }
       
        .edit-img{
            border:2px solid gray;
            border-radius:50%;
            padding:5px;
            right:20px;
            z-index:0;
            position: relative;
        }
        
  
        @media (min-width: 1200px){
    .donechallenge .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 1240px;
        }}

        .chalbg{
    background: url('img/finalbgdone.png') no-repeat ;
    background-size: contain;
    background-repeat:repeat;
}
      </style>
</head>
<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    
    
 <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $user_id = $_SESSION['sno']; // $_SESSION['id'] We'll get the user_id from the session
  // We will select all the entries from the user_items table where the item_id is equal to the item_id we passed to this function, user_id is equal to the user_id in the session and status is 'Added to cart'
  
    if(isset($_GET['user'])){
        $user1 = $_GET['user'];   
        $existsql = "select * from `users` where user_name = '$user1'  ";
    }
    
    elseif(isset( $_GET['useremail'])){
    $useremail = $_GET['useremail'];
    $existsql = "select * from `users` where  user_email = '$useremail' ";
    //$sql = "SELECT * FROM `users` WHERE user_email = $user1"; 
    }
    
    $result = mysqli_query($conn, $existsql);
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $visited_id = $row['sno'];
        $email = $row['user_email'];
        $username = $row['user_name'];
        $score = $row['user_score'];
        $Name = $row['Name'];
        $City = $row['City'];
        $State = $row['State'];
        $Country = $row['Country'];
        $Gender = $row['Gender'];
        $Website = $row['Website'];
        $Bio = $row['Bio'];
        $Github = $row['Github_link'];
        $Youtube = $row['Youtube_link'];
        $LinkedIn = $row['LinkedIn_link'];
        $Twitter = $row['Twitter_link'];

    }
        
    ?>

    <?php
    echo'
    
    <div class="container">
        <div style="padding:0px;" class="submit-form">
            <div style="width:100%;padding:0px;"><center></center><div>
            
        </div>
        <div style="padding-bottom:30px;" class="container">
        <div class="row  profile">
            <div class="col-xs-12 col-sm-12 col-lg-4 my-3">
                <center>
                <div style="padding-left:0%;" class="Profile-img-back" >
                <div class="Profile-img">
                <center>
                <h4>'.strtoupper(substr($email, 0, 1)).'</h4>
                </center>
                </div>                
                </div>
                </center>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-4 my-3" style="padding-top:30px;">
            <div class="container" >
                <center>
                <div>
                    
                    <h4><b>'.$Name.'</b></h4>
                    <h5 style="color: #6c63ff;">@'.$username.'</h5>
                    <p style="color:#8888A0;padding-top:30px;font-weight:bold;">'.$City.' | '.$State.' | '.$Country.'</p>
                    
                    <div class="row">
                    <div class="col">';
                    if (!empty($Github)){
                        echo'
                        <div >
                        <a href="'.$Github.'" target="_blank"><img src="img/github.png" alt=""></a>                        
                        </div>';
                     }echo'
                    </div>
                    <div class="col">';
                    if (!empty($LinkedIn)){
                        echo'<div >
                        <a href="'.$LinkedIn.'" target="_blank"><img src="img/linkedin.png" alt=""></a>                        
                        </div>';
                     }echo'
                    </div>
                    <div class="col">';
                    if (!empty($Twitter)){
                        echo'<div >
                        <a href="'.$Twitter.'" target="_blank"><img src="img/twitter.png" alt=""></a>                        
                        </div>';
                     }echo'
                    </div>
                    <div class="col">';
                    if (!empty($Youtube)){
                        echo'<div >
                        <a href="'.$Youtube.'" target="_blank"><img src="img/youtube.png" alt=""></a>                        
                        </div>';
                     }echo'
                    </div>
                    </div>
                    ';
                echo'
                    
                </div>
                </center>                                         
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-4 my-3" style="padding-top:30px;padding-left:30px;">
                <div>
                <center><h4><b>Score: '.$score.'</b></h4></center>
                ';
                if (!empty($Website)){
                    echo'<div class="container" style="padding-left:0px;">
                    <h5><b>Website : <a href="'.$Website.'" target="_blank">Portfolio</a></b></h5>                                            
                    </div>';
                 }
                 if (!empty($Website)){
                    echo'<div class="container" style="padding-left:0px;">
                    <h5><b>Bio:<b></h5>
                    <p>'.$Bio.'</p>                                            
                    </div>';
                 }echo'
                
                </div>
            </div>
        </div>
        </div>
    </div>'; ?>
<div class="donechallenge">
<?php include 'visiteprofile.solvedchal.php';
 }
                
 else{
     ?>                   
    
<div class="container">
     <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
         <center>
         <h3>Login To Continue</h3>
         <div style="padding:20px;">
         <button onclick="myFunction8()" style="background:#6c63ff;color:white;" class="dropdown-btn4 regbtn">REGISTER</button>
         </div>
         </center>
     </div>
 </div>
<?php
 }
 
 ?>

</div>
</div>

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
    <?php 
    include 'partials/footer.php';
    ?>   
</body>
</html>