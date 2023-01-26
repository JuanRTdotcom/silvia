///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let obtenerProvincia = async (select) => {
	const mis_provincias = document.getElementById("mis_provincias");
	mis_provincias.innerHTML =
		'<option value="">Selecciona una provincia</option>';
	const mis_distritos = document.getElementById("mis_distritos");
	mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>';
	const data = new FormData();
	data.append("dept", select.value);
	listarProvincias(data).then((datos) => {
		// error
		if (
			!revisionDatos(
				datos,
				"error_select",
				3,
				"Atención",
				"Si no seleccionas un departamento específico, se filtrarán por todos los departamentos, y la consulta podría tardar un poco."
			)
		) {
			return;
		}
		// success
		const misProvincias = datos.data;
		console.log(misProvincias);
		misProvincias.forEach((e) => {
			const op = document.createElement("option");
			op.value = e.ubigeo;
			op.innerHTML = e.nombre;
			mis_provincias.appendChild(op);
		});
	});
};

let obtenerDistrito = async (select) => {
	const mis_distritos = document.getElementById("mis_distritos");
	mis_distritos.innerHTML = '<option value="">Selecciona un distrito</option>';
	const data = new FormData();
	data.append("dist", select.value);
	listarDistritos(data).then((datos) => {
		if (
			!revisionDatos(
				datos,
				"error_select",
				3,
				"Atención",
				"Si no seleccionas una provincia en específico, se filtrará por todas las provincias, y la consulta podría tardar un poco."
			)
		) {
			return;
		}
		const misProvincias = datos.data;
		console.log(misProvincias);
		misProvincias.forEach((e) => {
			const op = document.createElement("option");
			op.value = e.ubigeo;
			op.innerHTML = e.nombre;
			mis_distritos.appendChild(op);
		});
	});
};

