
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


let eliminarFicha = (idficha) => {
	Swal.fire({
		title: "¿Deseas eliminar la ficha?",
		text: "La ficha se eliminará permanentemente",
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: "#adadad",
		cancelButtonColor: "#d33",
		confirmButtonText: "Cancelar",
		cancelButtonText: "Sí, eliminar",
	}).then((result) => {
		if (result.dismiss == "cancel") {
			const data = new FormData();
			data.append("idFicha", idficha);
			eliminarFichaVigilanciaNegativa(data)
				.then((datos) => {
					if (!revisionDatos(datos)) {
						return;
					}
					listarFichasNegativas();
				})
				.then((dat) => {
					Swal.fire(
						"Eliminado!",
						"La ficha fue eliminada correctamente",
						"success"
					);
				});
		}
	});
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var params_tbl_edas_general = {
	responsive: true,
	pageLength: 5,
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
	columns: [
		{	width:'10',
			data: 'id',
			createdCell: function (td, cellData, rowData, row, col) {
						$(td).css("font-size", "12px");
						$(td).css("text-align", "center");
			},
		},
		{	
			data: 'epidemio_res',
			createdCell: function (td, cellData, rowData, row, col) {
						$(td).css("width", "30%");
						$(td).css("font-size", "12px");
			},
		},
		{	width: '50',
			data: 'anio',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				$(td).css("font-size", "12px");
			},
		},
		{	width: '50',
			data: 'semana',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				$(td).css("font-size", "12px");
			},
		},
		{	
			data: null,
			createdCell: function (td, cellData, rowData, row, col) {				
				$(td).css("font-size", "12px");
			},
			render: function (data, type, full, meta) {
				return `
				${data.observaciones}
				`
			}
		},
		{	width: '180',
			data: null,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				
			},
			render: function (data, type, full, meta) {
				return `
					<div class="d-flex justify-content-center">
						
						<a title="Editar" href="${base_url}Vigilancia/Negativa/Editar/${data.id}" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-edit-alt bx-tada-hover"></span>
						</a>
						<a title="Ver" href="${base_url}Vigilancia/Negativa/Ver/${data.id}" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-show bx-tada-hover"></span>
						</a>
						<button title="Eliminar" onclick="eliminarFicha(${data.id})" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-trash bx-tada-hover"></span>
						</button>
					</div>					
			   `
			}
		},
	],
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



const listarFichasdeVigilanciaNegativa = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Negativa/listarFichasNegativas', {
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

const listarFichasdeVigilanciaNegativa_filtro = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Fichas/listarFichasFiltroNegativa', {
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

const eliminarFichaVigilanciaNegativa = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Fichas/eliminarFicha', {
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
document.getElementById('buscar_mis_fichas_negativas').addEventListener('submit',e => {
	e.preventDefault()
	let btn = document.getElementById('btn_buscarFichaNegativas')
	console.log('entra')
	mostrarSpinner(btn)
	const data = new FormData();
	data.append("responsable", document.getElementById('responsable_f').value.trim());
	data.append("anio", document.getElementById('anio_f').value.trim());
	data.append("semana", document.getElementById('semana_f').value.trim());
	data.append("observacion", document.getElementById('observacion_f').value.trim());
	listarFichasdeVigilanciaNegativa_filtro(data)
	.then((datos) => {
		console.log('aveeee')
		console.log(datos)
		ocultarSpinner(btn)
		agregarDataBusqueda(datos.data);
	})
})

document.getElementById('buscar_mis_fichas_negativas').addEventListener('input',e => {
	e.preventDefault()
	if(document.getElementById('responsable_f').value.trim() == '' &&
	document.getElementById('anio_f').value.trim() == '' &&
	document.getElementById('semana_f').value.trim() == '' &&
	document.getElementById('observacion_f').value.trim() == ''){
		let btn = document.getElementById('btn_buscarFichaNegativas')
		mostrarSpinner(btn)
		const data = new FormData();
		listarFichasdeVigilanciaNegativa_filtro(data)
		.then((datos) => {
			console.log(datos)
			ocultarSpinner(btn)
			agregarDataBusqueda(datos.data);
		})

	}
})

document.getElementById('btn_limpiarFichaFiltros').addEventListener('click',e => {
	e.preventDefault()
	
		let btn = document.getElementById('btn_limpiarFichaFiltros')
		mostrarSpinner(btn)
		const data = new FormData();
		listarFichasdeVigilanciaNegativa_filtro(data)
		.then((datos) => {
			console.log(datos)
			ocultarSpinner(btn)
			agregarDataBusqueda(datos.data);
		})
		.then( dd => {
			document.getElementById('buscar_mis_fichas_negativas').reset()
		})

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
	//     ╚═  Tabla Citas
	/*        */
	$('#tbl_fichas_negativas').DataTable(params_tbl_edas_general);




	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

	Promise.all([
			//     ║
			//     ╠═ Listar las citas creadas
			/*     ║   */	
			listarFichasdeVigilanciaNegativa(),
			//     ║
			//     ╚═ Fecha actual con hora 7am
			/*         */
			// iniciarFechaHora()
		])
		.then(data => {

			if (!revisionDatos(data[0])) {
				return
			}
			let misFichas = data[0].data
			console.log(misFichas)
			limpiarTabla('tbl_fichas_negativas')
			agregarDataTabla('tbl_fichas_negativas',misFichas)


		})
		.catch(error => {
			Mensaje2(0,'Error de sistema','Ok','Hubo un error en el sistema')
		});

})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// const limpiarTabla = (nombreTabla) => {
// 	$(`#${nombreTabla}`).DataTable().clear().draw();
// }

// const agregarDataTabla = (nombreTabla,data) => {
// 	$(`#${nombreTabla}`).DataTable().rows.add(data).draw();
// }


const limpiarBodyTabla = () => {
	let mid = document.querySelector('._mi_cuerpo_tabla')
	mid.innerHTML = ''
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

const agregarDataBusqueda = (misFichas) => {
	limpiarTabla('tbl_fichas_negativas')
	agregarDataTabla('tbl_fichas_negativas',misFichas)
}

const listarFichasNegativas = () => {
	listarFichasdeVigilanciaNegativa()
	.then(data => {

		if (!revisionDatos(data)) {
			return
		}
		let misFichas = data.data
		console.log(misFichas)
		limpiarTabla('tbl_fichas_negativas')
		agregarDataTabla('tbl_fichas_negativas',misFichas)


	})
	.catch(error => {
		Mensaje2(0,'Error de sistema','Ok','Hubo un error en el sistema')
	});

}