const listarMisDescargas = (datas) => {
    return new Promise((resolve, reject) => {

        fetch('Descarga/listaArchivosDescarga', {
                method: 'POST',
                body: datas
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
                resolve(datos);
            })
            .catch(msg => {
                reject(msg)
            })
    })
}

const yaDescargado = (datas) => {
    return new Promise((resolve, reject) => {

        fetch('Descarga/yaDescargado', {
                method: 'POST',
                body: datas
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
                resolve(datos);
            })
            .catch(msg => {
                reject(msg)
            })
    })
}

function listarTodasMisDescargas() {
    const data = new FormData()        
    listarMisDescargas(data)
        .then((datos) => {
            console.log(datos)
            if(datos.data.length > 0){
                llenarReportes(datos)
            }else{
                llenarVacio()
            }
        }).catch(error => {
            // ocultarCargando()
            Mensaje2(0, 'ERROR DE SERVIDOR', 'Entendido', 'Hubo un problema con el servidor. Comunícate con el área de sistemas.')
        });
}

function llenarVacio(){
    let miBoc = document.querySelector('.mis_descargas')
    
    miBoc.innerHTML = ''
    let op = document.createElement('div')
                op.classList.add('col-md-12')
                op.classList.add('mt-2')
                op.innerHTML = `<div class="text-center p-4" style="opacity:0.70"><img src="${base_url}assets/img/caja.png" alt="" style="width:120px;margin:auto"><br><small class="text-muted">No existen documentos para descargar<br>el día de <u><strong>hoy</strong></u></small></div>`
                miBoc.appendChild(op)
}

function llenarReportes(datos){
    let miBoc = document.querySelector('.mis_descargas')
            miBoc.innerHTML = ''
            datos.data.forEach(e => {
                let flag = ''
                
                let miDiv = document.createElement('a')
                if(parseInt(e.cEstado) == 4 || parseInt(e.cEstado) == 3){
                    miDiv.setAttribute('href',`${base_url}Descargas/Descarga/descargar_archivo/${e.vRuta}`)
                    miDiv.setAttribute('target',"_blank")
                    miDiv.setAttribute('onclick',`ver(${e.id},${e.cEstado})`)
                }
                if(parseInt(e.cEstado) == 4){
                    miDiv.style.filter = 'grayscale(1)'
                    miDiv.style.opacity = '0.4'

                }
                if(parseInt(e.tipo_descarga) == 1){
                    flag = `<span  class="badge bg-primary">Ficha</span>`
                    
                }else{
                    flag = `<span  class="badge bg-primary">Laboratorio</span>`
                    
                }
                
                miDiv.setAttribute('class','card icon-card cursor-pointer text-center mb-4 mx-2')
                miDiv.style.color = 'inherit'

                miDiv.innerHTML = `
                        <div class="card-body">  
                            ${flag}      <br>
                            <img src="${base_url}assets/img/xlsx.png" class="img_descarga" style="width: 150px;height:150px;padding: 15px;" alt=""> 
                            <p class="icon-name text-capitalize text-truncate mb-0 fw-bold">${e.vRuta??'Descargando...'}</p>                            
                            <smal style="opacity:0.6">${horaDía(e.fecReg.substr(11,5))}</smal>
                         </div>
                         `
                miBoc.appendChild(miDiv)
            });
            

}

function ver(id,estado){
    const data = new FormData()  
    data.append("id", id);
    if(parseInt(estado) == 3){
        yaDescargado(data)
        .then(dat => listarMisDescargas(data))
        .then((datos) => llenarReportes(datos))
    }
}

$(document).ready(function () {
    listarTodasMisDescargas()
})
