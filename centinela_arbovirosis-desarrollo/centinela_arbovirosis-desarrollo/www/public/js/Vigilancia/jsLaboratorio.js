///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
let fechaInsValida = (input) => {
	if (input.checked) {
		document
			.getElementById("fecha_envio_ins")
			.setAttribute("required", "required");
		document.getElementById("fecha_envio_ins").removeAttribute("disabled");
		$("#fecha_envio_ins").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: document.getElementById('fecha_recepcion_lrr').value==''?document.getElementById('fecha_resultado').getAttribute('fecha_mue'):document.getElementById('fecha_recepcion_lrr').value,
			disableMobile: true,
			// weekNumbers:true,
			minDate: document.getElementById('fecha_recepcion_lrr').value==''?document.getElementById('fecha_resultado').getAttribute('fecha_mue'):document.getElementById('fecha_recepcion_lrr').value,
			locale: localDefecto,
		});
		$("#fecha_recepcion_ins").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: document.getElementById('fecha_recepcion_lrr').value,
			disableMobile: true,
			// weekNumbers:true,
			minDate: document.getElementById('fecha_envio_ins').value,
			locale: localDefecto,
		});
	} else {
		document.getElementById("fecha_envio_ins").removeAttribute("required");
		document
			.getElementById("fecha_envio_ins")
			.setAttribute("disabled", "disabled");
		$("#fecha_envio_ins").flatpickr(calendarioNormal).clear();

		$("#fecha_recepcion_ins").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: document.getElementById('fecha_recepcion_lrr').value,
			disableMobile: true,
			// weekNumbers:true,
			minDate: document.getElementById('fecha_recepcion_lrr').value==''?document.getElementById('fecha_resultado').getAttribute('fecha_mue'):document.getElementById('fecha_recepcion_lrr').value,
			locale: localDefecto,
		});
	}
};
let fechaInsValidaEdita = (input) => {
	if (input.checked) {
		document
			.getElementById("fecha_envio_ins_editar")
			.setAttribute("required", "required");
		document.getElementById("fecha_envio_ins_editar").removeAttribute("disabled");
		$("#fecha_envio_ins_editar").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: document.getElementById('fecha_recepcion_lrr_editar').value==''?document.getElementById('fecha_resultado').getAttribute('fecha_mue'):document.getElementById('fecha_recepcion_lrr_editar').value,
			disableMobile: true,
			// weekNumbers:true,
			// minDate: document.getElementById('fecha_recepcion_lrr_editar').value,
			minDate: document.getElementById('fecha_recepcion_lrr_editar').value==''?document.getElementById('fecha_resultado').getAttribute('fecha_mue'):document.getElementById('fecha_recepcion_lrr_editar').value,
			locale: localDefecto,
		});
	} else {
		document.getElementById("fecha_envio_ins_editar").removeAttribute("required");
		document
			.getElementById("fecha_envio_ins_editar")
			.setAttribute("disabled", "disabled");
		$("#fecha_envio_ins_editar").flatpickr(calendarioNormal).clear();
		$("#fecha_recepcion_ins_editar").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: document.getElementById('fecha_recepcion_lrr').value,
			disableMobile: true,
			// weekNumbers:true,
			minDate: document.getElementById('fecha_recepcion_lrr_editar').value==''?document.getElementById('fecha_resultado').getAttribute('fecha_mue'):document.getElementById('fecha_recepcion_lrr_editar').value,
			locale: localDefecto,
		});
	}
};

let obtenerPruebas = async (select) => {
	// debugger
	const mis_serotipos = document.getElementById("mis_serotipos");
	mis_serotipos.setAttribute("disabled", "disabled");
	mis_serotipos.removeAttribute("required");
	mis_serotipos.innerHTML = "";
	const mis_pruebas = document.getElementById("mis_pruebas");
	mis_pruebas.innerHTML = '<option value="">Selecciona una prueba</option>';
	const data = new FormData();
	data.append("enf", select.value);
	listarPruebas(data).then((datos) => {
		// error
		if (!revisionDatos(datos)) {
			return;
		}
		// success
		const mispruebas = datos.data;
		console.log(mispruebas);
		mispruebas.forEach((e) => {
			const op = document.createElement("option");
			op.value = e.id;
			op.innerHTML = e.denominacion;
			mis_pruebas.appendChild(op);
		});
	});
};

let obtenerPruebasE = async (select) => {
	// debugger
	const mis_serotipos = document.getElementById("mis_serotiposE");
	mis_serotipos.setAttribute("disabled", "disabled");
	mis_serotipos.removeAttribute("required");
	mis_serotipos.innerHTML = "";
	const mis_pruebas = document.getElementById("mis_pruebasE");
	mis_pruebas.innerHTML = '<option value="">Selecciona una prueba</option>';
	const data = new FormData();
	data.append("enf", select.value);
	listarPruebas(data).then((datos) => {
		// error
		if (!revisionDatos(datos)) {
			return;
		}
		// success
		const mispruebas = datos.data;
		console.log(mispruebas);
		mispruebas.forEach((e) => {
			const op = document.createElement("option");
			op.value = e.id;
			op.innerHTML = e.denominacion;
			mis_pruebas.appendChild(op);
		});
	});
};

