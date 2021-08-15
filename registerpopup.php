<div id="myModal1" class="modal" style="overflow-y: auto;">
                <!-- The Modal content -->
                <div style="border:none" class="modal-content">
                    <div class="content1">                                               
                      <div style="padding-top:0px;" class="containerdk">
                        <span class="close1">&times;</span> 
                        <div class="forms-containerdk">
                          <div class="signin-signup">
                          
                            <form style="align-items: center; padding: 0rem 5rem;" action="partials/_handleLogin.php" method="post" class="sign-in-form">
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
                              <button type="submit" style="border-radius:49px;" class="btn btn-primary">Login</button>
                              
                            </form>
                            

                            <form style="align-items: center; padding: 0rem 5rem;" action="partials/_handleSignup.php" method="post" class="sign-up-form">
                              <h2 class="title" style="font-family: 'Orbitron', sans-serif; border-radius:49px;">Sign up</h2>
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
                              <button type="submit" style="border-radius:49px;" class="btn btn-primary">Submit</button>           
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
                              <button style="color:white;border-radius:49px;" class="btn transparent" id="sign-up-btn">
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
                              <button style="color:white;border-radius:49px;" class="btn transparent" id="sign-in-btn">
                                Sign in
                              </button>
                            </div>
                            <img src="img/register1.svg" class="image" alt="" />
                          </div>
                        </div>
                      </div>

        
                    </div>
                </div>
            </div>