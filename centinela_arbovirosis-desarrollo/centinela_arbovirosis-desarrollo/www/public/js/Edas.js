///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let miBoxResultadosFiltro = document.querySelector('.info_filtro')
let miCabeceraGeneralAnio = [{
	nombre: 'Año',
	clase: 'text-center'
}, {
	nombre: 'Casos',
	clase: 'text-center'
}, {
	nombre: 'Hospitalizaciones',
	clase: 'text-center'
}, {
	nombre: 'Defunciones',
	clase: 'text-center'
}, {
	nombre: 'TOTAL',
	clase: 'text-center'
}]
let miCabeceraGeneralSemana = [{
	nombre: 'Año',
	clase: 'text-center'
}, {
	nombre: 'Semana',
	clase: 'text-center'
}, {
	nombre: 'Casos',
	clase: 'text-center'
}, {
	nombre: 'Hospitalizaciones',
	clase: 'text-center'
}, {
	nombre: 'Defunciones',
	clase: 'text-center'
}, {
	nombre: 'TOTAL',
	clase: 'text-center'
}]

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//  $("#motivoconsultaselectE").select2({
//     maximumSelectionLength: 1
//   });

let obtenerProvincia = async (select) => {
	const mis_provincias = document.getElementById('mis_provincias')
	mis_provincias.innerHTML = '<option value="">Todo provincia</option>'
	const mis_distritos = document.getElementById('mis_distritos')
	mis_distritos.innerHTML = '<option value="">Todo distrito</option>'
	const data = new FormData()
	data.append('dept', select.value)
	listarProvincias(data)
		.then((datos) => {
			// error
			if (!revisionDatos(datos, 'error_select', 3, 'Atención', 'Si no seleccionas un departamento específico, se filtrarán por todos los departamentos, y la consulta podría tardar un poco.')) {
				return
			}
			// success
			const misProvincias = datos.data
			console.log(misProvincias)
			misProvincias.forEach(e => {
				const op = document.createElement('option')
				op.value = e.iCodProv
				op.innerHTML = e.vNombre
				mis_provincias.appendChild(op)
			});
		})
}

let obtenerDistrito = async (select) => {
	const mis_distritos = document.getElementById('mis_distritos')
	mis_distritos.innerHTML = '<option value="">Todo distrito</option>'
	const data = new FormData()
	data.append('dist', select.value)
	listarDistritos(data)
		.then((datos) => {
			if (!revisionDatos(datos, 'error_select', 3, 'Atención', 'Si no seleccionas una provincia en específico, se filtrará por todas las provincias, y la consulta podría tardar un poco.')) {
				return
			}
			const misProvincias = datos.data
			console.log(misProvincias)
			misProvincias.forEach(e => {
				const op = document.createElement('option')
				op.value = e.iCodDist
				op.innerHTML = e.vNombre
				mis_distritos.appendChild(op)
			});
		})
}

let obtenerRed = async (select) => {
	const mis_redes = document.getElementById('mis_redes')
	const mis_microredes = document.getElementById('mis_microredes')
	const mis_establecimientos = document.getElementById('mis_establecimientos')
	mis_redes.innerHTML = '<option value="">Todo Redes</option>'
	mis_microredes.innerHTML = '<option value="">Todo Microredes</option>'
	mis_establecimientos.innerHTML = '<option value="">Todo Establecimientos</option>'
	const data = new FormData()
	data.append('diresa', select.value)
	listarRedes(data)
		.then((datos) => {
			if (!revisionDatos(datos, 'error_select', 3, 'Atención', 'Si no seleccionar una diresa en específico, se filtrará por la diresa que tienes asignada en tu usuario.')) {
				return
			}
			const misRedes = datos.data
			console.log(misRedes)
			misRedes.forEach(e => {
				const op = document.createElement('option')
				op.value = e.codigo
				op.innerHTML = e.nombre
				mis_redes.appendChild(op)
			});
		})
}