let obtenerSerotipos = async (select) => {
	const mis_serotipos = document.getElementById("mis_serotipos");

	const mis_enfermedades = document.getElementById("mis_enfermedades");
	// const mis_distritos = document.getElementById('mis_distritos')
	// mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>'
	const data = new FormData();
	data.append("enf", mis_enfermedades.value);
	data.append("pru", select.value);
	listarSerotipo(data).then((datos) => {
		// error
		if (!revisionDatos(datos)) {
			return;
		}
		// success
		const midata = datos.data;
		console.log(midata);
		if (midata.length == 0) {
			mis_serotipos.innerHTML = "";
			mis_serotipos.setAttribute("disabled", "disabled");
			mis_serotipos.removeAttribute("required");
		} else {
			mis_serotipos.innerHTML =
				'<option value="">Selecciona serotipo</option>';
			mis_serotipos.setAttribute("required", "required");
			mis_serotipos.removeAttribute("disabled");
			midata.forEach((e) => {
				const op = document.createElement("option");
				op.value = e.id;
				op.innerHTML = e.denominacion;
				mis_serotipos.appendChild(op);
			});
		}
	});
};

let obtenerSerotiposE = async (select) => {
	const mis_serotipos = document.getElementById("mis_serotiposE");

	const mis_enfermedades = document.getElementById("mis_enfermedades_E");
	// const mis_distritos = document.getElementById('mis_distritos')
	// mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>'
	const data = new FormData();
	data.append("enf", mis_enfermedades.value);
	data.append("pru", select.value);
	listarSerotipo(data).then((datos) => {
		// error
		if (!revisionDatos(datos)) {
			return;
		}
		// success
		const midata = datos.data;
		console.log(midata);
		if (midata.length == 0) {
			mis_serotipos.innerHTML = "";
			mis_serotipos.setAttribute("disabled", "disabled");
			mis_serotipos.removeAttribute("required");
		} else {
			mis_serotipos.innerHTML =
				'<option value="">Selecciona serotipo</option>';
			mis_serotipos.setAttribute("required", "required");
			mis_serotipos.removeAttribute("disabled");
			midata.forEach((e) => {
				const op = document.createElement("option");
				op.value = e.id;
				op.innerHTML = e.denominacion;
				mis_serotipos.appendChild(op);
			});
		}
	});
};

let eliminarLaboratorio = (id) => {
	Swal.fire({
		title: "¿Deseas eliminar la muestra?",
		text: "La muestra se eliminará permanentemente",
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: "#adadad",
		cancelButtonColor: "#d33",
		confirmButtonText: "Cancelar",
		cancelButtonText: "Sí, eliminar",
	}).then((result) => {
		if (result.dismiss == "cancel") {
			const data = new FormData();
			data.append("id", id);
			eliminarMuestra(data)
				.then((datos) => {
					if (!revisionDatos(datos)) {
						return;
					}
					listarMisMuestras();
				})
				.then((dat) => {
					Swal.fire(
						"Eliminado!",
						"La muestra fue eliminada correctamente",
						"success"
					);
				});
		}
	});
};