let otrasEnfermedades = () => {
	let miOculta = document.querySelector(".otro_sintomatologia");
	let otros = document.querySelector("#_otros");
	let input_otros = document.querySelector("#_nombre_otro");
	if (!otros.checked) {
		miOculta.classList.remove("d-none");
		$("#_nombre_otro").focus();
	} else {
		miOculta.classList.add("d-none");
		input_otros.value = "";
	}
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const listarProvincias = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("obtenerProvincias", {
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

const listarDistritos = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("obtenerDistritos", {
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

const registrarFicha = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("registrarFicha", {
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

const validarUsuarioDni = (datas) => {
	return new Promise((resolve, reject) => {
		fetch("vlidarUsuarioDni", {
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

document.getElementById("_registrar_ficha").addEventListener("submit", (e) => {
	e.preventDefault();
	let f_Notificacion = document.getElementById("fecha_notificacion")
	let f_muestra = document.getElementById("fecha_muestra")
	let f_iniEnf = document.getElementById("fecha_inicio_enfermedad")
	let res_lab = document.getElementById("responsable_laboratorio")
	let res_epi = document.getElementById("responsable_epidemiologia")
	let dni = document.getElementById("dni")
	let nombre = document.getElementById("nombres")
	let apepaterno = document.getElementById("apellido_paterno")
	let apematerno = document.getElementById("apellido_materno")
	let sexo = $('input[name="flight-type"]:checked').val()
	let edad = document.getElementById("edad")
	let telefono = document.getElementById("telefono")
	let pais = document.getElementById("mis_paises")
	let departamento = document.getElementById("mis_departamentos")
	let provincia = document.getElementById("mis_provincias")
	let distrito = document.getElementById("mis_distritos")
	let localidad = document.getElementById("localidad")
	let tipoZona = $('input[name="zona"]:checked').val()
	let direccion = document.getElementById("direccion")
	let tipovia = document.getElementById("d_tipo_via")
	let nombrevia = document.getElementById("d_nombre_via")
	let nropuerta = document.getElementById("d_nro_puerta")
	let nromanzana = document.getElementById("d_nro_manzana")
	let lote = document.getElementById("d_lote")
	let tipoasoc = document.getElementById("d_tipo_asociacion")
	let nombreasoc = document.getElementById("d_nombre_asociacion")
	let gestante = document.getElementById("_gestante").checked == true ? 1 : 0
	let fiebre = document.getElementById("_fiebre").checked == true ? 1 : 0
	let rash = document.getElementById("_rash").checked == true ? 1 : 0
	let conjuntivitis = document.getElementById("_conjuntivitis").checked == true ? 1 : 0
	let artralgia = document.getElementById("_artralgia").checked == true ? 1 : 0
	let mialgia = document.getElementById("_mialgia").checked == true ? 1 : 0
	let otro = document.getElementById("_otros").checked == true ? 1 : 0
	let nombreOtro = document.getElementById("_nombre_otro")
	let evaluPaciente = document.getElementById("evaluacion_paciente")
	let areacaptacion = document.getElementById("area_captacion")
	let diagnosticocaptacion = document.getElementById("diagnostico_captacion")
	let observacion = document.getElementById("observacion")

	let btn = document.querySelector(".registrar_fichas");
	if (f_Notificacion.value == "" || f_muestra.value == "" || f_iniEnf.value == "") {
		Mensaje2(2, "Campos obligatorios", "Entendido", "Se deben ingresar las fechas que se solicitan");
		return
	}
	
	if (pais.value == "" || departamento.value == "" || provincia.value == "" || distrito.value == "") {
		Mensaje2(2, "Campos obligatorios", "Entendido", "El país, departamento, provincia y distrito son obligatorios");
		return
	}
				const data = new FormData();
				data.append("responsable_laboratorio", res_lab.value.toUpperCase());
				data.append("responsable_epidemiologia", res_epi.value.toUpperCase());
				data.append("fecha_notificacion", f_Notificacion.value);
				data.append("dni", dni.value);
				data.append("nombres", nombre.value.toUpperCase());
				data.append("apellido_paterno", apepaterno.value.toUpperCase());
				data.append("apellido_materno", apematerno.value.toUpperCase());
				data.append("sexo", sexo);
				data.append("edad", edad.value);
				data.append("tipo_edad", "A");
				data.append("telefono", telefono.value);
				data.append("pais", pais.value);
				data.append("departamento", departamento.value);
				data.append("provincia", provincia.value);
				data.append("distrito", distrito.value);
				data.append("localidad", localidad.value.toUpperCase());
				data.append("tipo_zona", tipoZona);
				data.append("direccion", direccion.value.toUpperCase());
				data.append("tipo_via", tipovia.value);
				data.append("nombre_via", nombrevia.value.toUpperCase());
				data.append("nro_puerta", nropuerta.value.toUpperCase());
				data.append("nro_manzana", nromanzana.value.toUpperCase());
				data.append("lote", lote.value.toUpperCase());
				data.append("tipo_asociacion", tipoasoc.value);
				data.append("nombre_asociacion", nombreasoc.value.toUpperCase());
				data.append("fecha_muestra", f_muestra.value);
				data.append("fecha_inicio_enfermedad", f_iniEnf.value);
				data.append("gestante", gestante);
				data.append("fiebre", fiebre);
				data.append("rash", rash);
				data.append("conjuntivitis", conjuntivitis);
				data.append("artralgia", artralgia);
				data.append("mialgia", mialgia);
				data.append("otro", otro);
				data.append("nombre_otro", nombreOtro.value.toUpperCase());
				data.append("evaluacion_paciente",evaluPaciente.value);
				data.append("area_captacion",areacaptacion.value);
				data.append("diagnostico_captacion",diagnosticocaptacion.value.toUpperCase());
				data.append("observacion",observacion.value.toUpperCase());

	if (!esFechaDeEsteAnio(f_Notificacion) || !esFechaDeEsteAnio(f_muestra) || !esFechaDeEsteAnio(f_iniEnf)) {
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
				const datar = new FormData();
				datar.append("dni", dni.value);
				datar.append("fecha_notificacion", f_Notificacion.value);
				validarUsuarioDni(datar)
				.then(dataVal => {
					console.log('mivalidacion')
					console.log(data)
					if(dataVal.data.length == 0){
						registrarFicha(data)
									.then((datos) => {
										ocultarSpinner(btn);
										if (!revisionDatos(datos)) {
											return;
										}
										Mensaje2(
											1,
											"Ficha registrada",
											"Entendido",
											"La ficha ha sido creada correctamente"
										);
									})
									.then((dat) => {
										document.getElementById("_registrar_ficha").reset();
										$("#fecha_notificacion").flatpickr(calendarioNormal);
										$("#fecha_muestra").flatpickr(calendarioNormal);
										$("#fecha_inicio_enfermedad").flatpickr(calendarioNormal);
									});

					}else{
						ocultarSpinner(btn);
						Mensaje2(
							3,
							"Atención",
							"Entendido",
							`Esta persona con dni ${dni.value} ya ha sido registrada el año de la notificación indicada`
						);
					}
				})
			}
		});
	}else{
		mostrarSpinner(btn);
				const datar = new FormData();
				datar.append("dni", dni.value);
				datar.append("fecha_notificacion", f_Notificacion.value);
				validarUsuarioDni(datar)
				.then(dataVal => {
					console.log('mivalidacion')
					console.log(data)
					if(dataVal.data.length == 0){
						registrarFicha(data)
									.then((datos) => {
										ocultarSpinner(btn);
										if (!revisionDatos(datos)) {
											return;
										}
										Mensaje2(
											1,
											"Ficha registrada",
											"Entendido",
											"La ficha ha sido creada correctamente"
										);
									})
									.then((dat) => {
										document.getElementById("_registrar_ficha").reset();
										$("#fecha_notificacion").flatpickr(calendarioNormal);
										$("#fecha_muestra").flatpickr(calendarioNormal);
										$("#fecha_inicio_enfermedad").flatpickr(calendarioNormal);
									});

					}else{
						ocultarSpinner(btn);
						Mensaje2(
							3,
							"Atención",
							"Entendido",
							`Esta persona con dni ${dni.value} ya ha sido registrada el año de la notificación indicada`
						);
					}
				})
	}

});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {

	// 	// ══════════════════════════════════════════
	// 	// VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
	// 	// ════╦═════════════════════════════════════
	// 	//     ║
	$("#fecha_notificacion").flatpickr(calendarioNormal);
	// 	//     ║
	$("#fecha_muestra").flatpickr(calendarioNormal);
	// 	//     ║
	$("#fecha_inicio_enfermedad").flatpickr(calendarioNormal);
	// 	//     ║
	// $("#sexo").select2({
	// 	minimumResultsForSearch: -1
	// });
	// // 	//     ║
	// $("#mis_paises").select2({});
	// // 	//     ║
	// $("#mis_departamentos").select2({});
	// // 	//     ║
	// $("#mis_provincias").select2({});
	// // 	//     ║
	// $("#mis_distritos").select2({});
	// 	//     ║
	// $("#d_tipo_via").select2({});
	// // 	//     ║
	// $("#d_tipo_asociacion").select2({});
	// // 	//     ║
	// $("#mis_tipo_zona").select2({
	// 	minimumResultsForSearch: -1
	// });
	// // 	//     ║
	// $("#evaluacion_paciente").select2({
	// 	minimumResultsForSearch: -1
	// });
	// // 	//     ║
	// $("#area_captacion").select2({
	// 	minimumResultsForSearch: -1
	// });
	// 	//     ║
	$("#mis_paises").val(171).trigger("change");
	// 	//     ║
	autosize(document.querySelectorAll("textarea"));
	// 	//     ║	
	// 	//     ╚═  Tabla Citas

	// 	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO

});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
