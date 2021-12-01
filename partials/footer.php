<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .foot{
        background:#6c63ff26;
        border-radius: 40px 40px 0px 0px;
        bottom:0px;
        margin:auto;
    }

    .border-bot{
        border-bottom:1px solid gray;
        width:95%;
        margin:auto;
    }
        .row6{
            width:100%;
            height:auto;
            display:flex;
            overflow-x:none;
            overflow-y:auto;
            flex-wrap: wrap;
            padding-top:40px;           
            border-width:80%;
        }
        .row61{
            text-align:center;
            padding-bottom:20px;
            padding-top:20px;
        }
        .col61{
            text-align:center;
            position:relative;
            padding:30px;
            flex: 33.333333%;
            
            height:auto;
        }
        .col61 ul{
            padding-left:0px;
        }
        
        .col61 ul li{
        list-style-type: none;
        }

        .col61 h5{
             font-family: 'Orbitron', sans-serif;
             padding-bottom:10px;
             color:#68687c;
        }
        @media (max-width: 600px) {
            .foot{
        background:#6c63ff26;
        border-radius: 30px 30px 0px 0px;
    }
            .col61{
            text-align:center;
            position:relative;
            padding:30px 30px 0px 30px;
            flex: 100%;            
            height:auto;
        }
        }

        .foot li{
            font-size:15px;
            color:#424256bd;
        }
        .foot a{
            color:#424256bd;
            text-decoration:none;
        }
        .foot a:hover{
            color:#424256bd;
            text-decoration:none;
        }
    </style>
</head>
<body>
<footer class="page-footer">
<div class="foot">
    <div class="row6">
        <div class="col61">
            <h5>Our aim</h5>
            <p style="color:#424256bd;">To build biggest community of developers and designer to give practicle, real-time experience to learners and motivate them to start their carrer as a freelancers! <br>  Aatmanirbhar Bharat ! </p>
        </div>
        <div class="col61">
            <h5>Best Things</h5>
            <ul>
                <li> <a href="challenge.php">Challenges</a></li>
                <li> <a href="profile.php">My Profile</a></li>
                <li> <a href="certificate.php">Certificate</a></li>
                <li> <a href="verify.php">Verify Certificate</a></li>      
                <?php
                if (!empty($position)){
                    echo'
                    <li> <a  href="admin/admin.homepage.php">Admin Panel</a></li>                     
                    ';
                 }
                ?>             
            </ul>
        </div>
        <div class="col61">
            <h5>Carrer</h5>
            <ul>
                 <li> <a href="internship.php">Internships</a></li>               
            </ul>      
            <h5>Our Company</h5>
            <ul>                
                <li> <a href="contactus.php">ContactUs</a></li>                        
            </ul>                  
        </div>        
    </div>
    <div class="border-bot"></div>
    <div class="row61" style="color:gray;">
        © FrontendGang 2021 copyright
    </div>
    </div>
</footer>
    
</body>
</html>