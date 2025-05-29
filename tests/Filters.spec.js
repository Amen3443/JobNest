const {test,expect}=require("@playwright/test")

const testdata=JSON.parse(JSON.stringify(require("../testdata.json")))

const { performLogin } = require('./TestHelpers/login');

test('Function Filters', async function ({browser}) {

const context = await browser.newContext({ ignoreHTTPSErrors: true });
const page = await context.newPage();

await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Job/Job.php");

//Select the JobFuctions and Apply the Filter
await page.locator(`[value="${testdata[2].JobFunctions[4]}"]`).check();
await page.locator(`[value="${testdata[2].JobFunctions[1]}"]`).check();
await page.locator(`[value="${testdata[2].JobFunctions[2]}"]`).check();
await page.getByRole('button', { name: 'Apply Filters' }).click();

//number of Selected Fuctions
const jobs = await page.locator('form.jobdetails').count();
const keywords=[
  testdata[2].JobFunctions[4],
  testdata[2].JobFunctions[1],
  testdata[2].JobFunctions[2]
]

//loop for knowing the filters work by examing the job detail's functions
for (let i = 0; i < jobs; i++) {
  const jobCard = page.locator('form.jobdetails').nth(i);
  const functionParagraph = await jobCard.locator('p').nth(2).textContent();

  const text = functionParagraph?.split('Function:')[1]?.split('|')[0]?.trim();


  if (keywords.some(keywords => text.includes(keywords))) {
    expect(true).toBe(true);
  } else {
    expect(true).toBe(false);
  }
}

//To scroll
await page.evaluate(async () => {
  for (let i = 0; i <= 1800; i += 20) {
    window.scrollTo(0, i);
    await new Promise(r => setTimeout(r, 50)); // wait 30ms per scroll step
  }
});

  await page.waitForTimeout(5000);


})

test('Search Filter', async function ({browser}) {

const context = await browser.newContext({ ignoreHTTPSErrors: true });
const page = await context.newPage();

await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Job/Job.php");

//Type on the search filter and click search
await page.getByRole('textbox', { name: 'Keyword' }).fill('Data');
const searchword= await page.getByRole('textbox', { name: 'Keyword' }).inputValue();
await page.getByRole('button', { name: 'Search' }).click();

//Number of jobs listed after the filter
const jobs = await page.locator('form.jobdetails').count();

//Compare all the listed jobs and see if they conatin the keyword
if (jobs==0) {
await expect(page.getByRole('heading', { name: 'NO Results Found' })).toBeVisible();
} else {
    for (let i = 0; i < jobs; i++) {
    const jobCard = await page.locator('form.jobdetails').nth(i).textContent();

    if (jobCard.includes(searchword)) {
    expect(true).toBe(true);
  } else {
    expect(true).toBe(false);
  }
}   
}

//Scroll
await page.evaluate(async () => {
  for (let i = 0; i <= 1000; i += 20) {
    window.scrollTo(0, i);
    await new Promise(r => setTimeout(r, 50)); // wait 30ms per scroll step
  }
});

await page.waitForTimeout(3000);

await page.evaluate(() => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

//The same thing but with a different word location
await page.getByRole('textbox', { name: 'Keyword' }).fill('USA');
const searchwords= await page.getByRole('textbox', { name: 'Keyword' }).inputValue();
await page.getByRole('button', { name: 'Search' }).click();


const jobss = await page.locator('form.jobdetails').count();

if (jobss==0) {
await expect(page.getByRole('heading', { name: 'NO Results Found' })).toBeVisible();
} else {
    for (let i = 0; i < jobs; i++) {
    const jobCard = await page.locator('form.jobdetails').nth(i).textContent();

    if (jobCard.includes(searchwords)) {
    expect(true).toBe(true);
  } else {
    expect(true).toBe(false);
  }
}   
}

await page.evaluate(async () => {
  for (let i = 0; i <= 1000; i += 20) {
    window.scrollTo(0, i);
    await new Promise(r => setTimeout(r, 50)); // wait 30ms per scroll step
  }
});

await page.waitForTimeout(3000);


})




test('Selection/Level Filter', async function ({browser}) {

const context = await browser.newContext({ ignoreHTTPSErrors: true });
const page = await context.newPage();

await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Job/Job.php");

//Select filter of Job Experiance level
await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[2]);
await page.getByRole('button', { name: 'Search' }).click();

//Number of jobs listed
const jobs = await page.locator('form.jobdetails').count();

//Compare
for (let i = 0; i < jobs; i++) {
  const jobCard = page.locator('form.jobdetails').nth(i);
  const functionParagraph = await jobCard.locator('p').nth(1).textContent();

  const text = functionParagraph?.split('Experience Level:')[1]?.split('|')[0]?.trim();
  //console.log('Extracted Function:', text);

    if (text.includes(testdata[2].ExperienceLevel[2])) {
    expect(true).toBe(true);
  } else {
    expect(true).toBe(false);
  }
}

//scroll
await page.evaluate(async () => {
  for (let i = 0; i <= 1000; i += 20) {
    window.scrollTo(0, i);
    await new Promise(r => setTimeout(r, 50)); // wait 30ms per scroll step the first step must
  }
});

  await page.waitForTimeout(3000);

  await page.evaluate(() => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

//Do the same thing but differnet job experiance
await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[4]);
await page.getByRole('button', { name: 'Search' }).click();

const jobss = await page.locator('form.jobdetails').count();

for (let i = 0; i < jobss; i++) {
  const jobCard = page.locator('form.jobdetails').nth(i);
  const functionParagraph = await jobCard.locator('p').nth(1).textContent();

  const text = functionParagraph?.split('Experience Level:')[1]?.split('|')[0]?.trim();
 // console.log('Extracted Function:', text);

    if (text.includes(testdata[2].ExperienceLevel[4])) {
    expect(true).toBe(true);
  } else {
    expect(true).toBe(false);
  }
}

 await page.evaluate(async () => {
  for (let i = 0; i <= 1000; i += 20) {
    window.scrollTo(0, i);
    await new Promise(r => setTimeout(r, 50)); // wait 30ms per scroll step
  }
});

  await page.waitForTimeout(3000);



})



