let burgerBtn = document.querySelector(".burger_btn");
let burgerMenu= document.querySelector(".burger-links");
let pro= document.querySelector(".pro");
let logout= document.querySelector(".logout");
let isBurgerOpen = false;


burgerBtn.onclick= function () {

if (!isBurgerOpen) {

burgerMenu.style.display = "block";

burgerBtn.style.backgroundPosition = "center left 50px, center";
isBurgerOpen = true;
logout.style.display = "block";
pro.style.display = "block";
}

else if (isBurgerOpen) {

burgerMenu.style.display = "none";

burgerBtn.style.backgroundPosition ="center, center left 50px";
isBurgerOpen = false;
logout.style.display = "none";
pro.style.display = "none";
}
}