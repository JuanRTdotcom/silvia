///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function info_cliente(id){
  limpiarFromcliente_editar()
  document.querySelector('.eliminar_cliente').setAttribute('id-cliente',id)
  $('#edita').modal('show')
  const data = new FormData();
  data.append("id", id);
  buscarClienteId(data)
  .then(dato => {
    console.log(dato)
    if(dato.status){
          llenarCamposEditar(dato.data.data[0])
        }else{
          Mensaje2(0,'Error','Entendido','Error al obtener datos del cliente')
        }
    })
    .catch(error => {
      Mensaje2(0,'Error de sistema','Entendido','Error de sistema')
      console.log(error)
    })

}



// function listarServicioxId(id){
//     limpiarEditar()
//     document.querySelector('.eliminar_servicio').setAttribute('id-servicio',id)
//     document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:white`)
//     $('#edit').modal('show')
//     const data = new FormData();
//     data.append("id", id);
//     listarServicioId(data)
//     .then(dato => {
//         let miDato = dato.data.data[0]
//         document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:url(${APP_URL_PUBLIC}${miDato.foto});background-size:cover;background-position: center;`)
//         document.querySelector('#editar_servicio #nombre_servicio_editar').value = miDato.descripcion
//         document.querySelector('#editar_servicio #descripcion_servicio_editar').value = miDato.detalle
//         document.querySelector('#editar_servicio #monto_servicio_editar').value = miDato.monto_sugerido
//     })
// }

// function eliminarServicio(btn){
//     let id = btn.getAttribute('id-servicio')
//     Swal.fire({
//         title: 'Eliminar servicio',
//         text: "¿Estás seguro de eliminar el servicio?",
//         icon: 'question',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si, eliminar'
//       }).then((result) => {
//         if (result.isConfirmed) {
//             const data = new FormData();
//             data.append("id", id);
//             eliminarServicioId(data)
//             .then(dato => {
//                 listarServicio()
//                 .then(datos => {
//                     llenarListaServicio(datos.data.data)
//                 })
//                 .then(dat => {
//                     $('#edit').modal('hide')
//                     Mensaje2(1,'Correcto','Entendido','Servicio eliminado correctamente')

//                 })
//             }).catch(error => {
//                 Mensaje2(0,'Error','Entendido','Error para eliminar')