let verLaboratorio = async (id) => {
	const mis_pruebas = document.getElementById("mis_pruebasV");
	const mis_serotipos = document.getElementById("mis_serotiposV");
	mis_pruebas.innerHTML = "";
	mis_serotipos.innerHTML = "";
	const data = new FormData();
	data.append("id", id);
	let miDataMuestra = await verMuestra(data);
	document.getElementById("nro_muestra_ver").value =
		miDataMuestra.data[0].muestra;

	if (
		miDataMuestra.data[0].fecha_res == null ||
		miDataMuestra.data[0].fecha_res == ""
	) {
		$("#fecha_resultado_ver").flatpickr(calendarioNormal).clear();
	} else {
		$("#fecha_resultado_ver").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			defaultDate: `${miDataMuestra.data[0].fecha_res}`,
			disableMobile: true,
			// weekNumbers:true,
			// mode: "range",

			locale: localDefecto,
		});
	}

	if (
		miDataMuestra.data[0].dtRecepcionLRR == null ||
		miDataMuestra.data[0].dtRecepcionLRR == ""
	) {
		$("#fecha_recepcion_lrr_ver").flatpickr(calendarioNormal).clear();
	} else {
		$("#fecha_recepcion_lrr_ver").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			defaultDate: miDataMuestra.data[0].dtRecepcionLRR ?? "today",
			disableMobile: true,
			// weekNumbers:true,
			// mode: "range",

			locale: localDefecto,
		});
	}

	if (
		miDataMuestra.data[0].dtFechaEnvioINS == null ||
		miDataMuestra.data[0].dtFechaEnvioINS == ""
	) {
		$("#fecha_envio_ins_ver").flatpickr(calendarioNormal).clear();
	} else {
		$("#fecha_envio_ins_ver").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			defaultDate: miDataMuestra.data[0].dtFechaEnvioINS ?? "today",
			disableMobile: true,
			// weekNumbers:true,
			// mode: "range",

			locale: localDefecto,
		});
	}

	if (
		miDataMuestra.data[0].dtRecepcionINS == null ||
		miDataMuestra.data[0].dtRecepcionINS == ""
	) {
		$("#fecha_recepcion_ins_ver").flatpickr(calendarioNormal).clear();
	} else {
		$("#fecha_recepcion_ins_ver").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			defaultDate: miDataMuestra.data[0].dtRecepcionINS ?? "today",
			disableMobile: true,
			// weekNumbers:true,
			// mode: "range",

			locale: localDefecto,
		});
	}

	if (
		miDataMuestra.data[0].dtFechaEnvioINS == null ||
		miDataMuestra.data[0].dtFechaEnvioINS == ""
	) {
		$("#fecha_envio_ins_ver").flatpickr(calendarioNormal).clear();
	} else {
		$("#fecha_envio_ins_ver").flatpickr({
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			defaultDate: miDataMuestra.data[0].dtFechaEnvioINS ?? "today",
			disableMobile: true,
			// weekNumbers:true,
			// // mode: "range",

			locale: localDefecto,
		});
	}

	$("#mis_enfermedades_ver").val(miDataMuestra.data[0].enfermedad);
	$("#mis_resultadosV").val(miDataMuestra.data[0].resultado);
	let micheck = document.getElementById("ins_si_ver");
	if (miDataMuestra.data[0].bEnvioIns == 0) {
		micheck.checked = false;
	} else {
		micheck.checked = true;
	}

	const datae = new FormData();
	datae.append("enf", miDataMuestra.data[0].enfermedad);
	const datap = new FormData();
	datap.append("enf", miDataMuestra.data[0].enfermedad);
	datap.append("pru", miDataMuestra.data[0].prueba);
	Promise.all([listarPruebas(datae), listarSerotipo(datap)])
		.then((data) => {
			// llenar y seleccionar prueba
			data[0].data.forEach((e) => {
				const op = document.createElement("option");
				op.value = e.id;
				op.innerHTML = e.denominacion;
				mis_pruebas.appendChild(op);
			});
			$("#mis_pruebasV").val(miDataMuestra.data[0].prueba);

			// llenar y seleccionar serotipo si hubiera data
			if (data[1].data.length != 0) {
				mis_serotipos.innerHTML =
					'<option value="">Selecciona serotipo</option>';
				data[1].data.forEach((e) => {
					const op = document.createElement("option");
					op.value = e.id;
					op.innerHTML = e.denominacion;
					mis_serotipos.appendChild(op);
				});
				$("#mis_serotiposV").val(miDataMuestra.data[0].serotipo);
			}
		})
		.then((datas) => {
			// let modalv = document.getElementById("myModalVer");
			// modalv.style.display = "block";
			$("#myModalVer").modal('show')
		})
		.catch((error) => {
			Mensaje2(0, "Error de sistema", "Ok", "Hubo un error en el sistema");
		});
};

