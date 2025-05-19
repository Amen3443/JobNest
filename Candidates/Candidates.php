<?php
session_start();
require_once "../Connection/Connection.php";
include "Candidatesfilter.php"
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Job/Job.css">

    
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
    <!--    
        <div class="loginpopup">
            <h2>Log In</h2>
            <form action="">
                <label for="">User Name: </label><br>
                <input type="text" required><br>
                <label for="">Password: </label><br>
                <input type="password" required>
                <p>Don't have an Account, <a href="">Register here</a></p>
                <button>Log In</button>
            </form>

        </div> -->
            <div class="jobvaccancy">
                <div class="filters">
                    <h2>Candidates</h2>
                    <form method='Post'>
                        <select name="type" id="Jobtype">
                            <option value="">Select Type</option>
                            <option value="Any Type"
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?> <?= isset($_POST['type'])== true? ($_POST['type']=='Any Type'? 'selected':''):'' ?>  >Any Type</option>
                            <option value="Full Time"
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?> <?= isset($_POST['type'])== true? ($_POST['type']=='Full Time'? 'selected':''):'' ?> >Full Time</option>
                            <option value="Part Time" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?> <?= isset($_POST['type'])== true? ($_POST['type']=='Part Time'? 'selected':''):'' ?>>Part Time</option>
                            <option value="Internship" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?> <?= isset($_POST['type'])== true? ($_POST['type']=='Internship'? 'selected':''):'' ?>>Internship</option>
                        </select>
                        <select name="option" id="JobExp">
                            <option value="">Select Experience Level</option>
                            <option value="Any Experience Level" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?> <?= isset($_POST['option'])== true? ($_POST['option']=='Any Experience Level'? 'selected':''):'' ?> >Any Experience Level</option>
                            <option value="No Experience" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?><?= isset($_POST['option'])== true? ($_POST['option']=='No Experience'? 'selected':''):''?> >No Experience</option>
                            <option value="Internship & Graduate" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?><?= isset($_POST['option'])== true? ($_POST['filter']=='Internship & Graduate'?'selected':''):''?> >Internship & Graduate</option>
                            <option value="Entry Level" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?><?= isset($_POST['option'])== true? ($_POST['filter']=='Entry Level'? 'selected':''):''?> >Entry Level</option>
                            <option value="Mid Level" 
                            <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?> <?= isset($_POST['option'])== true? ($_POST['filter']=='Mid Level'? 'selected':''):''?>>Mid Level</option>
                            <option value="Senior Level" <?php if(isset($_POST['filter'])){echo $_POST['filter'];}?><?= 
                            isset($_POST['option'])== true? ($_POST['option'] =='Senior Level' ? 'selected':''):''?> >Senior Level</option>
                        </select>
                        <input type="text" placeholder="Keyword" Name='filter' value='<?php if(isset($_POST['filter'])){echo $_POST['filter'];}?>'>
                        <button type='submit'>Search</button>
                    </form>
                </div>
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
                <div class="joblists">
                        <div class="jobdashboard">    
                                    <?php 
                                    if ((isset($_POST['filter']) && $_POST['filter'] !='') ||(isset($_POST['option']) && $_POST['option'] !='') || (isset($_POST['type']) && $_POST['type'] !='') ||(isset($_POST['box'] )&& $_POST['box']!='') ) {
                                     
                                       
                                    if(mysqli_num_rows($result)>0) {
                                        echo '<div class="jobdetails"> <h3 >Search Results</h3>
                                        </div>';
                                       foreach($result as $row) {
                                       $date= 2024-date('Y', strtotime($row['dateOFBirth'])); 
                                        ?>
                    
                    
                        <div class="jobdescription">
                            
                            <div class="jobdetails">
                                <!-- <form action="apply.php" method='Post' class='jobdetails'> -->
                                <img src=" ../propics/<?php echo  $row['profilePicture'] ?>" id="logo"></img>
                                    <div>
                                    
                                    <!-- <input type='hidden'value='<?php// echo $row['Id'] ?>' name='job_id'><input type='hidden'  value='<?php// echo $row['Experience'] ?>' name='level'> -->
                                    <h3><?php echo  $row['firstName'] .'  '. $row['lastName'] ?></h3>
                                    <P><?php echo  $row['gender'] ?> | <?php echo $row['location'] ?></P>
                                    <p>Age: <?php echo $date; ?> | Experience Level: <?php echo  $row['experienceLevel'] ?></p>
                                    <p>Desired Function: <?php echo  $row['DesiredFunction'] ?> | Desired Type: <?php echo  $row['Type'] ?></p>
                                    <div class="date">
                                    <p id="date">Email: <?php echo  $row['email'] ?> | Phone Number: <?php echo  $row['phoneNumber'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type=submit id="jobapply"> Apply </button> -->
                        <!-- </form> -->
                        </div> <?php }
                        }
                        else{
                            echo '<div class="jobdetails"> <h3 >NO Results Found</h3>
                            </div>';
                        }
                    }else{
                        echo '<div class="jobdetails"> <h3 >Top Candidates</h3>
                        </div>';
          
                             if(mysqli_num_rows($re)>0) {
                                foreach($re as $row) {
                                    $date= 2024-date('Y', strtotime($row['dateOFBirth'])); 
                                 ?>
             
                 <div class="jobdescription">
                     
                     <div class="jobdetails">
                    
                         <img src="../propics/<?php echo $row['profilePicture']; ?>" id="logo"></img>
                             <div>
                             
                                     <h3><?php echo  $row['firstName'] .'  '. $row['lastName'] ?></h3>
                                    <P><?php echo  $row['gender'] ?> | <?php echo $row['location'] ?></P>
                                    <p>Age: <?php echo $date; ?> | Experience Level: <?php echo  $row['experienceLevel'] ?></p>
                                    <p>Desired Function: <?php echo  $row['DesiredFunction'] ?> | Desired Type: <?php echo  $row['Type'] ?></p>
                                    <div class="date">
                                    <p id="date">Email: <?php echo  $row['email'] ?> | Phone Number: <?php echo  $row['phoneNumber'] ?></p>
                             </div>
                         </div>
                     </div>
                 </div> <?php }
                 }
                          
                        }
                    
                    
                        ?>
                        <!-- <div class="jobdescription">
                            
                            <div class="jobdetails">
                                <button id="logo"></button>
                                <div>
                                    <h3>Head Office Manager</h3>
                                    <P>Macdonalds | USA,California</P>
                                    <p>Salary Range: 20,000$ - 30,000$ | Experience Level: Senior</p>
                                    <p></p>
                                    <p></p>
                                    <p>Function: Management,Finance | Type: Full Time</p>
                                    <div class="date">
                                        <p id="date">Pubilshed: June 2, 2024 | Deadline: June 6, 2005 </p>
                                    
                                    </div>
                                </div>
                            </div>
                            <button id="jobapply">Apply</button>
                        </div> -->
                        <!-- <div class="jobdescription">
                            
                            <div class="jobdetails">
                                <button id="logo"></button>
                                <div>
                                    <h3>Head Office Manager</h3>
                                    <P>Macdonalds | USA,California</P>
                                    <p>Salary Range: 20,000$ - 30,000$ | Experience Level: Senior</p>
                                    <p></p>
                                    <p></p>
                                    <p>Function: Management,Finance | Type: Full Time</p>
                                    <div class="date">
                                        <p id="date">Pubilshed: June 2, 2024 | Deadline: June 6, 2005 </p>
                                    
                                    </div>
                                </div>
                            </div>
                            <button id="jobapply">Apply</button>
                        </div>-->
                        
                        
                    </div> 
                   

                    <div class="jobfunction">
                        <h2>Job Functions</h2>
                        <form method="Post" >
                            <input type="checkbox" id="check"  value="All Functions" name='box[]'><span id="fun">All Functions</span><br>
                            <input type="checkbox" id="check" value="Business and Administration" name='box[]'><span id="fun">Business and Administration</span><br>
                            <input type="checkbox" id="check" value="Banking and Insurance" name='box[]'><span id="fun">Banking & Insurance</span><br>
                            <input type="checkbox" id="check" value="Const and Architecture" name='box[]'><span id="fun">Const.& Architecture</span> <br>
                            <input type="checkbox" id="check" value="Education" name='box[]'><span id="fun">Education</span><br>
                            <input type="checkbox" id="check" value="Engineering" name='box[]'><span id="fun">Engineering</span><br>
                            <input type="checkbox" id="check" value="Finance" name='box[]'><span id="fun1">Finance</span> <br>
                            <input type="checkbox" id="check" value="Human Resources" name='box[]'><span id="fun">Human Resources</span> <br>
                            <input type="checkbox" id="check" value="IT & Telecom" name='box[]'><span id="fun">IT & Telecom</span><br>
                            <input type="checkbox" id="check" value="Law" name='box[]'><span id="fun">Law</span><br>
                            <input type="checkbox" id="check" value="Management" name='box[]'><span id="fun">Management</span> <br>
                            <input type="checkbox" id="check" value="Sales and Marketing" name='box[]'><span id="fun">Sales & Marketing</span> <br>
                            <input type="checkbox" id="check" value="Telemarketing" name='box[]'><span id="fun">Telemarketing</span><br>
                            <!-- <input type="checkbox">Law<br> -->
                            <button type="submit" id="reset">Apply Filters</button>
                           
                        </form>
                         <!-- <button id="reset">Reset Filters</button> -->
                    </div>  
                    
                </div>
                
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
                            <a href="Candidates.php">Candidates</a>
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
</body>
</html>