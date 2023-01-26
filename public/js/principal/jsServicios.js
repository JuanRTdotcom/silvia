///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function limpiarNuevo(){
    document.getElementById('crear_servicio').reset()
    document.querySelector('.foto_bg').setAttribute('style',`color:#566A7F`)
    document.querySelector('.foto_servicio').setAttribute('style',`background:#696cff1a`)
    document.querySelector('.photo_size').innerHTML =  ''
}
function limpiarEditar(){
    document.getElementById('editar_servicio').reset()
    document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:#566A7F`)
    document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:#696cff1a`)
    document.querySelector('#editar_servicio .photo_size').innerHTML =  ''
    document.querySelector('#editar_servicio .eliminar_servicio').removeAttribute('id-servicio')
}

function listarServicioxId(id){
    limpiarEditar()
    document.querySelector('.eliminar_servicio').setAttribute('id-servicio',id)
    document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:white`)
    $('#edit').modal('show')
    const data = new FormData();
    data.append("id", id);
    listarServicioId(data)
    .then(dato => {
        let miDato = dato.data.data[0]
        document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:url(${APP_URL_PUBLIC}${miDato.foto});background-size:cover;background-position: center;`)
        document.querySelector('#editar_servicio #nombre_servicio_editar').value = miDato.descripcion
        document.querySelector('#editar_servicio #descripcion_servicio_editar').value = miDato.detalle
        document.querySelector('#editar_servicio #monto_servicio_editar').value = miDato.monto_sugerido
    })
}

