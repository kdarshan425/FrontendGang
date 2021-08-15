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
    
    <title>Add Challenge | FrontendGang</title>
    <style>
        h5{
            line-height:35px;
        }
        li{
            color:black;
            font-family: 'Archivo', sans-serif;

        }
        .rules{
            font-family: 'Archivo', sans-serif;
            font-weight:400;
        padding-top:40px;
        padding-left:30px;
        color:#636392;
    }

    @media screen and (max-width:450px){
        .rules{
        padding-top:0px;
        padding-left:0px;
    }
    .second{
        flex-direction: column-reverse;
    }
    }
    a.exp-btn{
  position: relative;
  border: 2px solid;
  border-radius: 0px;
  padding: 1rem 2rem;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 3.5rem;
  cursor: pointer;
  overflow: hidden;
  transition: all .3s, outline 0s;
  transition: all .3s, outline 0s;
  width: 150px;
  font-family: 'Orbitron', sans-serif;
  text-decoration:none;
}
    </style>
</head>
<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <div style="padding-top:0px;" class="container ch-head" style="text-align: center;">
    <center>
    <h1 style="color: #8888A0;">Add challenge</h1>
    </center>        
    </div>

    <div class="container cer">            
        
        <div style="padding-top:40px;padding-bottom:0px;" class="row second">            
            <div class="col-xs-12 col-sm-6 col-lg-6">            
            <h2 style="text-align:center;" class="rules">Rules to post your challenge! </h2>
            
            <ol style="padding-top:30px;">
            <li><h5>Images or any other tools, which you are using in your challenge should have free license.</h5></li>
            <li><h5>It is better if you have live-Url of your challenge.</h5></li>
            <li><h5>It is better if you have code of your challenge.</h5></li>
            <li><h5>Make a folder of all essential files needed for your challenge, i.e. images, starting files, instructions, etc.<br>
                Note: Folder/File should be in .zip format.</h5></li>
            </ol>
            
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
            <center>
                <div style="padding-top:0px;padding-bottom:50px;" class="container">
                    <div style="width:100%;height:auto;">
                    <img style="width:auto;height:500px;" src="img/addchallenge2.png" alt="">
                    </div>
                </div>
            </center>
            </div>
        </div>

        <div style="padding-top:40px;padding-bottom:40px;" class="row">
            <div class="col-xs-12 col-sm-6 col-lg-6">
            <center>
                <div style="padding-top:0px;padding-bottom:50px;" class="container">
                    <div style="width:100%;height:auto;">
                    <img style="width:auto;height:500px;" src="img/addchallenge1.png" alt="">
                    </div>
                </div>
            </center>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
            
            <h2 style="text-align:center;" class="rules">Win amazing opportunities! </h2>
            
            <ol style="padding-top:30px;">
            <li><h5>Get yourself certified with our professional 'Challenger' certificate, After getting 10 responses within 60 days.</h5></li>
            <li><h5>After getting more than 50 responses whithin 60 days you'll get amazing goodies from us!</h5></li>
            <li><h5>You'll get amazing real world experience!</h5></li>
            <li><h5>You'll gain lots of knowledge!</h5></li>
            </ol>
            
            </div>
        </div>
    </div>
    <div style="width:100%;padding:0px 0px 80px 0px;">
        <center>
        <a href="addchallenge.user.php" style="background-color: #6c63ff;border:none;color:white;box-shadow: 12px 0px 48px 5px rgb(93 84 254 / 46%)  !important;" class="exp-btn btn--voi">Create Challenge</a>
        </center>
    </div>
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