test('Combination Filter', async function ({browser}) {

const context = await browser.newContext({ ignoreHTTPSErrors: true });
const page = await context.newPage();

await page.goto("https://localhost/JobNest/Project/Job%20Vaccancies/Job/Job.php");

//Select 2 of the filters experiance and type
await page.locator('#JobExp').selectOption(testdata[2].ExperienceLevel[3]);
await page.locator('#Jobtype').selectOption(testdata[2].Type[1]);
await page.getByRole('button', { name: 'Search' }).click();


const jobs = await page.locator('form.jobdetails').count();

//Compare for the 2 filters
for (let i = 0; i < jobs; i++) {
  const jobCard = page.locator('form.jobdetails').nth(i);
  const functionParagraph = await jobCard.locator('p').nth(1).textContent();
  const text = functionParagraph?.split('Experience Level:')[1]?.split('|')[0]?.trim();
  const functionParagraph2 = await jobCard.locator('p').nth(2).textContent();
  const text2 = functionParagraph2?.split('Type:')[1]?.split('|')[0]?.trim();

    if (text.includes(testdata[2].ExperienceLevel[3]) && text2.includes(testdata[2].Type[1]) ) {
    expect(true).toBe(true);
  } else {
    expect(true).toBe(false);
  }
}

 await page.waitForTimeout(3000);


//Select 2 of the filters experiance and type plus a keyword
await page.locator('#JobExp').selectOption('Entry Level');
await page.getByRole('textbox', { name: 'Keyword' }).click();
await page.getByRole('textbox', { name: 'Keyword' }).fill('receptions');

var searchword= await page.getByRole('textbox', { name: 'Keyword' }).inputValue();

searchword= searchword.toUpperCase();
  await page.getByRole('button', { name: 'Search' }).click();


//Count
const jobss = await page.locator('form.jobdetails').count();

//Compare all 3 filters
 for (let i = 0; i < jobss; i++) {
    const jobCard = await page.locator('form.jobdetails').nth(i);

    var jobCards = await page.locator('form.jobdetails').nth(i).textContent();
    jobCards=jobCards.toUpperCase();
    const functionParagraph = await jobCard.locator('p').nth(1).textContent();
    const text = functionParagraph?.split('Experience Level:')[1]?.split('|')[0]?.trim();
    const functionParagraph2 = await jobCard.locator('p').nth(2).textContent();
    const text2 = functionParagraph2?.split('Type:')[1]?.split('|')[0]?.trim();


    if (text.includes(testdata[2].ExperienceLevel[3]) && text2.includes(testdata[2].Type[1]) && jobCards.includes(searchword) ) {
    expect(true).toBe(true); }
    else {
    expect(true).toBe(false);
    }
}

 await page.waitForTimeout(3000);


})


//Commands
// npx playwright show-report - to see the report
// npx playwright test ./tests/Filters.spec.js - to autmate the test
// npx playwright test ./tests/Filters.spec.js --headed - same but with display


