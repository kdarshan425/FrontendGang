<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | FrontendGang</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/challenges.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
    .contactimg{
        width:100%;
        height:auto;
        padding-top:60px;
    }
    
    @media (max-width: 570px){
        .contactimg{
        width:100%;
        height:auto;
        padding-top:0px;
    }
    }
    @media (max-width: 800px){
        .contactimg{
        width:100%;
        height:auto;
        padding-top:40px;
    }
    }
    .form-control{
        border-radius: 5px;
    }
    </style>
</head>
<body>
    
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
    
    $existsql = "INSERT INTO `contact` (`id`, `email`, `name`, `title`, `description`, `timestamp`) VALUES (NULL, '$email', '$name', '$title', '$desc', current_timestamp());";
    $result = mysqli_query($conn, $existsql); 
    if($result){
        echo'
        <div style="margin-bottom: 0rem;" class="alert alert-success alert-dismissible fade show" role="alert">
        
         <strong>Your message sent successfully!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
         
        </div>';
    }
    else{
        echo'
        <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
        
         <strong>Your message not sent! some error occured.</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
         
        </div>';
    }
    }
    ?>
    <div style="padding-top:10px;" class="container ch-head" style="text-align: center;">
        <h2 style="color:#6d6d7d;">Contact Us</h2>
    </div>
    <div  class="container" style="padding-bottom:90px;">
    <div class="container" style="text-align:center;padding-bottom:30px;font-family: 'Archivo', sans-serif;">
    <center>
    <div style="max-width:500px;">
    <p style="color: #8888A0;font-size:20px;">If you're having any query, any suggession, any feedback, We are always there for you! Just post a message below We'll reach you soon in your mail..</p>
    <p style="color: #8888A0;font-size:20px;">Mail us at frontendgang@gmail.com<br>Or</p>
    </div>
    </center>       
    </div>
    
    <div style="box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);" class="row">        
                <div style="height:100%" class="col-xs-12 col-sm-12 col-lg-6">
                    <div style="padding-top:0px;padding-bottom:50px;" class="container">
                        <div class="contactimg" >
                        <img style="width:100%;height:auto;" src="img/contact.svg" alt="">
                        </div>
                    </div>
                </div>
                <div style="background:rgb(240 239 253)" class="col-xs-12 col-sm-12 col-lg-6">
                    <form method="post" action="<?php $_SERVER["REQUEST_URI"] ?>"  id="contact-form" >
                    <center>
                    <div style="max-width:350px;padding-top:40px;padding-bottom:30px;">
                        <div class="form-group">                            
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"  required>
                        </div>
                        <div class="form-group">                            
                            <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name"  required>
                        </div>
                        <div class="form-group">                            
                            <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Title"  required>
                        </div>
                        <div class="form-group">                           
                            <textarea name="desc" placeholder="Description" style="height:90px;" class="form-control" id="desc" name="desc" rows="3"  required></textarea>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </center>
                    </div>                        
                    </center>                
                    </form>
                </div>
            </div>
    
    </div>
    <?php
    include 'partials/footer.php';
    ?>
    <script>
     setTimeout(function () {
  
  // Closing the alert
  $('.alert').alert('close');
}, 5000);
</script>
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