//Parrafos error
const err_descrip = document.querySelector("#err_descrip");

//Inputs

const descrip = document.querySelector("#descripcion");


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
    
        let archivo = form.querySelector('btn_file').files[0].size;
let maximo = form.querySelector('input[name="MAX_FILE_SIZE"]').value;
if (archivo > 41943040 ) {
  alert('Máximo superado');
}
    
}

function validarExt2()
{
    var archivoInput = document.getElementById('btn_file2');
    var archivoRuta = btn_file2.value;
    var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg|.gif|.jpeg)$/i;
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
    var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg|.gif|.jpeg)$/i;
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
    var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg|.gif|.jpeg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file4.value = '';
        return false;
    }
}



descrip.addEventListener('blur', () =>{
    if(descrip.value.length < 3){
        err_descrip.innerHTML="❌Debe tener mas de 3 caracteres"
        btn_file.value = '';
    }else{
        err_descrip.innerHTML=""
    }
    
})
