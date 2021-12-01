<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/challenges.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>FrontendGang | Certificate</title>
    <style>
    a:not([href]) {
   
    text-decoration: none;
}
.cer p {
    color: #8888A0;
    font-size: 1.19rem;
    line-height: 1.7rem;
    padding-top: 0px;
    padding-bottom: 0px;
}

    .cert-container{
        width:5rcm;
        height:4rcm;
    }
    
.forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 0rem 0rem;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 2.1rem;
  cursor: pointer;
  overflow: hidden;
  width: 150px;
  font-family: 'Orbitron', sans-serif;
}

.forum{
  padding-top: 20px;
  overflow: auto;
  background-color: #6c63ff;
}
.forum-in{
  padding: 70px;
  background-color:#6b63ff3a;
}

.forum-btn.btn-f{
 
  color: white;
  width: 200px;
  
  transition: ease-in-out 1s !important;
}

a.forum-btn.btn-f:hover{
 
  color: white;
  width: 200px;
  
  text-decoration: none;
  
}
    </style>
</head>
<body>
    <div style="width:100%;height:auto;"class="basecamp">
    
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <div style="padding-top:0px;" class="container ch-head" style="text-align: center;">
        <h2>Get yourself certified</h2>
    </div>

    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
?>

    <?php 
    $u=$_SESSION['sno'];
    $sql5 = "SELECT * FROM `users` WHERE `sno`= '$u' ";
    $result5 = mysqli_query($conn, $sql5);
    while($row = mysqli_fetch_assoc($result5)){        
        $userno = $row['sno'];
        $score5 = $row['user_score'];
        if($userno == $_SESSION['sno']){
            
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ ?>
           
            <div class="outer" style="width:100%;">
            <div class="container" style="width:100%;padding:30px;align-text:center;">
            <center>
                <?php
                if($score5==0){
                    ?>
                   <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h3 style="font-family: 'Orbitron', sans-serif;">My Score : <b><?php echo $score5 ; ?> </b></h3><br>
                       </div>
                   </div>
                   <?php
                }
                elseif($score5>0 && $score5<20){               
                   ?>
                   <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h3 style="font-family: 'Orbitron', sans-serif;">My Score : <b><?php echo $score5 ; ?></b> </h3><br>
                       </div>
                   </div>
                   <?php
                }
                elseif($score5>=20){               
                    ?>
                    <div class="container">
                        <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                            <h3 style="font-family: 'Orbitron', sans-serif;">My Score : <b><?php echo $score5 ; ?></b> </h3><br>
                        </div>
                    </div>
                    <?php
                 }
            }
        }
    }?>
                </center>
            </div>
        </div>
        <div class="container cer">
            
            <div style="padding-top:60px;" class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <div style="padding-top:0px;padding-bottom:50px;" class="container">
                        <div style="width:100%;height:auto;">
                        <img style="width:100%;height:auto;" src="certificates/29.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
               
                <p style="padding-left:30px;">Hello Devs! <br>
                Get yourself certified with our professional certificates as a proof of your work and share on platforms like LinkedIn, etc. <br>
                We are providing 3 different certificates</p>
               
                <ol>
                <li><h5 style="color:#6c63ff"><b>bootcamp certificate :</b></h5> <p>This shows that you successfully completed bootcamp and started your journey toward moderate experience </p> </li>
                <li><h5 style="color:#6c63ff"><b>Moderate certificate :</b></h5> <p>This shows that you successfully completed Moderate and started your journey toward Expert experience</p></li>
                <li><h5 style="color:#6c63ff"><b>Expert certificate :</b> </h5><p>This shows that you successfully completed Expert and You are a pro developer now</p></li>
                </ol>
                
                </div>
            </div>
        </div>
        <div style="width:100%; height:auto;padding-top:40px;padding-bottom:40px;" class="certify">
            <div class="container">
            <div class="row">
                <div  class="col-xs-12 col-sm-4 col-lg-4 my-3">
                    <div style="background:#6c63ff;text-align:center;">
                    <?php
                    if($score5>9){
                        
                        echo'
                        <div style="padding:50px">
                        <form action="expand.certificate.php" method="post" style="text-align:center;">
                            <input type="hidden" value="1" name="certificate_id" placeholder="" />
                            <div style="padding-top:0px;"><button style="background:#6c63ff" type="submit" class="forum-btn btn-f">Get Certificate</button></div> 
                        </form>
                        </div>  ';                      
                        
                    } 
                    else{
                        echo'
                        <div style="padding:50px"><a  class="forum-btn btn-f" href="">UNLOCK AT 10 🔒</a></div>
                        ';
                    } 
                    ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 my-3">
                    <div style="background:#6c63ff;text-align:center;">
                    <?php
                    if($score5>49){
                        ?>
                        <div style="padding:50px">
                        <form action="expand.certificate.php" method="post" style="text-align:center;">
                            <input type="hidden" value="2" name="certificate_id" placeholder="" />
                            <div style="padding-top:0px;"><button type="submit" style="background:#6c63ff" class="forum-btn btn-f">Get Certificate</button></div> 
                        </form>
                        <!-- <a  class="forum-btn btn-f" href="expand.certificate.php?certificate_id=2"> Get My Certificate</a> -->
                        </div>
                        
                        <?php
                    } 
                    else{
                        ?>
                        <div style="padding:50px"><a class="forum-btn btn-f"  href="">UNLOCK AT 50 🔒</a>
                        </div>
                        <?php
                    } 
                    ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-4 my-3">
                    <div style="background:#6c63ff;text-align:center;">
                    <?php
                    if($score5>99){
                        ?>
                        <div style="padding:50px">
                        <form action="expand.certificate.php" method="post" style="text-align:center;">
                            <input type="hidden" value="3" name="certificate_id" placeholder="" />
                            <div style="padding-top:0px;"><button style="background:#6c63ff" type="submit" class="forum-btn btn-f">Get Certificate</button></div> 
                        </form>
                        </div>                        
                        <?php
                    } 
                    else{
                        ?>
                        <div style="padding:50px"><a  class="forum-btn btn-f"  href="">UNLOCK AT 100 🔒</a></div>
                        <?php
                    } 
                    ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php
}
else{?>
<div class="container cer">
            
            <div style="padding-top:60px;padding-bottom:40px;" class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <div style="padding-top:0px;padding-bottom:50px;" class="container">
                        <div style="width:100%;height:auto;">
                        <img style="width:100%;height:auto;" src="certificates/29.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
               
                <p style="padding-left:30px;">Hello Devs! <br>
                Get yourself certified with our professional certificates as a proof of your work and share on platforms like LinkedIn, etc. <br>
                We are providing 3 different certificates</p>
               
                <ol>
                <li><h5 style="color:#6c63ff"><b>bootcamp certificate :</b></h5> <p>This shows that you successfully completed bootcamp and started your journey toward moderate experience </p> </li>
                <li><h5 style="color:#6c63ff"><b>Moderate certificate :</b></h5> <p>This shows that you successfully completed Moderate and started your journey toward Expert experience</p></li>
                <li><h5 style="color:#6c63ff"><b>Expert certificate :</b> </h5><p>This shows that you successfully completed Expert and You are a pro developer now</p></li>
                </ol>
                
                </div>
            </div>
        </div>
        
<?php } ?>


    <?php
    include 'partials/footer.php';
    ?>
    <script src="abc.js"></script>
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