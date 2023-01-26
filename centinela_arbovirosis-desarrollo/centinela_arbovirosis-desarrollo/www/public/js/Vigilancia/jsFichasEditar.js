
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let obtenerProvincia = async (select) => {
	const mis_provincias = document.getElementById('mis_provincias')
	mis_provincias.innerHTML = '<option value="">Selecciona una provincia</option>'
	const mis_distritos = document.getElementById('mis_distritos')
	mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>'
	const data = new FormData()
	data.append('dept', select.value)
	listarProvincias(data)
		.then((datos) => {
			// error
			if (!revisionDatos(datos)) {
				return
			}
			// success
			const misProvincias = datos.data
			console.log(misProvincias)
			misProvincias.forEach(e => {
				const op = document.createElement('option')
				op.value = e.ubigeo
				op.innerHTML = e.nombre
				mis_provincias.appendChild(op)
			});
		})
}

let obtenerDistrito = async (select) => {
	const mis_distritos = document.getElementById('mis_distritos')
	mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>'
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
				op.value = e.ubigeo
				op.innerHTML = e.nombre
				mis_distritos.appendChild(op)
			});
		})
}

let otrasEnfermedades = () =>{
	let miOculta = document.querySelector('.otro_sintomatologia')
	let otros = document.querySelector('#_otros')
	let input_otros = document.querySelector('#_nombre_otro')
	if(!otros.checked){
		miOculta.classList.remove('d-none')
		$("#_nombre_otro").focus();
	}else{
		miOculta.classList.add('d-none')
		input_otros.value=''
	}
}

let cargarProvincias = async (valor) => {
	const mis_provincias = document.getElementById('mis_provincias')
	mis_provincias.innerHTML = '<option value="">Selecciona una provincia</option>'
	const mis_distritos = document.getElementById('mis_distritos')
	mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>'
	const data = new FormData()
	data.append('dept', valor)
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
				op.value = e.ubigeo
				op.innerHTML = e.nombre
				mis_provincias.appendChild(op)
			});
		})
		.then(data=>{
			let miProv = document.getElementById('mis_provincias').getAttribute('id-prov')			
			$("#mis_provincias").val(miProv).trigger("change");
			cargarDistrito(miProv)
		})
		
}