let editarLaboratorio = async (id) => {
	document
		.getElementById("editar_muestras_laboratorio")
		.setAttribute("value-id-muestra", id);
	const mis_pruebas = document.getElementById("mis_pruebasE");
	const mis_serotipos = document.getElementById("mis_serotiposE");
	let micheck = document.getElementById("ins_si_editar");
	let fecha_envio_ins_editar = document.getElementById("fecha_envio_ins_editar");
	mis_serotipos.setAttribute("disabled", "disabled");
	mis_pruebas.innerHTML = "";
	mis_serotipos.innerHTML = "";
	const data = new FormData();
	data.append("id", id);
	let miDataMuestra = await verMuestra(data);

	if (miDataMuestra.data[0].bEnvioIns == 0) {
		micheck.checked = false;
		fecha_envio_ins_editar.setAttribute('disabled','disabled')
		$("#fecha_envio_ins_editar").flatpickr(calendarioNormal).clear();
	} else {
		micheck.checked = true;
		fecha_envio_ins_editar.removeAttribute('disabled')
	}

	console.log(miDataMuestra)
	document.getElementById("nro_muestra_editar").value =
		miDataMuestra.data[0].muestra;

		if (miDataMuestra.data[0].fecha_res == null || miDataMuestra.data[0].fecha_res == "") {
			$("#fecha_resultado_editar").flatpickr(calendarioNormal).clear();
		} else {
			$("#fecha_resultado_editar").flatpickr(
				{
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					defaultDate: miDataMuestra.data[0].fecha_res,
					disableMobile: true,
					// weekNumbers:true,
					minDate: document.getElementById('fecha_resultado').getAttribute('fecha_fie'),
					locale: localDefecto,
				});
		}

		if (miDataMuestra.data[0].dtRecepcionLRR == null || miDataMuestra.data[0].dtRecepcionLRR == "" ) {
			$("#fecha_recepcion_lrr_editar").flatpickr({
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				disableMobile: true,
				minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
				locale: localDefecto,
			}).clear();
		} else {
			$("#fecha_recepcion_lrr_editar").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					defaultDate: miDataMuestra.data[0].dtRecepcionLRR,
					disableMobile: true,
					// weekNumbers:true,
					minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
					locale: localDefecto,
				});
		}
	
		if (miDataMuestra.data[0].dtFechaEnvioINS == null || miDataMuestra.data[0].dtFechaEnvioINS == "" ) {
			let mival = document.getElementById('fecha_resultado').getAttribute('fecha_mue')
			if(miDataMuestra.data[0].dtRecepcionLRR != '' || miDataMuestra.data[0].dtRecepcionLRR != null){
				mival = miDataMuestra.data[0].dtRecepcionLRR
			}
			$("#fecha_envio_ins_editar").flatpickr({
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				disableMobile: true,
				minDate: mival,
				locale: localDefecto,
			}).clear();
		} else {
			let mival = document.getElementById('fecha_resultado').getAttribute('fecha_mue')
			if(miDataMuestra.data[0].dtRecepcionLRR != '' || miDataMuestra.data[0].dtRecepcionLRR != null){
				mival = miDataMuestra.data[0].dtRecepcionLRR
			}
			$("#fecha_envio_ins_editar").flatpickr({
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				defaultDate: miDataMuestra.data[0].dtFechaEnvioINS,
				disableMobile: true,
				// weekNumbers:true,
				minDate: mival,
				locale: localDefecto,
			});
		}
	
		if (
			miDataMuestra.data[0].dtRecepcionINS == null ||
			miDataMuestra.data[0].dtRecepcionINS == "" 
		) {
			let mival = document.getElementById('fecha_resultado').getAttribute('fecha_mue')
			if(miDataMuestra.data[0].dtFechaEnvioINS != '' || miDataMuestra.data[0].dtFechaEnvioINS != null){
				mival = miDataMuestra.data[0].dtFechaEnvioINS
			}else if(miDataMuestra.data[0].dtRecepcionLRR != '' || miDataMuestra.data[0].dtRecepcionLRR != null){
				mival = miDataMuestra.data[0].dtRecepcionLRR
			}

			$("#fecha_recepcion_ins_editar").flatpickr({
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				// defaultDate: miDataMuestra.data[0].dtRecepcionINS,
				disableMobile: true,
				// weekNumbers:true,
				minDate: mival,
				locale: localDefecto,
			}).clear();
		} else {
			let mival = document.getElementById('fecha_resultado').getAttribute('fecha_mue')
			if(miDataMuestra.data[0].dtFechaEnvioINS != '' || miDataMuestra.data[0].dtFechaEnvioINS != null){
				mival = miDataMuestra.data[0].dtFechaEnvioINS

				$("#fecha_recepcion_ins_editar").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					defaultDate: miDataMuestra.data[0].dtRecepcionINS,
					disableMobile: true,
					// weekNumbers:true,
					minDate: mival,
					locale: localDefecto,
				});

			}else if(miDataMuestra.data[0].dtRecepcionLRR != '' || miDataMuestra.data[0].dtRecepcionLRR != null){
				mival = miDataMuestra.data[0].dtRecepcionLRR

				$("#fecha_recepcion_ins_editar").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					defaultDate: miDataMuestra.data[0].dtRecepcionINS,
					disableMobile: true,
					// weekNumbers:true,
					minDate: mival,
					locale: localDefecto,
				});

			}else{
				$("#fecha_recepcion_ins_editar").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					defaultDate: miDataMuestra.data[0].dtRecepcionINS,
					disableMobile: true,
					// weekNumbers:true,
					minDate: mival,
					locale: localDefecto,
				});
			}

			
		}
	

		// let modalv = document.getElementById("myModalEditar");
		// modalv.style.display = "block";
		$("#myModalEditar").modal('show')

	$("#mis_enfermedades_E").val(miDataMuestra.data[0].enfermedad);
	$("#mis_resultadosE").val(miDataMuestra.data[0].resultado);
	
	

	const datae = new FormData();
	datae.append("enf", miDataMuestra.data[0].enfermedad);
	const datap = new FormData();
	datap.append("enf", miDataMuestra.data[0].enfermedad);
	datap.append("pru", miDataMuestra.data[0].prueba);
	Promise.all([listarPruebas(datae), listarSerotipo(datap)])
		.then((data) => {
			// llenar y seleccionar prueba
			data[0].data.forEach((e) => {
				const op = document.createElement("option");
				op.value = e.id;
				op.innerHTML = e.denominacion;
				mis_pruebas.appendChild(op);
			});
			$("#mis_pruebasE").val(miDataMuestra.data[0].prueba);

			// llenar y seleccionar serotipo si hubiera data
			if (data[1].data.length != 0) {
				mis_serotipos.innerHTML =
					'<option value="">Selecciona serotipo</option>';
				mis_serotipos.setAttribute("required", "required");
				mis_serotipos.removeAttribute("disabled");
				data[1].data.forEach((e) => {
					const op = document.createElement("option");
					op.value = e.id;
					op.innerHTML = e.denominacion;
					mis_serotipos.appendChild(op);
				});
				$("#mis_serotiposE").val(miDataMuestra.data[0].serotipo);
			}
		})
		.then((datas) => {
			// let modalv = document.getElementById("myModalEditar");
			// modalv.style.display = "block";
			$("#myModalEditar").modal('show')
		})
		.catch((error) => {
			Mensaje2(0, "Error de sistema", "Ok", "Hubo un error en el sistema");
		});
};

