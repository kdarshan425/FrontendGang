<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_POST['certificate_id'];
?>
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
    .d-thread-search{
        padding-left:20px;
        padding-right:10px;
        padding-top:30px;
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
         padding-left:40px
    }
    .d-thread-search{
        padding:10px;
        padding-left:200px;
    }
}

.example_certificate{
    width:100%;
    height:auto;
}
@media only screen and (min-width: 800px) {
    .example_certificate{
    width:50%;
    height:auto;
}
}
a.forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 1rem 2rem;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 3.5rem;
  cursor: pointer;
  overflow: hidden;
  width: 150px;
  font-family: 'Orbitron', sans-serif;
}

.forum{
  padding-top: 20px;
  overflow: auto;
  background-color: white;
}
.forum-in{
  padding: 70px;
  background-color:#6b63ff3a;
}

a.forum-btn.btn-f{
  background-color:#6c63ff;
  color: white;
  width: 200px;
  box-shadow: 2px 1px 4px 2px rgba(0,0,0,0.4) !important;
  transition: ease-in-out 1s !important;
}

a.forum-btn.btn-f:hover{
  background-color:#6c63ff;
  color: white;
  width: 200px;
  box-shadow:inset 1px 1px 4px 2px rgba(0,0,0,0.4) !important;
  text-decoration: none;
  
}
    </style>
</head>
<body>
<?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php include 'partials/certificate_check_if_paid.php';?>
    <?php include 'partials/certificate_check_if_generated.php';?>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        $uid = $_SESSION['sno'];

        $sql = "SELECT * FROM `certificate` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $cid = $row['id'];
            $name = $row['name'];
            $image = $row['image'];
            $sample = $row['sample_image'];
            
        } 
              
    ?>       
    
    <div class="container ch-head" style="text-align: center;">
        <h2><?php echo $name; ?> Certificate</h2>
    </div>
    
    


    <div class="container" style="padding-top:0px;padding-bottom:0px">        
        <div style="background:#6b63ff3a;padding-top:60px;padding-bottom:60px;">
        <center>
        <div>
            <?php
            if (check_if_paid($cid)) {//This is same if(check_if_added_to_cart != 0)
                echo '<a class="forum-btn btn-f" href="basecamp.certificate.php?keyid=Narshadshabasu34 && certificate_id='.$cid.'" >Get my certificate</a>';
            }
            elseif(check_if_generated($cid)){
                echo '<a class="forum-btn btn-f" href="download_certificate.php?keyid=Narshadshabasu34 &&certificate_id='.$cid.'" >Download </a>';
            }
            else {
                echo'<a class="forum-btn btn-f" href="razorpay/index.php?u='.$uid.'&&certificate_id='.$cid.'"> Get My Certificate</a>';
                
            }
            ?>
            
        </div>
        </center>        
        </div>
        
        <div class="container">
            <div style="padding-top:40px;" class="container ch-head" style="text-align: center;">
                <h2>Sample Certificate</h2>
            </div>
            <div style="padding-top:20px;padding-bottom:60px;">
            <center>
            <img class="example_certificate" src="<?php echo $sample; ?>" alt="">
            </center>
            </div>
        </div>
    </div>
    <?php
    include 'partials/footer.php';
        }
        else{
            ?>
               <div class="container">
                    <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                        <center>
                        <h3 style="font-family: 'Orbitron', sans-serif;">Login To Continue</h3>
                        <div style="padding:20px;">
                        <button onclick="myFunction8()" style="background:#6c63ff;color:white;" class="dropdown-btn4 regbtn">REGISTER</button>
                        </div>
                        </center>
                    </div>
                </div>
               <?php 
        }
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
<?php 
}
else{
    echo'
    <h1>Please start challenge</h1>';
}?>