<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/expandchallenge.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
    <title>FrontendGang | Challange </title>
    <style>
      
.exp-caro img{
    width: auto;
    height: 450px;
}

@media screen and (max-width: 600px) {
    .exp-caro img{
        width: 100%;
        height: auto;
    }
}


@media screen and (max-width: 800px) {
    .exp-caro img{
        width: 100%;
        height: auto;
    }
}

</style>
</head>
<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php include 'partials/check_if_started.php';?>
    <?php include 'partials/check_if_submited.php';?>
    
    <?php 
    
    $id = $_GET['challenge_id'];

    
    $sql = "SELECT * FROM `challenges` WHERE challenge_id=$id";
    $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $cid = $row['challenge_id'];
                $image = $row['image'];
                $mob_image = $row['mobile_image'];
                $tab_image = $row['tablet_image'];
                $laptop_image = $row['laptop_image'];
                $languages = $row['languages'];
                $level = $row['level'];
                $heading = $row['challenge_heading'];
                $desc = $row['challenge_desc'];
                $created = $row['created'];   

    
    echo'
    <div class="container" style="padding-bottom:50px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 my-3 exp-caro">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div style="background:#f2f2ff;" class="carousel-inner">';
                    if (!empty($laptop_image)){
                        echo'
                        <div style="background:#f2f2ff" class="carousel-item active">
                            <center>
                            <img src="challenges/'.$heading.'/'. $laptop_image .'"   alt="...">
                            </center>
                        </div>
                        ';
                     }
                     if (!empty($tab_image)){
                        echo'
                        <div class="carousel-item " style="background:#f2f2ff;" >
                            <img src="challenges/'.$heading.'/'. $tab_image .'"  alt="...">
                        </div>
                        ';
                     }
                     if (!empty($mob_image)){
                        echo'
                        <div class="carousel-item" style="background:#f2f2ff;">
                            <img  src="challenges/'.$heading.'/'. $mob_image .'"  alt="...">
                        </div>
                        ';
                     }echo'                    
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>                
            </div>';
                  
           
                echo '
                     
            </div>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-6 my-3">
            <div class="container ">
                <div class="exp-1">
                    <div class="exp-3">
                        <h5 style="font-size: 1.35rem;" class="exp-h5">'. $languages .' </h5>
                        <h2 style="font-size: 2.25rem;" class="exp-h2">'. $heading .'</h2>
                        <h5 style="font-size: 1.25rem;" class="exp-h5">LEVEL OF PROBLEM : '. $level .'</h5>
                        <div class="exp-2 " style="padding-top: 20px;" >
                            <div class="row" style="width:100%">
                                <div class="col">';?>
                                <?php 
                                    if (!isset($_SESSION['useremail'])) { ?>
                                    <button onclick="myFunction8()" class="dropdown-btn4 regbtn">REGISTER</button>
                                    
                                        <?php
                                    } else {
                                        //We have created a function to check whether this particular product is added to cart or not.
                                        if (check_if_started($cid)) {//This is same if(check_if_added_to_cart != 0)
                                            echo '<a href="interchallenge.php?challenge_id='.$cid .'" class="exp-btn btn--voi" disabled>Resume</a>';
                                        }
                                        elseif(check_if_submited($cid)){
                                            echo '<a href="interchallenge.php?challenge_id='.$cid .'" class="exp-btn btn--voi" disabled>Submited</a>';
                                        }
                                        else {
                                            ?><?php
                                            echo'
                                            <a href="start_challenge.php?id='.$cid .'"  class="exp-btn btn--voi">Start</a>';
                                            ?>
                                            <?php
                                        }
                                    }
                                    ?>                                          
                                </div>
                                <?php echo'
                                
                            </div>
                                            
                        </div>
                    </div>
                </div>                    
            </div>
        </div>    
        <div class="getstart col-xs-12 col-sm-12 col-lg-6 my-3 ">
                    <div class="container">
                    <h2 class="brief">Getting Started</h2>
                    <ol style="text-align:left;">
                        <li>Download starting file. </li>
                        <li>Go through all files</li>                       
                        <li>Setup your project </li>
                        <li>Happy Coding! </li>
                    </ol>
                    </div>                
                </div>   
        <div class="getstart col-xs-12 col-sm-12 col-lg-6 my-3 ">
                    <div class="container">
                        <h2 class="brief">Description of task</h2>
                        <h5 style="font-size: 1.35rem;" class="exp-h5">'. $desc .'</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6 my-3" >
                    <div class="exp-5">
                        <div class="container"></div>

                        <h2 class="brief">General Instructions</h2>
                        <ol style="text-align:left;">
                            <li>Your task is to develope the component / page as given in the instruction.</li>
                            <li>Try to get its looking as close to the design as possible.</li>
                            <li>You can use any 🧰tools / ➕libraries which helps you to get desired task.</li>
                            <li>You can add any 🔆animations, 🤟effects, etc. which helps your page to look attractive. </li>
                            <li>Please download the starting files required for the task.</li>
                            <li>If you have any problem related to task then send it in 👬forum section.</li>
                        </ol>       
                    </div>         
                </div>                
            </div>
        </div>';
}
?>
    <?php
    include 'partials/footer.php';
    ?>
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