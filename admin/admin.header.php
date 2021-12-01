<?php 

ob_start();
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"]==true){

$email=$_SESSION['adminemail'];
$letter=strtoupper(substr($email, 0, 1));
$position=$_SESSION['position'];
?>
<div class="row1" style="width:100%">
        <div class="col1">
            <nav class="sidebar1 "  style="display:block;box-shadow: 0px 10px 20px -5px rgb(73 93 207 / 20%);" >
                <div class="logtopsidebar" style="padding:50px 50px 50px 20px;background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%);">
                <a style="text-align:center;"><button style="background:transparent;" class="dropbtn"><h4 style="font-size:2.5rcm;"><?php echo $letter;?></h4></button></a>
                </div> 
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;"href="admin.homepage.php">Home</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="../partials/_logout.php">Logout</a>
                
                <?php if($position=='Founder'){?>                 
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="admin.all.chal.php">All Challenges</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="users.challenges.php">User Challenges</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="../addchallange.php">Add Challenge</a>                
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="admin.challenge.php">All Submissions</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="admin.contactus.php">Contact Us</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100; border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="">Sponsership</a>
                <?php } ?> 
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="admin.expand.challenge.php">My Challenge</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="my.admin.challenge.php">My Submissions</a>
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="">Message</a>
            </nav>
        </div>
        <div class="col2">
        <nav>         
            <div class="topnav" id="myTopnav">
                <a class="nav-logo" href="admin.homepage.php" style="float:left; font-size: 20px;"><img class="mainlogo" style="height: 35px;width: 35px;" src="../img/urllogo.png" alt=""> <b>FrontendGang</b></a>
                <a style="height: 60px;"></a>                
                <a href="../partials/_logout.php"> LOGOUT</a>
                <a href="../index.php"> SWITCH</a>
                <a  href="javascript:void(0);" class="ham icon"  onclick="dk_open()">
                    <div class="hamburger-menu">
                        <div class="line line1"></div>
                        <div class="line line2"></div>
                        <div class="line line3"></div>
                    </div>
                </a>
            
            </div>
        </nav>
        <nav class="sidebar animate-left"  style="display:none;overflow-y:auto;overflow-x:hidden;" id="mySidebar">
                <a href="javascript:void(0)" onclick="dk_close()" style="float:right;padding: 30px;font-weight:100px;font-size: 30px;">X</a>
                <div class="logtopsidebar" style="padding:50px 50px 50px 20px;background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%);">
                <a style="text-align:center;"><button style="background:transparent;" class="dropbtn"><h4 style="font-size:2.5rcm;"><?php echo $letter;?></h4></button></a>
                </div>  
                <a href="admin.homepage.php">Home</a>
                <a href="../index.php"> Switch</a>
                <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="../partials/_logout.php">Logout</a>
                <?php if($position=='Founder'){?>                 
                <a href="admin.all.chal.php">All Challenges</a>
                <a href="users.challenges.php">User Challenges</a>
                <a href="../addchallange.php">Add Challenge</a>                
                <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="admin.challenge.php">All Submissions</a>
                <a href="admin.contactus.php">Contact Us</a>
                <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="">Sponsership</a>
                <?php } ?> 
                <a href="admin.expand.challenge.php">My Challenge</a>
                <a href="my.admin.challenge.php">My Sbmissions</a>
                <a href="">Message</a>           
        </nav>
<?php } ?>