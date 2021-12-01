<?php
session_start();
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"]==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/urllogo.png">

    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="admin.header.styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link rel="stylesheet" type="text/css" href="admin.homepage.styles.css">
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
        
    </style>
</head>
<body>
<?php
  // Create database connection
  include '../partials/dbconnect.php';
  include 'admin.header.php';

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
if (isset($_POST['upload'])) {
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Get image name
        $ch_image = $_FILES['image']['name'];

        // Get image name
        $ch_image1 = $_FILES['image1']['name'];

        // Get image name
        $ch_image2 = $_FILES['image2']['name'];

        // Get image name
        $ch_image3 = $_FILES['image3']['name'];

        // Getting uploaded file
        $file = $_FILES["file"]['name'];
        
        $file_ext4 = explode('.',$file);
        $file_ext_check4 = strtolower(end($file_ext4));
        $valid_file_ext4 = array('zip');
        // Uploading in "uplaods" folder
        
        $file_ext = explode('.',$ch_image);
        $file_ext_check = strtolower(end($file_ext));

        $file_ext1 = explode('.',$ch_image1);
        $file_ext_check1 = strtolower(end($file_ext1));

        $file_ext2 = explode('.',$ch_image2);
        $file_ext_check2 = strtolower(end($file_ext2));

        $file_ext3 = explode('.',$ch_image3);
        $file_ext_check3 = strtolower(end($file_ext3));

        $valid_file_ext = array('png','jpg','jpeg');

        if(in_array($file_ext_check, $valid_file_ext) && in_array($file_ext_check1, $valid_file_ext) && in_array($file_ext_check2, $valid_file_ext) && in_array($file_ext_check3, $valid_file_ext) && in_array($file_ext_check4, $valid_file_ext4)){

            
            

            // Insert into thread db
            $ch_language = $_POST['language'];        
            $ch_level = $_POST['exampleRadios'];
            $ch_title = $_POST['challenge-title'];
            $ch_desc = $_POST['desc'];
            $chal_by = $_POST['chal_by'];
            
            $ch_image = str_replace("<", "&lt;", $ch_image);
            $ch_image = str_replace(">", "&gt;", $ch_image); 
            $ch_image = str_replace("'", "\\'", $ch_image);

            $ch_image1 = str_replace("<", "&lt;", $ch_image1);
            $ch_image1 = str_replace(">", "&gt;", $ch_image1); 
            $ch_image1 = str_replace("'", "\\'", $ch_image1);

            $ch_image2 = str_replace("<", "&lt;", $ch_image2);
            $ch_image2 = str_replace(">", "&gt;", $ch_image2); 
            $ch_image2 = str_replace("'", "\\'", $ch_image2);

            $ch_image3 = str_replace("<", "&lt;", $ch_image3);
            $ch_image3 = str_replace(">", "&gt;", $ch_image3); 
            $ch_image3 = str_replace("'", "\\'", $ch_image3);

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

            $chal_by = str_replace("<", "&lt;", $chal_by);
            $chal_by = str_replace(">", "&gt;", $chal_by); 
            $chal_by = str_replace("'", "\\'", $chal_by);

           if(!is_dir("../challenges/'.$ch_title.'")){
               mkdir("../challenges/$ch_title",0777,true);               
           }
            
           // image file directory
           $target = "../challenges/$ch_title/".basename($ch_image);           
           $target1 = "../challenges/$ch_title/".basename($ch_image1);
           $target2 = "../challenges/$ch_title/".basename($ch_image2);
           $target3 = "../challenges/$ch_title/".basename($ch_image3);
           $target4 = "../challenges/$ch_title/".basename($file);
            
            $target = str_replace("<", "&lt;", $target);
            $target = str_replace(">", "&gt;", $target); 
            $target = str_replace("'", "\\'", $target);

            $target1 = str_replace("<", "&lt;", $target1);
            $target1 = str_replace(">", "&gt;", $target1); 
            $target1 = str_replace("'", "\\'", $target1);

            $target2 = str_replace("<", "&lt;", $target2);
            $target2 = str_replace(">", "&gt;", $target2); 
            $target2 = str_replace("'", "\\'", $target2);

            $target3 = str_replace("<", "&lt;", $target3);
            $target3 = str_replace(">", "&gt;", $target3); 
            $target3 = str_replace("'", "\\'", $target3);

            $target4 = str_replace("<", "&lt;", $target4);
            $target4 = str_replace(">", "&gt;", $target4);           
            $target4 = str_replace("'", "\\'", $target4);

            $sql = "INSERT INTO `challenges` (`challenged_by`,`image`, `mobile_image`, `tablet_image`,`laptop_image` , `languages`, `level`, `challenge_heading`, `challenge_desc`,`uploaded_file`, `created`) VALUES ('$chal_by','$ch_image','$ch_image1','$ch_image2','$ch_image3', '$ch_language', '$ch_level', '$ch_title', '$ch_desc','$file', current_timestamp());";
            // execute query
            mysqli_query($conn, $sql);

            

            if ((move_uploaded_file($_FILES['image']['tmp_name'], $target)) && (move_uploaded_file($_FILES['image1']['tmp_name'], $target1)) && (move_uploaded_file($_FILES['image2']['tmp_name'], $target2)) && (move_uploaded_file($_FILES['image3']['tmp_name'], $target3))  && (move_uploaded_file($_FILES['file']['tmp_name'], $target4))) {
                $msg = "Your challenge has been added!";
                $showAlert = true;
                if($showAlert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!'.$msg.'</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>';
                } 
            }else{
                $msg = "Error in uploading";                
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
            $msg = "Extension is not equal to jpg jpeg or png";
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
    ?>
<div class="container">
<?php
echo'
    <div class="container" >
    <div style="padding:30px;" class="submit-form">
               <center><h1 style="color:#8888A0;">Add challenge</h1></center>
            </div>
    <form style="padding:5px;" action="'. $_SERVER["REQUEST_URI"] . '" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload Template Image here <span style="color:red;font-size:18px;">*</span></label>
        <input class="form-control" name="image" type="file" id="formFileMultiple" required >
    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload Mobile View Image here <span style="color:red;font-size:18px;">*</span></label>
        <input class="form-control" name="image1" type="file" id="formFileMultiple1" required >
    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload Tablet view Image here<span style="color:red;font-size:18px;">*</span></label>
        <input class="form-control" name="image2" type="file" id="formFileMultiple2" required >
    </div>
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload Laptop view Image here<span style="color:red;font-size:18px;">*</span></label>
        <input class="form-control" name="image3" type="file" id="formFileMultiple3" required >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Languages Used <span style="color:red;font-size:18px;">*</span></b></label>
        <input type="text" class="form-control" id="title" name="language" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">HTML, CSS, JS, API</small>
    </div>
    <div class="form-check form-check-inline">
    <label for="formFileMultiple" class="form-label">Level Of problem <span style="color:red;font-size:18px;">*</span></label>
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
        <label for="exampleInputEmail1"><b>Problem Title<span style="color:red;font-size:18px;">*</span></b></label>
        <input type="text" class="form-control" id="title" name="challenge-title" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><b>Ellaborate Your Problem<span style="color:red;font-size:18px;">*</span></b></label>
        <textarea class="form-control" id="desc"   name="desc" rows="3" required></textarea>
    </div>  	
    <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Upload File here<span style="color:red;font-size:18px;">*</span></label>
        <input class="form-control" name="file" type="file" id="formFileMultiple6" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><b>Challenged By<span style="color:red;font-size:18px;">*</span></b></label>
        <input type="text" class="form-control" id="chal_by" name="chal_by" aria-describedby="emailHelp" required>
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
}
    else{
    include 'admin.php';
}
?>

<script>
   setTimeout(function () {
  
  // Closing the alert
  $('.alert').alert('close');
}, 5000);
</script>
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