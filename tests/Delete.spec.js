const {test,expect}=require("@playwright/test")

const { performLogin } = require('./TestHelpers/login');


test.only('Successfull Deletion', async ({ browser }) => {

//Perform Loginnn
const {page} = await performLogin(browser,'Selam@gmail3.com','selam12345');


 await page.locator('.pro').click();

await page.waitForTimeout(1000);

 await page.locator('.pro').click();

  await page.locator('#show-login1').click();


  await page.getByRole('textbox', { name: 'Enter Email' }).fill('Selam@gmail3.com');


  await page.getByRole('textbox', { name: 'Enter Password' }).fill('selam12345');


  await page.locator('#abebe').click();

  await page.waitForTimeout(1000);

    await expect(page).toHaveURL(/Home.php/)  

  await expect(page.getByRole('link', { name: 'Log In' })).toBeVisible();

   await page.locator('#show-login1').click();


  await page.getByRole('textbox', { name: 'Enter Email' }).fill('Selam@gmail4.com');


  await page.getByRole('textbox', { name: 'Enter Your Password' }).fill('selam12345');

    await page.locator('#abebe').click();

    const errorMessage = page.locator('span.status', { hasText: 'Your Email or Password is Incorrect' });
  await expect(errorMessage).toBeVisible(); 


    await page.waitForTimeout(3000);



})




test('Unsuccessfull Deletion', async ({ browser }) => {

//Perform Loginnn
const {page} = await performLogin(browser,'Amen@gmail.com','Amen12345');


 await page.locator('.pro').click();

await page.waitForTimeout(1000);

 await page.locator('.pro').click();

  await page.locator('#show-login1').click();


  await page.getByRole('textbox', { name: 'Enter Email' }).fill('Selam@gmail3.com');


  await page.getByRole('textbox', { name: 'Enter Password' }).fill('selam12345');


  await page.locator('#abebe').click();

  const errorMessage = page.locator('span.status', { hasText: 'Incorrect Password or Email' });
  await expect(errorMessage).toBeVisible(); 



    await page.waitForTimeout(3000);



})