let validaFechalrr = (elemento) => {
	console.log('cambia')
	let miIns = document.getElementById('ins_si')
	document.getElementById('fecha_recepcion_ins').value = ''
	$("#fecha_recepcion_ins").flatpickr(
		{
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: elemento.value,
			disableMobile: true,
			// weekNumbers:true,
			minDate: elemento.value,
			locale: localDefecto,
		});
	if(miIns.checked){
		document.getElementById('fecha_envio_ins').value = ''
		$("#fecha_envio_ins").flatpickr(
			{
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				// defaultDate: elemento.value,
				disableMobile: true,
				// weekNumbers:true,
				minDate: elemento.value,
				locale: localDefecto,
			});
	}
}
let validaFechalrrEditar = (elemento) => {
	let miIns = document.getElementById('ins_si_editar')
	document.getElementById('fecha_recepcion_ins_editar').value = ''
	$("#fecha_recepcion_ins_editar").flatpickr(
		{
			altInput: true,
			altFormat: "l j F, Y",
			dateFormat: "Y-m-d",
			// defaultDate: elemento.value,
			disableMobile: true,
			// weekNumbers:true,
			minDate: elemento.value,
			locale: localDefecto,
		});
	if(miIns.checked){
		document.getElementById('fecha_envio_ins_editar').value = ''
		$("#fecha_envio_ins_editar").flatpickr(
			{
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				// defaultDate: elemento.value,
				disableMobile: true,
				// weekNumbers:true,
				minDate: elemento.value,
				locale: localDefecto,
			});
	}
}
let validaFechaEnvioIns = (elemento) => {
	console.log('cambia')
	let miIns = document.getElementById('ins_si')
	
	if(miIns.checked){
		document.getElementById('fecha_recepcion_ins').value = ''
		$("#fecha_recepcion_ins").flatpickr(
			{
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				// defaultDate: elemento.value,
				disableMobile: true,
				// weekNumbers:true,
				minDate: elemento.value,
				locale: localDefecto,
			});
	}
}
let validaFechaEnvioInsEditar = (elemento) => {
	let miIns = document.getElementById('ins_si_editar')
	
	if(miIns.checked){
		document.getElementById('fecha_recepcion_ins_editar').value = ''
		$("#fecha_recepcion_ins_editar").flatpickr(
			{
				altInput: true,
				altFormat: "l j F, Y",
				dateFormat: "Y-m-d",
				// defaultDate: elemento.value,
				disableMobile: true,
				// weekNumbers:true,
				minDate: elemento.value,
				locale: localDefecto,
			});
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var params_tbl_laboratorio = {
	responsive: true,
	pageLength: 5,
	lengthMenu: [
		[5, 10, 20, -1],
		[5, 10, 20, "Todos"],
	],
	lengthChange: false,
	info: false,
	ordering: false,
	dom: "lrtip",
	language: LenguajeParametros,
	columns: [
		{
			width: 120,
			data: "muestra",
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("max-width", "45%");
			},
		},
		{	width: 300,
			data: "Nenfermedad",
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("width", "35%");
			},
		},
		{
			data: "Nprueba",
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{	width: 300,
			data: null,
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("width", "30%");
				$(td).css("text-align", "center");
			},
			render: function (data, type, full, meta) {
				let miClaseS = "";
				// if (data.resultado == 1) {
				// 	miClaseS = "bg-label-danger";
				// } else if (data.resultado == 2) {
				// 	miClaseS = "bg-label-success";
				// } else if (data.resultado == 3) {
				// 	miClaseS = "bg-label-warning";
				// } else if (data.resultado == 4) {
				// 	miClaseS = "bg-label-secondary";
				// } else if (data.resultado == 5) {
				// 	miClaseS = "bg-label-info";
				// } else {
				// }
				miClaseS = "bg-label-primary";
				return `

					<p class="badge m-auto ${miClaseS}"> ${data.Nresultado}</p> 
					
			   `;
			},
		},
		{
			width: 180,
			data: null,
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
				
			},
			render: function (data, type, full, meta) {
				return `
					<div class="d-flex justify-content-center">
						<button type="button" title="Editar" onclick="editarLaboratorio(${data.id})" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-edit-alt bx-tada-hover"></span>
						</button>
						<button type="button" title="Ver" onclick="verLaboratorio(${data.id})" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-show bx-tada-hover"></span>
						</button>
						<button type="button" title="Eliminar" onclick="eliminarLaboratorio(${data.id})" class="btn btn-icon btn-outline-primary mx-1">
							<span class="tf-icons bx bx-trash bx-tada-hover"></span>
						</button>
					</div>
			   `;
			},
		},
	],
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const listarLabotatorio_x_Fichas = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../../Fichas/listarLaboratorio_x_idFicha", {
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

const listarLabotatorio_x_Fichas_filtro = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../../Fichas/listarLaboratorio_x_idFicha_filtro", {
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

const listarPruebas = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../listarPruebas", {
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

const listarSerotipo = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../listarserotipo", {
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

const registrarMuestra = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../registrarMuestra", {
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

const editarMuestra = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../editarMuestra", {
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

const eliminarMuestra = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../eliminarPruebas", {
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

