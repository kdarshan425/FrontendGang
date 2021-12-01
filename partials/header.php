<style>
a{
    font-family: 'Archivo', sans-serif ;
}
</style>
<?php
session_start();
ob_start();

include 'registerpopup.php';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $email=$_SESSION['useremail'];
    if (!empty($_SESSION['position'])){
        $position=$_SESSION['position'];
    }    
    $letter=strtoupper(substr($email, 0, 1))
    ?>
        <nav >         
            <div class="topnav" id="myTopnav">
                <a class="nav-logo" href="index.php" style="float:left; font-size: 20px;color:262636;"> <img class="mainlogo" style="height: 35px;width: 35px;" src="img/urllogo.png" alt=""> <b>FrontendGang</b></a>
                <a style="height: 60px;"></a>
                
                <div class="dropdown" style="right:0px">
                <button class="dropbtn"><h4 style="font-family: 'Archivo', sans-serif ;font-size:1.5rcm;"><?php echo $letter; ?></h4></button>
                <div class="dropdown-content" style="right: 20px;">
                    <a href="profile.php">Profile</a>
                    <a href="mychallenges.php">My challenges</a>    
                    <a href="submited_challenge.php">Submited challenge</a>
                    <a href="http://localhost/frontendgang/partials/forgotpassword.php">Setting</a>   
                    <a  href="partials/_logout.php">Logout</a>
                </div>
                </div>
                
                <a  style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="challenge.php"> CHALLENGES</a>
                <a  style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="certificate.php"> CERTIFICATE</a>

                <div class="dropdown">
                <button style="border:none;" class="dropbtn"><h6  style="font-family: 'Archivo', sans-serif;font-size: 1rem; padding-top: 10px;">ADD</h6></button>
                <div class="dropdown-content" >
                    <a href="add_challenge.php">Challenge</a>  
                </div>
                </div>     
                

                <?php
                if (!empty($position)){
                    echo'                    
                    <a style="font-weight: 100;" href="admin/admin.homepage.php">ADMIN</a>
                    ';
                 }
                ?>   
                
                <a  href="javascript:void(0);" class="ham icon"  onclick="dk_open()">
                    <div class="hamburger-menu">
                        <div class="line line1"></div>
                        <div class="line line2"></div>
                        <div class="line line3"></div>
                    </div>
                </a>
            
            </div>
        </nav>
        
        
        <!-- Sidebar on small screens when clicking the menu icon -->
        <nav class="sidebar animate-left"  style="display:none" id="mySidebar">
            <a href="javascript:void(0)" onclick="dk_close()" style="float:right;padding: 30px;font-weight:100px;font-size: 30px;">X</a>
            <div class="logtopsidebar" style="padding:50px 50px 50px 20px;background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%);">
            <a style="text-align:center;"><button style="background:transparent;" class="dropbtn"><h4 style="font-size:2.5rcm;"><?php echo $letter?></h4></button></a>
            </div>  
            <a href="profile.php">PROFILE</a>
            <a href="mychallenges.php">MY CHALLENGE</a>    
            <a href="submited_challenge.php">SUBMITED CHALLENGES</a>
            <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="http://localhost/frontendgang/partials/forgotpassword.php">SETTING</a>                
            <a href="index.php"> HOME</a>            
            <a href="challenge.php"> CHALLENGES</a>     
            <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="certificate.php">CERTIFICATES</a>  
            <a href="add_challenge.php">ADD CHALLENGE</a>   
            <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="partials/_logout.php">LOGOUT</a>
            
                
            <?php
                if (!empty($position)){
                    echo'
                    
                    <a  href="admin/admin.homepage.php">ADMIN</a>
                    ';
                 }
                ?>   
            
        </nav><?php
}
    else{
        ?>

        <nav >         
            <div class="topnav" id="myTopnav">
                <a class="nav-logo" href="index.php" style="float:left; font-size: 20px;"> <img class="mainlogo" style="height: 35px;width: 35px;" src="img/urllogo.png" alt=""> <b>FrontendGang</b></a>
                <a style="height: 60px;"></a> 
                <div class="dropdown" style="right:0px">
                <button id="myBtn1" class="dropbtn"><h5 style="font-size: 1.1rem; padding-top: 8px;padding-bottom: 8px;"><b>REGISTER</b></h5></button>                
                </div>                      
                
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="challenge.php"> CHALLENGES</a>              
                <a style="font-family: 'Archivo', sans-serif ;font-weight: 100;" href="certificate.php"> CERTIFICATE</a>  
                <div class="dropdown">
                    <button style="border:none;" class="dropbtn"><h6  style="font-family: 'Archivo', sans-serif;font-size: 1rem; padding-top: 10px;">ADD</h6></button>
                    <div class="dropdown-content" >
                        <a href="add_challenge.php">Challenge</a>  
                    </div>
                </div>     
        
                <a  href="javascript:void(0);" class="ham icon"  onclick="dk_open()">
                    <div class="hamburger-menu">
                        <div class="line line1"></div>
                        <div class="line line2"></div>
                        <div class="line line3"></div>
                    </div>
                </a>
            
            </div>
        </nav>
        
        
        <!-- Sidebar on small screens when clicking the menu icon -->
        <nav class="sidebar animate-left"  style="display:none;" id="mySidebar">
            <a href="javascript:void(0)" onclick="dk_close()" style="float:right;padding: 30px;font-weight:100px;font-size: 30px;">X</a>           
            <div class="logtopsidebar" style="padding:50px 50px 50px 20px;background: linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%);">
            <a style="text-align:center;"><img style="height: 55px;width: 55px;" src="img/urllogo.png" alt=""></a>
            </div>              
            <a href="index.php"> HOME</a>    
            <div style="padding-left:40px;padding-top:20px;padding: 0rem 0rem;border:none;"><button onclick="myFunction8()" style="border: none;font-size: 15px;font-weight: bolder;" class="dropdown-btn4 regbtn">REGISTER</button></div>              
            <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="challenge.php"> CHALLENGES</a> 
            <a href="add_challenge.php">ADD CHALLENGE</a>     
            <a href="verify.php">VERIFY CERTIFICATE</a>
            <a style="border-bottom: 1px solid rgba(36, 42, 69, 0.15);" href="contactus.php">CONTACT US</a>              
            <!-- <a class="dropdown-btn-dk ">Carrier 🔽</a>
            <div class="dropdown-container">
                <a href="#">Internship</a>
                <a href="#">Jobs</a>
            </div> -->
        </nav>
        <?php

            
    }

