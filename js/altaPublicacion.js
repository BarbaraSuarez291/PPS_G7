

function validarExt()
{
    var archivoInput = document.getElementById('btn_file');
    var archivoRuta = btn_file.value;
    var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file.value = '';
        return false;
    }
}




function validarExt3()
{
    var archivoInput = document.getElementById('btn_file3');
    var archivoRuta = btn_file3.value;
    var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file3.value = '';
        return false;
    }

    else
    {
       
        if (btn_file3.files && btn_file3.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                var extImg = /(.jpg|.png|.jpeg)$/i;
                if (extImg.exec(archivoRuta)) {
                    document.getElementById('visorArchivo3').innerHTML =
                    '<embed id="img_visor" src="'+e.target.result+'" />';
                }
                else{

                    document.getElementById('visorArchivo3').innerHTML =
                    '<video width="340" height="280" > <source src="'+e.target.result+'" type="video/mp4" /> <source src="'+e.target.result+'" type="video/webm" /><source src="'+e.target.result+'" type="video/ogg" /><img src="'+e.target.result+'" alt="Video no soportado" /> Su navegador no soporta contenido multimedia.  </video>';
            
                }
            };
            visor.readAsDataURL(btn_file3.files[0]);
        }
    }
}



function validarExt4()
{
    var archivoInput = document.getElementById('btn_file4');
    var archivoRuta = btn_file4.value;
    var extPermitidas = /(.jpg|.png|.mp4|.ogm|.ogv|.ogg)$/i;
    archivoRuta = archivoRuta.toLowerCase();
    if(!extPermitidas.exec(archivoRuta)){
        alert('Extension de archivo incorrecta');
        btn_file4.value = '';
        return false;
    }

    else
    {
       
        if (btn_file4.files && btn_file4.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                var extImg = /(.jpg|.png|.jpeg)$/i;
                if (extImg.exec(archivoRuta)) {
                    document.getElementById('visorArchivo4').innerHTML =
                    '<embed id="img_visor" src="'+e.target.result+'" />';
                }
                else{

                    document.getElementById('visorArchivo4').innerHTML =
                    '<video width="340" height="280" > <source src="'+e.target.result+'" type="video/mp4" /> <source src="'+e.target.result+'" type="video/webm" /><source src="'+e.target.result+'" type="video/ogg" /><img src="'+e.target.result+'" alt="Video no soportado" /> Su navegador no soporta contenido multimedia.  </video>';
            
                }
            };
            visor.readAsDataURL(btn_file4.files[0]);
        }
    }
}