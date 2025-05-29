const {test,expect}= require('@playwright/test')

test('Invalid Registeration', async function InvalidRegisteration({browser}) {
    // To make playwright ignore https
const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto('https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php');

  //First Batch of Inputs
  await page.getByRole('textbox', { name: 'First Name' }).fill('Am');
  await page.getByRole('textbox', { name: 'Last Name' }).fill('MesfinBelachweAseged');
  await page.getByRole('textbox', { name: 'Email Address' }).fill('Mesfin@gmail.com');
  await page.getByRole('textbox', { name: 'Date of Birth' }).fill('2006-12-08');
  await page.getByRole('textbox', { name: 'Create Password' }).fill('Amen');
  await page.getByRole('textbox', { name: 'Phone Number' }).fill('124123');

  //Click Next
  await page.locator('#first').click();
  //These messages Have to be visable 
  await expect(page.getByText('Provide a Valid Length First')).toBeVisible();
  await expect(page.getByText('Provide a valid Last Name')).toBeVisible();
  await expect(page.getByText('Password must be at least 8')).toBeVisible();
  await expect(page.getByText('Provide a valid length Phone')).toBeVisible();  


   await page.waitForTimeout(3000);

  //Second Batch of Invalid Inputs
  await page.keyboard.press("Backspace");
  await page.getByRole('textbox', { name: 'First Name' }).fill('amen34');
  await page.getByRole('textbox', { name: 'Last Name' }).fill('mesfin54');
  await page.getByRole('textbox', { name: 'Email Address' }).fill('mesfin@');
  await page.getByRole('textbox', { name: 'Date of Birth' }).fill('2006-12-12');
  await page.getByRole('textbox', { name: 'Create Password' }).fill('amen12345');
  await page.getByRole('textbox', { name: 'Phone Number' }).fill('12412d123m');

  //Click Next
  await page.locator('#first').click();
  //These messages Have to be visable
  await expect(page.getByText('Use Letters Only').first()).toBeVisible();  
  await expect(page.getByText('Use Letters Only').nth(1)).toBeVisible();
  await expect(page.getByText('Provide a valid email address')).toBeVisible();
  await expect(page.getByText('Password must be at least')).toBeVisible();
  await expect(page.getByText('Provide a Valid Phone Number')).toBeVisible();

  await page.waitForTimeout(2000);


})


test('Empty Field', async function InvalidRegisteration1({browser}) {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto('https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php');

//Click Next
 await page.locator('#first').click();
 //These messages Have to be visable
  await expect(page.getByText('First Name is required')).toBeVisible();
  await expect(page.getByText('Last Name is required')).toBeVisible();
  await expect(page.getByText('Email is required')).toBeVisible();
  await expect(page.getByText('Password is required')).toBeVisible();
  await expect(page.getByText('Phone Number is required')).toBeVisible();
  await expect(page.locator('#first')).toBeVisible();


  await page.waitForTimeout(5000);

})

test('Duplicate Registeration', async function InvalidRegisteration2({browser}) {
    // To make playwright ignore https
  const context = await browser.newContext({ ignoreHTTPSErrors: true });
  const page = await context.newPage();

  await page.goto('https://localhost/JobNest/Project/Job%20Vaccancies/Registeration/practice.php');


  //insert input on all fields
  await page.getByRole('textbox', { name: 'First Name' }).fill('Abera');
  await page.getByRole('textbox', { name: 'Last Name' }).fill('Barega');
  await page.getByRole('textbox', { name: 'Email Address' }).fill('mesfin@gmail.com');
  await page.getByRole('textbox', { name: 'Date of Birth' }).fill('2006-12-01');
  await page.getByRole('textbox', { name: 'Create Password' }).click();
  await page.getByRole('textbox', { name: 'Create Password' }).fill('Abera12311');
  await page.getByRole('textbox', { name: 'Phone Number' }).fill('0911872312');
  await page.locator('#first').click();
  await page.locator('#second').click();
  await page.getByRole('button', { name: 'Create Your Account' }).click();
  //redirect to url page
  await expect(page).toHaveURL(/practice.php/)  
  //Display these Message
  await expect(page.getByText('Email has already been Registered ')).toBeVisible();

  await expect(page.locator('#show-login1')).toBeVisible();


   await page.waitForTimeout(3000);

})


//Faild Test Features
//First and Last name Accept Numbers and other strings
//Phone number accepts strings other than numbers\
//Password Strength Uppercase


 //Commands
 // npx playwright show-report - to see the report
 // npx playwright test ./tests/InvalidRegisteration.spec.js - to autmate the test
// npx playwright test ./tests/InvalidRegisteration.spec.js --headed 