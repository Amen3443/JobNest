const {test,expect}=require("@playwright/test")

const { performLogin } = require('./TestHelpers/login');

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))


test('Valid Update', async ({ browser }) => {

   test.setTimeout(50000); 
//Perform Loginnn
const {page} = await performLogin(browser,testdata[5].Update2[2],testdata[5].Update2[9]);

//Go To profile page and see ur profile
await page.locator('.pro').click();
await page.getByRole('button', { name: 'Applied Jobs' }).click();
await page.waitForTimeout(1000);
await page.getByRole('button', { name: 'Recommended Jobs' }).click();
await page.waitForTimeout(2000);

  
//Click on Update and fill all the forms
await page.getByRole('link', { name: 'Update Profile' }).click();
await page.getByRole('textbox', { name: 'First Name' }).fill(testdata[5].Update1[0]);
await page.getByRole('textbox', { name: 'Last Name' }).fill(testdata[5].Update1[1]);
await page.getByRole('textbox', { name: 'Email Address' }).fill(testdata[5].Update1[2]);
await page.getByRole('textbox', { name: 'Create Password' }).fill(testdata[5].Update1[9]);
await page.getByRole('textbox', { name: 'Date of Birth' }).fill(testdata[5].Update1[3]);
await page.locator('select[name="location"]').selectOption(testdata[5].Update1[10]);
await page.getByLabel('Gender').selectOption(testdata[5].Update1[4]);
await page.getByRole('textbox', { name: 'Phone Number' }).fill(testdata[5].Update1[5]);
await page.locator('#first').click();
await page.locator('select[name="Experience"]').selectOption(testdata[5].Update1[7]);
await page.locator('select[name="Function"]').selectOption(testdata[5].Update1[6]);
await page.locator('select[name="type"]').selectOption(testdata[5].Update1[8]);
await page.locator('#second').click();
await page.locator('#profile').setInputFiles(testdata[5].Update1[11]);
await page.getByRole('button', { name: 'Update Your Profile' }).click();
//redirect to Profile page
await expect(page).toHaveURL(/profile.php/)  
//Dissplay Success message
await expect(page.getByText('You have Successfully Updated')).toBeVisible();

//loop to check all the Updated inputs
for (let i = 1; i < 10; i++) {
   await expect(page.locator('span').nth(i)).toContainText(testdata[5].Update1[i-1])
      
}

//Check the other parts of the profile
await page.getByRole('button', { name: 'Applied Jobs' }).click();
await page.waitForTimeout(1000);
await page.getByRole('button', { name: 'Recommended Jobs' }).click();
await page.waitForTimeout(4000);

//logout and login with the new info
await page.click('a.logout');
await page.click('#show-login1');
await page.getByRole('textbox', { name: 'Enter Email' }).fill(testdata[5].Update1[2]);
await page.getByRole('textbox', { name: 'Enter Your Password' }).fill(testdata[5].Update1[9]);
await page.getByRole('button', { name: 'Log In' }).click();

//Check if the profile is still the same 
await expect(page.locator('.pro')).toBeVisible();
await page.locator('.pro').click();
await expect(page.getByRole('heading', { name: 'Welcome '+ testdata[5].Update1[0]+' '+ testdata[5].Update1[1] })).toBeVisible();


await page.waitForTimeout(4000);

})

//every update change the Update1 and Update1

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/Update.spec.js - to autmate the test
// npx playwright test ./tests/Update.spec.js --headed - same but with display