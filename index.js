const forms= document.querySelectorAll(".forms");
pwShowHide= document.querySelectorAll(".eye-icon");
links= document.querySelectorAll(".link");

     pwShowHide.forEach(EyeIcon => {
    EyeIcon.addEventListener("click",() =>{
        var pwFields =EyeIcon.parentElement.parentElement.querySelectorAll(".password");
        console.log(pwFields);

        pwFields.forEach(password =>{
            if(password.type === "password"){
                password.type ="text";
                EyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
             EyeIcon.classList.replace("bx-show", "bx-hide");
        })

    })
    

links.forEach(link =>{
    link.addEventListener("click", e =>{
        e.preventDefault();
        forms.classList.toggle("show-signup");
    }) 

}) 
    
});  

