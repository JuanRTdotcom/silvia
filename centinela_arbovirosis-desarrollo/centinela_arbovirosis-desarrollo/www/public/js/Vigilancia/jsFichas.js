
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



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
			eliminarFichaVigilancia(data)
				.then((datos) => {
					if (!revisionDatos(datos)) {
						return;
					}
					listarFichas();
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
		{	width: '10',
			data: 'id',
			targets: 0,
			responsivePriority: 1,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				$(td).css("font-size", "12px");

			},
		},
		{	width: '400',
			data: null,
			targets: 1,
			responsivePriority: 2,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("max-width", "45%");
			},
			render: function (data, type, full, meta) {
				let miSexo = ''
				if(data.sexo == 'F'){
					miSexo = `
					<img src="${base_url}assets/img/default/mujer.png" class="genero_tabla" alt="Femenino" style="background:#ffdaff"> 
						`						
					}else{
					miSexo = `
					<img src="${base_url}assets/img/default/hombre.png" class="genero_tabla" alt="Masculino" style="background:#d1e7ff"> 
						`					
				}
				return `
				<div class="box_info_user">
					<div>
					${miSexo}
					</div>
					<div class="info_user">
						<div class="nombre_user">
						${data.nombres} ${data.apepat} ${data.apemat}
						</div>
						<div class="dni_user">
						DNI: ${data.dni}
						
						</div>
					</div>
				</div>
				`
			}
		},
		{	width: '80',
			data: null,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
			render: function (data, type, full, meta) {
				return `
				<div class="info_edad">
					<span class="_edad_i">${data.edad}</span>
				</div>
				`
			}
		},
		{	width: '80',
			data: 'anio',
			responsivePriority: 4,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{	width: '70',
			data: 'semana',
			responsivePriority: 5,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{	width: '200',
			data: null,
			targets: -1,
			orderable: false,
			searchable: false,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");				
			},
			render: function (data, type, full, meta) {
				return `
					<div class="d-flex justify-content-center">
						<a title="Laboratorio" href="${base_url}Vigilancia/Fichas/Laboratorio/${data.id}" class="btn btn-icon btn-primary mx-1" title="Laboratorio">
							<span class="tf-icons bx bxs-flask bx-tada-hover"></span>
						</a>
						<a title="Editar" href="${base_url}Vigilancia/Fichas/Editar/${data.id}" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-edit-alt bx-tada-hover"></span>
						</a>
						<a title="Ver" href="${base_url}Vigilancia/Fichas/Ver/${data.id}" class="btn btn-icon btn-outline-primary mx-1">
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



const listarFichasdeVigilancia = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Fichas/listarFichas', {
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

const listarFichasdeVigilancia_filtro = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Fichas/listarFichasFiltro', {
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

const eliminarFichaVigilancia = (datas) => {
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

document.getElementById('buscar_mis_fichas').addEventListener('submit',e => {
	e.preventDefault()
	let btn = document.getElementById('btn_buscarFicha')
	console.log('entra')
	mostrarSpinner(btn)
	const data = new FormData();
	data.append("nombres", document.getElementById('nombres_f').value.trim());
	data.append("ape_pat", document.getElementById('apepat_f').value.trim());
	data.append("ape_mat", document.getElementById('apemat_f').value.trim());
	data.append("dni", document.getElementById('dni_f').value.trim());
	listarFichasdeVigilancia_filtro(data)
	.then((datos) => {
		console.log('aveeee')
		console.log(datos)
		ocultarSpinner(btn)
		agregarDataBusqueda(datos.data);
	})
})

document.getElementById('buscar_mis_fichas').addEventListener('input',e => {
	e.preventDefault()
	if(document.getElementById('nombres_f').value.trim() == '' &&
	document.getElementById('apepat_f').value.trim() == '' &&
	document.getElementById('apemat_f').value.trim() == '' &&
	document.getElementById('dni_f').value.trim() == ''){
		let btn = document.getElementById('btn_buscarFicha')
		mostrarSpinner(btn)
		const data = new FormData();
		listarFichasdeVigilancia_filtro(data)
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
		listarFichasdeVigilancia_filtro(data)
		.then((datos) => {
			console.log(datos)
			ocultarSpinner(btn)
			agregarDataBusqueda(datos.data);
		})
		.then( dd => {
			document.getElementById('buscar_mis_fichas').reset()
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
	//     ╚═  Tabla Citas
	/*        */
	$('#tbl_fichas').DataTable(params_tbl_edas_general);




	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

	Promise.all([
			//     ║
			//     ╠═ Listar las fichas creadas
			/*     ║   */	
			listarFichasdeVigilancia(),
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
			limpiarTabla('tbl_fichas')
			agregarDataTabla('tbl_fichas',misFichas)


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

const listarFichas = () => {
	listarFichasdeVigilancia()
	.then(data => {

		if (!revisionDatos(data)) {
			return
		}
		let misFichas = data.data
		console.log(misFichas)
		limpiarTabla('tbl_fichas')
		agregarDataTabla('tbl_fichas',misFichas)


	})
	.catch(error => {
		Mensaje2(0,'Error de sistema','Ok','Hubo un error en el sistema')
	});

}

const agregarDataBusqueda = (misFichas) => {
		limpiarTabla('tbl_fichas')
		agregarDataTabla('tbl_fichas',misFichas)
}