const verMuestra = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("../verPruebas", {
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

document
	.getElementById("agregar_muestras_laboratorio")
	.addEventListener("submit", (e) => {
		e.preventDefault();
		let btn = document.querySelector(".registrar_fichas_lab");
		

		if(document.getElementById("fecha_resultado").value == ''){
			Swal.fire(
				"Un momento",
				"Debes ingresar	la fecha del resultado",
				"warning"
			);
			return
		}
		if(document.getElementById("ins_si").checked){
			if(document.getElementById("fecha_envio_ins").value == ''){
				Swal.fire(
					"Un momento",
					"Marcaste la casilla de SI, al envío de muestra INS. Debes colocar la fecha de envío. Si no tienes una fecha, te recomendamos descarcar la casilla.",
					"warning"
				);				
				return
			}
		}
	

		const data = new FormData();
		data.append("id_ficha", document.getElementById("id_ficha").value);
		data.append(
			"nro_muestra",
			document.getElementById("nro_muestra").value.toUpperCase()
		);
		data.append(
			"fecha_resultado",
			document.getElementById("fecha_resultado").value.toUpperCase()
		);
		data.append(
			"fecha_recepcion_lrr",
			document.getElementById("fecha_recepcion_lrr").value
		);
		data.append("ins_si", document.getElementById("ins_si").checked ? 1 : 0);
		data.append(
			"fecha_envio_ins",
			document.getElementById("fecha_envio_ins").value
		);
		data.append(
			"fecha_recepcion_ins",
			document.getElementById("fecha_recepcion_ins").value
		);
		data.append(
			"mis_enfermedades",
			document.getElementById("mis_enfermedades").value.toUpperCase()
		);
		data.append(
			"mis_pruebas",
			document.getElementById("mis_pruebas").value.toUpperCase()
		);
		data.append(
			"mis_serotipos",
			document.getElementById("mis_serotipos").value.toUpperCase()
		);
		data.append(
			"mis_resultados",
			document.getElementById("mis_resultados").value.toUpperCase()
		);

		let validacionFechas = true;
		if(document.getElementById("ins_si").checked){
			if (!esFechaDeEsteAnio(document.getElementById("fecha_resultado")) ||
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_lrr")) || 
				!esFechaDeEsteAnio(document.getElementById("fecha_envio_ins")) || 
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_ins"))) {
					validacionFechas = false;			
			}else {
				validacionFechas = true;				
			}
		}else{
			if (!esFechaDeEsteAnio(document.getElementById("fecha_resultado")) ||
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_lrr")) || 
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_ins"))) {
					validacionFechas = false;			
			}else {
				validacionFechas = true;				
			}
		}

		if(validacionFechas){
			mostrarSpinner(btn);
			registrarMuestra(data)
			.then((datos) => {
				if (!revisionDatos(datos)) {
					return;
				}
				ocultarSpinner(btn);
				Mensaje2(
					1,
					"Muestra registrada",
					"Entendido",
					"La muestra ha sido creada correctamente"
				);
			})
			.then((dat) => {
				document.getElementById("agregar_muestras_laboratorio").reset();
				$("#fecha_resultado").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					disableMobile: true,
					minDate: document.getElementById('fecha_resultado').getAttribute('fecha_fie'),
					locale: localDefecto,
				}).clear();
				$("#fecha_recepcion_lrr").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					disableMobile: true,
					minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
					locale: localDefecto,
				}).clear();
				$("#fecha_recepcion_ins").flatpickr({
					altInput: true,
					altFormat: "l j F, Y",
					dateFormat: "Y-m-d",
					disableMobile: true,
					minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
					locale: localDefecto,
				}).clear();
				const mis_serotipos = document.getElementById("mis_serotipos");
				mis_serotipos.innerHTML = "";
				const mis_pruebas = document.getElementById("mis_pruebas");
				mis_pruebas.innerHTML = "";
				$("#agregaLab").modal('hide');

				listarMisMuestras();
			});
		}else{
			
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
					mostrarSpinner(btn);
					registrarMuestra(data)
						.then((datos) => {
							if (!revisionDatos(datos)) {
								return;
							}
							ocultarSpinner(btn);
							Mensaje2(
								1,
								"Muestra registrada",
								"Entendido",
								"La muestra ha sido creada correctamente"
							);
						})
						.then((dat) => {
							document.getElementById("agregar_muestras_laboratorio").reset();
							$("#fecha_resultado").flatpickr({
								altInput: true,
								altFormat: "l j F, Y",
								dateFormat: "Y-m-d",
								disableMobile: true,
								minDate: document.getElementById('fecha_resultado').getAttribute('fecha_fie'),
								locale: localDefecto,
							}).clear();
							$("#fecha_recepcion_lrr").flatpickr({
								altInput: true,
								altFormat: "l j F, Y",
								dateFormat: "Y-m-d",
								disableMobile: true,
								minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
								locale: localDefecto,
							}).clear();
							$("#fecha_recepcion_ins").flatpickr({
								altInput: true,
								altFormat: "l j F, Y",
								dateFormat: "Y-m-d",
								disableMobile: true,
								minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
								locale: localDefecto,
							}).clear();
							const mis_serotipos = document.getElementById("mis_serotipos");
							mis_serotipos.innerHTML = "";
							const mis_pruebas = document.getElementById("mis_pruebas");
							mis_pruebas.innerHTML = "";
							$("#agregaLab").modal('hide');

							listarMisMuestras();
						});


				}
			});
		}

		
	});

