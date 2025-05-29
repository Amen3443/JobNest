const {test,expect}=require("@playwright/test")

const { performLogin } = require('./TestHelpers/login');

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

test('Successfull Deletion', async ({ browser }) => {

//Perform Loginnn
const {page} = await performLogin(browser,testdata[4].user1[0],testdata[4].user1[1]);

//Enter ur profile
await page.locator('.pro').click();
await page.waitForTimeout(1000);
await page.locator('.pro').click();

//Clcik on the Delete Button and fill the form
await page.locator('#show-login1').click();
await page.getByRole('textbox', { name: 'Enter Email' }).fill(testdata[4].user1[0]);
await page.getByRole('textbox', { name: 'Enter Password' }).fill(testdata[4].user1[1]);
//Click Delete
await page.locator('#abebe').click();
await page.waitForTimeout(1000);
//Redirected to Home Page
await expect(page).toHaveURL(/Home.php/)  
//See if Login Button is Visable
await expect(page.getByRole('link', { name: 'Log In' })).toBeVisible();
//Clcik login and fill the from with deleted info
await page.locator('#show-login1').click();
await page.getByRole('textbox', { name: 'Enter Email' }).fill(testdata[4].user1[0]);
await page.getByRole('textbox', { name: 'Enter Your Password' }).fill(testdata[4].user1[1]);
await page.locator('#abebe').click();
//Dispaly error message
const errorMessage = page.locator('span.status', { hasText: 'Your Email or Password is Incorrect' });
await expect(errorMessage).toBeVisible(); 

await page.waitForTimeout(3000);



})




test('Unsuccessfull Deletion', async ({ browser }) => {

//Perform Loginnn
const {page} = await performLogin(browser,testdata[0].email,testdata[0].password);


//Enter ur profile
await page.locator('.pro').click();
await page.waitForTimeout(1000);
await page.locator('.pro').click();

//Clcik on the Delete Button and fill the form
await page.locator('#show-login1').click();
await page.getByRole('textbox', { name: 'Enter Email' }).fill(testdata[1].Aemail);
await page.getByRole('textbox', { name: 'Enter Password' }).fill(testdata[1].Apassword);
await page.locator('#abebe').click();
//Display this message
const errorMessage = page.locator('span.status', { hasText: 'Incorrect Password or Email' });
await expect(errorMessage).toBeVisible(); 


await page.waitForTimeout(3000);



})

//Perform Register agian or update json file

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/Delete.spec.js - to autmate the test
// npx playwright test ./tests/Delete.spec.js --headed - same but with display