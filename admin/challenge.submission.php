<?php
session_start();
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"]==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="admin.header.styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link rel="stylesheet" type="text/css" href="admin.homepage.styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
    <title>FrontendGang | Submissions</title>
    <style>
        table{
            text-align:center;
        }
        .forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 0rem 1rem;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 3.5rem;
  cursor: pointer;
  overflow: hidden;
  width: auto;
  font-family: 'Orbitron', sans-serif;
}


.forum-btn.btn-f{
  background-color:#6c63ff;
  color: white;
  width: auto;
  
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
<?php
        include '../partials/dbconnect.php';
        include 'admin.header.php';
    ?>
    <?php 
    $id = $_GET['challenge_id'];    
    include '../partials/dbconnect.php';
    
    $email = $_SESSION['adminemail'];
    $pos = $_SESSION['position'];

    if(isset($_GET['error'])){
        $err = $_GET['error'];
        echo'
        <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
        
         <strong>'. $err .'</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
         
        </div>
  
  
      ';
    }
    if(isset($_GET['addedsuccess'])){
        $err = $_GET['addedsuccess'];
        echo'
        <div style="margin-bottom: 0rem;" class="alert alert-success alert-dismissible fade show" role="alert">
        
         <strong>'. $err .'</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
         
        </div>
  
  
      ';
    }
    
    $i=0;
    $before60days=0;
    $after60days=0;
    $today=date("Y-m-d") ;    
    $sql = "SELECT * FROM `challenges`WHERE challenge_id=$id ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['challenge_id'];
                $image = $row['image'];
                $languages = $row['languages'];
                $level = $row['level'];
                $heading = $row['challenge_heading'];
                $desc = $row['challenge_desc'];
                $Created = $row['created'];
                $dateofchal = date($Created);
            }
    ?>
    <div class="container">
        <div style="padding-bottom:30px;padding-top:10px;">
            <h3 style="text-align:center;font-family: 'Orbitron', sans-serif;color: #8888A0;">My Submitions : <?php echo$heading;?></h3>
            <h5 style="padding-top:30px; text-align:center;font-family: 'Orbitron', sans-serif;color: black;">Starting Date : <?php echo $Created?></h5>
        </div>
    </div>

    <div class="container" style="padding-bottom:50px;">
    <table class="table table-striped table-hover">
    <thead>
        <tr>
        <th scope="col">Sr. No</th>
        <th scope="col">Submit By</th>
        <th scope="col">Live-URL</th>
        <th scope="col">Code-Link</th>
        <th scope="col">Date & day</th>
        </tr>
 
    </thead>
    <tbody>
    
    
    <?php     
    $sql = "SELECT * FROM `users_challenges` WHERE challenge_id=$id and status_challenge='Submited'";
    $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $cid = $row['challenge_id'];
                $row_id = $row['id'];
                $uid = $row['user_id'];
                $status = $row['status_challenge'];
                $challengename = $row['challengename'];
                $url = $row['liveurl'];
                $code = $row['codelink'];
                $time = $row['time'];

            //    echo((strtotime(".$time.")-strtotime(".$Created."))/(60*60*24));
                
                // echo $Created;
                // echo $time;
                include '../partials/dbconnect.php';
                $sql5= "SELECT TIMESTAMPDIFF(DAY, '$Created', '$time')AS `Output` ";
                $result5 = mysqli_query($conn, $sql5);
                while($row = mysqli_fetch_assoc($result5)){
                    $timer = $row['Output'];                
                   
                }
                
              
            
            // $dif = date('m-d H:i:s',(strtotime(".$time.")-strtotime(".$Created."))/(2628002.88));
                echo'
                <tr>
                    <th scope="row">';?><?php echo$i=$i+1; echo'</th>
                    <td>'.$uid.'</td>
                    <td><a href="'.$url.'">View</a></td>
                    <td><a href="'.$code.'">View</a></td>
                    <td>'.$time.'<br>'. $timer.' day</td>                   
                    
                </tr>
                ';
             
                if($timer<=60){
                     $before60days=$before60days+1;
                }
                
     
}