document
	.getElementById("editar_muestras_laboratorio")
	.addEventListener("submit", (e) => {
		e.preventDefault();

		if(document.getElementById("fecha_resultado_editar").value == ''){
			Swal.fire(
				"Un momento",
				"Debes ingresar	la fecha del resultado",
				"warning"
			);
			return
			}

		if(document.getElementById("ins_si_editar").checked){
			if(document.getElementById("fecha_envio_ins_editar").value == ''){
				Swal.fire(
					"Un momento",
					"Marcaste la casilla de SI, al envío de muestra INS. Debes colocar la fecha de envío. Si no tienes una fecha, te recomendamos descarcar la casilla.",
					"warning"
				);				
				return
			}
		}


		let btn = document.querySelector(".editar_fichas");
		const data = new FormData();
		data.append(
			"id_muestra",
			document
				.getElementById("editar_muestras_laboratorio")
				.getAttribute("value-id-muestra")
		);
		data.append("id_ficha", document.getElementById("id_ficha").value);
		data.append(
			"nro_muestra",
			document.getElementById("nro_muestra_editar").value.toUpperCase()
		);
		data.append(
			"fecha_resultado",
			document.getElementById("fecha_resultado_editar").value.toUpperCase()
		);
		data.append(
			"fecha_recepcion_lrr_editar",
			document.getElementById("fecha_recepcion_lrr_editar").value
		);
		data.append("ins_si_editar", document.getElementById("ins_si_editar").checked ? 1 : 0);
		data.append(
			"fecha_envio_ins_editar",
			document.getElementById("fecha_envio_ins_editar").value
		);
		data.append(
			"fecha_recepcion_ins_editar",
			document.getElementById("fecha_recepcion_ins_editar").value
		);
		data.append(
			"mis_enfermedades",
			document.getElementById("mis_enfermedades_E").value.toUpperCase()
		);
		data.append(
			"mis_pruebas",
			document.getElementById("mis_pruebasE").value.toUpperCase()
		);
		data.append(
			"mis_serotipos",
			document.getElementById("mis_serotiposE").value.toUpperCase()
		);
		data.append(
			"mis_resultados",
			document.getElementById("mis_resultadosE").value.toUpperCase()
		);


		let validacionFechas = true;
		if(document.getElementById("ins_si_editar").checked){
			if (!esFechaDeEsteAnio(document.getElementById("fecha_resultado_editar")) ||
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_lrr_editar")) || 
				!esFechaDeEsteAnio(document.getElementById("fecha_envio_ins_editar")) || 
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_ins_editar"))) {
					validacionFechas = false;			
			}else {
				validacionFechas = true;				
			}
		}else{
			if (!esFechaDeEsteAnio(document.getElementById("fecha_resultado_editar")) ||
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_lrr_editar")) || 
				!esFechaDeEsteAnio(document.getElementById("fecha_recepcion_ins_editar"))) {
					validacionFechas = false;			
			}else {
				validacionFechas = true;				
			}
		}


		if(validacionFechas){
			mostrarSpinner(btn);
			editarMuestra(data)
			.then((datos) => {
				console.log(datos);
				if (!revisionDatos(datos)) {
					return;
				}
				ocultarSpinner(btn);
				Mensaje2(
					1,
					"Muestra modificada",
					"Entendido",
					"La muestra ha sido modificada correctamente"
				);
			})
			.then((dat) => {
				$("#myModalEditar").modal('hide');
				listarMisMuestras();
			});
		}else{			
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
					mostrarSpinner(btn);
					editarMuestra(data)
						.then((datos) => {
							console.log(datos);
							if (!revisionDatos(datos)) {
								return;
							}
							ocultarSpinner(btn);
							Mensaje2(
								1,
								"Muestra modificada",
								"Entendido",
								"La muestra ha sido modificada correctamente"
							);
						})
						.then((dat) => {
							$("#myModalEditar").modal('hide');
							listarMisMuestras();
						});


				}
			});
		}


		
	});

	document.getElementById('buscar_mis_laboratorios').addEventListener('submit',e => {
		e.preventDefault()
		let btn = document.getElementById('btn_buscarFichaNegativas')
		console.log('entra')
		mostrarSpinner(btn)
		const data = new FormData();
		data.append("idFicha", document.getElementById("id_ficha").value);
		data.append("muestra", document.getElementById('muestra_f').value.trim());
		data.append("enfermedad", document.getElementById('enfermedad_f').value.trim());
		data.append("prueba", document.getElementById('prueba_f').value.trim());
		data.append("resultado", document.getElementById('resultado_f').value.trim());
		listarLabotatorio_x_Fichas_filtro(data)
		.then((datos) => {
			ocultarSpinner(btn)
			agregarDataBusqueda(datos.data);
		})
	})

	document.getElementById('btn_limpiarFichaFiltros').addEventListener('click',e => {
		e.preventDefault()
		
			let btn = document.getElementById('btn_limpiarFichaFiltros')
			mostrarSpinner(btn)
			const data = new FormData();
			data.append("idFicha", document.getElementById("id_ficha").value);
			listarLabotatorio_x_Fichas_filtro(data)
			.then((datos) => {
				console.log(datos)
				ocultarSpinner(btn)
				agregarDataBusqueda(datos.data);
			})
			.then( dd => {
				document.getElementById('buscar_mis_laboratorios').reset()
				$("#enfermedad_f").val('').trigger("change");
				$("#prueba_f").val('').trigger("change");
				$("#resultado_f").val('').trigger("change");
				
			})
	
	})

	document.querySelector('.agregar_laboratorio').addEventListener('click',()=>{
		document.getElementById("fecha_envio_ins").removeAttribute("required");
		document.getElementById('ins_si').checked = false
		document
			.getElementById("fecha_envio_ins")
			.setAttribute("disabled", "disabled");
		$("#fecha_envio_ins").flatpickr(calendarioNormal).clear();

	})

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
	// 	// ══════════════════════════════════════════
	// 	// VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
	// 	// ════╦═════════════════════════════════════
	// 	//     ║
	// 	//     ╠═  Automatical started click
	// 	/*     ║  */
	// $("#enfermedad_f").select2({});
	// $("#prueba_f").select2({});
	// $("#resultado_f").select2({});
	// 	//     ║
	// 	//     ╚═  Tabla Citas
	// 	/*        */
	$("#tbl_laboratorio").DataTable(params_tbl_laboratorio);
	$("#fecha_resultado").flatpickr({
		altInput: true,
		altFormat: "l j F, Y",
		dateFormat: "Y-m-d",
		// defaultDate: document.getElementById('fecha_resultado').getAttribute('fecha_fie'),
		disableMobile: true,
		// weekNumbers:true,
		minDate: document.getElementById('fecha_resultado').getAttribute('fecha_fie'),
		locale: localDefecto,
	});
	$("#fecha_recepcion_lrr").flatpickr({
		altInput: true,
		altFormat: "l j F, Y",
		dateFormat: "Y-m-d",
		// defaultDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
		disableMobile: true,
		// weekNumbers:true,
		minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
		locale: localDefecto,
	});

	$("#fecha_recepcion_ins").flatpickr({
		altInput: true,
		altFormat: "l j F, Y",
		dateFormat: "Y-m-d",
		// defaultDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
		disableMobile: true,
		// weekNumbers:true,
		minDate: document.getElementById('fecha_resultado').getAttribute('fecha_mue'),
		locale: localDefecto,
	});

	let miFiIdFicha = document.getElementById("id_ficha").value;
	const dataGenFicha = new FormData();
	dataGenFicha.append("id", miFiIdFicha);
	// 	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

	Promise.all([
		//     ║
		//     ╠═ Listar las citas creadas
		/*     ║   */
		listarLabotatorio_x_Fichas(dataGenFicha),
		//     ║
		//     ╚═ Fecha actual con hora 7am
		/*         */
		// iniciarFechaHora()
	])
		.then((data) => {
			if (!revisionDatos(data[0])) {
				return;
			}
			let misFichas = data[0].data;
			console.log(misFichas);
			limpiarTabla("tbl_laboratorio");
			agregarDataTabla("tbl_laboratorio", misFichas);
		})
		.catch((error) => {
			Mensaje2(0, "Error de sistema", "Ok", "Hubo un error en el sistema");
		});

		// let misInput = document.querySelectorAll('.b_lab')
		let misInput = document.getElementById('accordionTwo').getElementsByTagName('input')
		Array.from(misInput).forEach(element => {
			element.setAttribute('disabled','disabled')
		});
		let misSelect = document.getElementById('accordionTwo').getElementsByTagName('select')
		Array.from(misSelect).forEach(element => {
			element.setAttribute('disabled','disabled')
		});
		let misTextArea = document.getElementById('accordionTwo').getElementsByTagName('textarea')
		Array.from(misTextArea).forEach(element => {
			element.setAttribute('disabled','disabled')
		});
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function () {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight) {
			panel.style.maxHeight = null;
			panel.style.opacity = "0";
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
			panel.style.opacity = "1";
		}
	});
}

