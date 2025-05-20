const {test,expect}= require('@playwright/test')

test('Valid Registeration', async function validRegisteration({browser}) {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php");
  
  //Fill FirstName
  await page.getByRole('textbox', { name: 'First Name' }).fill('Selam');

  //Fill SecondName
  await page.getByRole('textbox', { name: 'Last Name' }).fill('Belete');

  //Fill Email
  await page.getByRole('textbox', { name: 'Email Address' }).fill('Selam@gmail5.com');

  //Fill Password
  await page.getByRole('textbox', { name: 'Create Password' }).fill('selam12345');

  //Select DOB
  await page.getByRole('textbox', { name: 'Date of Birth' }).fill('2006-12-22');

  //Select Location
  await page.locator('select[name="location"]').selectOption('Bahir Dar');

  //Fill PhoneNumber  
  await page.getByRole('textbox', { name: 'Phone Number' }).fill('0911044786');

  //Click Next
  await page.locator('#first').click();

  //Second Page
  //Select Experience  
  await page.locator('select[name="Experience"]').selectOption('Mid Level');

  //Select Function
  await page.locator('select[name="Function"]').selectOption('Engineering');

  //Select JobType
  await page.locator('select[name="type"]').selectOption('Full Time');

  //Click Next Page
  await page.locator('#second').click();

  //Third Page
  //Click on Select Picture
 // await page.getByText('Select Picture').click();

  //Upload Picture
  await page.locator('#profile').setInputFiles('profile/john.jpg');

  //Click Create Your Account
  await page.getByRole('button', { name: 'Create Your Account' }).click();

  //Profile Page Redirected
  await expect(page).toHaveURL(/Profile.php/)  

  //See the heading with First and Last Name
  await expect(page.getByRole('heading', { name: 'Welcome Selam Belete' })).toBeVisible();
 
 //Is the Profile Picture Visable   
  await expect(page.locator('.pro')).toBeVisible();

  //Logout
  await page.getByRole('link', { name: 'Log Out' }).click();

  //Login with the New Registerted Account
  await page.getByRole('link', { name: 'Log In' }).click();

  //Enter new Email
  await page.getByRole('textbox', { name: 'Enter Email' }).fill('Selam@gmail5.com');

  //Enter New Password
  await page.getByRole('textbox', { name: 'Enter Your Password' }).fill('selam12345');

  //Click Login
  await page.getByRole('button', { name: 'Log In' }).click();

  //Click pp
  await page.locator('.pro').click();

  //Check heading
  await expect(page.getByRole('heading', { name: 'Welcome Selam Belete' })).toBeVisible();


  await page.waitForTimeout(5000);


});







//npx playwright codegen https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php --viewport-size "1920, 1200" --ignore-https-errors