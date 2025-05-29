const {test,expect}=require("@playwright/test")

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

const { performLogin } = require('./TestHelpers/login');

test('Path Check', async function ({browser}) {

const context = await browser.newContext({ ignoreHTTPSErrors: true });
var page = await context.newPage();

await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Home/Home.php");

//Insert URL Randomly
await page.goto('https://localhost/JobNest/Project/Job%20Vaccancies/Admin/Admin.php');
//Display erro message and url home
await expect(page.getByText('Unauthorized Access')).toBeVisible();
await expect(page).toHaveURL(/Home/) ;

await page.waitForTimeout(2000);

await page.reload();
//Insert URL Randomly
await page.goto('https://localhost/JobNest/Project/Job%20Vaccancies/Profilepage/Profile.php');
//Display erro message and url home
await expect(page.getByText('Unauthorized Access')).toBeVisible();
await expect(page).toHaveURL(/Home/) ;

await page.waitForTimeout(2000);
  
//Login as Normal User
var {page} = await performLogin(browser,testdata[1].Aemail,testdata[1].Apassword);
//Insert URL Randomly
await page.goto('https://localhost/JobNest/Project/Job%20Vaccancies/Admin/Admin.php');
//Display erro message and url home
await expect(page.getByText('Unauthorized Access')).toBeVisible();
await expect(page).toHaveURL(/Home/) ;

await page.waitForTimeout(3000);



})

//Failed Test-unauthorized access to admin and user page

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/PathAccess.spec.js - to autmate the test
// npx playwright test ./tests/PathAccess.spec.js --headed - same but with display