let obtenerMicrored = async (select) => {
	const mis_diresas = document.getElementById('mis_diresas')
	const mis_microredes = document.getElementById('mis_microredes')
	const mis_establecimientos = document.getElementById('mis_establecimientos')
	mis_microredes.innerHTML = '<option value="">Todo Microredes</option>'
	mis_establecimientos.innerHTML = '<option value="">Todo Establecimientos</option>'
	const data = new FormData()
	data.append('red', select.value)
	data.append('diresa', mis_diresas.value)
	listarMicroRedes(data)
		.then((datos) => {
			if (!revisionDatos(datos, 'error_select', 3, 'Atención', 'Si no seleccionas una red en específico, se buscarán por todas las redes asignadas y la consulta podría tardar un poco.')) {
				return
			}
			const misRedes = datos.data
			console.log(misRedes)
			misRedes.forEach(e => {
				const op = document.createElement('option')
				op.value = e.codigo
				op.innerHTML = e.nombre
				mis_microredes.appendChild(op)
			});
		})
}

let obtenerEstablecimiento = async (select) => {
	const mis_diresas = document.getElementById('mis_diresas')
	const mis_microredes = document.getElementById('mis_redes')
	const mis_establecimientos = document.getElementById('mis_establecimientos')
	mis_establecimientos.innerHTML = '<option value="">Todo Establecimientos</option>'
	const data = new FormData()
	data.append('diresa', mis_diresas.value)
	data.append('red', mis_microredes.value)
	data.append('microred', select.value)
	listarEstablecimientos(data)
		.then((datos) => {
			if (!revisionDatos(datos, 'error_select', 2, 'Hubo un problema', 'Si no seleccionas una microred en específico, se buscarán por todas las redes asignadas y la consulta podría tardar un poco.')) {
				return
			}
			const misRedes = datos.data
			console.log(misRedes)
			misRedes.forEach(e => {
				const op = document.createElement('option')
				op.value = e.cod_est
				op.innerHTML = e.nombre ?? e.raz_soc ?? 'SIN NOMBRE'
				mis_establecimientos.appendChild(op)
			});
		})
}

let opcionHabilitar = async (input) => {
	efectoFade()
	mostrarPlaceholderTable()
	ocultarInformacionFiltro()
	document.querySelectorAll('[name=emitido_por]').forEach((x) => x.checked = false);

	if (input.value == 'general') {
		let misOcultos = document.querySelectorAll('.no_general')
		misOcultos.forEach(e => {
			e.classList.add('d-none')
		})
		let noOcultos = document.querySelectorAll('.solo_general')
		noOcultos.forEach(e => {
			e.classList.remove('d-none')
		})
	} else {
		let misOcultos = document.querySelectorAll('.no_general')

		misOcultos.forEach(e => {
			e.classList.remove('d-none')
		})
		let noOcultos = document.querySelectorAll('.solo_general')
		noOcultos.forEach(e => {
			e.classList.add('d-none')
		})
		let misOcultos_s = document.querySelectorAll('.solo_normal')
		misOcultos_s.forEach(e => {
			e.classList.add('d-none')
		})

	}
}

const listarData = (data, cabecera, parametros) => {
	ocultarTablaEdas()
	destruirTablaEdas()
	limpiarBodyTabla()
	asignarCabeceraTabla(cabecera)
	crearTablaEdas(parametros)
	limpiarTablaEdas()
	agregarDataTablaEdas(data)
	ocultarPlaceholderTable()
	mostrarTablaEdas()
	ocultarCargando()
}

const buscarEdas_general = () => {
	if (document.getElementById('cbx').checked) {
		listarEdasGeneralSemanas()
			.then(data => {
				if (!revisionDatos(data)) {
					ocultarCargando()
					return
				}
				cargarDataInformacionFiltro({
					tipo: 3,
					data: {
						Tipo: 'General',
						Rango: 'Por Semanas'
					}
				})
				mostrarInformacionFiltro()
				listarData(data.data, miCabeceraGeneralSemana, params_tbl_edas_general_semanas)
			})
	} else {
		listarEdasGeneral()
			.then(data => {
				if (!revisionDatos(data)) {
					ocultarCargando()
					return
				}
				cargarDataInformacionFiltro({
					tipo: 3,
					data: {
						Tipo: 'General',
						Rango: 'Por Años'
					}
				})
				mostrarInformacionFiltro()
				listarData(data.data, miCabeceraGeneralAnio, params_tbl_edas_general)
			})
	}
}