// foreach($conn->query('SELECT `TIMESTAMPDIFF`(MONTH,'.$Created.','.$time.')') as $row) {
// echo "<tr>";
// echo "<td>" . $row['`TIMESTAMPDIFF`(MONTH,'.$Created.','.$time.')'] . "</td>";
// echo "</tr>";  http://localhost/mitailoring/uploads/site-logo/457911aaeda848a62595613b644c07eflogo.png
// }
?>
 </tbody>
 </table>
    </div>
    
    <?php
    include '../partials/dbconnect.php';
                $sql6= "SELECT TIMESTAMPDIFF(DAY, '$dateofchal', '$today')AS `datetillnow` ";
                $result6 = mysqli_query($conn, $sql6);
                while($row = mysqli_fetch_assoc($result6)){
                    $challengestopped = $row['datetillnow'];                
                   
                }
                
                if($challengestopped<=60){
                    $after60days=0; //60 days are not over                   
                }
                else{
                    $after60days=1; //60days are over                   
                }
                
    ?>

    <div class="outer" style="width:100%;">
            <div  style="width:100%;padding-bottom:50px;align-text:center;">
            <center>
                <?php
                if($challengestopped<=60){
                    ?>
                    <?php
                    if($before60days>9 and $before60days<50){
                    ?>
                    <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h5 style="font-family: 'Orbitron', sans-serif;">My Score : <b><?php echo $before60days ; ?> </b>🔥</h5><br>
                           <h5 style="font-family: 'Orbitron', sans-serif;padding-bottom:20px;"> Woh! You earned a challenger certificate ! </h5>
                           <form action="../expand.certificate.php" method="post" style="text-align:center;">
                                <input type="hidden" value="4" name="certificate_id" placeholder="" />
                                <div style="padding-top:0px;"><button style="background:#6c63ff" type="submit" class="forum-btn btn-f">Certificate</button></div> 
                            </form>
                       </div>
                   </div>
                   <?php
                    }
                    if($before60days>49){
                    ?>
                    <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h5 style="font-family: 'Orbitron', sans-serif;">My Score : <b><?php echo $before60days ; ?> </b>🔥</h5><br>
                           <h5 style="font-family: 'Orbitron', sans-serif;padding-bottom:20px;"> Woh! You earned Reward ! </h5> 
                           <div class="row">
                           <div style="padding-top:10px;" class="col-lg-6 col-md-6 col-xs-12">
                                <form action="../expand.certificate.php" method="post" style="text-align:center;">
                                    <input type="hidden" value="4" name="certificate_id" placeholder="" />
                                    <div style="padding-top:0px;"><button style="background:#6c63ff;" type="submit" class="forum-btn btn-f">Certificate</button></div> 
                                </form>
                           </div>
                           <div style="padding-top:10px;" class="col-lg-6 col-md-6 col-xs-12">
                                <form action="user.money.php" method="post" style="text-align:center;">                                
                                    <input type="hidden" value="<?php echo$email?>" name="email_user" placeholder="<?php echo$email?>" />
                                    <input type="hidden" value="<?php echo$id?>" name="challenge_id" placeholder="<?php echo$id?>" />
                                    <div style="padding-top:0px;"><button type="submit"  class="forum-btn btn-f">Reward</button></div>                    
                                </form>      
                           </div>
                           </div>        
                               
                       </div>
                   </div>
                   <?php
                    }
                    if($before60days<10){?>
                    
                   <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h5 style="font-family: 'Orbitron', sans-serif;">My Score : <b><?php echo $before60days ; ?> </b>🔥</h5><br>
                           <h5 style="font-family: 'Orbitron', sans-serif;"> Woh! People are loving your challenge ! </h5>
                       </div>
                   </div>
                   <?php
                   }
                }
                else{               
                   ?>
                   <?php
                    if($before60days>9 and $before60days<50){
                    ?>
                    <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h5 style="font-family: 'Orbitron', sans-serif;">You've completed your 60 days challenge! <br> Wow, You've earned <b><?php echo $before60days ; ?></b> points🔥</h5><br>                          
                           <h5 style="font-family: 'Orbitron', sans-serif;padding-bottom:20px;"> Woh! You earned a challenger certificate ! </h5>
                           <form action="../expand.certificate.php" method="post" style="text-align:center;">
                                <input type="hidden" value="4" name="certificate_id" placeholder="" />
                                <div style="padding-top:0px;"><button style="background:#6c63ff" type="submit" class="forum-btn btn-f">Certificate</button></div> 
                            </form>
                       </div>
                   </div>
                   <?php
                    }
                    if($before60days>49){
                    ?>
                   <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                           <h5 style="font-family: 'Orbitron', sans-serif;">You've completed your 60 days challenge! <br> Wow, You've earned <b><?php echo $before60days ; ?> points</b>🔥</h5><br>                          
                           <h5 style="font-family: 'Orbitron', sans-serif;padding-bottom:20px;"> Woh! You earned Reward ! </h5> 
                           <div class="row">
                           <div style="padding-top:10px;" class="col-lg-6 col-md-6 col-xs-12">
                                <form action="../expand.certificate.php" method="post" style="text-align:center;">
                                    <input type="hidden" value="4" name="certificate_id" placeholder="" />
                                    <div style="padding-top:0px;"><button style="background:#6c63ff;" type="submit" class="forum-btn btn-f">Certificate</button></div> 
                                </form>
                           </div>
                           <div style="padding-top:10px;" class="col-lg-6 col-md-6 col-xs-12">
                                <form action="user.money.php" method="post" style="text-align:center;">                                
                                    <input type="hidden" value="<?php echo$email?>" name="email_user" placeholder="<?php echo$email?>" />
                                    <input type="hidden" value="<?php echo$id?>" name="challenge_id" placeholder="<?php echo$id?>" />
                                    <div style="padding-top:0px;"><button type="submit"  class="forum-btn btn-f">Reward</button></div>                    
                                </form>      
                           </div>
                           </div>        
                               
                       </div>
                   </div>
                   <?php
                    }
                    if($before60days<10){?>
                    
                   <div class="container">
                       <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                            <h5 style="font-family: 'Orbitron', sans-serif;">You've completed your 60 days challenge! <br> You've earned <b><?php echo $before60days ; ?> </b>points 🔥</h5><br>
                        </div>
                   </div>
                   <?php
                   }
                   
                }
                ?>
                <?php
}
    else{
    include 'admin.php';
}
?>
                </center>
            </div>
    





    <script src="../abc.js"></script>
    <script> 
     setTimeout(function () {
  
    // Closing the alert
    $('.alert').alert('close');
    }, 5000);


    function myFunction2() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  // Toggle between showing and hiding the sidebar when clicking the menu icon
  var mySidebar = document.getElementById("mySidebar");
  

  function dk_open() {
    
    if (mySidebar.style.display === "block") {
      mySidebar.style.display = "none";   
     
      
    } else {
      mySidebar.style.display = "block";
     
    }
  }
  
  // Close the sidebar with the close button
  function dk_close() {
      mySidebar.style.display = "none";
  }</script>
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
