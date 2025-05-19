
document.querySelector("#show-login1").addEventListener("click",function(){

    document.querySelector(".popup").classList.add("active");
    document.querySelector(".container").classList.add("active");
  
    document.querySelector("*").style.backgroundBlendMode="darken";});
  document.querySelector(".popup .close-btn").addEventListener("click",function(){
    document.querySelector(".popup").classList.remove("active");
    document.querySelector(".container").classList.remove("active");
  });
 
  document.querySelector("#show-login").addEventListener("click",function(){
    
    document.querySelector(".popup1").classList.add("active");
    document.querySelector(".container").classList.add("active");
  
    document.querySelector("*").style.backgroundBlendMode="darken";});
 
    document.querySelector(".popup1 .close-btn").addEventListener("click",function(){
      document.querySelector(".popup1").classList.remove("active");
      document.querySelector(".container").classList.remove("active");
    });



    document.querySelector("#reset").addEventListener("click",function () {
  
      document.querySelector("#check").removeAttribute('checked');
      // document.querySelector("select").value=''
      
    })
    // document.querySelector("#fun1").addEventListener("click",function () {
    //   document.querySelector("#check").checked= false
      
    // })