//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////VARIABLES GLOBALES////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
let LenguajeParametros = {
    zeroRecords: `<span style="filter: opacity(0.5);"><br><span><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg></span><br><br> <b>Sin resultados</b></p><p style="color:#d4d4d4">No se encontró ninguna EDA</p> </span>`,
    emptyTable: `<span style="filter: opacity(0.5);"><br><span><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg></span><br><br> <b>Sin resultados</b></p></span>`,
    lengthMenu: "Mostrar _MENU_ registros",
    paginate: {
        "first": "Primero",
        "last": "Último",
        "next": "❯",
        "previous": "❮"
    },
    lengthMenu: "_MENU_",
    search: "Buscar",
    infoEmpty: "Resultados 0",
    infoFiltered: "(de _MAX_ )",
    info: "Resultados _TOTAL_ "
}

let calendarioNormal = {
    altInput: true,
    altFormat: "l j F, Y",
    dateFormat: "Y-m-d",
    defaultDate: 'today',
    disableMobile: true,
    // weekNumbers:true,
    // mode: "range",

    locale: {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        months: {
            shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
            longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ],
        },
        rangeSeparator: "    a    ",
    }
}

let calendarioConrangos = {
    altInput: true,
    altFormat: "l j F, Y",
    dateFormat: "Y-m-d",
    disableMobile: true,
    // weekNumbers:true,
    mode: "range",

    locale: {
        firstDayOfWeek: 1,
        weekdays: {
            shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        months: {
            shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
            longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ],
        },
        rangeSeparator: "    a    ",
    }
}

