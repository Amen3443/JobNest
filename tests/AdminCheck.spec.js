const {test,expect}=require("@playwright/test")

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

const { performLogin } = require('./TestHelpers/login');

test('Admin Submit', async function ({browser}) {

     test.setTimeout(60000); 
 
//User Login
var {page} = await performLogin(browser,testdata[3].Remail,testdata[3].Rpassword);

//Clcik on profile and see the applied job section
await page.locator('.pro').click();
await page.getByRole('button', { name: 'Applied Jobs' }).click();
await expect(page.getByRole('heading', { name: 'NO Results Found' })).toBeVisible();

//User filters job and clcik the jobs apply
await page.getByRole('navigation').getByRole('link', { name: 'Job Seekers' }).hover();
await page.getByRole('navigation').getByRole('link', { name: 'Job Vaccancies' }).hover();
await page.getByRole('navigation').getByRole('link', { name: 'Job Vaccancies' }).click();  
await page.locator(`[value="${testdata[2].JobFunctions[3]}"]`).check();
await page.getByRole('button', { name: 'Apply Filters' }).scrollIntoViewIfNeeded()
await page.getByRole('button', { name: 'Apply Filters' }).click();
await page.getByRole('button', { name: 'Apply', exact: true }).nth(1).click();
await expect(page.getByText('You have Successfully Applied')).toBeVisible();
await page.locator(`[value="${testdata[2].JobFunctions[3]}"]`).check();
await page.getByRole('button', { name: 'Apply Filters' }).scrollIntoViewIfNeeded()
await page.getByRole('button', { name: 'Apply Filters' }).click();
await page.getByRole('button', { name: 'Apply', exact: true }).nth(2).click();
await expect(page.getByText('You have Successfully Applied')).toBeVisible();

//Click on profile and see if the jobs are there u applied for saying pending
await page.locator('.pro').click();
await page.getByRole('button', { name: 'Applied Jobs' }).click();
await expect(page.getByRole('button', { name: 'Pending' }).first()).toBeVisible();
await expect(page.getByRole('button', { name: 'Pending' }).nth(1)).toBeVisible();
await page.waitForTimeout(3000);

//logout
await page.getByRole('link', { name: 'Log Out' }).click();
//admin login
var {page} = await performLogin(browser,testdata[0].Aemail,testdata[0].Apassword);
await expect(page).toHaveURL(/Admin/) ;

//Looks for the user job to clcik Accept or replie
 const heading =  await page.getByRole('heading', {
  name: 'Junior Architect Applied BY Brad David'
});

//  From heading, go to its parent <div>, then next sibling <form>
const form = heading.locator('xpath=../../following-sibling::form[1]');
// Select option from the combobox inside that form
await form.locator('select[name="approval"]').selectOption('Accepted');
await form.locator('button#jobapply').scrollIntoViewIfNeeded();
await form.locator('button#jobapply').hover();
await page.waitForTimeout(2000);
await form.locator('button#jobapply').click();
  
const heading2 =  await page.getByRole('heading', {
  name: 'Grader Operator Applied BY Brad David'
});

//From heading, go to its parent <div>, then next sibling <form>
const form2 = heading2.locator('xpath=../../following-sibling::form[1]');

//Select option from the combobox inside that form
await form2.locator('select[name="approval"]').selectOption('Rejected');
await form2.locator('button#jobapply').scrollIntoViewIfNeeded();
await form2.locator('button#jobapply').hover();
await page.waitForTimeout(2000);
await form2.locator('button#jobapply').click();

  
//Logout and Comeback as User and see Applied jobs if they were accepted or rejected
await page.getByRole('link', { name: 'Log Out' }).click();
var {page} = await performLogin(browser,testdata[3].Remail,testdata[3].Rpassword);
await page.locator('.pro').click();
await page.getByRole('button', { name: 'Applied Jobs' }).click();
await expect(page.getByRole('button', { name: 'Accepted' })).toBeVisible();
await expect(page.getByRole('button', { name: 'Rejected' })).toBeVisible();


await page.waitForTimeout(3000);






})
//Reset Applied Jobs database

  //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/AdminCheck.spec.js - to autmate the test
// npx playwright test ./tests/AdminCheck.spec.js --headed - same but with display