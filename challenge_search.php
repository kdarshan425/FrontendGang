<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/challenges.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 233px;
        }
        .chalbg{
    background: url('img/finalbgdone.png') no-repeat ;
    background-size: contain;
    background-repeat:repeat;
}
        @media (min-width: 1200px){
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 1240px;
        }}
       
    </style>
    <title>Frontendgang | Search Challage</title>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    

    <div class="container my-3">
    <h1 style="font-family: 'Orbitron', sans-serif;" class="py-3"><center>Search Results For<em>"<?php echo $_GET['search']?>"</center></h1>
        
    <div class="challenges container my-4" id="ques">
        <div class="row " data-masonry='{"percentPosition": true }'>    
       <?php
        $noresults = true;
        $query = $_GET['search'];
        $query = str_replace("<", "&lt;", $query);
        $query = str_replace(">", "&gt;", $query);         
        $query = str_replace("'", "\\'", $query);
        
        $sql2 = "SELECT * FROM `challenges` WHERE MATCH (`challenge_heading`,`challenge_desc`,`level`,`languages`) against ('$query') ORDER BY `created` DESC";
        $result = mysqli_query($conn, $sql2);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            
            $id = $row['challenge_id'];
            $image = $row['image'];
            $languages = $row['languages'];
            $level = $row['level'];
            $heading = $row['challenge_heading'];
            $desc = $row['challenge_desc'];            
            $noresults = false;
            include 'partials/dbconnect.php';
            
           
            echo'
            <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                    <div class="card" style="padding:0px;box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);">
                        <div class="container chal-card-img" style="padding-right: 0px; padding-left: 0px;">
                        <div class="chalbg" style="padding: 20px;">
                        <img src="challenges/'.$heading.'/'. $image .'" style="padding:0px;height:auto; width:100%"class="card-img-top" alt="...">
                        </div>                        
                        </div>                    
                        <div class="card-body chal-card-body" style="align-item:center; padding: 2.15rem;">
                            <div class="rowc" style="width:100%">
                                <div class="colc1" ><p>'. $languages .'</p></div>
                                <div class="colc2" style="width:30%"><p style="font-size: 15px;">'. $level .'</p></div>
                            </div>                        
                            <h5 class="card-title" style=" line-height: 1.3;">'. $heading .'</h5>
                            <p class="card-text" style="border-bottom: 4px dotted rgba(73, 93, 207, 0.20012);padding-bottom:30px;">'. substr($desc, 0, 90) .'...</p>
                            <div class="container chall-but"><a href="expandchallenge.php?challenge_id='. $id .' " style="background-color:#6c63ff" class="btn btn-primary">View challenge</a></div>
                        </div>
                    </div>
                </div>
                
                ';            
        }
        
        if($noresults){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="container" style="padding:20px;">
                    <p class="display-4"> No Results Found</p>
                    <p class="lead"> 
                    Suggestions:
                    <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    </ul>
                    </p>
                </div>
            </div>
         </div>';
        }
        
        ?>
       
        
    </div>

    <script src="abc.js"></script>
    <!-- Optional JavaScript -->
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