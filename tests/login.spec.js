const {test,expect}=require("@playwright/test")

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

test('Valid normal Login', async function validNormalLogin({browser}) {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Home/Home.php");

   const profileLink = page.locator('a.pro');

   //Make sure it's no vissible
  await expect(profileLink).not.toBeVisible();

  //Click the login button/link to show the form
  await page.click('#show-login1');

  //Wait for the email input to appear (login form is now visible)
  await page.waitForSelector("input[placeholder='Enter Email']");

  //Proceed with filling out the form
  await page.getByPlaceholder("Enter Email").fill(testdata.email);
  await page.locator("input[name='Password']").fill(testdata.password);
  await page.locator("#abebe").click();

  // Profile picture visable
  await expect(profileLink).toBeVisible();

  //Wait Time
  // await page.waitForTimeout(5000);

  
  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/login.spec.js - to autmate the test
// npx playwright test ./tests/login.spec.js --headed - same but with display
//npx playwright codegen --viewport-size "1920, 1200"
module.exports = { validNormalLogin };
});



test('Valid Admin Login', async ({ browser }) => {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Home/Home.php");

  //Click the login button/link to show the form
  await page.click('#show-login1');

  //Wait for the email input to appear (login form is now visible)
  await page.waitForSelector("input[placeholder='Enter Email']");

  //Proceed with filling out the form
  await page.getByPlaceholder("Enter Email").fill(testdata.Aemail);
  await page.locator("input[name='Password']").fill(testdata.Apassword);
  await page.locator("#abebe").click();

  await expect(page).toHaveURL(/Admin/) ;
  
   await expect(profileLink).toBeVisible(); 

  await page.waitForTimeout(5000);

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/login.spec.js - to autmate the test
// npx playwright test ./tests/login.spec.js --headed - same but with display


});

test('Invalid Login', async ({ browser }) => {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Home/Home.php");

  //Click the login button/link to show the form
  await page.click('#show-login1');

  //Wait for the email input to appear (login form is now visible)
  await page.waitForSelector("input[placeholder='Enter Email']");

  //Proceed with filling out the form incorrectly
  await page.getByPlaceholder("Enter Email").fill(testdata.Inemail,{delay:200});
  await page.locator("input[name='Password']").fill(testdata.password);
  
  //click login
  await page.locator("#abebe").click();

   //Expect error message to appear
  const errorMessage = page.locator('span.status', { hasText: 'Your Email or Password is Incorrect' });
  await expect(errorMessage).toBeVisible(); 

  await page.screenshot({path: "tests/Screenshots/InvalidErrormsg.png"})

  await page.waitForTimeout(5000);

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/login.spec.js - to autmate the test
// npx playwright test ./tests/login.spec.js --headed - same but with display


});


////SQL injection


