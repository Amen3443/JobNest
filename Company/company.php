<?php 
    session_start();
require_once "../Connection/Connection.php";
    require_once("readFile.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Job/Job.css">
    <link rel="stylesheet" href="company.css">
    
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
       
    <main class='main'>
    <h1>Companies</h1>
   
    <div class="buttons-container">
        <form method="post">
            <button type="submit" class="sizes" name="filter" value="All">All</button>
            <button type="submit" class="sizes" name="filter" value="A">A</button>
            <button type="submit" class="sizes" name="filter" value="B">B</button>
            <button type="submit" class="sizes" name="filter" value="C">C</button>
            <button type="submit" class="sizes" name="filter" value="D">D</button>
            <button type="submit" class="sizes" name="filter" value="E">E</button>
            <button type="submit" class="sizes" name="filter" value="F">F</button>
            <button type="submit" class="sizes" name="filter" value="G">G</button>
            <button type="submit" class="sizes" name="filter" value="H">H</button>
            <button type="submit" class="sizes" name="filter" value="I">I</button>
            <button type="submit" class="sizes" name="filter" value="J">J</button>
            <button type="submit" class="sizes" name="filter" value="K">K</button>
            <button type="submit" class="sizes" name="filter" value="L">L</button>
            <button type="submit" class="sizes" name="filter" value="M">M</button>
            <button type="submit" class="sizes" name="filter" value="N">N</button>
            <button type="submit" class="sizes" name="filter" value="O">O</button>
            <button type="submit" class="sizes" name="filter" value="P">P</button>
            <button type="submit" class="sizes" name="filter" value="Q">Q</button>
            <button type="submit" class="sizes" name="filter" value="R">R</button>
            <button type="submit" class="sizes" name="filter" value="S">S</button>
            <button type="submit" class="sizes" name="filter" value="T">T</button>
            <button type="submit" class="sizes" name="filter" value="U">U</button>
            <button type="submit" class="sizes" name="filter" value="V">V</button>
            <button type="submit" class="sizes" name="filter" value="W">W</button>
            <button type="submit" class="sizes" name="filter" value="X">X</button>
            <button type="submit" class="sizes" name="filter" value="Y">Y</button>
            <button type="submit" class="sizes" name="filter" value="Z">Z</button>
        </form>
    </div>
   

    <div class="companies-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="company-container">
                    <img src="../<?php echo $row['Logo']; ?>" alt="Company Logo" class="company-logo">
                    <div class="company-details">
                        <div class="company-name"><?php echo $row['Name']; ?></div>
                        <div><strong class ="str">Industry:</strong> <?php echo $row['Industry']; ?></div>
                        <div><strong class ="str">Location:</strong> <?php echo $row['Locations']; ?></div>
                        <div><strong class ="str">Contact:</strong> <?php echo $row['Contact']; ?></div>
                        <div><strong class ="str">Year:</strong> <?php echo $row['Year']; ?></div>
                        <div><strong class ="str">Description:</strong> <?php echo $row['Description']; ?></div>
                        <?php
                        $com=$row['Company_id'];
                        $sql6= "SELECT COUNT(*)  AS `count`FROM jobs WHERE Company_id=$com;";
                        $result3 =  $SqlConnection->query($sql6);
                        $data=mysqli_fetch_assoc($result3);
                        // if (empty($data['count'])) {
                        //     $lo=0;
                        // }else{
                        //     $lo=1;
                        // }
                        ?><form action="../Job/job.php" method="post">
                        <div>
                        <input type="hidden" name='company' value=<?php echo $com;?>>
                        <input type="hidden" name='count' value=<?php  echo $data['count'];?>>
                        <button type='submit' id='avjobs'>Jobs (<?php echo $data['count'];?>)</button>
                         </form>
                        </div>
                       
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No companies found.</p>
        <?php endif; ?>
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
    <script src="company.js"></script>
 
</body>
</html>