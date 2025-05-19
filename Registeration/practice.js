const div1=document.querySelector("body"),
    firstNextBtn=document.querySelector(".inputBox #first"),
    secondNextBtn=document.querySelector("#second"),
    firstBackBtn=document.querySelector("#back1"),
    secondBackBtn=document.querySelector("#back2"),
    createBtn=document.querySelector("#create"),
    firstInput= document.querySelectorAll(".Step1 .inputBox input"); 


    const firstname = document.getElementById('firstName');
    const lastname = document.getElementById('lastName');
    const email = document.getElementById('email');
    const date = document.getElementById('date');
  
    const phoneNumber = document.getElementById('phoneNumber');

    const password = document.getElementById('password'); 
firstNextBtn.addEventListener('click',()=> {

    let i = 0;
    let count=0;
    
 do{
    
    if(firstInput[i].value===true || count==5){
       const parent = firstInput[i].parentElement;
        if(parent.classList.contains('error')){
          parent.classList.remove('error');   
           }
     
        parent.classList.add('success');
        div1.classList.add('secActive');
    } else {
        div1.classList.remove('secActive');
        if(firstInput[i]===firstname){
            if(firstname.value.trim() === '') {
                setError(firstname, 'First Name is required');
                count=0;
            } 
            else if (firstname.value.trim().length < 3 || firstname.value.trim().length > 15) {
                setError(firstname, 'Provide a valid First Name');
                count=0;
            }
            else {
                setSuccess(firstname);
                count++;
            }
        }

        else if(firstInput[i]===lastname){
            if(lastname.value.trim() === '') {
                setError(lastname, 'Last Name is required');
                count=0;
            } 
            else if (lastname.value.trim().length < 3 || lastname.value.trim().length > 15) {
                setError(lastname, 'Provide a valid First Name');
                count=0;
            }
            else {
                setSuccess(lastname);
                count++;
            }
        }

        else if(firstInput[i]===date){
            if(date.value === '') {
                setError(date, 'Date is required');
                count=0;
            }else {
                setSuccess(date);
                count++;
            }
        }

        else if(firstInput[i]===email){
            if(email.value === '') {
                setError(email, 'Email is required');
                count=0;
            } else if (!isValidEmail(email.value)) {
                setError(email, 'Provide a valid email address');
                count=0;
            } else {
                setSuccess(email);
                count++;
            }
        }

        else if(firstInput[i]===phoneNumber){
            if(phoneNumber.value === '') {
                setError(phoneNumber, 'Phone Number is required');
                count=0;
            } 
            else if (phoneNumber.value.length !== 10) {
                setError(phoneNumber, 'Provide a valid Phone Number');
                count=0;
            }else {
                setSuccess(phoneNumber);
                count++;
            }
        }

        else if(firstInput[i]===password){
            if(password.value === '') {
                setError(password, 'Password is required');
                count=0;
            } else if (password.value.length < 8 ) {
                setError(password, 'Password must be at least 8 characters');
                count=0;
            } else {
                setSuccess(password);
                count++;
            }
        }


       
        
        
    }
    i++;
}while (i < firstInput.length) ;
}) 


firstBackBtn.addEventListener("click", () => div1.classList.remove('secActive'));
secondBackBtn.addEventListener("click", () => div1.classList.remove('secActive1'));
secondNextBtn.addEventListener("click", () => div1.classList.add('secActive1'));


let defaultPic=document.getElementById("defaultProfile");
let inputPic=document.getElementById("profile");

inputPic.onchange=function(){
    defaultPic.src=URL.createObjectURL(inputPic.files[0]);
}




const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};
    function setError(element, message) {
        const parent = element.parentElement;
        if(parent.classList.contains('success')){
         parent.classList.remove('success');   
        }
         parent.classList.add('error');
        
         const errorDisplay = parent.querySelector('p');
        errorDisplay.innerText=message;
    }
    
    function setSuccess(element) {
        const parent = element.parentElement;
        if(parent.classList.contains('error')){
            parent.classList.remove('error');   
           }
     
        parent.classList.add('success');
        
    } 
  