const {test,expect}= require('@playwright/test')

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

test('Valid Registeration', async function validRegisteration({browser}) {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php");
  
  //Fill FirstName
  await page.getByRole('textbox', { name: 'First Name' }).fill(testdata[4].user1[2]);

  //Fill SecondName
  await page.getByRole('textbox', { name: 'Last Name' }).fill(testdata[4].user1[3]);

  //Fill Email
  await page.getByRole('textbox', { name: 'Email Address' }).fill(testdata[4].user1[0]);

  //Fill Password
  await page.getByRole('textbox', { name: 'Create Password' }).fill(testdata[4].user1[1]);

  //Select DOB
  await page.getByRole('textbox', { name: 'Date of Birth' }).fill(testdata[4].user1[4]);

  //Select Location
  await page.locator('select[name="location"]').selectOption(testdata[4].user1[5]);

  //Select Gender
  await page.getByLabel('Gender').selectOption(testdata[4].user1[8]);

  //Fill PhoneNumber  
  await page.getByRole('textbox', { name: 'Phone Number' }).fill(testdata[4].user1[6]);

  //Click Next
  await page.locator('#first').click();

  //Second Page
  //Select Experience  
  await page.locator('select[name="Experience"]').selectOption(testdata[2].ExperienceLevel[4]);

  //Select Function
  await page.locator('select[name="Function"]').selectOption(testdata[2].JobFunctions[5]);

  //Select JobType
  await page.locator('select[name="type"]').selectOption(testdata[2].Type[1]);

  //Click Next Page
  await page.locator('#second').click();

  //Third Page
  //Upload Picture
  await page.locator('#profile').setInputFiles(testdata[4].user1[7]);
  //Click Create Your Account
  await page.getByRole('button', { name: 'Create Your Account' }).click();
  //Profile Page Redirected
  await expect(page).toHaveURL(/Profile.php/)  

  //See the heading with First and Last Name
  await expect(page.getByRole('heading', { name: 'Welcome' + " "  + testdata[4].user1[2] +" " + testdata[4].user1[3]})).toBeVisible();
 
 //Is the Profile Picture Visable   
  await expect(page.locator('.pro')).toBeVisible();

  //Logout
  await page.getByRole('link', { name: 'Log Out' }).click();

  //Login with the New Registerted Account
  await page.getByRole('link', { name: 'Log In' }).click();

  //Enter new Email
  await page.getByRole('textbox', { name: 'Enter Email' }).fill(testdata[4].user1[0]);

  //Enter New Password
  await page.getByRole('textbox', { name: 'Enter Your Password' }).fill(testdata[4].user1[1]);

  //Click Login
  await page.getByRole('button', { name: 'Log In' }).click();

  //Click pp
  await page.locator('.pro').click();

  //Check heading
  await expect(page.getByRole('heading', { name: 'Welcome Selam Belete' })).toBeVisible();


  await page.waitForTimeout(3000);


});

//update the json file after every test or Run the delete file

 // npx playwright show-report - to see the report
 // npx playwright test ./tests/Registeration.spec.js - to automate the test
 //npx playwright test ./tests/Registeration.spec.js --headed

//npx playwright codegen https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php --viewport-size "1920, 1200" --ignore-https-errors