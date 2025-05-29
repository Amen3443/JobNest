const {test,expect}=require("@playwright/test")

const { performLogin } = require('./TestHelpers/login');

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))
test('Valid Logout', async ({ browser }) => {

//Perform Loginnn
const { page, context } = await performLogin(browser,testdata[0].email,testdata[0].password);
// click the logout button
await page.click('a.logout');
//expect the url to be on the home page
await expect(page).toHaveURL(/Home.php/) 
//also is the login button visable
await expect(page.locator('#show-login1')).toBeVisible();

await page.waitForTimeout(2000);



})



 // npx playwright show-report - to see the report
 // npx playwright test ./tests/logout.spec.js - to automate the test
 //npx playwright test ./tests/logout.spec.js --headed