// Get the modal
// var modal = document.getElementById("myModal");
// var modalV = document.getElementById("myModalVer");
// var modalE = document.getElementById("myModalEditar");

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
// var spanC = document.querySelector(".closeVer");
// var spanE = document.querySelector(".closeEditar");

// When the user clicks the button, open the modal
// btn.onclick = function () {
// 	modal.style.display = "block";
// };

// When the user clicks on <span> (x), close the modal
// span.onclick = function () {
// 	modal.style.display = "none";
// };
// spanC.onclick = function () {
// 	modalV.style.display = "none";
// };
// spanE.onclick = function () {
// 	modalE.style.display = "none";
// };

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
// 	if (
// 		event.target == modal ||
// 		event.target == modalV ||
// 		event.target == modalE
// 	) {
// 		modal.style.display = "none";
// 		modalV.style.display = "none";
// 		modalE.style.display = "none";
// 	}
// };

const agregarDataBusqueda = (misMuestras) => {
	limpiarTabla('tbl_laboratorio')
	agregarDataTabla('tbl_laboratorio',misMuestras)
}

function listarMisMuestras() {
	let miFiIdFicha = document.getElementById("id_ficha").value;
	const dataGenFichaa = new FormData();
	dataGenFichaa.append("id", miFiIdFicha);
	listarLabotatorio_x_Fichas(dataGenFichaa)
		.then((data) => {
			if (!revisionDatos(data)) {
				return;
			}
			let misFichas = data.data;
			console.log(misFichas);
			limpiarTabla("tbl_laboratorio");
			agregarDataTabla("tbl_laboratorio", misFichas);
		})
		.catch((error) => {
			Mensaje2(0, "Error de sistema", "Ok", "Hubo un error en el sistema");
		});
}
