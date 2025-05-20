const {test,expect}=require("@playwright/test")

const { performLogin } = require('./TestHelpers/login');


test.only('Valid Logout', async ({ browser }) => {

//Perform Loginnn
const {page} = await performLogin(browser,'Amen@gmail.com','Amen12345');

// click the logout button
await page.click('a.logout');

//expect the url to be on the home page
await expect(page).toHaveURL(/Home.php/) 

//also is the login button visable
await expect(page.locator('#show-login1')).toBeVisible();

await page.waitForTimeout(5000);

 // npx playwright show-report - to see the report
 // npx playwright test ./tests/logout.spec.js - to automate the test

})