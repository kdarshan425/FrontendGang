<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FrontendGang</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/urllogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styles/header.style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
    html, body {
        margin: 0;
        padding: 0;
        }  
    .topnav a:link {
        text-decoration: none;
        color: black;
        font-weight: 500;
    }

    .close1 {
    color: #aaaaaa;
    float: right;
    right: 0;
    padding: 10px;
    font-weight: bold;
    font-size: 50px;
    margin-top: 0px;
    z-index: 1000;
    position: fixed;
}


a:not([href]) {
  color: black !important;
  text-decoration: none;
}

a:not([href]):hover {
  color: #6c63ff !important;
  text-decoration: none;
}

.logtopsidebar:before {
    
    content: "";
    position: absolute;
    height: 65%;
    width: 120%;
    top: -10%;
    right: -10%;
    transform: translateY(-50%);
    background-image: linear-gradient(-45deg, #f2f2ff 0%, #f2f2ff 100%);
    transition: 1.8s ease-in-out;
    border-radius: 50%;
    z-index: -6;

}
  
@media (max-width: 570px){
    .right-panel {
    grid-row: 3 / 4;
    padding-bottom: 90px;
  }

  .containerdk.sign-up-mode:before {
      bottom: 38%;
      left: 50%;
  }
  }
    a.btn1 {
        position: relative;
        border: 2px solid;
        border-radius: 5px;
        padding: 1.2rem 5rem;
        font-size: 1.15rem;
        font-weight: 500;
        letter-spacing: 0.25px;
        line-height: 3.5rem;
        cursor: pointer;
        overflow: hidden;
        transition: all .3s, outline 0s;
        transition: all .3s, outline 0s;
        width: 200px;
        text-align: center;
    }

    a.btn1.btn--blue1 {

        background-color: #6c63ff;
        color: white;
    }

    
.btn-dk {
  position: relative;
  border: 2px solid;
  border-radius: 5px;
  padding: 1.2rem 3rem;
  font-size: 1.15rem;
  font-weight: 500;
  letter-spacing: 0.25px;
  line-height: 3.5rem;
  cursor: pointer;
  overflow: hidden;
  transition: all .3s, outline 0s;
  transition: all .3s, outline 0s;
  width: 150px;
}

@media only screen and (min-width: 800px) {
  .landing .btn-dk {
    padding: 1.2rem 4.5rem;
    width: 200px;
  }
}
    a.btn1.btn--blue1:hover {
        background-color: white;
        color: #6c63ff;
        text-decoration: none;
    }

    @media screen and (min-width: 800px){
.landing__text-wrapper {
    align-items: flex-start;
    text-align: start;
    padding-left: 50px;
    padding-top: 30px;
}}

@media (max-width: 870px) {
      .containerdk.sign-up-mode .signin-signup {
        top: 5% !important;
        transform: translate(-50%, 0);
      }
    }
    
    .landing .btn--blue-dk {
  
  
  background-color:#6c63ff;
  color: white;
}

.btn--blue-dk:hover {
  background-color: white;
  color: #6c63ff;
  text-decoration: none;
}

.landing .btn--grey-dk{ 
   border: 1px solid #6c63ff;
   background-color: rgba(0,0,0,0.0);
  color: black;
  transition: all 0.5s ease-in-out;
}
.btn--grey-dk:hover{
    border: none;
  box-shadow: 6px 6px 12px rgba(97, 116, 224, 0.2) !important ;
  text-decoration: none;
  
}
@media only screen and (min-width:800px) {
    .btn--grey-dk{
        padding-left: 45px;
    }
}
.regbtn {
    position: relative;
    border: 2px solid #6c63ff;
    border-radius: 0px;
    padding: 0rem 2.5rem;
    font-size: 1.15rem;
    font-weight: 500;
    letter-spacing: 0.25px;
    line-height: 3.5rem;
    cursor: pointer;
    overflow: hidden;
    transition: all .3s, outline 0s;
    transition: all .3s, outline 0s;
    width: auto;
    text-align: center;
    background: white;
}

.dropdownContent1{
  display: none;
  position: relative;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1011;
}

.dropdown-container {
  display: none;
  background-color:white;
  padding-left: 8px;
}

.feature h3{
    font-family: 'Raleway', sans-serif  !important; 
}
.mainlogo{
  height:35px !important;
  width:35px !important;
}
@media screen and (max-width: 321px) {
  .mainlogo{
    display:none;
    height:35px;
    width:35px;
  }
  
}
    </style>
</head>

<body >

<?php include 'partials/dbconnect.php'; ?>
    
    <?php
    if(isset($_GET['error'])){
        $err = $_GET['error'];
        echo'
        <div style="margin-bottom: 0rem;transition:all .3s" class="alert alert-warning alert-dismissible fade show" role="alert">
        
         <strong><b>'. $err .'</b></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
         
        </div>
  
  
      ';
      }
    ?>
    <?php include 'partials/header.php'; ?>
    <div class="index-content" >
        <div class="landing" style="padding-top:0px;">
            <div class="landing__content-wrapper ">
                <div class="landing__img-wrapper">
                    <img class="landing__img dk-animate-right " src="img/landing.svg"
                        alt="tablet">
                </div>

                <div class="landing__text-wrapper dk-animate-left">
                    <h1 class="landing__heading heading heading-primary" style=" font-family: 'Orbitron', sans-serif;">
                        FrontendGang</h1>
                    <p class="landing__description paragraph">A clean and simple interface where you can practice and
                        improve your Front-end skills by working on our challenges !</p>
                    <div class="landing__btn-wrapper">
                        <?php
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                            ?>
                            <a href="" style="font-family: 'Archivo', sans-serif ;"
                            class="btn-dk btn--blue-dk animate__animated animate__tada animate__delay-1s">Welcome</a></button>                        
                            <?php
                        }
                        else{
                        ?>
                        <button onclick="myFunction8()" style="font-family: 'Archivo', sans-serif ;padding: 0rem 3rem;" class="btn-dk btn--blue-dk animate__animated animate__tada animate__delay-1s">Join</button>
                        <?php 
                        } 
                        ?>
                        <a href="challenge.php" style="font-family: 'Archivo', sans-serif ;"
                            class="btn-dk btn--grey-dk animate__animated animate__tada animate__delay-2s">Challages</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="features" aria-live="polite">
            <div class="features__content-wrapper">
                <div class="features__header">
                    <h2 class="features__heading heading heading--secondary"
                        style=" font-family: 'Orbitron', sans-serif;">Features</h2>
                    <p class="features__description paragraph">Our aim is to help developers to start 
                        working on real world projects with amazing UI/UX designs ! And also help beginners to learn
                        Frontend developement ! </p>
                </div>

                <ul class="tabs">
                    <li class="tabs__tab tabs__tab--active" id="tab-1" tabindex="0">challanges</li>
                    <li class="tabs__tab" id="tab-2" tabindex="0">Challenger</li>
                    <li class="tabs__tab" id="tab-3" tabindex="0">Rewards</li>
                </ul>

                <div class="feature">
                    <div class="feature__img-wrapper">
                        <img class="feature__img" src="img/chal.svg" alt="dashboard">
                    </div>
                    <div class="feature__text-wrapper">
                        <h3 class="feature__heading heading heading--secondary">Take Real World Challenges !</h3>
                        <p class="feature__description paragraph">We are always trying to give best real world challanges,
                            Solve them and Complete your tasks, As you complete challanges you will get exciting
                            opportunities.</p>
                        <center>
                            <a href="challenge.php" style="font-family: 'Archivo', sans-serif ;background:#6c63ff;color:white;" class="btn1 btn--blue1 animate__animated animate__tada animate__delay-1s">Start</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="faqs">
        <div class="faqs__content-wrapper">
            <h2 style=" font-family: 'Orbitron', sans-serif;" class="faqs__heading heading heading--secondary">Frequently Asked Questions</h2>
            <p class="faqs__description paragraph">Here are some of our FAQs. If you have any other questions you’d like answered please feel free to email us.</p>
            <div class="faqs__faqs-wrapper">
                <details class="faq">
                    <summary class="faq__question">Can I use these projects in my portfolio?
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewbox="0 0 18 12"><path fill="none" stroke="#5267DF" stroke-width="3" d="M1 1l8 8 8-8"/></svg>
                    </summary>
                    <p class="faq__answer">Definitely! you can use these projects is your portfolio, this is the ultimate aim behind creating this platform !</p>
                </details>

                <details class="faq">
                    <summary class="faq__question">Can I use libraries or frameworks on challenges?
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewbox="0 0 18 12"><path fill="none" stroke="#5267DF" stroke-width="3" d="M1 1l8 8 8-8"/></svg>
                    </summary>
                    <p class="faq__answer">Yes! Feel free to use any libraries/frameworks/animations on challenges so that your challenge will look more beautiful and work functionally more</p>
                </details>

                <details class="faq">
                    <summary class="faq__question">What if I have doubt about challenge?
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewbox="0 0 18 12"><path fill="none" stroke="#5267DF" stroke-width="3" d="M1 1l8 8 8-8"/></svg>
                    </summary>
                    <p class="faq__answer">If you're having any doubt regarding to your challenge, you can ask that in the forum section but keep in mind that your doubt should be related to that task only !</p>
                </details>

                <details class="faq">
                    <summary class="faq__question">How do I submit my solution?
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewbox="0 0 18 12"><path fill="none" stroke="#5267DF" stroke-width="3" d="M1 1l8 8 8-8"/></svg>
                    </summary>
                    <p class="faq__answer">You should ready with your code, Upload your code on github or repl publish your page using github pages or repl submit code link and live url in submit form</p>
                </details>
            </div>
           
        </div>
    </div>

    </div>
    <?php
    include 'partials/footer.php';
    ?>
    
    <!-- Optional JavaScript -->
   
    <script>
  setTimeout(function () {
  
  // Closing the alert
  $('.alert').alert('close');
}, 3000);


    var dropdown = document.getElementsByClassName("dropdown-btn-dk");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent4 = this.nextElementSibling;
  if (dropdownContent4.style.display === "block") {
  dropdownContent4.style.display = "none";
  } else {
  dropdownContent4.style.display = "block";
  }
  });
}

    //sidebar drop down
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
    }

    //sidebar modal
    var modal1 = document.getElementById("#myModal1");

    function myFunction8() {
    if (modal1.style.display === "block") {
        modal1.style.display = "none";   
        
        
        } else {
        modal1.style.display = "block";
        
        }
    }

    //responsine navbar
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


    // SELECTORS tabs

    const featureSection = document.querySelector('.feature');
    const tabs = document.querySelector('.tabs');
    const featureHeading = document.querySelector('.feature__heading');
    const featureDescription = document.querySelector('.feature__description');
    const featureImg = document.querySelector('.feature__img');

    // DATA

    let features = [
        {
            heading: 'Take Real World Challenges !',
            description:
                'We are always trying to give best real world challanges,Solve them and Complete your tasks, As you complete challanges you will get exciting opportunities.',
            imgPath: 'img/chal.svg',
            altText: 'challange',
        },
        {
            heading: 'Become a challenger !',
            description:
                'Are you experienced frontend developer? share your knowledge with us and earn rewards ! ',
            imgPath: 'img/solution.svg',
            altText: 'solution',
        },
        {
            heading: 'Win exciting opportunities!',
            description:
                'We are providing amazing rewards like certificates, swags, etc. solve challenges earn points and grab them!',
            imgPath: 'img/win1.svg',
            altText: 'winner',
        },
    ];

    function changeTab(index) {
        function changeContent(index) {
            featureHeading.textContent = features[index].heading;
            featureDescription.textContent = features[index].description;
            featureImg.src = features[index].imgPath;
            featureImg.alt = features[index].altText;
        }

        featureSection.classList.add('fade-out');

        setTimeout(() => {
            changeContent(index);
            featureSection.classList.remove('fade-out');
        }, 1000);
    }

    function changeTabs(e) {
        for (tab of tabs.children) {
            tab.classList.remove('tabs__tab--active');
        }

        e.target.classList.add('tabs__tab--active');

        if (e.target.id === 'tab-1') {
            changeTab(0);
        } else if (e.target.id === 'tab-2') {
            changeTab(1);
        } else if (e.target.id === 'tab-3') {
            changeTab(2);
        }
    }

    // EVENT LISTENERS

    tabs.addEventListener('click', (e) => {
        changeTabs(e);
    });

    tabs.addEventListener('keypress', (e) => {
        if (e.keyCode === 13) {
            changeTabs(e);
        }
    });

    //modal sign-in and signup    
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const containerdk = document.querySelector(".containerdk");

    sign_up_btn.addEventListener("click", () => {
    containerdk.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
    containerdk.classList.remove("sign-up-mode");
    });


    //Get the modal 
    var modal1 = document.getElementById("myModal1");

    //Get the button that opens the modal
    var btn1 = document.getElementById("myBtn1");



    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close1")[0];

    //When the user clicks the button, open the modal
    btn1.onclick = function() {
        modal1.style.display = "block";
    }

    //When the user clicks on <span> (x), close the modal 
    span1.onclick = function() {
        modal1.style.display = "none";
    }

    //When the user clicks anywhere outside the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
    






    
    </script>
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