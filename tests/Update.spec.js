const {test,expect}=require("@playwright/test")

const { performLogin } = require('./TestHelpers/login');


test.only('Valid Logout', async ({ browser }) => {

//Perform Loginnn
const {page} = await performLogin(browser,'Amen@gmail.com','Amen12345');


 await page.locator('.pro').click();

await page.getByRole('button', { name: 'Applied Jobs' }).click();

await page.waitForTimeout(1000);

await page.getByRole('button', { name: 'Recommended Jobs' }).click();

 await page.waitForTimeout(2000);

  

  await page.getByRole('link', { name: 'Update Profile' }).click();

  await page.getByRole('textbox', { name: 'First Name' }).fill('Yared');

  await page.getByRole('textbox', { name: 'Last Name' }).fill('Simon');


  await page.getByRole('textbox', { name: 'Email Address' }).fill('Yared@gmail.com');


  await page.getByRole('textbox', { name: 'Create Password' }).fill('Yared12345');

  await page.getByRole('textbox', { name: 'Date of Birth' }).fill('2006-12-19');

  await page.locator('select[name="location"]').selectOption('Addis Ababa');


  await page.getByRole('textbox', { name: 'Phone Number' }).fill('0911044498');

  await page.locator('#first').click();

  await page.locator('select[name="Experience"]').selectOption('Senior Level');

  await page.locator('select[name="Function"]').selectOption('IT & Telecom');

  await page.locator('select[name="type"]').selectOption('Full Time');

  await page.locator('#second').click();

  //await page.getByText('Select Picture').click();

  await page.locator('#profile').setInputFiles('profile/mezid.jpg');

  await page.getByRole('button', { name: 'Update Your Profile' }).click();

  await expect(page).toHaveURL(/profile.php/)  

  await expect(page.getByText('You have Successfully Updated')).toBeVisible();


  await expect(page.locator('span').nth(1)).toHaveText('First Name: Yared')
  await expect(page.locator('span').nth(2)).toHaveText('Last Name: Simon')
  await expect(page.locator('span').nth(3)).toHaveText('Email: Yared@gmail.com')
  await expect(page.locator('span').nth(4)).toHaveText('Date of Birth: 2006-12-19')
  await expect(page.locator('span').nth(5)).toHaveText('Gender: Male')
  await expect(page.locator('span').nth(6)).toHaveText('Phone Number: 0911044498')
  await expect(page.locator('span').nth(7)).toHaveText('Desired Function: IT & Telecom')
  await expect(page.locator('span').nth(8)).toHaveText('Experience Level: Senior Level')
  await expect(page.locator('span').nth(9)).toHaveText('Type: Full Time')

  await page.getByRole('button', { name: 'Applied Jobs' }).click();

await page.waitForTimeout(1000);

await page.getByRole('button', { name: 'Recommended Jobs' }).click();

   await page.waitForTimeout(4000);

  await page.click('a.logout');

  await page.click('#show-login1');

  await page.getByRole('textbox', { name: 'Enter Email' }).fill('Yared@gmail.com');

  await page.getByRole('textbox', { name: 'Enter Your Password' }).fill('Yared12345');

  await page.getByRole('button', { name: 'Log In' }).click();

  await expect(page.locator('.pro')).toBeVisible();

  await page.locator('.pro').click();

  await expect(page.getByRole('heading', { name: 'Welcome Yared Simon' })).toBeVisible();


   await page.waitForTimeout(4000);

})

///update email that already exists 