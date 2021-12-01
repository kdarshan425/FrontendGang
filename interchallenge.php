<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="img/urllogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="styles/interchallenges.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>FrontendGang | Challange </title>
    <style>
    .landing{
    height: 100%;
    width: 100%;
    background-image: url("img/finalbgdone.png") !important ;
    background-position: center;
    background-size:contain;
    background-repeat:repeat;
    align-content: left;   
   position: relative;
   overflow: auto;

}
        .form-control {
            display: block;
            width: 100%;
            height: calc(2.5em + .75rem + 2px) !important;
            padding: .375rem .75rem;
            font-size: 1.1rem !important;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
        .form-lebel.lebel1{
            font-size: 1.3rcm !important;
        }
        .exp-btn{
            position: relative;
            border: 2px solid;
            border-radius: 0px;
            padding: 1rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.25px;
            line-height: 1.5rem;
            cursor: pointer;
            overflow: hidden;
            transition: all .3s, outline 0s;
            transition: all .3s, outline 0s;
            width: 150px;
            font-family: 'Orbitron', sans-serif;
        }
        
        .exp-btn.btn--voi{
            background-color:#6c63ff;
            color:white;
        }
        
        .exp-btn.btn--voi:hover {
            background-color: white;
            color: #6c63ff;
            text-decoration: none;
        }
        b.exp-btn-1.btn--voi-1{
            background-color:#6c63ff;
            color: white;
            width: 200px;
            box-shadow: 6px 6px 12px #6c63ff, -6px -6px 12px #6c63ff;
        }

        .exp-btn-1.btn--voi-1:hover{
            box-shadow: inset 6px 6px 12px #6c63ff, -6px -6px 12px #6c63ff;
        }

        
        .btn--voi:active{
            text-decoration: none;
        }
        
        .btn--voi:visited{
            text-decoration: none;
        }
        </style>
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    <?php include 'partials/check_if_submited.php';?>
    <?php      
    $id = $_GET['challenge_id'];
    $method = $_SERVER['REQUEST_METHOD'];
    $sum =0;
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        

        if (isset($_POST['already_submited'])) {
            if($method=='POST'){
                echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Already Submited!</strong> You can submit only once !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            }
            
        }

        

    
        
    
        $sql = "SELECT * FROM `challenges` WHERE challenge_id=$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $cid = $row['challenge_id'];
            $image = $row['image'];
            $languages = $row['languages'];
            $level = $row['level'];
            $heading = $row['challenge_heading'];
            $desc = $row['challenge_desc'];
            $file = $row['uploaded_file'];


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
        <div id="home">
            <div class="landing">
                <div class="landing-out">
                    <div class="landing-in">
                        <div style="-webkit-box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);border: 2px solid white;" class="in-div">
                        <h1>'. $heading .' </h1>  
                        <div class="dl-button">                     
                        <a href="challenges/'.$heading.'/'.$file.'"  class="exp-btn btn--voi">Download</a>  
                        </div> 
                        </div>                                  
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="container-1">            
                <div style="padding:70px;" class="submit-form">
                <h1 style="font-family: , sans-serif;">Submit Form</h1>
                </div>
                <form method="post" action="'. $_SERVER["REQUEST_URI"] . '"  id="contact-form">
                    <div class="mb-3">
                        <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Challenge Name <span style="color:red;font-size:18px;">*</span></label>
                        <div class="input-group flex-nowrap">                
                            <input name="Challengename" type="text" class="form-control" placeholder="Challengename" aria-describedby="inputGroup-sizing-lg" aria-label="Challengename" aria-describedby="addon-wrapping" required>
                        </div>                
                    </div>
                    <div class="mb-3">
                        <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Live-URL Link <span style="color:red;font-size:18px;">*</span></label>
                        <div class="input-group flex-nowrap">                
                            <input name="liveurl" type="text" class="form-control" placeholder="Live-URL Link" aria-label="live-url" aria-describedby="addon-wrapping" required>
                        </div>                
                    </div>
                    <div class="mb-3">
                        <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1">Code-link <span style="color:red;font-size:18px;">*</span></label>
                        <div class="input-group flex-nowrap">                
                            <input name="code-link" type="text" class="form-control" placeholder="Code-link" aria-label="Code-link" aria-describedby="addon-wrapping" required>
                        </div>                
                    </div>';
                    
                    
                    echo' 
                    <div class="mb-3">
                        <label style="font-size:1.3rcm;font-weight:bold;" for="validationTextarea" class="form-label lebel1"></label>
                        <div class="input-group flex-nowrap">                
                            <input name="score" type="hidden" value"'.$sum.'" class="form-control" placeholder="'.$sum.'" aria-label="Code-link" aria-describedby="addon-wrapping" required>
                        </div>                
                    </div>';
                    
                    
                    echo'
                    <div class="dl-button">';
                    if(check_if_submited($cid)){
                        echo '<button class="exp-btn btn--voi" type="submit" name="already_submited" >Already Submited</button> ';
                    }
                    else{
                        echo'<button class="exp-btn btn--voi" type="submit" name="submit"  >Submit</button> ';
                    }                   
                    echo'</div> 
                </form>
                        
                </div>
            </div>
            
            <div class="forum">
                <div class="forum-in">
                <h3 style="padding-bottom: 40px;">Having a question? Ask in forum !</h3>
                <a  href="threadlist.php?catid=' . $id . ' && page=1" class="forum-btn btn-f">Go to Forum</a>  
                </div>            
            </div>';}?>

        <?php
        if (isset($_POST['submit'])) {
            if($method=='POST'){

            
            $cid = $_GET['challenge_id'];
            $sum_after = $_POST['score'];
            // Insert into thread db
            $challengename = $_POST['Challengename'];
            $liveurl = $_POST['liveurl'];
            $codelink = $_POST['code-link'];
        
            $challengename = str_replace("<", "&lt;", $challengename);
            $challengename = str_replace(">", "&gt;", $challengename); 
            $challengename = str_replace("'", "\\'", $challengename);
        
            $liveurl = str_replace("<", "&lt;", $liveurl);
            $liveurl = str_replace(">", "&gt;", $liveurl); 
            $liveurl = str_replace("'", "\\'", $liveurl);
        
            $codelink = str_replace("<", "&lt;", $codelink);
            $codelink = str_replace(">", "&gt;", $codelink); 
            $codelink = str_replace("'", "\\'", $codelink);
        
            $sno = $_SESSION['sno']; 

            $sql4 =  " UPDATE `users` SET  `user_score` = `user_score`+$sum WHERE `sno`= $sno ;";
            $result4 = mysqli_query($conn, $sql4);
            
            $sql1 =  " UPDATE `users_challenges` SET  `status_challenge` = 'Submited' , `challengename`= ' $challengename' , `liveurl`=' $liveurl' , `codelink` = ' $codelink'  WHERE `user_id` = '$sno' AND `challenge_id` = '$cid'";
            $result = mysqli_query($conn, $sql1);
            
                
            if($result){
            
            header('Location: http://localhost/frontendgang/submited_challenge.php');
                
            } else {
                echo "Not done" ;
            }
            
        
    }
    }
}
else{?>
 
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
                <?php } ?>
    <!-- Optional JavaScript -->
    <script>
     setTimeout(function () {
  
  // Closing the alert
  $('.alert').alert('close');
}, 5000);
</script>
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
