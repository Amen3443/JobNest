<?php
session_start();
require_once "../Connection/Connection.php";

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="practice.css">
  
    <title>JobNest</title>
</head>
<body>
    
<div class="container" id="blur">
              <nav>
            <div class="nav-links">
                <h1 ><a href="../Home/Home.php"><img src="../Home/bird-house.png">JobNest</a></h1>
                <ul>
                    <li><a href="">Job Seekers</a>
                        <div class="Job-submenu">
                            <ul>
                                <li><a href="../Job/Job.php">Job Vaccancies</a></li>
                                <li><a href="../Tips/tips (2).php">Carrier Tips</a></li>
                            </ul>
                        </div>      
                    </li>
                        <li>
                            <a href="../Candidates/Candidates.php">Candidates</a>
                                       
                        </li> 
                    <li><a href="../Company/company.php">Companies</a></li>
                    <li><a href="">Help Center</a>
                        <div class="Job-submenu">
                            <ul>
                                <li><a href="../Contactus/contactus.php">Contact Us</a></li>
                                <li><a href="../Aboutus/aboutUs.php">About Us</a></li>
                            </ul>
                        </div>      
                    </li>
                </ul>
            
                <?php if (isset($_SESSION["Username"])) {
                    
                    echo '<a href="../Profilepage/Profile.php" class="pro"> <img src="../propics/'.$_SESSION["pp"].'"></a>';
                    echo ' <a href="../Logout/logout.php" " class="logout">Log Out</a> ';
                    echo ' <div class="burger_btn"></div> ';
               
              } 
              else 
              {    echo '<div class="nav-log">';
                   echo' <a href="#" id="show-login1" > <img src="../Home/login.png"> Log In</a>';
                   echo' <button type="button" ><a href="../Registeration/practice.php">Sign Up</a></button>';
                 
                   echo'</div>';
                   echo ' <div class="burger_btn"></div> ';
              }
              ?>
                    
                
            </div>
           
            
        </nav>
       
        

  <?php if (isset($_SESSION["Username"])) 
  {?>
    <main>
    <?php
                    if ( isset($_SESSION['Status'])) {
                        if ($_SESSION['Status']=='You have Successfully Applied to these Job') {
                            echo'<span class="status1">'.$_SESSION['Status'].'</span>';
                            unset($_SESSION['Status']);
                        }else {
                         echo'<span class="status">'.$_SESSION['Status'].'</span>';
                        unset($_SESSION['Status']);
                        }
                       
                    }
                    // echo'<span class="status">Your password or email is incorrect </span>';
                    ?>
    <div class="mainPage">
  <div class="page1">
    
    <h1 class="title">Update Your Profile</h1>
    
    <form action="Update.php" method="post"  enctype="multipart/form-data">
          <div class="Step1">
              <h2 class="stepTitle">STEP<br> 1 of 3</h2>
            <h4 class="infoTitle">Personal Information</h4>
            <div id="form">
              <div class="userDetails">
                <div class="inputBox">
                  <label class="details" for="firstName">First Name</label>
                  <input id="firstName" type="text" placeholder="Enter your First Name" name="firstName" required value= <?php echo $_SESSION['Username']?>>
                
                  <p>Error Message</p>
              
                </div>
                <div class="inputBox">
                  <label class="details" for="lastName">Last Name</label>
                  <input id="lastName" type="text" placeholder="Enter your Last Name" name="lastName" required value= <?php echo $_SESSION['lastname']?>>
                <!--   <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i> -->
                  <p>Error Message</p>
                <!--  <div class="error">
                    <p>Error Message</p>
                  </div> -->
                </div>
                <div class="inputBox">
                  <label class="details" for="email">Email Address</label>
                  <input id="email" type="email" placeholder="Enter your email" required name="email" value= <?php echo $_SESSION['email']?>>
                  
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>
                <div class="inputBox">
                  <label class="details" for="password">Create Password</label>
                  <input id="password" type="password" placeholder="Enter your Password" required name="password" value= <?php echo $_SESSION['Password']?> >
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>
                <div class="inputBox">
                  <label class="details" for="date">Date of Birth</label>
                <input id="date" type="date" placeholder="Enter your Date" required name="date" min="1930-12-31" max="2006-12-31" value= <?php echo  $_SESSION['dateOFBirth']?>>
                <div class="error">
                  <p>Error Message</p>
                </div>
                </div>
                <div class="inputBox">
                  <label class="details" for="gender">Gender</label>
                  <select id="gender" required name="gender">
                    <option> <?php echo $_SESSION['gender']?></option>
                    <option value ="Male">Male</option>
                  <option value="Female">Female</option>
                  </select>
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>

                <div class="inputBox">
                  <label class="details" for="location">Location</label>
                  <!-- <input id="location" type="text" placeholder="Enter your Location" required> -->
                  <select name="location" required>
                  <option> <?php echo  $_SESSION['location']?></option>
                    <option value="USA">USA</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Hawassa">Hawassa</option>
                    <option value="Mekele">Mekele</option>
                    <option value="Bahir Dar">Bahir Dar</option>
                    <option value="Adama">Adama</option>
                    <option value="Assosa">Assosa</option>
                    <option value="Jigjiga">Jigjiga</option>
            
                  </select>
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>

                <!-- <div class="inputBox" id="countryCode">
                  <label class="details" for="countryCode">Country Code</label>
                  <select required >
                  <option>Ethiopia (+251)</option>
                    <option>Kenya (+254)</option>
                    <option>Uganda (+256)</option>
                    <option>Tanzania (+255)</option>
                  </select> 
                  <div class="error">
                    <p>Error Message</p>
                  </div> 
                </div>  -->
                
                <div class="inputBox">
                  <label class="details" for="phoneNumber">Phone Number</label>
                  <input id="phoneNumber" type="text" placeholder="Enter your Phone Number" name='phoneNumber' required value= <?php echo $_SESSION['phoneNumber']?>>
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>

              <div class="inputBox">
                <!-- <a href="#" >Already have an account? Log in</a> -->
                <button type="button" class="nextButton" id="first">Next</button>
              </div>
      </div>
          </div>
          </div>
        </div>
        <div class="page2">
          <div class="Step2">
              
          <h2 class="stepTitle">STEP<br> 2 of 3</h2>
            <h4 class="infoTitle">Work Information</h4>
            <div>
              <div class="userDetails">
                <div class="inputBox">
                  <label class="details">Experience level</label>
                  <select name='Experience'>
                  <option> <?php echo $_SESSION['experienceLevel']?></option>
                    <option value='No Experience'>No Experience</option>
                    <option value='Internship & Graduate'>Internship & Graduate</option>
                    <option value='Entry Level'>Entry Level</option>
                    <option value='Mid Level'>Mid Level</option>
                    <option value='Senior Level'>Senior Level</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label class="details">Desired Type</label>
                    <select name='type'>
                    <option> <?php echo  $_SESSION['Type']?></option>
                      <option value="Internship" >Internship</option>
                      <option value="Part Time" >Part Time</option>
                      <option value="Full Time">Full Time</option>

                    </select>
                </div>
                <div class="inputBox">
                    <label class="details">Desired Job Function</label>
                    <select name='Function'>
                    <option> <?php echo $_SESSION['Function']?></option>
                      <option value="Business and Administration">Business and Administration</option>
                      <option value="Banking and Insurance" >Banking & Insurance</option>
                      <option value="Const and Architecture">Const.& Architecture</option>
                      <option  value="Education">Education</option>
                      <option value="Engineering">Engineering</option>
                      <option value="Finance" >Finance</option>
                      <option value="Human Resources">Human resources</option>
                      <option value="IT & Telecom">IT & Telecom</option>
                      <option value="Law">Law</option>
                      <option value="Management">Management</option>
                      <option value="Sales and Marketing">Sales & Marketing</option>
                      <option value="Telemarketing">Telemarketing</option>
                    </select>
                </div>
              </div> 
              <div class="inputBox">
                <button type="button" class="nextButton" id="back1">Back</button>
                <button type="button" class="nextButton" id="second">Next</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="page3">
          <div class="Step3">
              
          <h2 class="stepTitle">STEP<br> 3 of 3</h2>
            <h4 class="infoTitle">Profile Picture</h4>
            <div>
                  <div class="userDetails">
                      <div class="inputBox">
                          <img src="../propics/<?php echo $_SESSION['pp'] ;?>" id="defaultProfile"> 
                          
                      </div>      
                      <div class="inputBox">
                          <p class="details">Upload Your Profile Picture</p>
                          <label for="profile" id="selectProfile" class="details">Select Picture</label>
                          <input type="file" accept="image/jpeg, image/png, image/jpg" id="profile" name='picture'>
                          
                      </div>
                  </div>
            
              <div class="inputBox">
                <button type="button" class="nextButton" id="back2">Back</button>
            
            </div>
          <button class="nextButton" id="create" >Update Your Profile</button> 
        
    </form>
  </div>
     </div>    
  </div>
    </div>
  </div>
  
</main>
 <?php }?>
  
 <?php if (!isset($_SESSION["Username"])) 
  {?>
    <main>
    <?php
                    if ( isset($_SESSION['Status'])) {
                        if ($_SESSION['Status']=='You have Successfully Applied to these Job') {
                            echo'<span class="status1">'.$_SESSION['Status'].'</span>';
                            unset($_SESSION['Status']);
                        }else {
                         echo'<span class="status">'.$_SESSION['Status'].'</span>';
                        unset($_SESSION['Status']);
                        }
                       
                    }
                    // echo'<span class="status">Your password or email is incorrectsadfasdfaasd </span>';
                    ?>
    
    <div class="mainPage">
  <div class="page1">
    <h1 class="title">Create a Job Seeker Account</h1>
    <form action="signup.php" method="post"  enctype="multipart/form-data">
          <div class="Step1">
              <h2 class="stepTitle">STEP<br> 1 of 3</h2>
            <h4 class="infoTitle">Personal Information</h4>
            <div id="form">
              <div class="userDetails">
                <div class="inputBox">
                  <label class="details" for="firstName">First Name</label>
                  <input id="firstName" type="text" placeholder="Enter your First Name" name="firstName" required >
                
                  <p>Error Message</p>
              
                </div>
                <div class="inputBox">
                  <label class="details" for="lastName">Last Name</label>
                  <input id="lastName" type="text" placeholder="Enter your Last Name" name="lastName" required >
                <!--   <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i> -->
                  <p>Error Message</p>
                <!--  <div class="error">
                    <p>Error Message</p>
                  </div> -->
                </div>
                <div class="inputBox">
                  <label class="details" for="email">Email Address</label>
                  <input id="email" type="email" placeholder="Enter your email" required name="email" >
                  
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>
                <div class="inputBox">
                  <label class="details" for="password">Create Password</label>
                  <input id="password" type="password" placeholder="Enter your Password" required name="password" >
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>
                <div class="inputBox">
                  <label class="details" for="date">Date of Birth</label>
                <input id="date" type="date" placeholder="Enter your Date" required name="date"   min="1930-12-31" max="2006-12-31" >
                <div class="error">
                  <p>Error Message</p>
                </div>
                </div>
                <div class="inputBox">
                  <label class="details" for="gender">Gender</label>
                  <select id="gender" required name="gender">
                    <!-- <option>Select</option> -->
                    <option value ="Male">Male</option>
                  <option value="Female">Female</option>
                  </select>
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>

                <div class="inputBox">
                  <label class="details" for="location">Location</label>
                  <!-- <input id="location" type="text" placeholder="Enter your Location" required> -->
                  <select name="location" required>
                    <option value="USA">USA</option>
                    <option value="Addis Ababa">Addis Ababa</option>
                    <option value="Hawassa">Hawassa</option>
                    <option value="Mekele">Mekele</option>
                    <option value="Bahir Dar">Bahir Dar</option>
                    <option value="Adama">Adama</option>
                    <option value="Assosa">Assosa</option>
                    <option value="Jigjiga">Jigjiga</option>
            
                  </select>
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>

                <!-- <div class="inputBox" id="countryCode">
                  <label class="details" for="countryCode">Country Code</label>
                  <select required >
                  <option>Ethiopia (+251)</option>
                    <option>Kenya (+254)</option>
                    <option>Uganda (+256)</option>
                    <option>Tanzania (+255)</option>
                  </select> 
                  <div class="error">
                    <p>Error Message</p>
                  </div> 
                </div>  -->
                
                <div class="inputBox">
                  <label class="details" for="phoneNumber">Phone Number</label>
                  <input id="phoneNumber" type="text" placeholder="Enter your Phone Number" name='phoneNumber' required>
                  <div class="error">
                    <p>Error Message</p>
                  </div>
                </div>

              <div class="inputBox">
                <!-- <a href="#" id="show-login1">Already have an account? Log in</a> -->
                <button type="button" class="nextButton" id="first">Next</button>
              </div>
      </div>
          </div>
          </div>
        </div>
        <div class="page2">
          <div class="Step2">
              
          <h2 class="stepTitle">STEP<br> 2 of 3</h2>
            <h4 class="infoTitle">Work Information</h4>
            <div>
              <div class="userDetails">
                <div class="inputBox">
                  <label class="details">Experience level</label>
                  <select name='Experience'>
                    <option value='No Experience'>No Experience</option>
                    <option value='Internship & Graduate'>Internship & Graduate</option>
                    <option value='Entry Level'>Entry Level</option>
                    <option value='Mid Level'>Mid Level</option>
                    <option value='Senior Level'>Senior Level</option>
                    </select>
                </div>
                <div class="inputBox">
                    <label class="details">Desired Type</label>
                    <select name='type'>
                      <option value="Internship" >Internship</option>
                      <option value="Part Time" >Part Time</option>
                      <option value="Full Time">Full Time</option>

                    </select>
                </div>
                <div class="inputBox">
                    <label class="details">Desired Job Function</label>
                    <select name='Function'>
                      <option value="Business and Administration">Business and Administration</option>
                      <option value="Banking and Insurance" >Banking & Insurance</option>
                      <option value="Const and Architecture">Const.& Architecture</option>
                      <option  value="Education">Education</option>
                      <option value="Engineering">Engineering</option>
                      <option  value="Finance" >Finance</option>
                      <option value="Human Resources">Human resources</option>
                      <option value="IT & Telecom">IT & Telecom</option>
                      <option value="Law">Law</option>
                      <option value="Management">Management</option>
                      <option value="Sales and Marketing">Sales & Marketing</option>
                      <option value="Telemarketing">Telemarketing</option>
                    </select>
                </div>
              </div> 
              <div class="inputBox">
                <button type="button" class="nextButton" id="back1">Back</button>
                <button type="button" class="nextButton" id="second">Next</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="page3">
          <div class="Step3">
              
          <h2 class="stepTitle">STEP<br> 3 of 3</h2>
            <h4 class="infoTitle">Profile Picture</h4>
            <div>
                  <div class="userDetails">
                      <div class="inputBox">
                          <img src="../propics/profile.png" id="defaultProfile"> 
                          
                      </div>      
                      <div class="inputBox">
                          <p class="details">Upload Your Profile Picture</p>
                          <label for="profile" id="selectProfile" class="details">Select Picture</label>
                          <input type="file" accept="image/jpeg, image/png, image/jpg" id="profile" name='picture'>
                          
                      </div>
                  </div>
            
              <div class="inputBox">
                <button type="button" class="nextButton" id="back2">Back</button>
            
            </div>
          <button class="nextButton" id="create" >Create Your Account</button> 
        
    </form>
  </div>
     </div>    
  </div>
    </div>
  </div>
  
</main>
 <?php }?>
  

    

   <footer>
        <div class="footerinf">
                    <div class="footrow">
                        <div class="footcol">
                            <h2><a href="../Home/Home.php">JobNest</a></h2>
                            <p>Contact us: 09-11-04-44-94</p>
                            <p>Address: Merkato, Near Yerga hile hotle </p>
                            <!-- <p>Follow us on:</p>
                            <button id="fb"></button>
                            <button id="insta"></button>
                            <button id="x"></button>
                            <button id="yt"></button>
                            <button id="lk"></button> -->
                        </div>
                        <div class="footcol">
                            <h3>Job Seeker</h3>
                            <a href="../Job/Job.php">Job Vaccancies</a>
                            <a href="../Tips/tips (2).php">Carrier Tips</a>
                            <a href="../Registeration/practice.php">View Profile</a>
                        </div>
                        <div class="footcol">
                            <h3>Employers</h3>
                            <a href="../Candidates/Candidates.php">Candidates</a>
                            <a href="#">View Profile</a>
                            <a href="#">Refistered Comapany</a>
                        </div>
                        <div class="footcol">
                            <h3>Help Center</h3>
                            <a href="../Contactus/contactus.php">Contact Us</a>
                            <a href="../Aboutus/aboutUs.php">About Us</a>
                            <a href="#">FQA</a>
                        </div>
                        <div class="Socals">
                            <button id="fb"></button>
                            <button id="insta"></button>
                            <button id="x"></button>
                            <button id="yt"></button>
                            <button id="lk"></button>
                        </div>
                    </div>
                </div>
        </footer>
    
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Login</h2>
            <form action="../Login/Login.php" method="Post">
            <div class="form-element">
                <label for="Email">Email</label>
                <input type="text" id="email" name="Email" placeholder="Enter Email" required >
            </div>
            <div class="form-element">
                <label for="Password">Password</label>
                <input type="password" id="password" name="Password" placeholder="Enter Password" required>
                <input type="hidden" name="header" value=<?php echo $_SERVER['REQUEST_URI'] ?>>
            </div>
            <p>Don't have an Account, <a href="../Registeration/practice.php">Register here</a></p>
            <div class="form-element">
                <button id="abebe">Log In</button>
            </div>
    </form>
    </div>
    </div>
    
    
    <div class="popup1">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Delete Account</h2>
            <form action="../Delete/Delete.php" method="Post">
            <div class="form-element">
                <label for="Email">UserName</label>
                <input type="text" id="email" name="Email" placeholder="Enter Email" required >
            </div>
            <div class="form-element">
                <label for="Password">Password</label>
                <input type="password" id="password" name="Password" placeholder="Enter Password" required>
            </div>
            <div class="form-element">
                <button id="abebe">Delete Account</button>
            </div>
            </form>
    </div>
    </div>
        <script src="../Home/jav.js"></script>
        <script src="../Home/burger.js"></script> 
        <script src="practice.js"></script>
  </body>
</html>  


