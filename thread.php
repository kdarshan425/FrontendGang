<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
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
    
    h1{
        font-family: 'Orbitron', sans-serif;
    }
    .btn1.btn--blue1:hover {
        background-color:white;
        color: #6c63ff;
        text-decoration: none;
    }
    
    </style>
    <title>FrontendGang | Forum</title>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php
    $id = $_GET['threadid'];
    $cat_id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of OP
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
    }
    
    ?>
    

    <?php
    
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //Insert into comment db
        $comment = $_POST['comment']; 
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment); 
        $comment = str_replace("'", "\\'", $comment);

        $sno = $_POST['sno']; 
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `cat_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$cat_id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        } 
    }
    ?>


    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h3 style="font-size: 1.5rem;" class="display-4"><b><?php echo $title;?></b></h3>
            <p class="lead"> <?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p>Posted by: <em><?php echo $posted_by; ?></em></p>
            </div>
    </div>
    
     <?php 
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
        echo '<div class="container">
            <center>
            <h1  class="py-2">Post a Comment</h1> 
            <form style="padding-top:40px;" action= "'. $_SERVER['REQUEST_URI'] . '" method="post"> 
                <div class="form-group" style="padding-bottom:40px;">
                    <label for="exampleFormControlTextarea1"><b>Type your comment</b></label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"  required></textarea>
                    <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                </div>
                <center><button  type="submit" class="btn1 btn--blue1">Post Comment</button></center>                
            </form> 
            </center>
        </div>';        
    }
    else{
        echo '
        <center>
        <div class="container">
        <h1 class="py-2">Start a Discussion</h1> 
           <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
        </div>
        </center>
        ';
    }
    
    
    
    ?>


    <div style="padding-top:30px;" class="container mb-5" id="ques">
    <center><h1 class="py-4">Discussions</h1></center>
        
       <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content']; 
        $comment_time = $row['comment_time']; 
        $thread_user_id = $row['comment_by']; 

        $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $comment_by_p = $row2['user_email'];
        $comment_by_n = $row2['user_name'];
        global $comment_by_p;
        global $comment_by_n;

        echo '<div class="media my-3">
            <img src="img/woman.svg" width="54px" class="mr-3" alt="...">
            <div class="media-body">
               <p class="font-weight-bold my-0"><a class="text-dark " href="visitprofile.php?user=' .$row2['user_name']. '"> '. $row2['user_name'] . '</a><br>at '. $comment_time. '</p> '. $content . '
            </div>
        </div>';

        }
        // echo "this is good";
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead"> Be the first person to comment</p>
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