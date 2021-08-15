<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/urllogo.png">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styles/signin.style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   
    <title>FrontendGang | Register</title>
    <style>
     @media (max-width: 870px) {
      .containerdk.sign-up-mode .signin-signup {
        top: 5% !important;
        transform: translate(-50%, 0);
      }
    }
    
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body,
input {
    font-family: 'Archivo', sans-serif
}

.containerdk {
  position: relative;
  width: 100%;
  background-color: #fff;
  min-height: 100vh;
  overflow: hidden;
}

.forms-containerdk {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.signin-signup {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  left: 75%;
  width: 50%;
  transition: 1s 0.7s ease-in-out;
  display: grid;
  grid-template-columns: 1fr;
  z-index: 5;
}

form {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0rem 5rem;
  transition: all 0.2s 0.7s;
  overflow: hidden;
  grid-column: 1 / 2;
  grid-row: 1 / 2;
}

form.sign-up-form {
  opacity: 0;
  z-index: 1;
}

form.sign-in-form {
  z-index: 2;
}

.title {
  font-size: 2.2rem;
  color: #444;
  margin-bottom: 10px;
}

.input-field {
  max-width: 380px;
  width: 100%;
  background-color: #f0f0f0;
  margin: 10px 0;
  height: 55px;
  border-radius: 55px;
  display: grid;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}

.input-field i {
  text-align: center;
  line-height: 55px;
  color: #acacac;
  transition: 0.5s;
  font-size: 1.1rem;
}

.input-field input {
  background: none;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: #333;
}

.input-field input::placeholder {
  color: #aaa;
  font-weight: 500;
}

.btn {
  width: 150px;
  background-color: #6c63ff;
  border: none;
  outline: none;
  height: 49px;
  border-radius: 49px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  margin: 10px 0;
  cursor: pointer;
  transition: 0.5s;
}

.btn:hover {
  background-color:#443f9b ;
}
.panels-containerdk {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.containerdk:before {
  content: "";
  position: absolute;
  height: 2000px;
  width: 2000px;
  top: -10%;
  right: 48%;
  transform: translateY(-50%);
  background-image: linear-gradient(-45deg, #6c63ff 0%, #6c63ff 100%);
  transition: 1.8s ease-in-out;
  border-radius: 50%;
  z-index: 6;
}

.image {
  width: 100%;
  transition: transform 1.1s ease-in-out;
  transition-delay: 0.4s;
  
}

.panel {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-around;
  text-align: center;
  z-index: 6;
}

.left-panel {
  pointer-events: all;
  padding: 3rem 17% 2rem 12%;
}

.right-panel {
  pointer-events: none;
  padding: 3rem 12% 2rem 17%;
}

.panel .content {
  color: #fff;
  transition: transform 0.9s ease-in-out;
  transition-delay: 0.6s;
}

.panel h3 {
  font-weight: 600;
  line-height: 1;
  font-size: 1.5rem;
}

.panel p {
  font-size: 0.9rem;
  padding: 0.7rem 0;
  
  line-height:1rcm;
  text-align:start;
}

.btn.transparent {
  margin: 0;
  background: none;
  border: 2px solid #fff;
  width: 130px;
  height: 41px;
  font-weight: 600;
  font-size: 0.8rem;
}

.right-panel .image,
.right-panel .content {
  transform: translateX(800px);
}

/* ANIMATION */

.containerdk.sign-up-mode:before {
  transform: translate(100%, -50%);
  right: 52%;
}

.containerdk.sign-up-mode .left-panel .image,
.containerdk.sign-up-mode .left-panel .content {
  transform: translateX(-800px);
}

.containerdk.sign-up-mode .signin-signup {
  left: 25%;
  
}

.containerdk.sign-up-mode form.sign-up-form {
  opacity: 1;
  z-index: 2;
  
}

.containerdk.sign-up-mode form.sign-in-form {
  opacity: 0;
  z-index: 1;
}

.containerdk.sign-up-mode .right-panel .image,
.containerdk.sign-up-mode .right-panel .content {
  transform: translateX(0%);
}

.containerdk.sign-up-mode .left-panel {
  pointer-events: none;
}

.containerdk.sign-up-mode .right-panel {
  pointer-events: all;
}

@media (max-width: 870px) {
  .containerdk {
    min-height: 800px;
    height: 100vh;
  }
  .signin-signup {
    width: 100%;
    top: 80%;
    transform: translate(-50%, -100%);
    transition: 1s 0.8s ease-in-out;
  }

  .signin-signup,
  .containerdk.sign-up-mode .signin-signup {
    left: 50%;
  }

  .panels-containerdk {
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 2fr 1fr;
  }

  .panel {
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    padding: 2.5rem 8%;
    grid-column: 1 / 2;
  }

  .right-panel {
    grid-row: 3 / 4;
  }

  .left-panel {
    grid-row: 1 / 2;
  }

  .image {
    width: 200px;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
  }

  .panel .content {
    padding-right: 15%;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.8s;
  }

  .panel h3 {
    font-size: 1.2rem;
  }

  .panel p {
    font-size: 0.7rem;
    padding: 0.5rem 0;
  }

  .btn.transparent {
    width: 110px;
    height: 35px;
    font-size: 0.7rem;
  }

  .containerdk:before {
    width: 1500px;
    height: 1500px;
    transform: translateX(-50%);
    left: 30%;
    bottom: 68%;
    right: initial;
    top: initial;
    transition: 2s ease-in-out;
  }

  .containerdk.sign-up-mode:before {
    transform: translate(-50%, 100%);
    bottom: 32%;
    right: initial;
  }

  .containerdk.sign-up-mode .left-panel .image,
  .containerdk.sign-up-mode .left-panel .content {
    transform: translateY(-300px);
  }

  .containerdk.sign-up-mode .right-panel .image,
  .containerdk.sign-up-mode .right-panel .content {
    transform: translateY(0px);
  }

  .right-panel .image,
  .right-panel .content {
    transform: translateY(300px);
  }

  .containerdk.sign-up-mode .signin-signup {
    top: 5% !important;
    transform: translate(-50%, 0);
  }
}

@media (max-width: 570px) {
  form {
    padding: 0 1.5rem;
  }

  .image {
    display: none;
  }
  .panel .content {
    padding: 0.5rem 1rem;
  }
  .containerdk {
    padding: 1.5rem;
  }

  .containerdk:before {
    bottom: 72%;
    left: 50%;
  }

  .containerdk.sign-up-mode:before {
    bottom: 28%;
    left: 50%;
  }
}

    </style>
  </head>
  <body>
    <?php include 'partials/dbconnect.php';?>
    <?php
    if(isset($_GET['reset'])){
      $reset = $_GET['reset'];
      echo'
      <div style="margin-bottom: 0rem;" class="alert alert-success alert-dismissible fade show" role="alert">
      
       <strong><b>'. $reset .'</b></strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
       
      </div>


    ';
    }
    
    if(isset($_GET['error'])){
      $err = $_GET['error'];
      echo'
      <div style="margin-bottom: 0rem;" class="alert alert-warning alert-dismissible fade show" role="alert">
      
       <strong><b>'. $err .'</b></strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
       
      </div>


    ';
    }
    ?>
    

    <div style="padding-top:0px;" class="containerdk">
      <div class="forms-containerdk">
        <div class="signin-signup">
        
          <form action="partials/_handleLogin.php" method="post" class="sign-in-form">
            <h2 class="title" style=" font-family: 'Orbitron', sans-serif;">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="loginEmail" type="text" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="loginPass" type="password" placeholder="Password" required/>
            </div>
            <div style="padding:20px">
              <a style="color:#6c63ff;text-decoration:none;" href="partials/forgotpassword.php">Forget Password?</a>
            </div>  
            <button type="submit" class="btn btn-primary">Login</button>
           
          </form>
          

          <form action="partials/_handleSignup.php" method="post" class="sign-up-form">
            <h2 class="title" style="font-family: 'Orbitron', sans-serif;">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="signupEmail" type="text" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="userName" type="text" placeholder="Username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="signupPassword" type="password" placeholder="Password" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="signupcPassword" type="password" placeholder="Confirm-Password" required/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>           
          </form>
        </div>
      </div>

      <div class="panels-containerdk">
        <div class="panel left-panel">
          <div class="content">
            <h3 style=" font-family: 'Orbitron', sans-serif;">New here ?</h3>
            <p>
              Hello Dev👋! New here ? Please SignUp and Enter into the world of COding....Happy Coding 😄 !
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log3.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3 style=" font-family: 'Orbitron', sans-serif;">One of us ?</h3>
            <p>
              Ummmm...Already Registered❓ Try SignIn and Resume your Coding.....Happy Coding 😄!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register1.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    
    <script>
     setTimeout(function () {
  
  // Closing the alert
  $('.alert').alert('close');
}, 5000);



      const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const containerdk = document.querySelector(".containerdk");

sign_up_btn.addEventListener("click", () => {
  containerdk.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  containerdk.classList.remove("sign-up-mode");
});

    </script>
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