let cargarDistrito = async (valor) => {
	const mis_distritos = document.getElementById('mis_distritos')
	mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>'
	const data = new FormData()
	data.append('dist', valor)
	listarDistritos(data)
		.then((datos) => {
			if (!revisionDatos(datos, 'error_select', 3, 'Atención', 'Si no seleccionas una provincia en específico, se filtrará por todas las provincias, y la consulta podría tardar un poco.')) {
				return
			}
			const misProvincias = datos.data
			console.log(misProvincias)
			misProvincias.forEach(e => {
				const op = document.createElement('option')
				op.value = e.ubigeo
				op.innerHTML = e.nombre
				mis_distritos.appendChild(op)
			});
		})
		.then(dat => {
			let miDist = document.getElementById('mis_distritos').getAttribute('id-dist')
			$("#mis_distritos").val(miDist).trigger("change");
		})
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const editarFicha = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('../editarFicha', {
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



const listarProvincias = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('../obtenerProvincias', {
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

		fetch('../obtenerDistritos', {
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

document.getElementById('_registrar_ficha').addEventListener('submit', e => {
	e.preventDefault()
	console.log('Entra')
	let btn = document.querySelector('.registrar_fichas')

	if (document.getElementById('fecha_notificacion').value == '' || document.getElementById('fecha_muestra').value == '' || document.getElementById('fecha_inicio_enfermedad').value == '') {
		Mensaje2(2, 'Campos obligatorios', 'Entendido', 'Se deben ingresar las fechas que se solicitan')
		return
	} 
	if (document.getElementById('mis_paises').value == "" || document.getElementById('mis_departamentos').value == "" || document.getElementById('mis_provincias').value == "" || document.getElementById('mis_distritos').value == "") {
		Mensaje2(2, "Campos obligatorios", "Entendido", "El país, departamento, provincia y distrito son obligatorios");
		return
	}

	const data = new FormData()
			data.append('id', document.getElementById('ficha_value').value)
			data.append('responsable_laboratorio', document.getElementById('responsable_laboratorio').value.toUpperCase())
			data.append('responsable_epidemiologia', document.getElementById('responsable_epidemiologia').value.toUpperCase())
			data.append('fecha_notificacion', document.getElementById('fecha_notificacion').value)

			data.append('dni', document.getElementById('dni').value)
			data.append('nombres', document.getElementById('nombres').value.toUpperCase())
			data.append('apellido_paterno', document.getElementById('apellido_paterno').value.toUpperCase())
			data.append('apellido_materno', document.getElementById('apellido_materno').value.toUpperCase())
			data.append('sexo', $('input[name="flight-type"]:checked').val())
			data.append('edad', document.getElementById('edad').value)
			data.append('tipo_edad', 'A')
			data.append('telefono', document.getElementById('telefono').value)
			data.append('pais', document.getElementById('mis_paises').value)
			data.append('departamento', document.getElementById('mis_departamentos').value)
			data.append('provincia', document.getElementById('mis_provincias').value)
			data.append('distrito', document.getElementById('mis_distritos').value)
			data.append('localidad', document.getElementById('localidad').value.toUpperCase())
			data.append('tipo_zona', $('input[name="zona"]:checked').val())
			data.append('direccion', document.getElementById('direccion').value.toUpperCase())
			data.append('tipo_via', document.getElementById('d_tipo_via').value.toUpperCase())
			data.append('nombre_via', document.getElementById('d_nombre_via').value.toUpperCase())
			data.append('nro_puerta', document.getElementById('d_nro_puerta').value.toUpperCase())
			data.append('nro_manzana', document.getElementById('d_nro_manzana').value.toUpperCase())
			data.append('lote', document.getElementById('d_lote').value.toUpperCase())
			data.append('tipo_asociacion', document.getElementById('d_tipo_asociacion').value.toUpperCase())
			data.append('nombre_asociacion', document.getElementById('d_nombre_asociacion').value.toUpperCase())
			data.append('fecha_muestra', document.getElementById('fecha_muestra').value)
			data.append('fecha_inicio_enfermedad', document.getElementById('fecha_inicio_enfermedad').value)
			data.append('gestante', document.getElementById('_gestante').checked == true ? 1 : 0)
			data.append('fiebre', document.getElementById('_fiebre').checked == true ? 1 : 0)
			data.append('rash', document.getElementById('_rash').checked == true ? 1 : 0)
			data.append('conjuntivitis', document.getElementById('_conjuntivitis').checked == true ? 1 : 0)
			data.append('artralgia', document.getElementById('_artralgia').checked == true ? 1 : 0)
			data.append('mialgia', document.getElementById('_mialgia').checked == true ? 1 : 0)
			data.append('otro', document.getElementById('_otros').checked == true ? 1 : 0)
			data.append('nombre_otro', document.getElementById('_nombre_otro').value.toUpperCase())
			data.append('evaluacion_paciente', document.getElementById('evaluacion_paciente').value)
			data.append('area_captacion', document.getElementById('area_captacion').value)
			data.append('diagnostico_captacion', document.getElementById('diagnostico_captacion').value.toUpperCase())
			data.append('observacion', document.getElementById('observacion').value.toUpperCase())

	if (!esFechaDeEsteAnio(document.getElementById('fecha_notificacion')) || !esFechaDeEsteAnio(document.getElementById('fecha_muestra')) || !esFechaDeEsteAnio(document.getElementById('fecha_inicio_enfermedad'))) {
		Swal.fire({
			title: "Revisar fechas",
			text: "Se están registrando fechas que no son de este año, ¿desea continuar con el registro?",
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#adadad",
			cancelButtonColor: "#d33",
			confirmButtonText: "Cancelar",
			cancelButtonText: "Sí, continuar",
		}).then((result) => {
			if (result.dismiss == "cancel") {
				mostrarSpinner(btn)
				editarFicha(data)
					.then(datos => {
						console.log(datos)
						if (!revisionDatos(datos)) {					
							return
						}
						ocultarSpinner(btn)
						Mensaje2(1, 'Ficha modificada', 'Entendido', 'La ficha ha sido modificada correctamente')
					})
				}
		});
	}else{
		mostrarSpinner(btn)
				editarFicha(data)
					.then(datos => {
						console.log(datos)
						if (!revisionDatos(datos)) {					
							return
						}
						ocultarSpinner(btn)
						Mensaje2(1, 'Ficha modificada', 'Entendido', 'La ficha ha sido modificada correctamente')
					})
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
	//     ║
	//     ╚═  Tabla Citas
	/*        */
	let miFuno = document.getElementById('fecha_notificacion')
	let mimue = document.getElementById('fecha_muestra')
	let mienf = document.getElementById('fecha_inicio_enfermedad')
	let suno = document.getElementById('evaluacion_paciente')
	let sdos = document.getElementById('area_captacion')
	$("#fecha_notificacion").flatpickr({
		altInput: true,
		altFormat: "l j F, Y",
		dateFormat: "Y-m-d",
		defaultDate: miFuno.value,
		disableMobile: true,
		// weekNumbers:true,
		// mode: "range",
	
		locale: localDefecto
	});
	$("#fecha_muestra").flatpickr({
		altInput: true,
		altFormat: "l j F, Y",
		dateFormat: "Y-m-d",
		defaultDate: mimue.value,
		disableMobile: true,
		// weekNumbers:true,
		// mode: "range",
	
		locale: localDefecto
	});
	$("#fecha_inicio_enfermedad").flatpickr({
		altInput: true,
		altFormat: "l j F, Y",
		dateFormat: "Y-m-d",
		defaultDate: mienf.value,
		disableMobile: true,
		// weekNumbers:true,
		// mode: "range",
	
		locale: localDefecto
	});
	
	

	// $('#mis_paises').select2({});
	// $('#mis_departamentos').select2({});
	// $('#mis_provincias').select2({});
	// $('#mis_distritos').select2({});
	// $('#d_tipo_via').select2({});
	// $('#d_tipo_asociacion').select2({});
	
	// $('#evaluacion_paciente').select2({minimumResultsForSearch: -1});
	// $('#area_captacion').select2({minimumResultsForSearch: -1});
	
	$("#area_captacion").val(sdos.getAttribute('valor')).trigger("change");
	$("#evaluacion_paciente").val(suno.getAttribute('valor')).trigger("change");

	
	let miDep = document.getElementById('mis_departamentos').value
	// cargarProvincias(miDep)


	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

	// Promise.all([
	// 		//     ║
	// 		//     ╠═ Listar las citas creadas
	// 		/*     ║   */	
	// 		//     ║
	// 		//     ╚═ Fecha actual con hora 7am
	// 		/*         */
	// 		// iniciarFechaHora()
	// 	])
	// 	.then(data => {


	// 	})
	// 	.catch(error => {
	// 		Mensaje2(0,'Error de sistema','Ok','Hubo un error en el sistema')
	// 	});

})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
