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
    <title>FrontendGang | users rewards</title>
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="admin.header.styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link rel="stylesheet" type="text/css" href="admin.homepage.styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
    .d-thread-search{
        padding-left:0px;
        padding-right:10px;
        padding-top:10px;
        padding-bottom:30px;
    }
    .thread-search{
         width:100%
    }
    .me-4 {
    margin-right: 0rem!important;
}
    @media only screen and (min-width: 800px) {
    .thread-search{
         width:600px;
         padding-left:40px;
    }
    .d-thread-search{
        
        padding-left:0px;
        padding-top:20px;
    }
}
.chalbg{
    background: url('../img/finalbgdone.png') no-repeat ;
    background-size: contain;
    background-repeat:repeat;
}
@media (min-width: 1200px){
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1240px;
}}

.card-title {
    font-family: 'Archivo', sans-serif !important;
}

</style>
</head>
<body>
    
    <?php
        include '../partials/dbconnect.php';
        include 'admin.header.php';
    ?>
    <div class="container ch-head" style="text-align: center;">
        <h2>USERS REWARDS</h2>
    </div>

    
    <div class="challenges container my-4">
        <div class="row " data-masonry='{"percentPosition": true }'>
        <?php

        $sql = "SELECT * FROM `user_success_payment`  ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['id'];           
           
            $user_email = $row['user_email'];            
            $chal_id = $row['user_challenge_id'];
            $status = $row['status'];
            
        
            echo'
        <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                    <div class="card" style="padding:0px;box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);">              
                        <div class="card-body chal-card-body" style="align-item:center; padding: 2.15rem;">
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Challenge Id : '.$id.'</h5>
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Challenged by : <a class="text-dark " href="../visitprofile.php?useremail='.$user_email .'"> '.$user_email .'</a> </h5>                    
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Status : '.$status.' </h5>
                        </div>
                    </div>
                </div>';
            }      
        
         ?>
         <?php
}
    else{
    include 'admin.php';
}
?>


        </div>
    </div>
    <script>    
    function myFunction2() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  // Toggle between showing and hiding the sidebar when clicking the menu icon
  var mySidebar = document.getElementById("mySidebar");
  

  function dk_open() {
    
    if (mySidebar.style.display === "block") {
      mySidebar.style.display = "none";   
     
      
    } else {
      mySidebar.style.display = "block";
     
    }
  }
  
  // Close the sidebar with the close button
  function dk_close() {
      mySidebar.style.display = "none";
  }</script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
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