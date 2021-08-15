<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 233px;
        }
        

    </style>
    <title>Frontendgang | Forums</title>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    

    <div class="container my-3">
    <h1 style="font-family: 'Orbitron', sans-serif;" class="py-3"><center>Search Results For<em>"<?php echo $_GET['search']?>"</center></h1>
        <?php
        $noresults = true;
        $query = $_GET['search'];
        $query = str_replace("<", "&lt;", $query);
        $query = str_replace(">", "&gt;", $query);         
        $query = str_replace("'", "\\'", $query);

        $chalid = $_GET['challenge_id'];
        
        $sql2 = "SELECT * FROM `threads`  WHERE MATCH (thread_title, thread_desc) against ('$query') ORDER BY `timestamp` DESC";
        $result = mysqli_query($conn, $sql2);
        while($row = mysqli_fetch_assoc($result)){
           
            $thread_time = $row['timestamp']; 
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $thread_user_id = $row['thread_user_id'];
            $thread_cat_id = $row['thread_cat_id'];
            $url = "thread.php?threadid=". $thread_id ;
            $noresults = false;

            include 'partials/dbconnect.php';
            $sql3 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $asked_by = $row3['user_email'];
            $asked_by_name = $row3['user_name'];
            
            if($thread_cat_id==$chalid){
            echo '<div class="media my-3">
            <img src="img/man.svg" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark " href="'.$url.'">'. $title . ' </a></h5>
             <div class="font-weight-bold my-0">Asked by: <a class="text-dark " href="visitprofile.php?user=' .$asked_by_name . '">'. $asked_by_name . '</a><br> at '. $thread_time. '</div>
                <p>'. $desc . '</p>
             </div>'.''.
        '</div>';
            // Query the users table to find out the name of OP
            }
            
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