//             })
//         }
//       })
// }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const crearCliente = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/crear", {
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

  const buscarCliente = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/buscar", {
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
  
  const buscarClienteId = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/buscar/id", {
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

  const editarCliente = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/editar", {
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

  const listarClientes = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/listar", {
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
  
  const listarTotalClientes = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/total", {
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
  
  const eliminarCliente = (datas) => {
    return new Promise((resolve, reject) => {
      fetch("clientes/eliminar/id", {
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



  document.querySelector(".agregar_cliente .foto_cliente_nuevo").addEventListener("change", (b)=>{
    let miFile = b.target
    let inputImage = miFile.files[0];
    if(inputImage!=null){
        document.querySelector('.agregar_cliente .photo_size').innerHTML =  `${formatBytes(inputImage.size)}`
    }else{
        document.querySelector('.agregar_cliente .foto_servicio').setAttribute('style',`background:url(${APP_URL_PUBLIC_IMAGE}user.jpg)center;background-size:cover;`)
        document.querySelector('.agregar_cliente .photo_size').innerHTML =  ''
    }
 
    if (inputImage) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('.agregar_cliente .foto_servicio').setAttribute('style',`background:url(${e.target.result})center;background-size:cover;`)
        };
        reader.readAsDataURL(miFile.files[0]);
    }
  })
  
  document.querySelector(".editar_cliente .foto_cliente_nuevo").addEventListener("change", (b)=>{
    let miFile = b.target
    let inputImage = miFile.files[0];
    if(inputImage!=null){
        document.querySelector('.editar_cliente .photo_size').innerHTML =  `${formatBytes(inputImage.size)}`
    }else{
        document.querySelector('.editar_cliente .foto_servicio').setAttribute('style',`background:url(${APP_URL_PUBLIC_IMAGE}user.jpg)center;background-size:cover;`)
        document.querySelector('.editar_cliente .photo_size').innerHTML =  ''
    }
 
    if (inputImage) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('.editar_cliente .foto_servicio').setAttribute('style',`background:url(${e.target.result})center;background-size:cover;`)
        };
        reader.readAsDataURL(miFile.files[0]);
    }
  })
  
//   document.querySelector("#editar_servicio .foto_servicio_i").addEventListener("change", ()=>{
//       let inputImage = document.querySelector("#editar_servicio input[type=file]").files[0];
//         if(inputImage!=null){
//             document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:white`)
//             document.querySelector('#editar_servicio .photo_size').innerHTML =  `${formatBytes(inputImage.size)}`
//         }else{
//             document.querySelector('#editar_servicio .foto_bg').setAttribute('style',`color:#566A7F`)
//             document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:#696cff1a`)
//             document.querySelector('#editar_servicio .photo_size').innerHTML =  ''
//         }
     
//         if (document.querySelector("#editar_servicio .foto_servicio_i").files && document.querySelector("#editar_servicio .foto_servicio_i").files[0]) {
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 document.querySelector('#editar_servicio .foto_servicio').setAttribute('style',`background:url(${e.target.result});background-size:cover;background-position: center;`)
//             };
//             reader.readAsDataURL(document.querySelector("#editar_servicio .foto_servicio_i").files[0]);
//         }
//   })
  
  document.getElementById('add_cli').addEventListener('submit',e => {
    e.preventDefault()
    btn_cargando("btn_crear_cliente");
    const data = new FormData();
    data.append("foto", document.getElementById("foto_cliente_nuevo").files[0]);
    data.append("nombre", document.getElementById("nombre_cliente").value.toLowerCase());
    data.append("apellido_paterno", document.getElementById("apellido_paterno_cliente").value.toLowerCase());
    data.append("apellido_materno", document.getElementById("apellido_materno_cliente").value.toLowerCase());
    data.append("sexo", document.querySelector('input[name="sexo_cliente"]:checked').value);
    data.append("edad", document.getElementById("edad_cliente").value);
    data.append("direccion", document.getElementById("direccion_cliente").value);
    data.append("dni", document.getElementById("dni_cliente").value);
    data.append("fecha_nacimiento", document.getElementById("fecha_nacimiento_cliente").value);
    data.append("correo", document.getElementById("correo_cliente").value);
    data.append("telefono1", document.getElementById("telefono1_cliente").value);
    data.append("telefono2", document.getElementById("telefono2_cliente").value);
    crearCliente(data)
    .then(dato => {
      btn_cargando_fin("btn_crear_cliente", "Crear cliente");
        if(dato.status){
          listarClientes()
            .then(datos => {
              listarTotalClientes()
              .then(dat => {
                let miDatas = dat.data.data[0]
                document.querySelector('.total').innerHTML = miDatas.total
              })
              llenarListaCliente(datos.data.data)
            })
            $('#agrega').modal('hide')
            e.target.reset()
            document.querySelector('.agregar_cliente .foto_servicio').setAttribute('style',`background:url(${APP_URL_PUBLIC_IMAGE}user.jpg)center;background-size:cover;`)
            document.querySelector('.agregar_cliente .photo_size').innerHTML =  ''
            Mensaje2(1,'Completo','Entendido',dato.data.mensaje)
        }else{
            Mensaje2(0,'Error','Entendido',dato.data.mensaje)
          }
    })
    .catch((error) => {
      btn_cargando_fin("btn_crear_cliente", "Crear cliente");
      Mensaje2(0,'Error','Entendido',error)
        console.log(error);
      });
  })
  
  document.getElementById('edit_cli').addEventListener('submit',e => {
    e.preventDefault()
    btn_cargando("btn_modificar_cliente");
    const data = new FormData();
    data.append("id", document.querySelector('.eliminar_cliente').getAttribute('id-cliente'));
    data.append("foto", document.getElementById("foto_cliente_editar").files[0]);
    data.append("is_foto", document.querySelector('#edit_cli').getAttribute('is-foto'));
    data.append("nombre", document.getElementById("nombre_cliente_editar").value.toLowerCase());
    data.append("apellido_paterno", document.getElementById("apellido_paterno_cliente_editar").value.toLowerCase());
    data.append("apellido_materno", document.getElementById("apellido_materno_cliente_editar").value.toLowerCase());
    data.append("sexo", document.querySelector('input[name="sexo_cliente_editar"]:checked').value);
    data.append("edad", document.getElementById("edad_cliente_editar").value);
    data.append("direccion", document.getElementById("direccion_cliente_editar").value);
    data.append("dni", document.getElementById("dni_cliente_editar").value);
    data.append("fecha_nacimiento", document.getElementById("fecha_nacimiento_cliente_editar").value);
    data.append("correo", document.getElementById("correo_cliente_editar").value);
    data.append("telefono1", document.getElementById("telefono1_cliente_editar").value);
    data.append("telefono2", document.getElementById("telefono2_cliente_editar").value);
    editarCliente(data)
    .then(dato => {
      btn_cargando_fin("btn_modificar_cliente", "Modificar cliente");
        if(dato.status){
          listarClientes()
            .then(datos => {
              llenarListaCliente(datos.data.data)
            })
            $('#edita').modal('hide')
            e.target.reset()
            document.querySelector('.editar_cliente .foto_servicio').setAttribute('style',`background:url(${APP_URL_PUBLIC_IMAGE}user.jpg)center;background-size:cover;`)
            document.querySelector('.editar_cliente .photo_size').innerHTML =  ''
            Mensaje2(1,'Completo','Entendido',dato.data.mensaje)
        }else{
            Mensaje2(0,'Error','Entendido',dato.data.mensaje)
          }
    })
    .catch((error) => {
      btn_cargando_fin("btn_modificar_cliente", "Modificar cliente");
      Mensaje2(0,'Error','Entendido',error)
        console.log(error);
      });
  })

  document.getElementById('buscador_cliente').addEventListener('submit',e => {
    e.preventDefault()
    btn_cargando("buscar_cliente");
    const data = new FormData();
    data.append("buscador", document.getElementById("mi_buscador_cliente").value.toLowerCase());
    buscarCliente(data)
    .then(dato => {
      console.log(dato)
      btn_cargando_fin("buscar_cliente", "Buscar");
        if(dato.status){
          llenarListaCliente(dato.data.data)
        }else{
          Mensaje2(0,'Error','Entendido','Error al obtener clientes')
        }
    })
    .catch((error) => {
      btn_cargando_fin("buscar_cliente", "Buscar");
      Mensaje2(0,'Error','Entendido',error)
        console.log(error);
      });
  })

  document.getElementById('mi_buscador_cliente').addEventListener('input',e => {
    if(e.target.value==''){
      btn_cargando("buscar_cliente");
      Promise.allSettled([
        listarClientes(),
      ])
        .then((datos) => {
          btn_cargando_fin("buscar_cliente", "Buscar");
          console.log(datos)
          if (datos[0].status == "fulfilled") {
            let miData = datos[0].value.data.data
            llenarListaCliente(miData)
          } else {
          Mensaje2(0,'Error','Entendido','Error al obtener clientes')
          }
        })
        .catch((error) => {
          btn_cargando_fin("buscar_cliente", "Buscar");
          Mensaje2(0,'Error de sistema','Entendido','Error de sistema')
        });
      }
    })
    
    document.querySelector('.eliminar_cliente').addEventListener('click',e => {
      let id = e.target.getAttribute('id-cliente')
      Swal.fire({
        title: 'Eliminar cliente',
        text: "¿Estás seguro de eliminar el cliente?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          btn_cargando("eliminar_cliente");
            const data = new FormData();
            data.append("id", id);
            eliminarCliente(data)
            .then(dato => {
              listarClientes()
                .then(datos => {
                  listarTotalClientes()
                  .then(dat => {
                    let miDatas = dat.data.data[0]
                    document.querySelector('.total').innerHTML = miDatas.total
                  })
                  llenarListaCliente(datos.data.data)
                })
                .then(dat => {
                    btn_cargando_fin("eliminar_cliente", "Eliminar");
                    $('#edita').modal('hide')
                    Mensaje2(1,'Correcto','Entendido','Cliente eliminado correctamente')
                    
                  })
                }).catch(error => {
              btn_cargando_fin("eliminar_cliente", "Eliminar");
                Mensaje2(0,'Error','Entendido','Error para eliminar')

            })
        }
      })
  })
  
