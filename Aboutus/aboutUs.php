<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Login/login.css">
    <link rel="stylesheet" href="../Job/Job.css">
    <link rel="stylesheet" href="aboutUs.css">
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
    <div class="containers">
        <h1>About Us</h1> 
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
        <div class="con">
        <h2>Our Mission</h2>
        <p>At Job Nest, our mission is to bridge the gap between job seekers and employers, creating a seamless and efficient hiring process. We are dedicated to providing a platform where talented individuals can find their dream jobs, and companies can discover the best candidates to grow their businesses.</p>
        </div>
        <div class="con">
        <h2>Who We Are</h2>
      
        <p>Job Nest was founded in 2022 with the vision of transforming the job search experience. Our team comprises industry experts, tech enthusiasts, and passionate professionals who understand the challenges of both job hunting and recruitment. Together, we strive to innovate and improve the hiring process.</p>
         </div>
         <div class="con">
        <h2>What We Offer</h2>
        <dl> 
            <dd>
                <strong>Comprehensive Job Listings:</strong> We provide a wide range of job opportunities across various industries and experience levels. Our platform is updated daily with new listings to ensure you have access to the latest openings.
            </dd>
            <dd>
                <strong>User-Friendly Interface:</strong> Our website is designed to be intuitive and easy to navigate, making the job search process straightforward and hassle-free.
            </dd>
            <dd>
                <strong>Advanced Matching Algorithms:</strong> Using state-of-the-art technology, our platform matches job seekers with positions that best fit their skills and career goals.
            </dd>
            <dd>
                <strong>Resources and Support:</strong> We offer a variety of resources, including resume-building tools, interview tips, and career advice, to support job seekers throughout their journey.
            </dd>
        </dl>
    </div>
    <div class="con">
        <h2>Our Values</h2>
       
        <dl>
            <dd>
                <strong>Integrity:</strong> We believe in transparency and honesty in all our dealings with both job seekers and employers.
            </dd>
            <dd>
                <strong>Innovation:</strong> We continuously seek to improve our platform and services through innovative technologies and feedback from our users.
            </dd>
            <dd>
                <strong>Inclusivity:</strong> We are committed to promoting diversity and inclusivity in the workplace by ensuring equal opportunities for all candidates.
            </dd>
            <dd>
                <strong>Customer Focus:</strong> Our users are at the heart of everything we do. We prioritize their needs and strive to exceed their expectations.
            </dd>
        </dl>
    </div>
    <div class="con">
        <h2>Why Choose Us?</h2>
        <dl>
            <dd>
                <strong>Trusted by Thousands:</strong> With a growing user base of [Number] job seekers and [Number] employers, we are a trusted name in the job application industry.
            </dd>
            <dd>
                <strong>Success Stories:</strong> Hear from our satisfied users who have found their perfect job match through our platform.
            </dd>
            <dd>
                <strong>Commitment to Excellence:</strong> We are dedicated to providing the highest quality service and continuously improving our offerings.
            </dd>
        </dl>
    </div>
    <div class="con">
        <h2><a href="#" style="text-decoration: none;">Join Us</a></h2>
        <p>Whether you are a job seeker looking for your next opportunity or an employer searching for the perfect candidate, [our Company Name] is here to help. Join us today and take the next step in your career journey or hiring process.</p>
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