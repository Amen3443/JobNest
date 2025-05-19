<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tips.css">
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
        <div class="header">
            <h1>Career Tips</h1>
        </div>
        <div class="main-content">
            <div class="content-section">
                <a href="https://hoteltechreport.com/news/hotel-interview-questions" style="text-decoration: none; color: inherit;">
            <img src="h.png" alt="Hospitality and tourism industry">
            <div class="article">
                <h4 align="center">HOTEL INTERVIEW QUESTIONS & ANSWERS</h4>
                <p>Are you applying for a new job in the hospitality industry? Are you ready for the job interview? Interview prep can be daunting, but it doesn’t have to be. Many hotel industry interviews ask the same questions, and you can get a head start by thinking through your answers to common hotel interview questions. <br><br></p>
                <a href="https://hoteltechreport.com/news/hotel-interview-questions" class="read-more">Read more ></a>
            </div>
        </a>
            </div>
            <div class="content-section">
                <a href="https://magazine.medlineplus.gov/article/live-long-be-well-science-based-tips-for-healthy-aging" style="text-decoration: none; color: inherit;">
                <img src="health.png" alt="HEALTH">
                <h4 align="center">TIPS ON HEALTH SCIENCE</h4>
                <p>It’s a time to celebrate getting older, but caring for your body, mind, mental health, and relationships has health benefits no matter your age .These science-based tips can help you stay healthy, happy, and independent for years to come.<br><br><br><br></p>
                <a href="https://magazine.medlineplus.gov/article/live-long-be-well-science-based-tips-for-healthy-aging" class="read-more">Read more ></a>
            </div>
        </a>
            <div class="content-section">
                <a href="https://www.jusoor.ngo/news/10-tips-to-master-your-career-and-get-promoted" style="text-decoration: none; color: inherit;">
                <img src="career.png" alt="Accounting Career">
                <h4 align="center">CAREER TIPS YOU NEED TO KNOW.</h4>
                <p><br>Success in your career can mean finding joy and fulfillment in your work, and there are numerous ways to achieve this goal. In this article, we delve into the benefits of attaining career success and present 10 essential tips that can guide you toward a successful career journey, even in the face of challenges.<br><br></p>
 <a href="https://www.jusoor.ngo/news/10-tips-to-master-your-career-and-get-promoted" class="read-more">Read more ></a>
            </div>   
                <div class="content-section">
                    <a href="https://ischoolconnect.com/blog/top-bank-interview-questions-and-answers/" style="text-decoration: none; color: inherit;">
                <img src="bank.png" alt="link-to-bank-interview-page">
                <div class="article">
                    <h4 align="center">BANK INTERVIEW QUESTIONS & ANSWERS</h4>
                    <p><br>When it comes to banking job opportunities, there is a high demand for the job roles in the domain for both seasoned and freshers. It takes the relevant academic credentials, aptitude, sincerity, responsibility, and devotion if you are looking to secure a job in the banking sector. Ace your interview with the top bank interview questions!
                        <br><br><br><br></p>
                    <a href="https://ischoolconnect.com/blog/top-bank-interview-questions-and-answers/" class="read-more">Read more ></a>
                </div>
            </div>
                <div class="content-section">
                    <a href="https://imdiversity.com/diversity-news/top-ways-to-get-promoted-at-work/" style="text-decoration: none; color: inherit;">
                <img src="promoted.png" alt="link-to-interview-page">
                <div class="article">
                    <h4 align="center">TOP WAYS TO GET PROMOTED</h4>
                    <p>Why not focus on earning a promotion at work? Internal transfers, resignations, reassignments—they happen constantly, and each one in your department means a new opportunity available for the existing employees<br><br><br></p>
                    <a href="https://imdiversity.com/diversity-news/top-ways-to-get-promoted-at-work/" class="read-more">Read more ></a>
                </div>
            </div>
                <div class="content-section">
                    <a href="https://www.thehansindia.com/hans/young-hans/career-advice-for-college-students-683361" style="text-decoration: none; color: inherit;">
                <img src="imgc.png" alt="link-to-interview-page">
                <div class="article">
                    <h4 align="center">CAREER ADVICE FOR COLLEGE STUDENTS</h4>
                    <p>Develop a growth mindset, build strong relationships, and pursue extracurricular activities to enhance your skills. Practice effective time management, seek feedback and mentorship, and prioritize self-care. Set realistic goals, embrace failure and learn, and stay flexible and adaptable.<br><br></p>
                    <a href="https://www.thehansindia.com/hans/young-hans/career-advice-for-college-students-683361" class="read-more">Read more ></a>
                </div>
            </div>
                <div class="content-section">
                    <a href="https://www.interview-skills.co.uk/blog/10-tips-to-improve-your-interview-performance" style="text-decoration: none; color: inherit;">
                <img src="per.png" alt="link-to-interview-page">
                <div class="article">
                    <h4 align="center">TACKLING INTERVIEW QUESTIONS</h4>
                    <p><br><br>Being an exceptional candidate for your dream job means boosting your interview performance to the highest possible level.<br><br><br></p>
                    <a href="https://www.interview-skills.co.uk/blog/10-tips-to-improve-your-interview-performance" class="read-more">Read more ></a>
                </div>
            </div>
                <div class="content-section">
                    <a href="https://www.myperfectresume.com/career-center/resumes/how-to/skills" style="text-decoration: none; color: inherit;">
                <img src="skill.png" alt="link-to-interview-page">
                <div class="article">
                    <h4 align="center">ESSENTIAL RESUME SKILLS</h4>
                    <p>Communication skills
                        Effective communication skills are a prerequisite for most jobs. Ensure that the skills section of your resume includes achievements that involve interacting well with others and highlights “verbal and written communication.<br><br></p>
                    <a href="https://www.myperfectresume.com/career-center/resumes/how-to/skills" class="read-more">Read more ></a>
                </div>
            </div>
                <div class="content-section">
                    <a href="https://www.unikin.cd/five-career-tips-you-need-to-know/" style="text-decoration: none; color: inherit;">
                <img src="images.png" alt="link-to-interview-page">
                <div class="article">
                    <h4 align="center">FIVE TIPS YOU NEED TO KNOW</h4>
                    <p><br>Every ambitious career person ought to be aware of some tips to be competitive and successful. Some of these tips include taking a job hunt seriously, avoiding being too loyal to a company, focusing on professional success before having a happy career life among others. <br><br><br></p>
                    <a href="https://www.unikin.cd/five-career-tips-you-need-to-know/" class="read-more">Read more ></a>
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



        

        