const buscarEdas_tiempo = (emitidoPor) => {
	switch (emitidoPor) {
		case '1':
			let departamento = document.getElementById('mis_departamentos').value
			let provincia = document.getElementById('mis_provincias').value
			let distrito = document.getElementById('mis_distritos').value

			let datau = new FormData()
			datau.append('departamento', departamento)
			datau.append('provincia', provincia)
			datau.append('distrito', distrito)
			listarEdasTiempoLugarInfeccion(datau)
				.then(data => {
					console.log(data)
					if (!revisionDatos(data)) {
						ocultarCargando()
						return
					}
					cargarDataInformacionFiltro({
						tipo: 1,
						data: {
							Tipo: 'Tiempo',
							Emitido: 'Lugar de probable infección',
							Departamento: $('select[name="mis_departamentos"] option:selected').text(),
							Provincia: $('select[name="mis_provincias"] option:selected').text(),
							Distrito: $('select[name="mis_distritos"] option:selected').text()
						}
					})
					mostrarInformacionFiltro()
					listarData(data.data, miCabeceraGeneralSemana, params_tbl_edas_general_semanas)
				})
			break;
		case '2':
			let diresas = document.getElementById('mis_diresas').value
			let redes = document.getElementById('mis_redes').value
			let microredes = document.getElementById('mis_microredes').value
			let establecimientos = document.getElementById('mis_establecimientos').value

			let datad = new FormData()
			datad.append('diresas', diresas)
			datad.append('redes', redes)
			datad.append('microredes', microredes)
			datad.append('establecimientos', establecimientos)
				// debugger
			listarEdasTiempoUnidadNotificante(datad)
				.then(data => {
					console.log(data)
					if (!revisionDatos(data)) {
						ocultarCargando()
						return
					}
					cargarDataInformacionFiltro({
						tipo: 2,
						data: {
							Tipo: 'Tiempo',
							Emitido: 'Unidad notificante',
							Diresa: $('select[name="mis_diresas"] option:selected').text(),
							Red: $('select[name="mis_redes"] option:selected').text(),
							Microred: $('select[name="mis_microredes"] option:selected').text(),
							Establecimiento: $('select[name="mis_establecimientos"] option:selected').text()
						}
					})
					mostrarInformacionFiltro()
					listarData(data.data, miCabeceraGeneralSemana, params_tbl_edas_general_semanas)
				})
			break;
		default:
			ocultarCargando()
			Mensaje2(2, 'Atención', 'Entendido', 'Debes seleccionar quien emite los registros')
			break;
	}
}
const buscarEdas_espacio = (emitidoPor) => {
	// if (emitidoPor == 1) {
	// 	let departamento = document.getElementById('mis_departamentos').value
	// 	let provincia = document.getElementById('mis_provincias').value
	// 	let distrito = document.getElementById('mis_distritos').value

	// 	const data = new FormData()
	// 	data.append('departamento', departamento)
	// 	data.append('provincia', provincia)
	// 	data.append('distrito', distrito)
	// 	listarEdasTiempoLugarInfeccion(data)
	// 		.then(data => {
	// 			console.log(data)
	// 			if (!revisionDatos(data)) {
	// 				ocultarCargando()
	// 				return
	// 			}
	// 			listarData(data.data, miCabeceraGeneralSemana, params_tbl_edas_general_semanas)
	// 		})

	// } else if(emitidoPor == 2){

	// }else {
	// 	ocultarCargando()
	// 	Mensaje2(2, 'Atención', 'Entendido', 'Debes seleccionar quien emite los registros')
	// }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var params_tbl_edas_general = {
	responsive: true,
	pageLength: 10,
	lengthMenu: [
		[5, 10, 20, -1],
		[5, 10, 20, 'Todos']
	],
	lengthChange: false,
	info: false,
	// data: null,
	ordering: false,
	dom: 'lrtip',
	language: LenguajeParametros,
	columns: [{
			data: 'ano',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'Casos',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'Hospitalizaciones',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'Defunciones',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'total',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				$(td).css("background", "#e3e7ea");

			},
		},
	]
}
var params_tbl_edas_general_semanas = {
	responsive: true,
	pageLength: 10,
	lengthMenu: [
		[5, 10, 20, -1],
		[5, 10, 20, 'Todos']
	],
	lengthChange: false,
	info: false,
	// data: null,
	ordering: false,
	dom: 'lrtip',
	language: LenguajeParametros,
	columns: [{
			data: 'ano',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'semana',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'Casos',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'Hospitalizaciones',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'Defunciones',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{
			data: 'total',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				$(td).css("background", "#e3e7ea");

			},
		},
	]
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



const listarProvincias = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/obtenerProvincias', {
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

const listarDistritos = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/obtenerDistritos', {
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

const listarRedes = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/obtenerRedes', {
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

const listarMicroRedes = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/obtenerMicroRedes', {
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

const listarEstablecimientos = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/obtenerEstablecimientos', {
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

const listarEdasGeneral = () => {
	return new Promise((resolve, reject) => {

		fetch('Edas/listarEdasGeneral', {
				method: 'POST',
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

const listarEdasGeneralSemanas = () => {
	return new Promise((resolve, reject) => {

		fetch('Edas/listarEdasGeneralSemanas', {
				method: 'POST',
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

const listarEdasTiempoLugarInfeccion = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/tiempoLugarProbableInfeccion', {
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

const listarEdasTiempoUnidadNotificante = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Edas/tiempoUnidadNotificante', {
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




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// EVENTOS //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

document.getElementById('btn_buscar_edas').addEventListener('click', e => {
	e.preventDefault()
	verCargando()
	ocultarInformacionFiltro()
	let titpoReporte = $('input[name="flight-type"]:checked').val();
	let emitidoPor = $('input[name="emitido_por"]:checked').val();
	/**
	 * Tiempo
	 *  `1` lugar de probable infeccion
	 * 	`2` Unidad notificane
	 * Espacio
	 *  `1` lugar de probable infeccion
	 * 	`2` Unidad notificane
	 * General
	 */
	switch (titpoReporte) {
		case 'tiempo':
			buscarEdas_tiempo(emitidoPor)
			break;
		case 'espacio':
			buscarEdas_espacio(emitidoPor)
			break;
		case 'general':
			buscarEdas_general()
			break;
	}
})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
	// ══════════════════════════════════════════ 
	// VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
	// ════╦═════════════════════════════════════
	//     ║
	//     ╠═  Automatical started click
	/*     ║  */
	// $('.opc_emitido_primero').click()
	diresaPorDefecto()
	//     ║
	//     ╠═  Automatical select 2
	/*     ║  */
	$('#mis_departamentos').select2({
		// allowClear: true,
		// placeholder: ""
	});
	$('#mis_provincias').select2({
		// allowClear: true,
		// placeholder: ""
	});
	$('#mis_distritos').select2({
		// allowClear: true,
		// placeholder: ""
	});
	$('#mis_diresas').select2({
		// allowClear: true,
		// placeholder: ""
	});
	$('#mis_redes').select2({
		// allowClear: true,
		// placeholder: ""
	});
	$('#mis_microredes').select2({
		// allowClear: true,
		// placeholder: ""
	});
	$('#mis_establecimientos').select2({
		// allowClear: true,
		// placeholder: ""
	});
	//     ║
	//     ╚═  Tabla Citas
	/*        */
	$('#example').DataTable();




	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

	// Promise.all([
	// 		//     ║
	// 		//     ╠═ Listar las citas creadas
	// 		/*     ║   */
	// 		registrarCita(),
	// 		//     ║
	// 		//     ╚═ Fecha actual con hora 7am
	// 		/*         */
	// 		iniciarFechaHora()
	// 	])
	// 	.then(data => {
	// 		let datos = JSON.parse(data[0])
	// 		oTable_Citas.fnClearTable();
	// 		// console.log(datos);
	// 		if (!isEmpty(datos)) {
	// 			oTable_Citas.fnAddData(datos);
	// 		}
	// 		acc.click()

	// 	})
	// 	.catch(error => {
	// 		$("#__crearCitaResultError").modal('show')

	// 	});

})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*  show places between possible place of infection and notifying unit */
function swapTab(evt, nameTab) {
	// reiniciarSelects()
	var i, tabcontent, tablinks;
	let misOcultos_s = document.querySelectorAll('.solo_normal')
	misOcultos_s.forEach(e => {
		e.classList.remove('d-none')
	})
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace("active", "");
	}
	document.getElementById(nameTab).style.display = "block";
	// evt.currentTarget.className += "active";
}

const limpiarBodyTabla = () => {
	let mid = document.querySelector('._mi_cuerpo_tabla')
	mid.innerHTML = ''
}

const ocultarPlaceholderTable = () => {
	let mid = document.querySelector('.miImgPlace')
	mid.classList.add('d-none')
}

const mostrarPlaceholderTable = () => {
	ocultarTablaEdas()
	destruirTablaEdas()
	let mid = document.querySelector('.miImgPlace')
	mid.classList.remove('d-none')
}

const destruirTablaEdas = () => {
	$('#example').DataTable().destroy()
}

const crearTablaEdas = ($parametros) => {
	$('#example').DataTable($parametros)
}

const limpiarTablaEdas = () => {
	$('#example').DataTable().clear().draw();
}

const agregarDataTablaEdas = (data) => {
	$('#example').DataTable().rows.add(data).draw();
}

const asignarCabeceraTabla = (miArrayDeCabeceras) => {
	let miCabecera = document.querySelector('.cabecera_variable')
	miCabecera.innerHTML = ''
	miArrayDeCabeceras.forEach(e => {
		let mit = document.createElement('th')
		mit.innerHTML = e.nombre
		mit.classList.add(e.clase)
		miCabecera.appendChild(mit)
	})
}

const mostrarTablaEdas = () => {
	let miTabla = document.querySelector('.contenedor_tabla')
	miTabla.classList.remove('d-none')
}

const ocultarTablaEdas = () => {
	let miTabla = document.querySelector('.contenedor_tabla')
	miTabla.classList.add('d-none')
}

const verCargando = () => {
	let miTexto = document.getElementById('btn_buscar_edas')
	miTexto.setAttribute('disabled', 'disabled')
	miTexto.innerHTML = `
	<div class="loader"></div>	`
}

const ocultarCargando = () => {
	let miTexto = document.getElementById('btn_buscar_edas')
	miTexto.removeAttribute('disabled')
	miTexto.innerHTML = `Buscar`
}

/**
 * 
 *  [1] Tiempo
 * 
 *  [1] Espacio
 * 
 *  [3] General
 */
const mostrarInformacionFiltro = () => {
	let miTexto = document.querySelector('.info_filtro')
	miTexto.classList.remove('d-none')
}

const ocultarInformacionFiltro = () => {
	// let miTextog = document.querySelector('.info_filtro_general')
	// miTextog.classList.add('d-none')
	let miTexto = document.querySelector('.info_filtro')
	miTexto.classList.add('d-none')
}

const cargarDataInformacionFiltro = (objetoInfoFiltro) => {
	pintarTags(objetoInfoFiltro.data)
}

const pintarTags = (data) => {
	let miBox = document.querySelector('.info_filtro')
	miBox.innerHTML = ''
	let miskey = Object.keys(data)
	let misvalues = Object.values(data)
	let contador = 0
	miskey.forEach(e => {
		let divv = document.createElement('div')
		divv.classList.add('mi_tag')
		divv.innerHTML = `
					<div class="nom_tag">
                        ${e}
                    </div>
                    <div class="cont_tag">
                        <span class="">${misvalues[contador]}</span>
                    </div>`
		miBox.appendChild(divv)
		contador++
	})
}

const efectoFade = () => {
	let box = document.querySelector('.solo_general')
	let boxGeneral = document.querySelector('.no_general')
	box.classList.add('desaparece')
	boxGeneral.classList.add('desaparece')
	setTimeout(()=>{
		box.classList.remove('desaparece')
		boxGeneral.classList.remove('desaparece')
	},100)

}

const  reiniciarSelects = () => {
	$("#mis_departamentos").select2().val("").trigger("change");
	$("#mis_provincias").select2().val("").trigger("change");
	$("#mis_distritos").select2().val("").trigger("change");
	$("#mis_diresas").select2().val("").trigger("change");
	$("#mis_redes").select2().val("").trigger("change");
	$("#mis_microredes").select2().val("").trigger("change");
	$("#mis_establecimientos").select2().val("").trigger("change");
}

const diresaPorDefecto = () => {
	let miSelectDiresas = document.getElementById('mis_diresas')
	let misOption = miSelectDiresas.getElementsByTagName('option')
	let misValores = []
	for(let i = 0;i<misOption.length;i++){
		misValores.push(misOption[i].getAttribute('value'))
	}
	console.log(misValores)
	misValores.forEach( e => {
		if(e != ''){
			$("#mis_diresas").select2().val(e).trigger("change");
		}
	})
}