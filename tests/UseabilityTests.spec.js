const { performLogin } = require('./TestHelpers/login');
const {test,expect}=require("@playwright/test")

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))
test('Navigation Checks', async function ({browser}) {

const context = await browser.newContext({ ignoreHTTPSErrors: true });
var page = await context.newPage();

test.setTimeout(70000);

//All of these are buttons,links and untested functions...to test user interactablity
await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Home/Home.php");
await page.getByRole('navigation').getByRole('link', { name: 'Job Seekers' }).hover();

await page.getByRole('navigation').getByRole('link', { name: 'Job Vaccancies' }).hover();

await page.getByRole('navigation').getByRole('link', { name: 'Job Vaccancies' }).click();
await page.getByRole('navigation').getByRole('link', { name: 'Job Seekers' }).hover();

await page.getByRole('navigation').getByRole('link', { name: 'Job Vaccancies' }).hover();
await page.getByRole('navigation').getByRole('link', { name: 'Carrier Tips' }).click();

await page.getByRole('list').getByRole('link', { name: 'Candidates' }).click();

await page.getByRole('link', { name: 'Companies' }).click();
await page.getByRole('navigation').getByRole('link', { name: 'Help Center' }).hover();

await page.getByRole('navigation').getByRole('link', { name: 'Contact Us' }).hover();
await page.getByRole('navigation').getByRole('link', { name: 'Contact Us' }).click();

await page.getByRole('navigation').getByRole('link', { name: 'Help Center' }).hover();

await page.getByRole('navigation').getByRole('link', { name: 'About Us' }).hover();
await page.getByRole('navigation').getByRole('link', { name: 'About Us' }).click();

await page.getByRole('link', { name: 'Sign Up' }).click();
await page.locator('#blur').getByRole('link', { name: 'JobNest' }).click();

await page.getByRole('textbox', { name: 'Keyword' }).fill('Manager');
await page.getByRole('button', { name: 'Search' }).click();

await page.waitForTimeout(2000);
await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();

await page.getByRole('button', { name: 'Engineering' }).scrollIntoViewIfNeeded();
await page.getByRole('button', { name: 'Engineering' }).hover();
await page.getByRole('button', { name: 'Engineering' }).click();

await page.waitForTimeout(2000);

await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();
await page.getByRole('button', { name: 'Sales & Marketing' }).scrollIntoViewIfNeeded();
await page.getByRole('button', { name: 'Sales & Marketing' }).hover()
await page.getByRole('button', { name: 'Sales & Marketing' }).click();

await page.waitForTimeout(2000);

await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();

await page.getByRole('button', { name: 'Law' }).scrollIntoViewIfNeeded();
await page.getByRole('button', { name: 'Law' }).hover();
await page.getByRole('button', { name: 'Law' }).click();

await page.waitForTimeout(2000);

await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();

await page.getByRole('button', { name: 'IT & Telecom' }).scrollIntoViewIfNeeded();
await page.getByRole('button', { name: 'IT & Telecom' }).hover();
await page.getByRole('button', { name: 'IT & Telecom' }).click();

await page.waitForTimeout(2000);

await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();

await page.locator('#cv').scrollIntoViewIfNeeded();
await page.locator('#cv').hover()
await page.locator('#cv').click();
await page.locator('#blur').getByRole('link', { name: 'JobNest' }).click();

await page.locator('#save').scrollIntoViewIfNeeded();
await page.locator('#save').hover();
await page.locator('#save').click();
await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();


await page.locator('button[name="Title"]').nth(0).scrollIntoViewIfNeeded();
await page.locator('button[name="Title"]').nth(2).click();

await page.waitForTimeout(2000);

await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();


await page.getByRole('link', { name: 'View More' }).scrollIntoViewIfNeeded();
await page.getByRole('link', { name: 'View More' }).hover();
await page.getByRole('link', { name: 'View More' }).click();

await page.waitForTimeout(2000);

await page.getByRole('heading', { name: 'Job Seeker' }).click();


  //await page.getByRole('heading', { name: 'Employers' }).click();
await page.getByRole('contentinfo').getByRole('link', { name: 'Candidates' }).scrollIntoViewIfNeeded();
await page.getByRole('contentinfo').getByRole('link', { name: 'Candidates' }).hover();
await page.getByRole('contentinfo').getByRole('link', { name: 'Candidates' }).click();

await page.getByRole('textbox', { name: 'Keyword' }).fill('Amen');
await page.getByRole('button', { name: 'Search' }).click();

await page.waitForTimeout(2000);

await page.getByRole('link', { name: 'Companies' }).click();

await page.getByRole('button', { name: 'Jobs (5)' }).scrollIntoViewIfNeeded();
await page.getByRole('button', { name: 'Jobs (5)' }).hover();
await page.getByRole('button', { name: 'Jobs (5)' }).click();

await page.waitForTimeout(2000);

await page.getByText('JobNest Job Seekers Job').click();

await page.getByRole('navigation').getByRole('link', { name: 'JobNest' }).click();

await page.getByRole('link', { name: 'Companies' }).click();

await page.getByRole('button', { name: 'U', exact: true }).hover()
await page.getByRole('button', { name: 'U', exact: true }).click();
await page.waitForTimeout(2000);

await context.close();



})