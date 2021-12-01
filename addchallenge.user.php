<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <title>FrontendGang | Add Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .form-label{
            font-weight:bold;
        }
        h1{
            font-family: 'Orbitron', sans-serif;
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
        .form-group{
            padding-top:20px;
        }
    </style>
</head>
<body>
<?php
  // Create database connection
include 'partials/dbconnect.php';
include 'partials/header.php';
  // Initialize message variable
  $msg = "!";
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
    $user_email = $_SESSION['useremail'] ;
    $userno = $_SESSION['sno'] ;
  // If upload button is clicked ...
    if (isset($_POST['upload'])) {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){            
             // Getting uploaded file
            $file = $_FILES["file"]['name'];
            
            $file_ext4 = explode('.',$file);
            $file_ext_check4 = strtolower(end($file_ext4));
            $valid_file_ext4 = array('zip');

            if(in_array($file_ext_check4, $valid_file_ext4)){
                // Insert into thread db
                $ch_language = $_POST['language'];        
                $ch_level = $_POST['exampleRadios'];
                $ch_title = $_POST['challenge-title'];
                $ch_desc = $_POST['desc'];
                $url = $_POST['url'];
                $code = $_POST['code'];
                

                $ch_language = str_replace("<", "&lt;", $ch_language);
                $ch_language = str_replace(">", "&gt;", $ch_language); 
                $ch_language = str_replace("'", "\\'", $ch_language);

                $ch_level = str_replace("<", "&lt;", $ch_level);
                $ch_level = str_replace(">", "&gt;", $ch_level); 
                $ch_level = str_replace("'", "\\'", $ch_level);

                $ch_title = str_replace("<", "&lt;", $ch_title);
                $ch_title = str_replace(">", "&gt;", $ch_title); 
                $ch_title = str_replace("'", "\\'", $ch_title);

                $ch_desc = str_replace("<", "&lt;", $ch_desc);
                $ch_desc = str_replace(">", "&gt;", $ch_desc); 
                $ch_desc = str_replace("'", "\\'", $ch_desc);

                $url = str_replace("<", "&lt;", $url);
                $url = str_replace(">", "&gt;", $url); 
                $url = str_replace("'", "\\'", $url);

                $code = str_replace("<", "&lt;", $code);
                $code = str_replace(">", "&gt;", $code); 
                $code = str_replace("'", "\\'", $code);
                
            // image file directory
            

                $user_email = $_SESSION['useremail'] ;
                $target4 = "users_challenges/$ch_title$userno/".basename($file);
    
                $target4 = str_replace("<", "&lt;", $target4);
                $target4 = str_replace(">", "&gt;", $target4);           
                $target4 = str_replace("'", "\\'", $target4);

                if(!is_dir("users_challenges/$ch_title$userno")){
                    mkdir("users_challenges/$ch_title$userno",0777,true);               
                }
    
            
                $sql = "INSERT INTO `challenges_by_users` (`id`, `language`, `level`, `title`, `chal_desc`, `live_url`, `code_url`, `challenged_by`,`user_file`, `timestamp`) VALUES (NULL, '$ch_language', '$ch_level', '$ch_title$userno', '$ch_desc','$url','$code','$user_email','$file', current_timestamp());";
                // execute query
                $result1=mysqli_query($conn, $sql);

            
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target4)) {
                    if ($result1) {
                        $msg = " Your challenge has been added! Please wait for community to respond";
                        $showAlert = true;
                        if($showAlert == true){
                            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!'.$msg.'</strong> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                        } 
                    }
                
                }
                else{
                    $msg = " Error in uploading";
                    
                    $showAlert = true;
                    if($showAlert){
                        ?><div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?php echo$msg;?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div><?php
                    } 
                }
            }
            else{
                $msg = "Your file Should be .zip";
                $showAlert = true;
                if($showAlert){
                    ?><div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo$msg;?></strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div><?php
                } 
            }        
        }
    }
    
    $showAlert = false;


    ?>
<div class="container">
<?php
echo'
    <div class="container">
    <div style="padding:30px;" class="submit-form">
               <center><h1 style="color:#8888A0;">Add challenge</h1></center>
            </div>
    <form style="padding:5px;"  action="'. $_SERVER["REQUEST_URI"] . '" method="post" enctype="multipart/form-data">
  	
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Languages Used <span style="color:red;font-size:18px;">*</span></b></label>
        <input type="text" class="form-control" id="title" name="language" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">HTML, CSS, JS, API</small>
    </div>
    <div class="form-group form-check form-check-inline">
    <label for="formFileMultiple" class="form-label">Level Of problem</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Simple" required>
            <label class="form-check-label" for="exampleRadios1">
                Simple
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Medium" required>
            <label class="form-check-label" for="exampleRadios2">
                Medium
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Hard" required>
            <label class="form-check-label" for="exampleRadios3">
                Hard
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Problem Title <span style="color:red;font-size:18px;">*</span></b></label>
        <input type="text" class="form-control" id="title" name="challenge-title" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">Keep your title short.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><b>Ellaborate Your Problem<span style="color:red;font-size:18px;">*</span></b></label>
        <textarea class="form-control" id="desc"   name="desc" rows="3" required></textarea>
    </div>  	
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload File here <span style="color:red;font-size:18px;">*</span></label>
        <input class="form-control" name="file" type="file" id="formFileMultiple6" required>
        <small id="emailHelp" class="form-text text-muted">Attach folder including all files, images ,etc in .zip format only!</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Live URL</b></label>
        <input type="text" class="form-control" id="url" name="url" aria-describedby="emailHelp" >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Code URL</b></label>
        <input type="text" class="form-control" id="code" name="code" aria-describedby="emailHelp" >
    </div>
  	<div style="padding-bottom:40px;padding-top:30px;">
      <center>
  		<button class="exp-btn btn--voi" type="submit" name="upload">POST</button>
        </center>
  	</div>
  </form>    
    </div>
    ';

    ?>
</div>
<?php
    include 'partials/footer.php';
}
else{
    ?>
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
           <?php 
}
    ?>
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
<?php ?>