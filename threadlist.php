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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
   <style>
   .btn1 {
        position: relative;
        border: 2px solid;
        border-radius: 5px;
        padding: 1.2rem 2rem;
        font-size: 1.15rem;
        font-weight: 500;
        letter-spacing: 0.25px;
        line-height: 1.5rem;
        cursor: pointer;
        overflow: hidden;
        transition: all .3s, outline 0s;
        transition: all .3s, outline 0s;
        width: 200px;
        text-align: center;
    }

    .btn1.btn--blue1 {

        background-color: #6c63ff;
        color: white;
    }

    .btn1.btn--blue1:hover {
        background-color: white;
        color: #6c63ff;
        text-decoration: none;
    }

    #ques {
        min-height: 433px;
    }
    html{
        font-size:100%;
    }
    .font{
        font-family: 'Raleway', sans-serif;
    }
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
         width:600px !important;
         padding-left:40px;
    }
    .d-thread-search{
        padding:70px;
        padding-left:0px;
    }
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

    </style>
    <title>FrontendGang | Forum</title>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `challenges` WHERE challenge_id=$id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['challenge_id'];
                $image = $row['image'];
                $languages = $row['languages'];
                $level = $row['level'];
                $heading = $row['challenge_heading'];
                $desc = $row['challenge_desc'];
    
    }
    
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title); 
        $th_title = str_replace("'", "\\'", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc); 
        $th_desc = str_replace("'", "\\'", $th_desc);

        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div style="margin-bottom: 0rem;" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added! Please wait for community to respond
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
           </div>
            ';
        } 
    }
    ?>


    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h3 style="font-size: 1.5rem;" class="display-4"><b>Welcome to <?php echo $heading;?> forums</b></h3>
            <p class="lead"> <?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            </div>
    </div>

    <div class="container" style="padding-top:0px;padding-bottom:0px">        
        <div class="d-thread-search" style="">
        <center>
        
        <form class="d-flex" style="padding-right: 10px; align-items:center" action="searchthreads.php" method="get">
            <input type="hidden" name="challenge_id" value="<?php echo $id ?>">
            <div style="display:flex;">
            <div style="padding-top:10px;"><input style="box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);" class="thread-search form-control me-4" type="search" name="search" placeholder="Search threads" aria-label="Search">
            </div>
            <button style="box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);background-color:#6c63ff;color:white;border-radius:0px;width: 80px;" class="btn " type="submit">Search</button>
        </div>
        </form>        
        </center>        
        </div>
    </div>
    
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">';?>
            <h1 style="font-family: 'Orbitron', sans-serif;text-align:center;" class="py-3">Start a Discussion</h1> 
            <?php echo'
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
                <center>
                <div style="padding-top:20px;" class="form-group">
                    <label style="padding-bottom:10px;" placeholder="" for="exampleInputEmail1"><b>Problem Title</b></label>
                    <input style="height:2.2rcm;" type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"  required>
                    
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <div style="padding-bottom:40px;" class="form-group">
                    <label style="padding-bottom:10px; for="exampleFormControlTextarea1" ><b>Ellaborate Your Concern</b></label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"  required></textarea>
                </div>
                <button style="background-color:#6c63ff;" type="submit" class="btn1 btn--blue1">Submit</button>
            
                </center>        
                </form>
        </div>';
    }
    else{
        echo '
        <div class="container">
        <h1 class=" font py-3"><center>Start a Discussion</center></h1> 
           <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
        </div>
        ';
    }

    ?>
    
    <div class="container mb-5" id="ques">
        <h1  style="padding-top:40px;font-family: 'Orbitron', sans-serif;" class=" font"><center>Browse Questions</center></h1>
    <?php
    $page = $_GET['page'];
    if($page=="" || $page=='1'){
        $page1=0;
    }
    else{
        $page1=($page*10)-10;
    }
    $id = $_GET['catid'];
    $page = $_GET['page'];

    $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`=$id ORDER BY `timestamp` DESC limit $page1,10 "; 
    $sql2 = "SELECT * FROM `threads` WHERE thread_cat_id=$id "; 
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $noResult = true;
    $cou = mysqli_num_rows($result2);
    $a=$cou/10;
    $a=ceil($a);
    echo"<br>"; echo "<br>";
    ?>

    <div class="wrapper-pagicnation"  style="overflow-x:auto;">
        <ul class="pagination">
            <li class="page-item <?php if($page==1){echo 'disabled';} else{echo'';}?>">
            <a class="page-link" href="threadlist.php?catid=<?php echo $id;?>&& page=<?php echo $page-1 ;?>" tabindex="<?php echo $page ?> -1">Previous</a>
            </li>
            
            <?php for($b=1;$b<=$a;$b++){?>        
                <li class="page-item">
                <div class="active">
                <a class="page-link " href="threadlist.php?catid=<?php echo $id;?>&& page=<?php echo $b;?>"><?php echo $b."";?></a>   
                </div>             
                </li>
            <?php }  ?>    
            
            
            <li class="page-item">
            <a class="page-link" href="threadlist.php?catid=<?php echo $id;?>&& page=<?php echo $page+1 ;?>">Next</a>
            </li>
        </ul>
    </div>   
    
    <?php
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc']; 
        $thread_time = $row['timestamp']; 
        $thread_user_id = $row['thread_user_id']; 
        $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        



        echo '<div class="media my-3">
            <img src="img/man.svg" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. ' && catid='.$_GET['catid'].'">'. $title . ' </a></h5>
             <div class="font-weight-bold my-0"> Asked by:<a class="text-dark " href="visitprofile.php?user='.$row2['user_name']. '"> '. $row2['user_name'] . '</a><br> at '. $thread_time. '</div>
                <p>'. $desc . '</p>
             </div>'.''.
        '</div>';

        }
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Threads Found</p>
                        <p class="lead"> Be the first person to ask a question</p>
                    </div>
                 </div> ';
        }
    ?>

    </div>

   <script>
    setTimeout(function () {
  
  // Closing the alert
  $('.alert').alert('close');
    }, 5000);
    </script>
    <!-- Optional JavaScript -->
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