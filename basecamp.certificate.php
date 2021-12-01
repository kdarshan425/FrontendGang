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
    
    <title>FrontendGang | Generate Certificate</title>
    <style>
    .d-thread-search{
        padding-left:0px;
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
        padding-left:0px;
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
    </style>
</head>
<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){?>
    <?php 
    $method = $_SERVER['REQUEST_METHOD'];
    $certificate_id = $_GET['certificate_id'];
    $user_id = $_SESSION['sno'];
    $sql3 = "SELECT * FROM `certificate` WHERE `id`='$certificate_id' ";
    $result3 = mysqli_query($conn, $sql3);
    while($row = mysqli_fetch_assoc($result3)){
        $cert_id = $row['id'];
        $cert_name = $row['name'];
        $cert_image = $row['image'];
        $cert_price = $row['price'];
        $sample = $row['sample_image'];
    }
    
    ?>
    <div class="container ch-head" style="text-align: center;">
        <h2>MY CERTIFICATE</h2>
    </div>
    
    <div class="container" style="padding-top:0px;padding-bottom:0px">        
        <div class="d-thread-search" style="">
        <?php
       
                        $sql1 = "SELECT * FROM `certficate_status` WHERE `certificate_id`='$certificate_id' AND `user_id`='$user_id'";
                        $result1 = mysqli_query($conn, $sql1);
                        while($row = mysqli_fetch_assoc($result1)){
                            $id_name = $row['id'];
                            $cert_id = $row['certificate_id'];
                            $u_id = $row['user_id'];
                            $status = $row['status'];                         
                            $user_id = $_SESSION['sno'];

                            if(($status==1)&&($u_id ==$user_id)&&($cert_id==$certificate_id)){  
                                echo'
                                <center>
                                <form action="'. $_SERVER["REQUEST_URI"] . '" class="d-flex" style="padding-right: 10px; align-items:center"  method="post">     
                                    <div style="display:flex;" >
                                    <div style="padding-top:0px;">
                                    <input style="height: calc(1.5em + .75rem + 2px);box-shadow: 2px 2px 5px rgba(0,0,0,0.2);-webkit-box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);" type="text" name="name" class="thread-search form-control me-4"  placeholder="Your Name"  required>
                                    </div>                                    
                                    <button style="height: calc(1.5em + .75rem + 2px);box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);box-shadow: 2px 2px 5px rgba(0,0,0,0.2);border:none;background-color:#6c63ff;color:white;border-radius:0;" class="btn1 " name="submit" type="submit">Submit</button>
                                    </div>    
                                    <div style="padding-top:20px;">
                                    <h5>Enter Your name correctly! You can submit only once!</h5> 
                                    </div> 
                                    
                                </form>        
                                </center>       
                                ';
                            }
                            else{

                            }
                        }
        

        ?>
         
        </div>
        
        <div class="container">
            <div style="padding-top:40px;" class="container ch-head" style="text-align: center;">
                <h2>Example Certificate</h2>
            </div>
            <div style="padding-top:20px;padding-bottom:60px;">
            <center>
            <img class="example_certificate"  src="<?php echo $sample; ?>" alt="">
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
if (isset($_POST['submit'])) {
    if($method=='POST'){  
        $font = dirname(__FILE__) . '/AGENCYR.ttf';
        $font = mb_convert_encoding($font, 'big5', 'utf-8');
        $image = imagecreatefromjpeg($cert_image); 
        $color = imagecolorallocate($image,19,21,22);
        $color1 = imagecolorallocate($image,144,144,144);
        $name = $_POST['name'];
        imagettftext($image,90,0,1250,1100,$color,$font,$name);
        $date = date('d F Y');
        imagettftext($image,60,0,680,1870,$color,$font,$date);
        $certificate_no = $id_name;
        imagettftext($image,60,0,940,2000,$color,$font,$certificate_no);
        $certificate_pf = "Verify at : http://localhost/frontendgang/verify.php";
        imagettftext($image,60,0,420,2150,$color1,$font,$certificate_pf);
        $file_path = "certificates/".$id_name.".jpg";
        $file_path_pdf = "certificates/".$id_name.".pdf";
        imagejpeg($image,$file_path);
        imagedestroy($image);
        
        require('fpdf.php');
        $pdf = new FPDF('L','mm',array(150,210));
        $pdf->AddPage();
        $pdf->Image($file_path,0,0,210,150);
        $pdf->Output($file_path_pdf,"F");

        
        $sql1 =  "UPDATE `certficate_status` SET `status` = '2', `image_name` = '$id_name.jpg' WHERE `user_id` = '$user_id' AND `certificate_id` = '$certificate_id'";
        $result = mysqli_query($conn, $sql1);
        
        if($result){
            header("Location: download_certificate.php?certificate_id=$certificate_id");
        }
        else{
            echo'not able to create certificate please describe issue in contact us section';
        }
    }
        
}
?>