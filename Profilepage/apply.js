// body.addEventListener("load", function(){ 
document.querySelector("#Rjobs").style.backgroundColor='#b1b2b3';
// });


document.querySelector("#Rjobs").addEventListener("click",function(){ 
    document.querySelector(".jobdashboard_active").style.display='none';
    document.querySelector(".jobdashboard").style.display='block';
    document.querySelector(".job_buttons").style.backgroundColor='#b1b2b3';
  
});

    document.querySelector("#Ajobs").addEventListener("click",function(){
        document.querySelector(".jobdashboard").style.display='none';
        document.querySelector(".jobdashboard_active").style.display='block';
        document.querySelector("#Rjobss").style.backgroundColor='#E0E5E9';
        document.querySelector("#Ajobss").style.backgroundColor='#b1b2b3';
    });

    // document.querySelector("#Rjobs").addEventListener("click",function(){ 
    //     document.querySelector(".jobdashboard_active").style.display='none';
    //     document.querySelector(".jobdashboard").style.display='block';
    //     document.querySelector(".job_buttons").style.backgroundColor='#b1b2b3';
      
    // });
    document.querySelector("#Ajobss").addEventListener("click",function(){
        document.querySelector(".jobdashboard").style.display='none';
        document.querySelector(".jobdashboard_active").style.display='block';
        document.querySelector("#Ajobs").style.backgroundColor='#E0E5E9';
        document.querySelector("#Rjobs").style.backgroundColor='#b1b2b3';
     
       
       
    });
    document.querySelector("#Rjobss").addEventListener("click",function(){ 
        document.querySelector(".jobdashboard_active").style.display='none';
        document.querySelector(".jobdashboard").style.display='block';
        document.querySelector(".job_buttons").style.backgroundColor='#b1b2b3';
      
    });

    var statuss= document.querySelectorAll('#job_status');
    var sb= document.querySelectorAll(".status_b");
    var sta=[];
    statuss.forEach(el => {
        sta=el;
    });
     var i=0;
    sb.forEach(e => {
      
        e.innerText=statuss[i].value;
        if (e.innerText=="Pending") {
            e.style.backgroundColor='orange';
             }
         if (e.innerText=="Accepted") {
            e.style.backgroundColor='green';
         }
         if (e.innerText=="Rejected") {
            e.style.backgroundColor='red';
         }
         i++;

    });
 
// if (sb.innerText=="Pending") {
//     sb.style.backgroundColor='red';
// }

