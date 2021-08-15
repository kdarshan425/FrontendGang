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
    <title>FrontendGang | Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="admin.header.styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/challenges.style.css">
    <link rel="stylesheet" type="text/css" href="../styles/header.style.css">
    <link rel="stylesheet" type="text/css" href="admin.homepage.styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .row {
        display: flex !important;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: 0px;
    }

    h5 {
        font-family: 'Archivo', sans-serif;
    }

    a {
        color: black
    }

    ;

    a:hover {
        color: #0056b3;
        /* text-decoration: underline; */
    }
    </style>
</head>

<body>

    <?php 
    include 'admin.header.php';
    $position=$_SESSION['position'];
    ?>
    <div class="container">
        <div style="width:100%" class="adminbody">
            <div style="padding-bottom:30px;">
                <h3 style="text-align:center;font-family: 'Orbitron', sans-serif;color: #8888A0;">This is Admin DashBord
                    of <?php echo$position;?></h3>
            </div>
            <div class="container" style="padding-bottom:70px;">
                <div class="row" style="width:100%">

                    <?php if($position=='Founder'){?>

                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%)"
                                    class="cardinner">
                                    <a href="admin.all.chal.php">
                                        <h5>All Challenges</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, lightblue 100%)"
                                    class="cardinner">
                                    <a href="users.challenges.php">
                                        <h5>User Challenge</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, lightgreen 100%)"
                                    class="cardinner">
                                    <a href="addchallenge.php">
                                        <h5>Add Challenge</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%)"
                                    class="cardinner">
                                    <a href="admin.challenge.php">
                                        <h5>All Submissions</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, lightblue 100%)"
                                    class="cardinner">
                                    <a href="users.rewards.php">
                                        <h5>User Rewards</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, lightgreen 100%)"
                                    class="cardinner">
                                    <a href="admin.contactus.php">
                                        <h5>ContactUs</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>

                    <?php } ?>

                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, #6c63ff9e 100%)"
                                    class="cardinner">
                                    <a href="admin.expand.challenge.php">
                                        <h5>My Challenge</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, lightblue 100%)"
                                    class="cardinner">
                                    <a href="my.admin.challenge.php">
                                        <h5>My Submissions</h5>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 my-3">
                        <center>
                            <div class="card1">
                                <div style="padding:50px;background:linear-gradient(221deg, #f2f2ff 0%, lightgreen 100%)"
                                    class="cardinner">
                                    <h5>Message</h5>
                                </div>
                            </div>
                        </center>
                    </div>

                </div>
            </div>

        </div>

    </div>

    </div>

    <script>
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
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
        async></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
</body>

</html>
<?php }
else{
    include 'admin.php';
}?>