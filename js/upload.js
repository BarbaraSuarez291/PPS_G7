//Parrafos error
const err_descrip = document.querySelector("#err_descrip");

//Inputs

const descrip = document.querySelector("#descripcion");


descrip.addEventListener('blur', () =>{
    if(descrip.value.length < 3){
        err_descrip.innerHTML="❌Debe tener mas de 3 caracteres"
        btn_file.value = '';
    }else{
        err_descrip.innerHTML=""
    }
    
})


function validarExt()
{
    var archivoInput = document.getElementById('btn_file');
    var archivo = btn_file.value;
    var extPermitidas = /(.jpg|.png|.jpeg)$/i;
    archivoRuta = archivo.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file.value = '';
        return false;
    }
    
}

function validarExt2()
{
    var archivoInput = document.getElementById('btn_file2');
    var archivoRuta = btn_file2.value;
   // var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg|.gif|.jpeg)$/i;
   var extPermitidas = /(.jpg|.png|.jpeg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file2.value = '';
        return false;
    }
}


function validarExt3()
{
    var archivoInput = document.getElementById('btn_file3');
    var archivoRuta = btn_file3.value;
    // var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg|.gif|.jpeg)$/i;
   var extPermitidas = /(.jpg|.png|.jpeg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file3.value = '';
        return false;
    }
}

function validarExt4()
{
    var archivoInput = document.getElementById('btn_file4');
    var archivoRuta = btn_file4.value;
   // var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg|.gif|.jpeg)$/i;
   var extPermitidas = /(.jpg|.png|.jpeg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file4.value = '';
        return false;
    }
}



