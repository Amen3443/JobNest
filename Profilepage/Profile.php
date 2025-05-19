<?php
session_start();
require_once "../Connection/Connection.php";
include 'recommended.php';
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Job/Job.css">
 
    <link rel="stylesheet" href="Profile.css">
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
        
            <div class="jobvaccancy">
                <div class="filters">
                    <h2>Welcome  <?php  echo $_SESSION['Username'];   ?> <?php  echo  $_SESSION['lastname']; ?></h2>
                   
                </div>
                <?php
                    if ( isset($_SESSION['Status'])) {
                        if ($_SESSION['Status']=='You have Successfully Applied to these Job'||$_SESSION['Status']=='You have Successfully Updated Your Profile') {
                            echo'<span class="status1">'.$_SESSION['Status'].'</span>';
                            unset($_SESSION['Status']);
                        }else {
                         echo'<span class="status">'.$_SESSION['Status'].'</span>';
                        unset($_SESSION['Status']);
                        }
                       
                    }
                    // echo'<span class="status">Your password or email is incorrect </span>';
                    ?>
                <div class="joblists">
                    <div class="jobdashboard">
                         <button class='job_buttons' id='Rjobs' >Recommended Jobs</button> 
                        <button  class='job_buttons' id='Ajobs' >Applied Jobs </button>   
                        
                        <?php
                    
                            
                       
                        if(mysqli_num_rows($result1)>0) {
                                       foreach($result1 as $row) {
                                        ?>
                    
                    
                        <div class="jobdescription">
                            
                            <div class="jobdetails">
                            <form action="../Job/apply.php" method='Post' class='jobdetails'>
                                <img src="../<?php echo  $row['Logo'] ?>" id="logo"></img>
                                    <div>
                                    <input type='hidden'value='<?php echo $row['Id'] ?>' name='job_id'><input type='hidden'  value='<?php echo $row['Experience'] ?>' name='level'>
                                    <h3><?php echo  $row['Title'] ?></h3>
                                    <P><?php echo  $row['Company'] ?> | <?php echo $row['Location'] ?></P>
                                    <p>Salary Range: <?php echo  $row['Salary'] ?> | Experience Level: <?php echo  $row['Experience'] ?></p>
                                    <p>Function: <?php echo  $row['Function'] ?> | Type: <?php echo  $row['Type'] ?></p>
                                    <div class="date">
                                    <p id="date">Published: <?php echo  $row['Published'] ?> | Deadline: <?php echo  $row['Deadline'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="apply" value=<?php echo $_SERVER['REQUEST_URI'];  ?>>
                            <button id="jobapply">Apply</button>
                            </form>
                        </div> <?php }
                        }
                        else{
                            echo '<div class="jobdetails"> <h3 >NO Recommended Jobs</h3>
                            </div>';
                        }
                  
                        ?>
                     
                        
                    </div>
                    <?php
                    if ( isset($_SESSION['Status'])) {
                        echo $_SESSION['Status'];
                        unset($_SESSION['Status']);
                    }
                    
                    ?>
                    <div class="jobdashboard_active">

                         <button class='job_buttons' id='Rjobss' >Recommended Jobs</button> 
                        <button  class='job_buttons' id='Ajobss' >Applied Jobs </button>
                          
                        <?php
                        $user_id= $_SESSION['User_Id'];
                        $sql5="SELECT  firstName, lastName,Logo,Title,Company,jobs.Location,Salary,Function,Experience,jobs.Type,Published,Deadline,Status FROM 
                        applied_jobs
                        JOIN user_db
                            ON applied_jobs.U_Id = User_Id
                        JOIN jobs
                            ON applied_jobs.Job_Id = Id WHERE applied_jobs.U_Id=$user_id  ;";

                        $result2 = $SqlConnection->query($sql5);
                        

                        if(mysqli_num_rows($result2)>0) {
                                       foreach($result2 as $row) {
                                        ?>
                    
                    
                        <div class="jobdescription">
                            
                            <div class="jobdetails">
                          
                                <img src="../<?php echo  $row['Logo'] ?>" id="logo"></img>
                                    <div>
                                    <h3><?php echo  $row['Title'] ?></h3>
                                    <P><?php echo  $row['Company'] ?> | <?php echo $row['Location'] ?></P>
                                    <p>Salary Range: <?php echo  $row['Salary'] ?> | Experience Level: <?php echo  $row['Experience'] ?></p>
                                    <p>Function: <?php echo  $row['Function'] ?> | Type: <?php echo  $row['Type'] ?></p>
                                    <div class="date">
                                    <p id="date">Published: <?php echo  $row['Published'] ?> | Deadline: <?php echo  $row['Deadline'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden'value='<?php echo $row['Status']; ?>' id='job_status'>
                            <button id="jobapply" class='status_b'> <?php echo  $row['Status'] ?></button>
                            
                        </div> <?php }
                        }
                        else{
                            echo '<div class="jobdetails"> <h3 >NO Results Found</h3>
                            </div>';
                        }
                        ?>
                        
                        
                    </div>



                    <div class="jobfunction">
                        <h2> Your Profile</h2>
                            <img src="../propics/<?php echo $_SESSION['pp']?>"><br>
                            <span>First Name: <?php  echo  $_SESSION['Username']; ?> <br></span>
                            <span>Last Name: <?php  echo  $_SESSION['lastname']; ?> <br></span>
                            <span>Email: <?php  echo  $_SESSION['email']; ?> <br></span>
                            <span>Date of Birth: <?php  echo  $_SESSION['dateOFBirth']; ?> </span><br>
                            <span>Gender: <?php  echo  $_SESSION['gender']; ?> </span><br> 
                            <span>Phone Number: <?php  echo  $_SESSION['phoneNumber']; ?> </span><br>
                            <span>Desired Function: <?php  echo  $_SESSION['Function']; ?> </span><br>
                            <span>Experience Level: <?php  echo  $_SESSION['experienceLevel']; ?> </span><br>
                            <span>Type: <?php  echo  $_SESSION['Type']; ?> </span><br>  
                            <button><a href='../Registeration/practice.php'>Update Profile</a></button>
                            
                        <button id="show-login1">Delete Account</button>
                    </div>  
                    
                </div>
                
            </div>
            
        </main>
        <footer>  <footer>
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
                            <a href="aboutUs.php">About Us</a>
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
        <h2>Delete Account</h2>
        <form action="../Delete/Delete.php" method="Post">
        <div class="form-element">
            <label for="Email">Email</label>
            <input type="text" id="email" name="Email" placeholder="Enter Email" required >
        </div>
        <div class="form-element">
            <label for="Password">Password</label>
            <input type="password" id="password" name="Password" placeholder="Enter Password" required>
        </div>
        <div class="form-element">
        <input type="hidden" name="apply" value=<?php echo $_SERVER['REQUEST_URI'];  ?>>
            <button id="abebe">Delete Account</button>
        </div>
        </form>
        </div>
</div>
</div>
<script src="../Home/jav.js"></script>
<script src="../Home/burger.js"></script>   
<script src="apply.js"></script>  
 
</body>
</html>