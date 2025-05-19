const {test,expect}= require('@playwright/test')
test.only('title page',async function({page}){


    await page.goto("https://www.google.com")

    const url= await page.url()
    console.log(url)

    await expect(page).toHaveTitle('Google')
})