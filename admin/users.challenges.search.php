<?php
session_start();
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"]==true){
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="admin.header.styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link rel="stylesheet" type="text/css" href="admin.homepage.styles.css">
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
    <title>Frontendgang | Search User Challenges</title>
</head>

<body>
    <?php include '../partials/dbconnect.php';?>
    <?php        
        include 'admin.header.php';
    ?>
    <div class="container my-3">

    
    <h1 style="font-family: 'Orbitron', sans-serif;" class="py-3"><center>Search Results For<em>"<?php echo $_GET['search']?>"</center></h1>

    
    
    <div class="challenges container my-4">
        <div class="row " data-masonry='{"percentPosition": true }'>
        <?php
        $noresults = true;
        $query = $_GET['search'];
        $query = str_replace("<", "&lt;", $query);
        $query = str_replace(">", "&gt;", $query);         
        $query = str_replace("'", "\\'", $query);

        
        
        $sql2 = "SELECT * FROM `challenges_by_users` WHERE MATCH (`title`,`chal_desc`,`challenged_by`) against ('$query') ORDER BY `timestamp` DESC";
        $result = mysqli_query($conn, $sql2);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];           
            $languages = $row['language'];
            $level = $row['level'];            
            $heading = $row['title'];
            $desc = $row['chal_desc'];
            $live_url = $row['live_url'];
            $code_url = $row['code_url'];
            $noresults = false;
            $challenged_by = $row['challenged_by'];


            include '../partials/dbconnect.php';
            
            echo'
            <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
            <div class="card" style="padding:0px;box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);">              
                <div class="card-body chal-card-body" style="align-item:center; padding: 2.15rem;">
                    <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Heading : '.$heading.'</h5>
                    <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Challenged by : <a class="text-dark "href="../visitprofile.php?useremail='.$challenged_by .'"> '.$challenged_by .'</a> </h5>                    
                    ';
                    if (!empty($live_url)){
                        echo'
                        <div>
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Live Preview <a href="'.$live_url.'">View</a></h5>
                        </div>';
                        }
                        if (!empty($code_url)){
                        echo'
                        <div>
                            <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Code Preview <a href="'.$code_url.'">Code</a></h5>
                        </div>';
                        }
                        echo'
                    <div class="container chall-but"><a href="users.expand.challenges.php?challenge_id='. $id .' " style="background-color:#6c63ff" class="btn btn-primary">View challenge</a></div>
                </div>
            </div>
        </div>';
                  
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
}
        ?>
       
        </div>
        </div>
    </div>

    <script src="abc.js"></script>
    <!-- Optional JavaScript -->
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