function eliminarServicio(btn){
    let id = btn.getAttribute('id-servicio')
    Swal.fire({
        title: 'Eliminar servicio',
        text: "¿Estás seguro de eliminar el servicio?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            const data = new FormData();
            data.append("id", id);
            eliminarServicioId(data)
            .then(dato => {
                listarServicio()
                .then(datos => {
                    llenarListaServicio(datos.data.data)
                })
                .then(dat => {
                    $('#edit').modal('hide')
                    Mensaje2(1,'Correcto','Entendido','Servicio eliminado correctamente')

                })
            }).catch(error => {
                Mensaje2(0,'Error','Entendido','Error para eliminar')

            })
        }
      })
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const crearServicio = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("servicios/crear", {
        method: "POST",
        body: datas,
      })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          resolve(datos);
        })
        .catch((msg) => {
          reject(msg);
        });
    });
  };

  const editarServicio = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("servicios/editar", {
        method: "POST",
        body: datas,
      })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          resolve(datos);
        })
        .catch((msg) => {
          reject(msg);
        });
    });
  };

  const listarServicio = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("servicios/listar", {
        method: "POST",
        body: datas,
      })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          resolve(datos);
        })
        .catch((msg) => {
          reject(msg);
        });
    });
  };
  
  const listarServicioId = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("servicios/listarServicioId", {
        method: "POST",
        body: datas,
      })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          resolve(datos);
        })
        .catch((msg) => {
          reject(msg);
        });
    });
  };
  
  const eliminarServicioId = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("servicios/eliminar", {
        method: "POST",
        body: datas,
      })
        .then((respuesta) => respuesta.json())
        .then((datos) => {
          resolve(datos);
        })
        .catch((msg) => {
          reject(msg);
        });
    });
  };
  
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////// EVENTOS //////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  document.getElementById("foto_servicio").addEventListener("change", ()=>{
      let inputImage = document.querySelector("input[type=file]").files[0];
        if(inputImage!=null){
            document.querySelector('.foto_bg').setAttribute('style',`color:white`)
            document.querySelector('.photo_size').innerHTML =  `${formatBytes(inputImage.size)}`
        }else{
            document.querySelector('.foto_bg').setAttribute('style',`color:#566A7F`)
            document.querySelector('.foto_servicio').setAttribute('style',`background:#696cff1a`)
            document.querySelector('.photo_size').innerHTML =  ''
        }
     
        if (document.getElementById("foto_servicio").files && document.getElementById("foto_servicio").files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('.foto_servicio').setAttribute('style',`background:url(${e.target.result});background-size:cover;background-position: center;`)
            };
            reader.readAsDataURL(document.getElementById("foto_servicio").files[0]);
        }
  })
  
  document.querySelector("#editar_servicio .foto_servicio_i").addEventListener("change", ()=>{
      let inputImage = document.querySelector("#editar_servicio input[type=file]").files[0];
        if(inputImage!=null){
            document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:white`)
            document.querySelector('#editar_servicio .photo_size').innerHTML =  `${formatBytes(inputImage.size)}`
        }else{
            document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:#566A7F`)
            document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:#696cff1a`)
            document.querySelector('#editar_servicio .photo_size').innerHTML =  ''
        }
     
        if (document.querySelector("#editar_servicio .foto_servicio_i").files && document.querySelector("#editar_servicio .foto_servicio_i").files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:url(${e.target.result});background-size:cover;background-position: center;`)
            };
            reader.readAsDataURL(document.querySelector("#editar_servicio .foto_servicio_i").files[0]);
        }
  })
  
  document.getElementById('crear_servicio').addEventListener('submit',e => {
    e.preventDefault()
    btn_cargando("crear_servicio");
    const data = new FormData();
    data.append("foto_servicio", document.getElementById("foto_servicio").files[0]);
    data.append("nombre_servicio", document.getElementById("nombre_servicio").value);
    data.append("descripcion_servicio", document.getElementById("descripcion_servicio").value);
    data.append("monto_servicio", document.getElementById("monto_servicio").value);
    crearServicio(data)
    .then(dato => {
        if(dato.status){
            listarServicio()
            .then(datos => {
                llenarListaServicio(datos.data.data)
            })
            btn_cargando_fin("crear_servicio", "Crear servicio");
            $('#add').modal('hide')
            document.getElementById('crear_servicio').reset()
            document.querySelector('.foto_bg').setAttribute('style',`color:#566A7F`)
            document.querySelector('.foto_servicio').setAttribute('style',`background:#696cff1a`)
            document.querySelector('.photo_size').innerHTML =  ''
            Mensaje2(1,'Completo','Entendido',dato.data.mensaje)
        }else{
            btn_cargando_fin("crear_servicio", "Crear servicio");
            Mensaje2(0,dato.data.mensaje,'Entendido',dato.data.data[0])
        }
    })
    .catch((error) => {
        btn_cargando_fin("crear_servicio", "Crear servicio");
        console.log(error);
      });
  })
  
  document.getElementById('editar_servicio').addEventListener('submit',e => {
    e.preventDefault()
    btn_cargando("modificar_servicio");
    const data = new FormData();
    data.append("foto_servicio", document.querySelector("#editar_servicio .foto_servicio_i").files[0]);
    data.append("nombre_servicio", document.querySelector("#editar_servicio #nombre_servicio_editar").value);
    data.append("descripcion_servicio", document.querySelector("#editar_servicio #descripcion_servicio_editar").value);
    data.append("monto_servicio", document.querySelector("#editar_servicio #monto_servicio_editar").value);
    data.append("id", document.querySelector('.eliminar_servicio').getAttribute('id-servicio'));
    editarServicio(data)
    .then(dato => {
        if(dato.status){
            listarServicio()
            .then(datos => {
                llenarListaServicio(datos.data.data)
            })
            btn_cargando_fin("modificar_servicio", "Modificar servicio");
            $('#edit').modal('hide')
            limpiarEditar()
            Mensaje2(1,'Completo','Entendido',dato.data.mensaje)
        }else{
            btn_cargando_fin("modificar_servicio", "Modificar servicio");
            Mensaje2(0,dato.data.mensaje,'Entendido',dato.data.data[0])
        }
    })
    .catch((error) => {
        btn_cargando_fin("modificar_servicio", "Modificar servicio");
        console.log(error);
      });
  })

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  document.addEventListener("DOMContentLoaded", function () {
    // ══════════════════════════════════════════
    // VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
    // ════╦═════════════════════════════════════
    //     ║
    //     ╚═  Tabla Citas
    /*        */
      Promise.allSettled([
        listarServicio(),
      ])
        .then((datos) => {
          if (datos[0].status == "fulfilled") {
            let miData = datos[0].value.data.data
            llenarListaServicio(miData)
          } else {
          Mensaje2(0,'Error','Entendido','Error al obtener servicios')
          }
        })
        .catch((error) => {
            Mensaje2(0,'Error de sistema','Entendido','Error de sistema')
        });
  });
  
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function llenarListaServicio(data)
  {
    let serv = ''
    let miData = data
    miData.forEach(e => {
    serv += `<div class="col-6 col-xs-6 col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer" onclick="listarServicioxId(${e.idServicio})">
                <div class="card mb-3">
                <div class="card-body row p-3 m-0">
                        <img class="col-md-5 p-0" src="${APP_URL_PUBLIC}${e.foto}" height="100" width="150" style="object-fit: cover;border-radius:15px" alt="corte">
                        
                        <div class="col-md-7">
                        <h5 class="card-title m-0 fw-bolder" style="color: #5f7286 !important;margin-top: 10px !important;">${e.descripcion}</h5>
                        <p class="card-text m-0" style="color:#b4b9bd !important">
                        ${e.detalle}
                        </p>
                        <p class="card-text ">
                            <small class="text-muted">S/ ${e.monto_sugerido}</small>
                        </p>

                        </div>
                    </div>
                </div>
            </div>`
    })
    document.querySelector('.mis_servicios').innerHTML = `
    <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer add_service" onclick="limpiarNuevo()" data-bs-toggle="modal" data-bs-target="#add">
            <div class="card ">
                <div class="row ">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="${APP_URL_PUBLIC_IMAGE}servi.png" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button class="btn btn-primary mb-3 text-nowrap add-new-role">Crear servicio</button>
                            <p class="mb-0">Crear si no existe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> ${serv}`
  }