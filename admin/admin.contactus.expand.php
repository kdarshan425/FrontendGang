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
        
    <title>FrontendGang | Response</title>
    <style>
  .forum-btn{
  position: relative;
  border: 0px solid;
  border-radius: 0px;
  padding: 0rem 0rem;
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 3.5rem;
  cursor: pointer;
  overflow: hidden;
  width: 100px;
  font-family: 'Orbitron', sans-serif;
}


.forum-btn.btn-f{
  background-color:#6c63ff;
  color: white;
  width: 100px;
  
  transition: ease-in-out 1s !important;
}

.forum-btn.btn-f:hover{
  background-color:#6c63ff;
  color: white;
 
  text-decoration: none;
  
}
.card-title {
    font-family: 'Archivo', sans-serif !important;
}
h5 {
    font-family: 'Archivo', sans-serif !important;
}
</style>
</head>
<body>
    <?php include '../partials/dbconnect.php';?>
    <?php include 'admin.header.php'; ?>
    <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $res_id = $_POST['res_id'];
        
    
    $sql2 = "DELETE FROM `contact` WHERE `id`=$res_id;";
    $result1 = mysqli_query($conn, $sql2); 
    if($result1){
        header("Location: admin.contactus.php?response_deleted=true"); 
    }
    else{
        echo'Error occured!';
    }
    }
    ?>
    <div class="container " style="text-align:center;font-family: 'Orbitron', sans-serif;color: #8888A0;text-align: center;padding-top:0px;">
        <h2>Response</h2>
    </div>
    
    <div class="container" style="padding-top:30px;">
    <div class="container" style="padding-bottom:30px;">
    <?php 
    
    $id = $_GET['response_id'];
    $sql = "SELECT * FROM `contact` WHERE `id`=$id ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['id'];           
        $user_email = $row['email'];            
        $name = $row['name'];
        $title = $row['title'];        
        $desc = $row['description'];	        
    
        echo'

        <div style="border:2px solid aliceblue;box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);" class="container">
            <div style="padding:40px;" class="container">
                <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Heading : '.$title.'</h5>
                <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Asked by : '.$user_email .'</h5>                    
                <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Heading : '.$name.'</h5>
                <h5 class="card-title" style=" line-height: 1.3; font-family: "Archivo", sans-serif;">Description : '.$desc .'</h5>                    
                <form method="post" action="'.$_SERVER["REQUEST_URI"].'"  id="contact-form" method="post" style="text-align:center;">
                    <input type="hidden" value="'.$id.'" name="res_id" placeholder="'.$id.'" />
                    <div style="padding-top:20px;"><button type="submit" class="forum-btn btn-f">Delete</button></div> 
                </form>           
            </div>
        </div>

            ';
             
    }
     
}
    
   ?>
</div>
</div>
    
<?php
if (isset($_POST['submit'])) {
        if($method=='POST'){

        include '../partials/dbconnect.php';
        $email = $_POST['email'];
        $pos = $_POST['exampleRadios'];
        
    
        $email = str_replace("<", "&lt;", $email);
        $email = str_replace(">", "&gt;", $email); 
        $email = str_replace("'", "\\'", $email);

        $sql4 =  " UPDATE `users` SET  `position` = '$pos' WHERE `user_email`= '$email' ;";
        $result4 = mysqli_query($conn, $sql4);

        if($result4){
            header("Location: users.expand.challenges.php?challenge_added=true"); 
            echo'Added';
        }
        else{
            echo'Error';
        }
    }
}

?>
    
    <script src="../abc.js"></script>
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