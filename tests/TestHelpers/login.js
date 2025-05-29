const { expect } = require('@playwright/test');

async function performLogin(browser,name,password) {
 const context = await browser.newContext({ ignoreHTTPSErrors: true });
const page = await context.newPage();

  await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Job/Job.php");

  const profileLink = page.locator('a.pro');
  await expect(profileLink).not.toBeVisible();

  await page.click('#show-login1');
  await page.waitForSelector("input[placeholder='Enter Email']");
  await page.getByPlaceholder("Enter Email").type(name);
  await page.locator("input[name='Password']").type(password);
  await page.locator("#abebe").click();

  await expect(profileLink).toBeVisible();

  return { page, context };
}

module.exports = { performLogin };