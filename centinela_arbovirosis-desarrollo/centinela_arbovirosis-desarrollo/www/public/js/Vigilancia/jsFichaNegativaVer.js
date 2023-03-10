///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


const registrarFicha = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('registrarFichaNegativa', {
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

	if (document.getElementById('fecha_notificacion').value == '') {
		Mensaje2(2, 'Campos obligatorios', 'Entendido', 'Se deben ingresar las fechas que se solicitan')
	} else {
		mostrarSpinner(btn)

		const data = new FormData()
		data.append('responsable_epidemiologia', document.getElementById('responsable_epidemiologia').value.toUpperCase())
		data.append('fecha_notificacion', document.getElementById('fecha_notificacion').value)
		data.append('observacion', document.getElementById('observacion').value.toUpperCase())


		registrarFicha(data)
			.then(datos => {
				console.log(datos)
				if (!revisionDatos(datos)) {					
					return
				}
				ocultarSpinner(btn)
				Mensaje2(1, 'Ficha Negativa registrada', 'Entendido', 'La ficha negativa ha sido creada correctamente')
			})
			.then(dat => {
				document.getElementById('_registrar_ficha').reset()
			})
	}

})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
	// 	// ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? 
	// 	// VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
	// 	// ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
	// 	//     ???
	// 	//     ??????  Automatical started click
	// 	/*     ???  */
	// 	//     ???
	// 	//     ???
				autosize(document.querySelectorAll('textarea'));

				let sdos = document.getElementById('fecha_notificacion')
				$("#fecha_notificacion").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					defaultDate: sdos.value,
					disableMobile: true,
					// weekNumbers:true,
					// mode: "range",
				
					locale: {
						firstDayOfWeek: 1,
						weekdays: {
							shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
							longhand: ['Domingo', 'Lunes', 'Martes', 'Mi??rcoles', 'Jueves', 'Viernes', 'S??bado'],
						},
						months: {
							shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', '??ct', 'Nov', 'Dic'],
							longhand: ['Enero', 'Febreo', '??arzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
								'Octubre', 'Noviembre', 'Diciembre'
							],
						},
						rangeSeparator: "    a    ",
					}
				});
	// 	//     ???
	// 	//     ???
	// 	//     ??????  Tabla Citas
	// 	/*        */
	// 	$('#tbl_fichas').DataTable(params_tbl_edas_general);




	// 	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

	// 	Promise.all([
	// 			//     ???
	// 			//     ?????? Listar las citas creadas
	// 			/*     ???   */	
	// 			listarFichasdeVigilancia(),
	// 			//     ???
	// 			//     ?????? Fecha actual con hora 7am
	// 			/*         */
	// 			// iniciarFechaHora()
	// 		])
	// 		.then(data => {

	// 			if (!revisionDatos(data[0])) {
	// 				return
	// 			}
	// 			let misFichas = data[0].data
	// 			console.log(misFichas)
	// 			limpiarTabla('tbl_fichas')
	// 			agregarDataTabla('tbl_fichas',misFichas)


	// 		})
	// 		.catch(error => {
	// 			Mensaje2(0,'Error de sistema','Ok','Hubo un error en el sistema')
	// 		});

})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

