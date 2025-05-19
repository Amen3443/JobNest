const {test,expect}= require('@playwright/test')

test('sample',async function({page}) {
    
expect(12).toBe(12)
expect(46).toBe(57)


})
test.only('samples2',async function({page}) {
    
expect(12).toBe(12)
expect('abebe').toContain('abebe')
expect(true).toBeTruthy()
expect(false).toBeFalsy()
})

test.only('sample4',async function({page}) {
    
expect('abebe'.includes("abe")).toBeTruthy()

})
