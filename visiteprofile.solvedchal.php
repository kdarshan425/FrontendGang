<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/challenges.style.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>FrontendGang | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .Profile-img-back{
        width:100%;
        padding-left: 25%;
        padding-top:50px;
    }
    @media screen and  (max-width: 600px) {
        .Profile-img-back{
        width:100%;
        padding-left: 25%;
        padding-top:20px;
    }
    }
    .Profile-img{
        height:150px;
         width:150px;
         border: 5px solid #ced4da;
          border-radius:50%;
        text-align:center;
    }
    .Profile-img h4 {
    font-size: 6rem;
    padding-top: 10px;
    }

    p,h5{font-family: 'Archivo', sans-serif;}

    h4, h1{
        font-family: 'Orbitron', sans-serif;
    }
        .user-image{
           
              height:200px;
              width:200px;
        }

        .row.profile{
            border:2px solid #ced4da;
            background:#f2f2ff;
            padding-bottom:30px;
        }
       
        .edit-img{
            border:2px solid gray;
            border-radius:50%;
            padding:5px;
            right:20px;
            z-index:0;
            position: relative;
        }
        
        .chalbg{
    background: url('img/finalbgdone.png') no-repeat ;
    background-size: contain;
    background-repeat:repeat;
}
      </style>
</head>
<body>
    <?php include 'partials/dbconnect.php';?>

<div class="container" style="padding-top:30px;">
<center>
<h5 style="color:#6c63ff;">Solved Challenges</h5>
</center>
</div>
<div class="outer" style="width:100%;padding-bottom:70px;">
    <div  style="width:100%;align-text:center;padding-top:10px;">
        <div class="challenges  my-4">
           <div class="row " data-masonry='{"percentPosition": true }'>
        

                <?php
                
                $showAlert = false;
                $sum = 0;
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                    $sql1 = "SELECT * FROM `users_challenges` WHERE `user_id`='$visited_id' and `status_challenge`='Submited' ORDER BY `id` DESC  ";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)==0) {
                        echo '
                        <div style="padding-bottom:30px;" class="container">
                        
                        <center>
                        <p class="lead"> No challenge submited yet!  </p>
                        </center>                                 
                        
                     </div> ';
                    }
                    while($row = mysqli_fetch_assoc($result1)){
                        
                        $id1 = $row['challenge_id'];
                        $u_id = $row['user_id'];
                        $status = $row['status_challenge'];
                        $liveurl = $row['liveurl'];
                        $codelink = $row['codelink'];
                        
                        $user_id = $_SESSION['sno']; // $_SESSION['id'] We'll get the user_id from the session
                    // We will select all the entries from the user_items table where the item_id is equal to the item_id we passed to this function, user_id is equal to the user_id in the session and status is 'Added to cart'
                      
                        if(($status=="Submited")&&($u_id ==$visited_id)){                

                            $sql = "SELECT * FROM `challenges` ";
                            $result5 = mysqli_query($conn, $sql);
                            $noResult = true;
                            while($row = mysqli_fetch_assoc($result5)){
                                $noResult = false;
                                $id = $row['challenge_id'];
                                $image = $row['image'];
                                $languages = $row['languages'];
                                $level = $row['level'];
                                $heading = $row['challenge_heading'];
                                $desc = $row['challenge_desc'];

                                if(($status=="Submited")&&($u_id ==$visited_id)){
                                    if($id==$id1){
                                    if($level=='Simple'){
                                        $sum+= 5;
                                    }
                                    elseif(($level=='Medium')){
                                        $sum+= 10;
                                    }
                                    else{
                                        $sum+= 15;
                                    }
                                    
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
                                                
                                                <div class="row">
                                                    <div style="padding:0px;margin-right:7px;" class="col"><div class="container chall-but"><a href="'.$liveurl.'" style="background-color:#6c63ff;border-radius: 5px;" class="btn btn-primary">Live URL</a></div>
                                                    </div>
                                                    <div style="padding:0px;" class="col"><div class="container chall-but"><a href="'.$codelink.'" style="background-color:#6c63ff;border-radius: 5px;" class="btn btn-primary">Code URL</a></div>
                                                    </div>
                                                </div>
                                                </div>                                           
                                        </div>
                                    </div>
                                    ';
                                }                
                            } 
                            
                            if (!$result5) {
                                
                            }
                            // mysqli_free_result($result5){
                            //     echo '<div class="jumbotron jumbotron-fluid">
                            //         <div class="container">
                            //             <p class="display-4">No Challenge submitted</p>                                    
                            //         </div>
                            //     </div> ';
                            //     }
                                                         
                        }
                        echo $noResult;
                        if($noResult==true){
                            echo '<div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                        <p class="display-4">No Challenge submitted</p>                                    
                                    </div>
                                 </div> ';
                        }                  
                    }                       
                                                                 
                } 
               
                 
            }
            ?>
        </div>
    </div>
    </div>
    </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    
</body>
</html>