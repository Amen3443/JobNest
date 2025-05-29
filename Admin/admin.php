<?php
session_start();
require_once "../Connection/Connection.php";
include "../Job/Jobfilters.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin'|| $_SESSION['Username'] ) {
    $_SESSION['Status']="Unauthorized Access";
    header("Location:../Home/Home.php");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Job/Job.css">
    <link rel="stylesheet" href="admin.css">
    <title>JobNest</title>
</head>
<body>
    <div class="container" id="blur">
        <nav>
            
            <div class="nav-links">
              
            
            <?php if (isset($_SESSION["Username"])) {
                
            
                echo '<a href="admin.php" class="pro"> <img src="../propics/profile.png"></a>';
                echo ' <a href="../Logout/logout.php" " class="logout">Log Out</a> ';
           
          } 
          else 
          {    echo '<div class="nav-log">';
               echo' <a href="#" id="show-login1" > <img src="../Login/login.png"> Log In</a>';
               echo'</div>';
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
                    <h2>Admin Panel</h2>
                
                </div>
                <div class="joblists">
                        <div class="jobdashboard">    
                        <div class="jobdetails"> <h3 >Jobs To Approve</h3>
                        </div>
                        <?php
                        $sql5="SELECT  firstName, lastName,Logo,Title,Company,jobs.Location,Salary,Function,Experience,jobs.Type,Published,Deadline,Status,applied_jobs.U_Id,applied_jobs.Job_Id FROM 
                        applied_jobs
                        JOIN user_db
                            ON applied_jobs.U_Id = User_Id
                        JOIN jobs
                            ON applied_jobs.Job_Id = Id ;";

                        $result2 = $SqlConnection->query($sql5);
                        
                
                        if(mysqli_num_rows($result2)>0) {
                                       foreach($result2 as $row) {
                                        if ($row['Status']=='Pending' ) {
                           
                                        
                                        ?>
                    
                    
                        <div class="jobdescription">
                            
                            <div class="jobdetails">
                          
                                <img src="../<?php echo  $row['Logo'] ?>" id="logo"></img>
                                    <div>
                                    <h3><?php echo  $row['Title'] ?> Applied BY <?php echo  $row['firstName']. " ".  $row['lastName']  ?> </h3>
                                    <p>User Id: <?php echo  $row['U_Id'] ?> </p>
                                    <P><?php echo  $row['Company'] ?> | <?php echo $row['Location'] ?></P>
                                    <p>Salary Range: <?php echo  $row['Salary'] ?> | Experience Level: <?php echo  $row['Experience'] ?></p>
                                    <p>Function: <?php echo  $row['Function'] ?> | Type: <?php echo  $row['Type'] ?></p>
                                    <div class="date">
                                    <p id="date">Published: <?php echo  $row['Published'] ?> | Deadline: <?php echo  $row['Deadline'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <form action="adminapprove.php" method='Post'>
                                <Select name='approval' class='aprove'>
                                    <Option value=<?php echo  $row['Status'] ?>> <?php echo  $row['Status'] ?></Option>
                                    <Option value='Accepted'>Accepted</Option>
                                    <Option value='Rejected'>Rejected</Option>
                                </Select>
                                <input type='hidden'value='<?php echo $row['U_Id'] ?>' name='userid'>
                                <input type='hidden'value='<?php echo $row['Job_Id'] ?>' name='jobid'>
                                 <button id="jobapply" class='status_b'> Submit</button>
                             </form>
                           
                            
                        </div> <?php }}
                        }
                        else{
                            echo '<div class="jobdetails"> <h3 >NO Results Found</h3>
                            </div>';
                        }
                        ?>
                        
                        
                    </div>

         
 
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
                            <a href="../Registeration/practice.php">Update Profile</a>
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
            <label for="Email">UserName</label>
            <input type="text" id="email" name="Email" placeholder="Enter Email" required >
        </div>
        <div class="form-element">
            <label for="Password">Password</label>
            <input type="password" id="password" name="Password" placeholder="Enter Password" required>
        </div>
        <p>Don't have an Account, <a href="">Register here</a></p>
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
        <form action="..Delete/Delete.php" method="Post">
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