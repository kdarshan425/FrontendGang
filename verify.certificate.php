<?php
$found=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'partials/dbconnect.php';        
    $id = $_POST['id'];  
    $id = str_replace("<", "&lt;", $id);
    $id = str_replace(">", "&gt;", $id); 
    $id = str_replace("'", "\\'", $id);  
    $query = "SELECT * FROM `certficate_status` WHERE `id`='$id';";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
      
    if($numRows==1){    
        $found=true;
        while($row = mysqli_fetch_assoc($result)){
            $id1 = $row['certificate_id'];
            $u_id = $row['user_id'];
          
        }}
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontendGang | Verify Certificate</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/challenges.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    h4{
        font-family: 'Archivo', sans-serif ;
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
.forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 1rem 1rem;
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

    </style>
</head>
<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
   
    <div class="container">
        <div class="inneradmin" style="padding-bottom:60px;">
            <div style="padding-top:0px;" class="container ch-head" style="text-align: center;">
                <h2>Verify Certificate</h2>
            </div>
            <div class="container">
            <?php 
            if($found==true){
                $existsql = "select * from `users` where `sno` = '$u_id' ";
                //$sql = "SELECT * FROM `users` WHERE user_email = $user1"; 
            
                
                $result = mysqli_query($conn, $existsql);
                while($row = mysqli_fetch_assoc($result)){
                    $noResult = false;
                    $email = $row['user_email'];
                    $score = $row['user_score'];
                    $Name = $row['Name'];
                }
                    
                ?>
                <div class="container">
                    <center>
                    <h5 style=" font-family: 'Archivo', sans-serif ;">Name : <?php echo $Name;?></h5>
                    <h5 style=" font-family: 'Archivo', sans-serif ;">Email : <?php echo $email;?></h5>
                    <h5 style=" font-family: 'Archivo', sans-serif ;"> Status : Certified</h5>
                    </center>
                </div>                
                <div style="padding-top:20px;padding-bottom:60px;">
                <center>
                <img class="example_certificate" src="certificates/<?php echo $id;?>.jpg" alt="Certificate">
                </center>
                </div>
                <div style="padding-bottom:50px;">
                    <center>
                    <div><a class="forum-btn btn-f" href="certificates/<?php echo $id;?>.pdf" Download> Download Certificate</a></div>
                    </center>   
                </div>
            <?php
            }
            else{
                echo'
                <div class="container" style="padding:50px;">
                    <center>
                    <h4>Not Found!</h4>
                    </center>
                </div>   
                
                ';
            }
            ?>
            
    
        </div>
        </div>        
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