let localDefecto = {
    firstDayOfWeek: 1,
    weekdays: {
        shorthand: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        longhand: [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado",
        ],
    },
    months: {
        shorthand: [
            "Ene",
            "Feb",
            "Mar",
            "Abr",
            "May",
            "Jun",
            "Jul",
            "Ago",
            "Sep",
            "Оct",
            "Nov",
            "Dic",
        ],
        longhand: [
            "Enero",
            "Febreo",
            "Мarzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ],
    },
    rangeSeparator: "    a    ",
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




// Colorear Opcion Menú Seleccionado
function pintarOpcionMenuActiva() {
    let miMenu = document.querySelector('.menu_de_aplicaciones_mpt')
    let misA = miMenu.querySelectorAll('a')
    let mirutaActual = location.href
    let misaArray = mirutaActual.split('/');
    let validaruta = `${misaArray[misaArray.length - 2]}/${misaArray[misaArray.length - 1]}`
    let cont = 0
    misA.forEach((a) => {
        if (cont == 0) {

        } else {
            let rutaA = a.getAttribute('href')
            let miopcionRut = rutaA.split('/');
            let validaopcionruta = `${miopcionRut[miopcionRut.length - 2]}/${miopcionRut[miopcionRut.length - 1]}`
            if (mirutaActual.includes(validaopcionruta)) {
                a.classList.add('active')
            }

        }
        cont++
    })
}


function Mensaje1(tipo = 0, contenido = "") {
    // 0 -> mensaje de error
    // 1 -> mensaje correcto 
    // 2 -> mensaje de precausion 
    let mensajeTipoUno = document.getElementById('mensaje-tipo-uno')
    let contenidoMensajeUno = document.getElementById('contenido-mensaje')
    let svgMensajeUno = document.getElementById('svg-mensaje')
    let boxColor = document.getElementById('box-color-mensaje')
    switch (tipo) {
        case 0:
            boxColor.classList.add('bg-danger')
            boxColor.classList.remove('bg-success')
            boxColor.classList.remove('bg-warning')
            svgMensajeUno.innerHTML = SVG_error
            contenidoMensajeUno.innerHTML = contenido
            break;
        case 1:
            boxColor.classList.add('bg-success')
            boxColor.classList.remove('bg-danger')
            boxColor.classList.remove('bg-warning')
            svgMensajeUno.innerHTML = SVG_correcto
            contenidoMensajeUno.innerHTML = contenido
            break;
        case 2:
            boxColor.classList.add('bg-warning')
            boxColor.classList.remove('bg-danger')
            boxColor.classList.remove('bg-duccess')
            svgMensajeUno.innerHTML = SVG_alerta
            contenidoMensajeUno.innerHTML = contenido
            break;
        default:
            boxColor.classList.add('bg-danger')
            boxColor.classList.remove('bg-success')
            boxColor.classList.remove('bg-warning')
            svgMensajeUno.innerHTML = SVG_error
            contenidoMensajeUno.innerHTML = contenido
            break;
    }

    mensajeTipoUno.classList.add('animar')
    setTimeout(() => {
        mensajeTipoUno.classList.remove('animar')
    }, 4100)

}

/**
    * Por defecto 0
    * 
    * [0] -> mensaje de error. 
    * 
    * [1] -> mensaje correcto. 
    * 
    * [2] -> mensaje de precausion.
    *  
    * [3] -> mensaje de info.
    *  
    * [4] -> mensaje de pregunta 
     */
function Mensaje2(tipo = 0, contenido = "Accion a realizar",mensajeConfirmacion = "Sí, confirmo",subtitulo = '') {
    
    switch (tipo) {
        case 0:
            Swal.fire({
                title: contenido,
                text: subtitulo,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: mensajeConfirmacion,
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            break;
        case 1:
            Swal.fire({
                title: contenido,
                text: subtitulo,
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: mensajeConfirmacion,
                customClass: {
                    confirmButton: "btn btn-success"
                }
            });
            break;
        case 2:
            Swal.fire({
                title: contenido,
                text: subtitulo,
                icon: "warning",
                buttonsStyling: false,
                confirmButtonText: mensajeConfirmacion,
                customClass: {
                    confirmButton: "btn btn-warning"
                }
            });
            break;
        case 3:
            Swal.fire({
                title: contenido,
                text: subtitulo,
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: mensajeConfirmacion,
                customClass: {
                    confirmButton: "btn btn-info"
                }
            });
            break;
        case 4:
            Swal.fire({
                title: contenido,
                text: subtitulo,
                icon: "question",
                buttonsStyling: false,
                confirmButtonText: mensajeConfirmacion,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            break;
        default:
            Swal.fire({
                title: contenido,
                text: subtitulo,
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: mensajeConfirmacion,
                customClass: {
                    confirmButton: "btn btn-success"
                }
            });
            break;

    }


}

function Mensaje3(tipo = 0, contenido = "Accion a realizar",posicion=2,duracionEnMilisegundos=1000) {
    // 0 -> mensaje de error
    // 1 -> mensaje correcto 
    // 2 -> mensaje de precausion 
    // 3 -> mensaje de info 
    // 4 -> mensaje de pregunta 

    // posiciones
    let posicionTraducido = 0
        switch(posicion){
            case 0:
                posicionTraducido = 'top-start'
                break;
            case 1:
                posicionTraducido = 'top'
                break;
            case 2:
                posicionTraducido = 'top-end'
                break;
            case 3:
                posicionTraducido = 'center-end'
                break;
            case 4:
                posicionTraducido = 'bottom-end'
                break;
            case 5:
                posicionTraducido = 'bottom'
                break;
            case 6:
                posicionTraducido = 'bottom-start'
                break;
            case 7:
                posicionTraducido = 'center-start'
                break;
            case 8:
                posicionTraducido = 'center'
                break;
            default:
                posicionTraducido = 'top-start'
                break
        }
        switch (tipo) {
            case 0:
                Swal.fire({
                    position: posicionTraducido,
                    icon: 'error',
                    title: contenido + '<br><br>',
                    showConfirmButton: false,
                    timer: duracionEnMilisegundos
                })
                break;
            case 1:
                Swal.fire({
                    position: posicionTraducido,
                    icon: 'success',
                    title: contenido + '<br><br>',
                    showConfirmButton: false,
                    timer: duracionEnMilisegundos
                })
                break;
            case 2:
                Swal.fire({
                    position: posicionTraducido,
                    icon: 'warning',
                    title: contenido + '<br><br>',
                    showConfirmButton: false,
                    timer: duracionEnMilisegundos
                })
                break;
            case 3:
                Swal.fire({
                    position: posicionTraducido,
                    icon: 'info',
                    title: contenido + '<br><br>',
                    showConfirmButton: false,
                    timer: duracionEnMilisegundos
                })
                break;
            case 4:
                Swal.fire({
                    position: posicionTraducido,
                    icon: 'question',
                    title: contenido + '<br><br>',
                    showConfirmButton: false,
                    timer: duracionEnMilisegundos
                })
                break;
            default:
                Swal.fire({
                    position: posicionTraducido,
                    icon: 'success',
                    title: contenido + '<br><br>',
                    showConfirmButton: false,
                    timer: duracionEnMilisegundos
                })
                break;

        }


}





function imagenPortadaArea(e = 'reset', preview = 'reset', imgDef = "general/placeholderimage.png") {
    // // Creamos el objeto de la clase FileReader
    let url_app = document.getElementById('URL_IMAGE').value

    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    if (e == 'reset') {
        let image = document.createElement('img');
            image.src = url_app + imgDef

            preview.innerHTML = '';
            preview.append(image);
    } else {
        if (e.target.files[0] != null) {
            let image = document.createElement('img');
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function () {

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };

        } else {
            let image = document.createElement('img');
            image.src = url_app + imgDef

            preview.innerHTML = '';
            preview.append(image);
        }

    }
}



// estilos con js

// Selecciona el nodo
let target = document.getElementById('kt_aside')

var observer = new MutationObserver(function (mutations) {
    // let sube = 0
    mutations.forEach(function (mutation) {
        // if(sube == 0 ){

        // }else{

        let anchotarge = target.clientWidth
        let losquecambian = target.querySelectorAll('.menu-link')
        let elbotonayuda = target.querySelectorAll('.boton-preguntas')

        if (anchotarge < 80) {
            losquecambian.forEach(e => {
                e.classList.add('nopaddingleft')
            })
            elbotonayuda.forEach(e => {
                e.classList.add('peque')
            })
        } else {
            losquecambian.forEach(e => {
                e.classList.remove('nopaddingleft')
            })
            elbotonayuda.forEach(e => {
                e.classList.remove('peque')
            })
        }
        //    }
        //    sube++
    });
});

// Configura el observador
var config_es = {
    attributes: true
};

// observer.observe(target, config);



function horaDía(hora){
    let zh = ''
    if(hora < '12:00'){
        zh = 'a.m'
        return `${hora} ${zh}`
    }else if(hora >= '12:00' && hora < '13:00'){
        zh = 'p.m'
        return `${hora} ${zh}`
    }else if(hora >= '13:00'){
        zh = 'p.m'
        let miHora = Number(hora.substr(0,2))
        let misMinutos = hora.substr(2,3)
        let hFinal = miHora-12
        hFinal.toString().length == 1 ? hFinal = `0${hFinal}`:hFinal
        return `${hFinal}${misMinutos} ${zh}`
    }
    
}

function getF(fechaString){
    let dia = fechaString.substr(8,2)
    let mes = fechaString.substr(5,2)
    let anio = fechaString.substr(0,4)
    if(dia == null || mes == null || anio == null){
        return '-'
    }else{
        let diaS    = dia.toString()
        let mesS    = mes.toString()
        let anioS   = anio.toString()
        if(diaS.length > 2 || mesS.length > 2 || anioS.length > 4){
            return 'Parámetros incorrectos, demasiado largos.'
        }else{
            diaS.length==1?diaS=`0${diaS}`:diaS
            mesS.length==1?mesS=`0${mesS}`:mesS
            let days = [ 'Dom','Lun','Mar','Mie', 'Jue', 'Vie', 'Sab'];
            let meses = [ 'Enero','Febrero','Marzo','Abril', 'Mayo', 'Junio', 'Julio','Agosto','Septiembre','Octubre','Novimebre','Diciembre'];
            let d = new Date(`${mesS}/${diaS}/${anioS}`); //Mi
            let nomDia =  days[d.getUTCDay()]
            return `${nomDia} ${diaS} ${meses[Number(mesS)-1]}, ${anioS}`
        }
    }
}

/**
    *Esta función valida los datos que retornan del servidor back según la respuesta que Martín Castro armó. @param datos es requerido, el resto de parámetros tiene valores por defecto.
    *
    * @param datos Respuesta del servidor
    * 
    * @param datosTipoEspecial Validación si es vacío o exista algún error con el dato enviado
    * 
    * @param tipoMensaje_TipoEspecial Tipo de estilo del mensaje  0 = error , 1 = success , 2 = warnning , 3 = info , 4 = pregunta
    * 
    * @param titulo_TipoEspecial Titulo del mensaje
    * 
    * @param subtitulo_TipoEspecial Subtitulo del emnsaje
    * 
    * @param textoBoton_TipoEspecial Texto del botón de confirmación 
*/
function revisionDatos(datos,datosTipoEspecial = '',tipoMensaje_TipoEspecial = 2,titulo_TipoEspecial = 'Hubo un problema',subtitulo_TipoEspecial = 'Intenta nuevamente, si el problema persiste, comunicate con el área de sistemas.', textoBoton_TipoEspecial = 'Entendido'){
    if(!datos.status){
        if(datos.tipo == 'error_bd'){
            Mensaje2(0,'Oops', 'Entendido', 'Al parecer ocurrió un error en la base de datos. Intentar nuevamente en unos minutos mientras se depura el error. Gracias por su comprensión.')
        }else if(datos.tipo == datosTipoEspecial){
            Mensaje2(tipoMensaje_TipoEspecial,titulo_TipoEspecial, textoBoton_TipoEspecial, subtitulo_TipoEspecial)
        }else{
            Mensaje2(0,'ERROR', 'Ok', 'Error desconocido. Por favor comunicarse con el área de sistemas para resolverlo. Gracias.')			}
        return false;
    }
    return true
}

function obtenerNombreIndexJson(nombre){
    for (var key in myVar) {
        if(key == nombre){
            return key
        }
      }
}

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }


  const limpiarTabla = (nombreTabla) => {
	$(`#${nombreTabla}`).DataTable().clear().draw();
}

const agregarDataTabla = (nombreTabla,data) => {
	$(`#${nombreTabla}`).DataTable().rows.add(data).draw();
}

const mostrarSpinner = (elemento) => {
    let loader = elemento.querySelector('.loader')
    let texto = elemento.querySelector('.contenido')
    texto.classList.add('d-none')
    loader.classList.remove('d-none')
    elemento.setAttribute('disabled','disabled')
}
const ocultarSpinner = (elemento) => {
    let loader = elemento.querySelector('.loader')
    let texto = elemento.querySelector('.contenido')
    texto.classList.remove('d-none')
    loader.classList.add('d-none')
    elemento.removeAttribute('disabled')
}

const esFechaDeEsteAnio = (elemento) => {
    if(elemento.value != ''){
        const moonLanding = new Date();
        let miFecha = elemento.value
        let mianio = miFecha.substr(0,4)
        if(mianio >= moonLanding.getFullYear()){
            return true;
        }else{
            return false;
        }
    }
    else {
        return true;
    }
}


// $.fn.select2.defaults.set({language: "es"});









































