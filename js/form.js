//Parrafos error
const errName = document.querySelector("#errName");
const errLastName = document.querySelector("#errLastName");
const errEmail = document.querySelector("#errEmail");
const errPassword = document.querySelector("#errPassword");
const errPasswordConfirm = document.querySelector("#errPasswordConfirm");

//Inputs

const inputName = document.querySelector("#nameSignUp");
const inputLastName = document.querySelector("#lastNameSignUp");
const inputEmail = document.querySelector("#emailSignUp");
const inputPassword = document.querySelector("#passwordSignUp");
const inputPasswordConfirm = document.querySelector("#passwordConfirmSignUp");

inputName.addEventListener('blur', () =>{
    if(inputName.value.length < 3){
        errName.innerHTML="❌Debe contener mas de 3 caracteres"
    }else{
        errName.innerHTML=""
    }
    
})

inputLastName.addEventListener('blur', () =>{
    if(inputLastName.value.length < 3){
        errLastName.innerHTML="❌Debe contener mas de 3 caracteres"
    }else{
        errLastName.innerHTML=""
    }
    
})

inputEmail.addEventListener('blur', () =>{
    const re = /\S+@\S+\.\S+/
    
    if(re.test(inputEmail.value)){
        errEmail.innerHTML=""
    }else{
        errEmail.innerHTML="❌Email incorrecto"
    }
    
})

inputPassword.addEventListener('blur', () =>{
    
   if(inputPassword.value.length < 8){
    errPassword.innerHTML="❌Debe contener mas de 6 caracteres"
   }else{
       errPassword.innerHTML=""
   }
})

inputPasswordConfirm.addEventListener('blur', () =>{
    
    if(inputPasswordConfirm.value=== inputPassword.value){
     errPasswordConfirm.innerHTML=""
    }else{
        errPasswordConfirm.innerHTML="❌Las contraseñas no coinciden"
    }
 })


