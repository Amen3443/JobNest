<?php
session_start();
require_once "../Connection/Connection.php";


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Job/Job.css">
    <link rel="stylesheet" href="Home.css">
  
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
       
        <main>
            <div class="searchbar"> <?php
                    if ( isset($_SESSION['Status'])) {
                        if ( $_SESSION['Status']=='You have Successfully Deleted Your Account') {
                            echo'<span class="status1">'.$_SESSION['Status'].'</span>';
                            unset($_SESSION['Status']);
                        }else {
                            echo'<span class="status">'.$_SESSION['Status'].'</span>';
                            unset($_SESSION['Status']);
                        }
                     
                    }
                    // echo'<span class="status">Your password or email is incorrect </span>';
                    ?>
            <h2>Let's Find You Your Dream Job !</h2>  
            <p>Explore and Find different kinds of jobs that suit you</p>
            </div>
            <div class="searchbar1">
                <p><strong>Hi there,</strong> Looking For a Job ? </p>
                <form action="../Job/Job.php" method="post">
                    <input type="text" placeholder="Keyword" Name='filter' value='<?php if(isset($_POST['filter'])){echo $_POST['filter'];}?>'>
                    <button type="submit">Search</button>                
                </form>
            </div>
            <div class="jobcatagories">
                <h2>Popular Job Categories</h1>
                <form action="../Job/Job.php" method="post">
                <div class="companylists">
                    <div class="Crow1">
                        
                                <button type="checkbox" id="check" value="Engineering" name='box[]'>Engineering</button>
                                <button type="checkbox" id="check" value="Business and Administration" name='box[]'>Business and Administration</button>
                                <button  type="checkbox" id="check" value="Const and Architecture" name='box[]'>Const.& Architecture</button>
                                <button type="checkbox" id="check" value="Human Resources" name='box[]'><span id="fun">Human Resources</button>
                            </div>
                            <div class="Crow1">
                                <button  type="checkbox" id="check" value="Banking and Insurance" name='box[]'><span id="fun">Banking & Insurance</button>
                                <button  type="checkbox" id="check" value="Finance" name='box[]'><span id="fun1">Finance</button>
                                <button type="checkbox" id="check" value="Law" name='box[]'><span id="fun">Law</button>
                                <button type="checkbox" id="check" value="Management" name='box[]'>Management</button>
                            </div>
                            <div class="Crow1">
                                <button type="checkbox" id="check" value="Sales and Marketing" name='box[]'>Sales & Marketing</button>
                                <button type="checkbox" id="check" value="Education" name='box[]'>Education</button>
                                <button type="checkbox" id="check" value="IT & Telecom" name='box[]'><span id="fun">IT & Telecom</button>
                                <button  type="checkbox" id="check" value="Telemarketing" name='box[]'><span id="fun">Telemarketing</button>
                        
                        </div>
                    </div>
                </form>
            </div>
            <div class="proccss">
                <h2>How it Works ?</h2>
                <div class="apply">
                    <div class="CV">
                    <a href="../Registeration/practice.php"> <button id="create"></button></a>
                        <h3>Create an Account</h3>
                        <p>Create an Account and build <BR>
                        your Profile.</p>
                        
                    </div>
                    <div class="cv">
                        <button id="arrow"></button>
                    </div>
                    <div class="CV">
                       <a href="../Registeration/practice.php"> <button id="cv"></button></a>
                        <h3>CV/Resume</h3>
                        <p>Build your profile once<br> & use it whenever<br> you want.</p>
                    </div>
                    <div class="cv">
                        <button id="arrow"></button>
                    </div>
                    <div class="CV">
                       <a href="../Job/job.php"><button id="search"></button></a>
                        <h3>Job Search</h3>
                        <p>Search for the job<br>that suits you based on <br> the filters provided.</p>
                    </div>
                    <div class="cv">
                        <button id="arrow"></button>
                    </div>
                    <div class="CV">
                    <a href="../Job/job.php"> <button id="save"></button></a>
                        <h3>Apply</h3>
                        <p>There is no need to worry about<br> uploading your CV. Just press the APPLY button.</p>
                    </div>
                </div>
            </div>
            <div class="company">
                <h2>Top Companies</h2>
                <form form action="../Company/company.php" method="post">
                <div class="companylist">
                    <span class='cd' id="c1"><button value='Samsung' name='Title'></button></span>
                    <span class='cd'  id="c2"><button value='Google' name='Title'></button></span>
                    <span class='cd'  id="c3"><button value='Tesla' name='Title'></button></span>
                    <span class='cd'  id="c4"><button value='Apple' name='Title'></button></span>
                    <span class='cd' id="c5"><button value='Amazon' name='Title'></button></span>
                </div>
                </form>
                <button class='more'><a href="../Company/company.php">View More</button></a>
            </div>
            </main>
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
            <input type="text" id="email" name="Email" placeholder="Enter Your Email" required >
        </div>
        <div class="form-element">
            <label for="Password">Password</label>
            <input type="password" id="password" name="Password" placeholder="Enter Your Password" required>
            <input type="hidden" name="header" value=<?php echo $_SERVER['REQUEST_URI'];  ?>>
        </div>
        <p>Don't have an Account, <a href="../Registeration/practice.php">Register here</a></p>
        <div class="form-element">
            <button id="abebe">Log In</button>
        </div>
</form>
</div>
</div>


<!-- <div class="popup1">
    <div class="close-btn">&times;</div>
    <div class="form">
        <h2>Delete Account</h2>
        <form action="Delete.php" method="Post">
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
</div> -->
</div>
<script src="burger.js"></script>   
<script src="jav.js"></script>

</body>
</html>