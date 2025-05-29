const {test,expect}=require("@playwright/test")

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

const { performLogin } = require('./TestHelpers/login');

test('Valid Apply', async function ({browser}) {
 
  // Login
const {page} = await performLogin(browser,testdata[1].Aemail,testdata[1].Apassword);

  //Search for a Job
  await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[3]);
  await page.locator('#Jobtype').selectOption(testdata[2].Type[1]);
  await page.getByRole('button', { name: 'Search' }).click();
  //Click Apply
  await page.getByRole('button', { name: 'Apply' }).first().click();
  //These Message gets displayed
  await expect(page.getByText('You have Successfully Applied')).toBeVisible();

  await page.waitForTimeout(3000);

  //Search for a Job
  await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[3]);
  await page.locator('#Jobtype').selectOption(testdata[2].Type[1]);
  await page.getByRole('button', { name: 'Search' }).click();
  //Click Apply
  await page.getByRole('button', { name: 'Apply' }).nth(1).click();
  //These Message gets displayed
  await expect(page.getByText('You have Successfully Applied')).toBeVisible();

  await page.waitForTimeout(3000);

  //Click on Profile Picture
  await page.locator('.pro').click();
  //Click on Applied Jobs
  await page.getByRole('button', { name: 'Applied Jobs' }).click();

  //The Seconf Job You Applied For
  await expect(page.getByRole('heading', { name: 'Receptions' })).toBeVisible();
  await expect(page.getByText('Abyssinia Adventures |')).toBeVisible();
  await expect(page.getByText('Function: Business and')).toBeVisible();
  await expect(page.getByText('Published: Feburary 15 2024')).toBeVisible();
  //The First Job You Applied For
  await expect(page.getByRole('heading', { name: 'Human Resource Manager' })).toBeVisible();
  await expect(page.getByText('Afar Adventure Tours |')).toBeVisible();
  await expect(page.getByText('Salary Range: 20,000$ - 30,000$').first()).toBeVisible();
  await expect(page.getByText('Function: Human Resources |')).toBeVisible();
  await expect(page.getByText('Published: March 3 2024 |')).toBeVisible();


  await page.waitForTimeout(3000);

})

test('Underqualified Applyment', async function ({browser}) {
    
  //Login
  const {page} = await performLogin(browser,testdata[1].Aemail,testdata[1].Apassword);

  //Click Apply
  await page.locator('#jobapply').first().click();
  //Dispplay these message because you are not Qualified based on ExpLevel
  await expect(page.getByText('You are underqualified job')).toBeVisible();

  await page.waitForTimeout(3000);

  //Search for another exp level over your level and apply
  await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[5]);
  await page.getByRole('button', { name: 'Search' }).click();
  await page.locator('#jobapply').first().click();
  ////Dispplay these message because you are not Qualified based on ExpLevel
  await expect(page.getByText('You are Underqualified for')).toBeVisible();

  await page.waitForTimeout(3000);




})

test('Applying without Login', async function ({browser}) {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Job/Job.php");

  // Make sure ur not logged in
  const profileLink = page.locator('a.pro');
  await expect(profileLink).not.toBeVisible();
  // Click Apply
  await page.locator('#jobapply').nth(4).scrollIntoViewIfNeeded();
  await page.locator('#jobapply').nth(4).hover();
  await page.waitForTimeout(1000);
  await page.locator('#jobapply').nth(4).click();
  // Display this message
  await expect(page.getByText('You have to Log in to Apply')).toBeVisible();

  await page.waitForTimeout(3000);

});

test('Apply Twice', async function ({browser}) {
    
  //Login
  const {page} = await performLogin(browser,testdata[1].Aemail,testdata[1].Apassword);

  //Search and click apply
  await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[2]);
  await page.getByRole('button', { name: 'Search' }).click();
  await page.locator('#jobapply').first().click();
  //Dispaly Success Mssage
  await expect(page.getByText('You have Successfully Applied')).toBeVisible();

  await page.waitForTimeout(3000);

  //Search and click apply for the same job
  await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[2]);
  await page.getByRole('button', { name: 'Search' }).click();
  await page.locator('#jobapply').first().click();
  //Dispaly error mssage
  await expect(page.getByText('You have already Applied to')).toBeVisible();


  await page.waitForTimeout(3000);


})


//delete database everytime

//Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/JobApply.spec.js - to autmate the test
// npx playwright test ./tests/JobApply.spec.js --headed - same but with display