//   document.getElementById('editar_servicio').addEventListener('submit',e => {
//     e.preventDefault()
//     btn_cargando("modificar_servicio");
//     const data = new FormData();
//     data.append("foto_servicio", document.querySelector("#editar_servicio .foto_servicio_i").files[0]);
//     data.append("nombre_servicio", document.querySelector("#editar_servicio #nombre_servicio_editar").value);
//     data.append("descripcion_servicio", document.querySelector("#editar_servicio #descripcion_servicio_editar").value);
//     data.append("monto_servicio", document.querySelector("#editar_servicio #monto_servicio_editar").value);
//     data.append("id", document.querySelector('.eliminar_servicio').getAttribute('id-servicio'));
//     editarServicio(data)
//     .then(dato => {
//         if(dato.status){
//             listarServicio()
//             .then(datos => {
//                 llenarListaServicio(datos.data.data)
//             })
//             btn_cargando_fin("modificar_servicio", "Modificar servicio");
//             $('#edit').modal('hide')
//             limpiarEditar()
//             Mensaje2(1,'Completo','Entendido',dato.data.mensaje)
//         }else{
//             btn_cargando_fin("modificar_servicio", "Modificar servicio");
//             Mensaje2(0,dato.data.mensaje,'Entendido',dato.data.data[0])
//         }
//     })
//     .catch((error) => {
//         btn_cargando_fin("modificar_servicio", "Modificar servicio");
//         console.log(error);
//       });
//   })

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  document.addEventListener("DOMContentLoaded", function () {

    // ══════════════════════════════════════════
    // OPCIONES
    // ════╦═════════════════════════════════════

    //     ║
    //     ╚═  Tabla Citas
    /*        */
    
    // ══════════════════════════════════════════
    // VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
    // ════╦═════════════════════════════════════
    //     ║
    //     ╚═  Tabla Citas
    /*        */
    // $('#tbl_fichas').DataTable(params_tbl_edas_general)
      Promise.allSettled([
        listarClientes(),
        listarTotalClientes()
      ])
        .then((datos) => {
          console.log(datos)
          if (datos[0].status == "fulfilled") {
            let miData = datos[0].value.data.data
            llenarListaCliente(miData)
          } else {
          Mensaje2(0,'Error','Entendido','Error al obtener clientes')
          }
          
          if (datos[1].status == "fulfilled") {
            let miDatas = datos[1].value.data.data[0]
            document.querySelector('.total').innerHTML = miDatas.total
          } else {
          Mensaje2(0,'Error','Entendido','Error al obtener total de clientes')
          }
        })
        .catch((error) => {
            Mensaje2(0,'Error de sistema','Entendido','Error de sistema')
        });
  });
  
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  function limpiarFromcliente_editar(){
    document.getElementById('edit_cli').reset()
    document.querySelector('.editar_cliente .foto_servicio').setAttribute('style',`background:#cdcdcd59;background-size:cover;`)
    document.querySelector('.editar_cliente .photo_size').innerHTML =  ''
  document.querySelector('.eliminar_cliente').removeAttribute('id-cliente')
}


  function llenarCamposEditar(miData){
    let miFoto = `${APP_URL_PUBLIC_IMAGE}user.jpg`
    document.querySelector('#edit_cli').setAttribute('is-foto','N')
    if(miData.sexo == 'H'){
      document.getElementById('btn_hombre_edit').click()
      miFoto = `${APP_URL_PUBLIC_IMAGE}user_h.jpg`
    }else{
      document.getElementById('btn_mujer_edit').click()
      miFoto = `${APP_URL_PUBLIC_IMAGE}user_m.jpg`
    }
    if(miData.foto != ''){
      document.querySelector('#edit_cli').setAttribute('is-foto','S')
      miFoto = `${APP_URL_PUBLIC}${miData.foto}`
    }
    document.querySelector('.editar_cliente .foto_servicio').setAttribute('style',`background:url(${miFoto})center;background-size:cover;`)
    document.getElementById("nombre_cliente_editar").value = miData.nombres
    document.getElementById("apellido_paterno_cliente_editar").value = miData.apellido_paterno
    document.getElementById("apellido_materno_cliente_editar").value = miData.apellido_materno
    document.getElementById("edad_cliente_editar").value = miData.edad
    document.getElementById("direccion_cliente_editar").value = miData.direccion
    document.getElementById("dni_cliente_editar").value = miData.dni
    document.getElementById("fecha_nacimiento_cliente_editar").value = miData.fecha_nacimiento
    document.getElementById("correo_cliente_editar").value = miData.correo
    document.getElementById("telefono1_cliente_editar").value = miData.telefono1
    document.getElementById("telefono2_cliente_editar").value = miData.telefono2
  }

  function llenarListaCliente(data)
  {
    let serv = ''
    let miData = data
    miData.forEach(e => {
    serv += `
      <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-xl-4 col-xxl-4" onclick="info_cliente(${e.idCliente})">
          <div class="card mb-3 cursor-pointer" style="height: calc(100% - 16px);">
              <div class="card-body p-3 text-center">
                  <img class="mb-2 mt-4" src="${APP_URL_PUBLIC}${e.foto==''?e.sexo=='H'?'image/user_h.jpg':'image/user_m.jpg':e.foto}" alt="" width="100" height="100" style="border-radius: 15%;object-fit:cover">
                  <div class="derecha mt-2 mb-1">
                      <h5 class="m-0 fw-bold nombre_ text-capitalize">${e.nombre_completo}</h5>
                      <small style="opacity: .65;">${e.categoria_cliente}</small>
                      <div class="mt-2 mb-2 box_cant d-flex justify-content-around">
                          <div class="atributo">
                              <small>Ganancia</small>
                              <h6 class="cant">${e.gananciaTotal}</h6>
                          </div>
                          <div class="atributo">
                              <small>Visitas</small>
                              <h6 class="cant">${e.cantidadVisitas}</h6>
                          </div>
                          <div class="atributo">
                              <small>Deuda</small>
                              <h6 class="cant">${e.deudaTotal}</h6>
                          </div>
                      </div>
                      <small style="opacity: .65;"><i>ultima visita: <strong> ${e.ultimaVisita??'SIN VISITAS'}</strong></i> </small>
                  </div>
              </div>
          </div>
      </div>`
    })
    document.querySelector('.mis_clientes').innerHTML = `${serv}`
  }