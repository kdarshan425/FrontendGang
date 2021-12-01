<?php
$user_id = $_GET['u'];
$cid = $_GET['certificate_id'];
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap"
        rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
.payment{
    height:100%;
    width:100%;
    text-align:center;
    vertical-align:center;
    justify-content:center;
}

.innerpayment{
    padding:100px 30px 30px 30px;
}

@media screen and (max-width: 800px) {
    .innerpayment{
    padding:130px 30px 30px 30px;
}
}
.input-field {
  max-width: 380px;
  width: 100%;
  margin: 10px 0;
  height: 35px;
  border-radius: 0px;  
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}
.input-field input::placeholder {
  color: #aaa;
  font-weight: bold;
}

.input-field {
    max-width: 380px;
    width: 100%;
    margin: 10px 0;
    height: 35px;
    border-radius: 0px;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
    font-weight: bold;
}
#disabled{
background:red;
}
input:disabled {
    background-color: -internal-light-dark(rgba(239, 239, 239, 0.3), rgba(59, 59, 59, 0.7));
    border-color: rgba(118, 118, 118, 0.3);
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
  width: 100px;
  font-family: 'Orbitron', sans-serif;
}


.forum-btn.btn-f{
  background-color:#6c63ff;
  color: white;
  width: 200px;
  box-shadow: 2px 1px 4px 2px rgba(0,0,0,0) !important;
  transition: ease-in-out 1s !important;
}

.forum-btn.btn-f:hover{
  background-color:#6c63ff;
  color: white;
  width: 200px;
  box-shadow:inset 1px 1px 4px 2px rgba(0,0,0,0) !important;
  text-decoration: none;
  
}
</style>
</head>
<body>
<?php
 
  include '../partials/dbconnect.php';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $sql = "SELECT * FROM `certificate` WHERE `id` = $cid";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
      $noResult = false;
      $cid = $row['id'];
      $name = $row['name'];
      $image = $row['image'];
      $price = $row['price'];
       
      
  } 
?>
<?php
if($price>0){
?>
<div class="payment">
    <div class="innerpayment">
        <div class="head" style="padding-bottom:50px;">
        <h3 style="font-family: 'Orbitron', sans-serif;color: #8888A0;">Enter Your Name For Our Further records</h3>
        </div>
     
        <form action="">
            <div>
            <label style="font-weight:bold;" for="lname">Your Name:</label><br>
            <input class="input-field" type="text" name="name" id="name" placeholder="Name"  required><br> <br>
            </div>
            <div>
            <label style="font-weight:bold;" for="lname">Price In INR:</label><br>
            <input class="input-field" type="text" value="<?php echo $price;?>" name="amt" id="amt" placeholder="<?php echo $price;?>" disabled><br> <br>
            </div>
            <div style="padding-top:30px;"><input class="forum-btn btn-f" type="button" name="btn" id="btn" value="pay" onclick="pay_now()"><br> <br></div>
            
        </form>
    </div>
</div>
<?php
}else{
    ?>
    <div class="payment">
        <div class="innerpayment">
            <div class="head" style="padding-bottom:50px;">
            <h3 style="font-family: 'Orbitron', sans-serif;color: #8888A0;">Challenger! Enter Your Name For Our Further records</h3>
            </div>
        
            <form  method="post" action="<?php echo $_SERVER["REQUEST_URI"] ?>">
                <div>
                <label style="font-weight:bold;" for="lname">Your Name:</label><br>
                <input class="input-field" type="text" name="name" id="name" placeholder="Name"  required><br> <br>
                </div>
                <div>
                <label style="font-weight:bold;" for="lname">Price In INR:</label><br>
                <input class="input-field" type="text" value="<?php echo $price;?>" name="amt" id="amt" placeholder="<?php echo $price;?>" disabled><br> <br>
                </div>
                <div style="padding-top:30px;">
                <button class="forum-btn btn-f" type="submit" name="submit"  >Submit</button>
                <br> <br></div>
                
            </form>
        </div>
    </div>
    
    <?php   
}


$sql6= "SELECT * FROM `setup` WHERE `setup`.`account_status` = 'active'";
$result6 = mysqli_query($conn, $sql6);
$numRows6 = mysqli_num_rows($result6);

if($numRows6!=0){
   
    while($row = mysqli_fetch_assoc($result6)){
        $setup_id = $row['id'];
        $verification_email = $row['verification_email'];
        $verification_email_password = $row['verification_email_password'];
        $api_key = $row['api_key'];
        $company_name = $row['company_name'];
        $payment_description = $row['payment_description'];
        $logo_url = $row['logo_url'];
    }
}
else{
    echo'<center><b>Please do setup first For the payment</b></center><br>';
}
?>


<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "<?php echo$api_key;?>", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "<?php echo$company_name;?>",
                        "description": "<?php echo$payment_description;?>",
                        "image": "<?php echo$logo_url;?>",    
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="../start_payment.php?certificate_id=<?php echo $cid ?>";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>

</body>
</html>
<?php } 
    else{
        ?>
            <div class="container">
                <div style="padding: 30px;background-color:#6b63ff3a;border: #6c63ff 2px solid;">
                    <center>
                    <h3 style="font-family: 'Orbitron', sans-serif;">Please Login To Continue</h3>
                   
                    </center>
                </div>
            </div>
            <?php 
    }
?>
<?php
$method = $_SERVER['REQUEST_METHOD'];
if (isset($_POST['submit'])) {
    if($method=='POST'){

    $name1=$_POST['name'];
    $payment_status="complete";
    $added_on=date('Y-m-d h:i:s');

    $name1 = str_replace("<", "&lt;", $name1);
    $name1 = str_replace(">", "&gt;", $name1); 
    $name1 = str_replace("'", "\\'", $name1);

    $payment_status = str_replace("<", "&lt;", $payment_status);
    $payment_status = str_replace(">", "&gt;", $payment_status); 
    $payment_status = str_replace("'", "\\'", $payment_status);

    

    $sql4 =  " INSERT INTO `payment` ( `name`, `amount`, `payment_status`, `added_on`) VALUES ('$name1', '0', '$payment_status', '$added_on')";
    $result4 = mysqli_query($conn, $sql4);    
        
    if($result4){
        echo "<script>window.location.href='../start_payment.php?certificate_id=$cid';</script>";
        exit;            
    } else {
        echo "Some problem encountered contact us" ;
    }
    

   }
}
?>