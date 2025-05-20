const {test,expect}=require("@playwright/test")

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
  await page.getByPlaceholder("Enter Email").type("Mesfin@gmail.com");
  await page.locator("input[name='Password']").type("Amen12345");
  await page.locator("#abebe").click();

  // Profile picture visable
  await expect(profileLink).toBeVisible();

  //Wait Time
  await page.waitForTimeout(5000);

  
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
  await page.getByPlaceholder("Enter Email").type("admin");
  await page.locator("input[name='Password']").type("admin");
  await page.locator("#abebe").click();

  await expect(page).toHaveURL(/Admin/)  

  await page.waitForTimeout(5000);

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/login.spec.js - to autmate the test
// npx playwright test ./tests/login.spec.js --headed - same but with display


});

test.only('Invalid Login', async ({ browser }) => {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Home/Home.php");

  //Click the login button/link to show the form
  await page.click('#show-login1');

  //Wait for the email input to appear (login form is now visible)
  await page.waitForSelector("input[placeholder='Enter Email']");

  //Proceed with filling out the form incorrectly
  await page.getByPlaceholder("Enter Email").type("awef",{delay:200});
  await page.locator("input[name='Password']").type("aaefwe");
  
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


