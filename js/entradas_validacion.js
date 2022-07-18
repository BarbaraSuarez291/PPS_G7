//Parrafos error
const errCant = document.querySelector("#errCant");
const errMetodoDePago = document.querySelector("#err-metodo-de-pago");
const errNum = document.querySelector("#err-numero-usuario");
//Inputs

const inputCant = document.querySelector("#select_cantidad");
const inputMetodoDePago = document.querySelector("#metodo_de_pago");
const inputNumero = document.querySelector("#contacto");
inputCant.addEventListener('blur', () =>{
    if(inputCant.value == 0){
        errCant.innerHTML="❌Debe seleccionar la cantidad"
    }else{
        errCant.innerHTML=""
    }

})

inputMetodoDePago.addEventListener('blur', () =>{
    if(inputMetodoDePago.value == 0){
        errMetodoDePago.innerHTML="❌Debe elegir un metodo de pago"
    }else{
        errMetodoDePago.innerHTML=""
    }
    
})

inputNumero.addEventListener('blur', () =>{
    if(inputNumero.value == 0){
        errNum.innerHTML="❌Debe dejar un numero de contacto"
    }else{
        errNum.innerHTML=""
    }
    
})