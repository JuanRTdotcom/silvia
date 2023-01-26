
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
    columns : [
        {	
			data: 'id',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Nombre_Establecimiento',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Nombre_Diresa',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Negativa',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_Notificacion',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_Inicio_Enfermedad',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_Toma_Muestra',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Año',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Semana',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Responsable_Laboratorio',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Responsable_Epidemiologia',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Dni',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Nombres',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Apellido_Paterno',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Apellido_Materno',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Edad',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Tipo_Edad',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Sexo',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Direccion',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Tipo_Via',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Nombre_Via',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Numero_Puerta',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Numero_Manzana',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Lote',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Nombre_Asociacion',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Tipo_Asociacion',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Telefono',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Gestante',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fiebre',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Rash',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Conjuntivitis',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Artralgia',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Mialgia',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Otros',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Otro_Sintoma',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Evaluacion_Paciente',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Area_Captacion',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Diagnostico_Captacion',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Pais',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Departamento',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Provincia',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Distrito',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Localidad',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Tipo_Zona',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Id_Usuario_Registra',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Nombre_usuario_Registra',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_Registro',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
    ]
	
}


var params_tbl_laboratorio_ini = {
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
}
var params_tbl_laboratorio_conFichas = {
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
	columns : [
		{
			data: 'idPaciente',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Nombre_Establecimiento',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Nombre_Diresa',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Negativa',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Fecha_Notificacion',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Fecha_Inicio_Enfermedad',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Fecha_Toma_Muestra',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Año',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Semana',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Responsable_Laboratorio',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Responsable_Epidemiologia',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Dni',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Nombres',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Apellido_Paterno',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Apellido_Materno',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Edad',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Tipo_Edad',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Sexo',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Direccion',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Tipo_Via',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Nombre_Via',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Numero_Puerta',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Numero_Manzana',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Lote',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Nombre_Asociacion',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Tipo_Asociacion',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Telefono',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Gestante',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Fiebre',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Rash',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Conjuntivitis',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Artralgia',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Mialgia',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Otros',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Otro_Sintoma',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Evaluacion_Paciente',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Area_Captacion',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Diagnostico_Captacion',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Pais',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Departamento',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Provincia',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Distrito',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Localidad',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Tipo_Zona',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Id_Usuario_Registra',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Nombre_usuario_Registra',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
		{
			data: 'Fecha_Registro',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'nroMuestra',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'idMuestra',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Enfermedad',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Prueba',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Resultado',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Serotipo',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_resultado',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_recepcion_LRR',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_envio_INS',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_recepcion_INS',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        
    ]
}

var params_tbl_laboratorio = {
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
    columns : [
        {	width:180,
			data: 'nroMuestra',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	width:200,
			data: 'Enfermedad',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Prueba',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	width:150,
			data: 'Resultado',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	width:70,
			data: 'Serotipo',
			createdCell: function (td, cellData, rowData, row, col) {
				// $(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_resultado',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_recepcion_LRR',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'dias_FechasResultado_y_RecepcionLRR',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_envio_INS',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'Fecha_recepcion_INS',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
		{	
			data: 'idPaciente',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        {	
			data: 'idMuestra',
			createdCell: function (td, cellData, rowData, row, col) {
				$(td).css("text-align", "center");
			},
		},
        
    ]
   
	
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



const listarFichasdeVigilancia = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Reportes/listarFichas', {
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

		fetch('Reportes/listarFichasFiltro', {
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

const listarFichasdeVigilancia_exportar = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Reportes/miReporte', {
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

const listarLaboratorio_filtro = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Reportes/listarFichasFiltro_Lab', {
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

const agregarACola = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Reportes/agregarCola', {
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

const agregarAColaLab = (datas) => {
	return new Promise((resolve, reject) => {

		fetch('Reportes/agregarColaLab', {
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
	data.append("establecimiento", document.getElementById('mis_establecimientos').value.trim());
	data.append("diresa", document.getElementById('mis_diresas').value.trim());
	data.append("dni", document.getElementById('dni').value.trim());
	data.append("negativa", document.getElementById('negativa').checked?1:0);
	data.append("fecha_notificacion_inicio", document.getElementById('fecha_notificacion').value.substr(0,10));
	data.append("fecha_notificacion_fin", document.getElementById('fecha_notificacion').value.substr(-10));
	data.append("fecha_inicio_enfermedad_inicio", document.getElementById('fecha_inicio_enfermedad').value.substr(0,10));
	data.append("fecha_inicio_enfermedad_fin", document.getElementById('fecha_inicio_enfermedad').value.substr(-10));
	data.append("fecha_muestra_inicio", document.getElementById('fecha_muestra').value.substr(0,10));
	data.append("fecha_muestra_fin", document.getElementById('fecha_muestra').value.substr(-10));
	listarFichasdeVigilancia_filtro(data)
	.then((datos) => {
		$('#tbl_fichas').DataTable().destroy();
		colocarCabeceraParaSoloFichas()		
		$('#tbl_fichas').DataTable(params_tbl_edas_general);
		ocultarSpinner(btn)
		agregarDataBusqueda(datos.data);
	})
})

document.getElementById('buscar_mis_laboratorios').addEventListener('submit',e => {
	e.preventDefault()
	let btn = document.getElementById('btn_buscarLaboratorio')
	console.log('entra')
	mostrarSpinner(btn)
	const data = new FormData();
	data.append("conFichas", document.getElementById('conFichas').checked?1:0);
	data.append("nro_muestra", document.getElementById('nro_muestra').value.trim());
	data.append("mis_enfermedades", document.getElementById('mis_enfermedades').value.trim());
	data.append("mis_pruebas", document.getElementById('mis_pruebas').value.trim());
	data.append("mis_resultados", document.getElementById('mis_resultados').value.trim());
	data.append("mis_serotipos", document.getElementById('mis_serotipos').value.trim());
	data.append("fecha_resultados_inicio", document.getElementById('fecha_resultados').value.substr(0,10));
	data.append("fecha_resultados_fin", document.getElementById('fecha_resultados').value.substr(-10));
	data.append("fecha_recepcion_lrr_inicio", document.getElementById('fecha_recepcion_lrr').value.substr(0,10));
	data.append("fecha_recepcion_lrr_fin", document.getElementById('fecha_recepcion_lrr').value.substr(-10));
	data.append("fecha_envio_ins_inicio", document.getElementById('fecha_envio_ins').value.substr(0,10));
	data.append("fecha_envio_ins_fin", document.getElementById('fecha_envio_ins').value.substr(-10));
	data.append("fecha_recepcion_ins_inicio", document.getElementById('fecha_recepcion_ins').value.substr(0,10));
	data.append("fecha_recepcion_ins_fin", document.getElementById('fecha_recepcion_ins').value.substr(-10));
	
	listarLaboratorio_filtro(data)
	.then((datos) => {
		console.log('milaaab')
		console.log(datos)
		if(document.getElementById('conFichas').checked){
			limpiarTabla('tbl_laboratorio')
			$('#tbl_laboratorio').DataTable().destroy();
			colocarCabeceraParaSoloLabratorioconficha()	
			$('#tbl_laboratorio').DataTable(params_tbl_laboratorio_conFichas);
		}else{
			limpiarTabla('tbl_laboratorio')
			$('#tbl_laboratorio').DataTable().destroy();
			colocarCabeceraParaSoloLabratorio()
			$('#tbl_laboratorio').DataTable(params_tbl_laboratorio);
		}

		ocultarSpinner(btn)
		agregarDataBusquedaLaboratorio(datos.data);
	})
})

document.getElementById('btn_FichaExportar').addEventListener('click',e => {
	e.preventDefault()
	let btn = document.getElementById('btn_FichaExportar')
	const data = new FormData();
	data.append("type", "Fichas");
	data.append("establecimiento", document.getElementById('mis_establecimientos').value.trim());
	data.append("diresa", document.getElementById('mis_diresas').value.trim());
	data.append("dni", document.getElementById('dni').value.trim());
	data.append("negativa", document.getElementById('negativa').checked?1:0);
	data.append("fecha_notificacion_inicio", document.getElementById('fecha_notificacion').value.substr(0,10));
	data.append("fecha_notificacion_fin", document.getElementById('fecha_notificacion').value.substr(-10));
	data.append("fecha_inicio_enfermedad_inicio", document.getElementById('fecha_inicio_enfermedad').value.substr(0,10));
	data.append("fecha_inicio_enfermedad_fin", document.getElementById('fecha_inicio_enfermedad').value.substr(-10));
	data.append("fecha_muestra_inicio", document.getElementById('fecha_muestra').value.substr(0,10));
	data.append("fecha_muestra_fin", document.getElementById('fecha_muestra').value.substr(-10));
	btn.setAttribute('disabled','disabled')
	btn.innerHTML = `<div class="spinner-border spinner-border-sm text-light" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`
	agregarACola(data)
	.then((datos) => {
		btn.removeAttribute('disabled')
                btn.innerHTML = `<svg width="24" height="24" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M6.70238 2.25C6.53615 2.25 6.3827 2.33919 6.30042 2.48362L2.95444 8.35685C2.51091 9.13539 2.32478 10.0342 2.42265 10.9249L2.7758 14.1385C2.83863 14.7103 3.2875 15.1632 3.8587 15.2312L5.97575 15.483C7.37331 15.6493 8.79034 15.5051 10.1258 15.0609C10.7854 14.8416 11.3136 14.341 11.5681 13.6942L13.2722 9.36363C13.3139 9.25775 13.3427 9.14725 13.358 9.03451C13.4872 8.0824 12.6538 7.27924 11.7071 7.44367L8.29129 8.03694C7.21229 8.22434 6.28038 7.27216 6.49096 6.19744L7.15637 2.80158C7.21236 2.51581 6.99358 2.25 6.70238 2.25ZM4.99708 1.74111C5.34617 1.12836 5.99716 0.750006 6.70237 0.75C7.93775 0.749989 8.86593 1.87768 8.62838 3.09001L7.96297 6.48587C7.96012 6.50042 7.96165 6.50931 7.96365 6.51569C7.96612 6.52355 7.97119 6.53276 7.97954 6.5413C7.9879 6.54984 7.997 6.5551 8.0048 6.55774C8.01114 6.55988 8.01999 6.5616 8.0346 6.55906L11.4504 5.96579C13.3966 5.62777 15.1101 7.27891 14.8444 9.23627C14.8129 9.46806 14.7537 9.69522 14.6681 9.91289L12.964 14.2435C12.5467 15.3039 11.6806 16.1246 10.5992 16.4843C9.0544 16.9981 7.41522 17.1648 5.79856 16.9725L3.68151 16.7207C2.4173 16.5703 1.42383 15.5679 1.28477 14.3024L0.931628 11.0887C0.799213 9.88369 1.05103 8.66766 1.65111 7.61434L4.99708 1.74111Z" fill="currentColor"/>
				</svg>`
				setTimeout((()=>{
					btn.innerHTML = `Exportar`					
				}),2000)
                return Swal.fire(
						"Correcto!",
						"El documento fue añadido a la cola de descarga",
						"success"
					);
	})
	.catch(error => {
		btn.removeAttribute('disabled')
		btn.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M11.0001 7.00005C11.0001 7.55233 10.5523 8.00005 10.0001 8.00005C9.44778 8.00005 9.00006 7.55233 9.00006 7.00005C9.00006 6.44776 9.44778 6.00005 10.0001 6.00005C10.5523 6.00005 11.0001 6.44776 11.0001 7.00005Z" fill="currentColor"/>
		<path d="M10.0001 9.75005C10.4143 9.75005 10.7501 10.0858 10.7501 10.5V15.5C10.7501 15.9143 10.4143 16.25 10.0001 16.25C9.58585 16.25 9.25006 15.9143 9.25006 15.5V10.5C9.25006 10.0858 9.58585 9.75005 10.0001 9.75005Z" fill="currentColor"/>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2704 1.99268C11.1784 0.39502 8.82165 0.395014 7.72967 1.99268L7.29775 2.62463C4.59171 6.58384 2.26675 10.7905 0.354018 15.1881L0.263803 15.3956C-0.410252 16.9453 0.608112 18.705 2.28766 18.8927C7.41329 19.4656 12.5868 19.4656 17.7124 18.8927C19.392 18.705 20.4103 16.9453 19.7363 15.3956L19.6461 15.1881C17.7333 10.7905 15.4084 6.58385 12.7023 2.62463L12.2704 1.99268ZM8.96806 2.83909C9.46441 2.11288 10.5357 2.11288 11.032 2.83909L11.4639 3.47104C14.1165 7.35206 16.3956 11.4756 18.2705 15.7864L18.3608 15.9938C18.6322 16.6179 18.2221 17.3264 17.5458 17.402C12.5309 17.9625 7.46917 17.9625 2.45427 17.402C1.77797 17.3264 1.36791 16.6179 1.63933 15.9938L1.72954 15.7864C3.6045 11.4756 5.88354 7.35205 8.53613 3.47104L8.96806 2.83909Z" fill="currentColor"/>
		</svg>
		`
	setTimeout((()=>{
		btn.innerHTML = `Exportar`					
	}),2000)
		Mensaje2(0, 'ERROR', 'Entendido', 'Hubo un problema para generar el documento. Comunícate con el área de sistemas.')
	});
	// window.open(`${baseURL}Reportes/Reportes/miReporteFichas?type=${type}&establecimiento=${establecimiento}&diresa=${diresa}&dni=${dni}&negativa=${negativa}&fecha_notificacion_inicio=${fecha_notificacion_inicio}&fecha_notificacion_fin=${fecha_notificacion_fin}&fecha_inicio_enfermedad_inicio=${fecha_inicio_enfermedad_inicio}&fecha_inicio_enfermedad_fin=${fecha_inicio_enfermedad_fin}&fecha_muestra_inicio=${fecha_muestra_inicio}&fecha_muestra_fin=${fecha_muestra_fin}`, '_blank');
})

document.getElementById('btn_exportarLaboratorio').addEventListener('click',e => {

	e.preventDefault()
	let btn = document.getElementById('btn_exportarLaboratorio')
	const data = new FormData();
	data.append("type", "Laboratorio");
	data.append("conFichas", document.getElementById('conFichas').checked?1:0);
	data.append("nro_muestra", document.getElementById('nro_muestra').value.trim());
	data.append("mis_enfermedades", document.getElementById('mis_enfermedades').value.trim());
	data.append("mis_pruebas", document.getElementById('mis_pruebas').value.trim());
	data.append("mis_resultados", document.getElementById('mis_resultados').value.trim());
	data.append("mis_serotipos", document.getElementById('mis_serotipos').value.trim());
	data.append("fecha_resultados_inicio", document.getElementById('fecha_resultados').value.substr(0,10));
	data.append("fecha_resultados_fin", document.getElementById('fecha_resultados').value.substr(-10));
	data.append("fecha_recepcion_lrr_inicio", document.getElementById('fecha_recepcion_lrr').value.substr(0,10));
	data.append("fecha_recepcion_lrr_fin", document.getElementById('fecha_recepcion_lrr').value.substr(-10));
	data.append("fecha_envio_ins_inicio", document.getElementById('fecha_envio_ins').value.substr(0,10));
	data.append("fecha_envio_ins_fin", document.getElementById('fecha_envio_ins').value.substr(-10));
	data.append("fecha_recepcion_ins_inicio", document.getElementById('fecha_recepcion_ins').value.substr(0,10));
	data.append("fecha_recepcion_ins_fin", document.getElementById('fecha_recepcion_ins').value.substr(-10));

	btn.setAttribute('disabled','disabled')
	btn.innerHTML = `<div class="spinner-border spinner-border-sm text-light" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`
	agregarAColaLab(data)
	.then((datos) => {
		btn.removeAttribute('disabled')
                btn.innerHTML = `<svg width="24" height="24" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M6.70238 2.25C6.53615 2.25 6.3827 2.33919 6.30042 2.48362L2.95444 8.35685C2.51091 9.13539 2.32478 10.0342 2.42265 10.9249L2.7758 14.1385C2.83863 14.7103 3.2875 15.1632 3.8587 15.2312L5.97575 15.483C7.37331 15.6493 8.79034 15.5051 10.1258 15.0609C10.7854 14.8416 11.3136 14.341 11.5681 13.6942L13.2722 9.36363C13.3139 9.25775 13.3427 9.14725 13.358 9.03451C13.4872 8.0824 12.6538 7.27924 11.7071 7.44367L8.29129 8.03694C7.21229 8.22434 6.28038 7.27216 6.49096 6.19744L7.15637 2.80158C7.21236 2.51581 6.99358 2.25 6.70238 2.25ZM4.99708 1.74111C5.34617 1.12836 5.99716 0.750006 6.70237 0.75C7.93775 0.749989 8.86593 1.87768 8.62838 3.09001L7.96297 6.48587C7.96012 6.50042 7.96165 6.50931 7.96365 6.51569C7.96612 6.52355 7.97119 6.53276 7.97954 6.5413C7.9879 6.54984 7.997 6.5551 8.0048 6.55774C8.01114 6.55988 8.01999 6.5616 8.0346 6.55906L11.4504 5.96579C13.3966 5.62777 15.1101 7.27891 14.8444 9.23627C14.8129 9.46806 14.7537 9.69522 14.6681 9.91289L12.964 14.2435C12.5467 15.3039 11.6806 16.1246 10.5992 16.4843C9.0544 16.9981 7.41522 17.1648 5.79856 16.9725L3.68151 16.7207C2.4173 16.5703 1.42383 15.5679 1.28477 14.3024L0.931628 11.0887C0.799213 9.88369 1.05103 8.66766 1.65111 7.61434L4.99708 1.74111Z" fill="currentColor"/>
				</svg>`
				setTimeout((()=>{
					btn.innerHTML = `Exportar`					
				}),2000)
                return Swal.fire(
						"Correcto!",
						"El documento fue añadido a la cola de descarga",
						"success"
					);
	})
	.catch(error => {
		btn.removeAttribute('disabled')
		btn.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M11.0001 7.00005C11.0001 7.55233 10.5523 8.00005 10.0001 8.00005C9.44778 8.00005 9.00006 7.55233 9.00006 7.00005C9.00006 6.44776 9.44778 6.00005 10.0001 6.00005C10.5523 6.00005 11.0001 6.44776 11.0001 7.00005Z" fill="currentColor"/>
		<path d="M10.0001 9.75005C10.4143 9.75005 10.7501 10.0858 10.7501 10.5V15.5C10.7501 15.9143 10.4143 16.25 10.0001 16.25C9.58585 16.25 9.25006 15.9143 9.25006 15.5V10.5C9.25006 10.0858 9.58585 9.75005 10.0001 9.75005Z" fill="currentColor"/>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2704 1.99268C11.1784 0.39502 8.82165 0.395014 7.72967 1.99268L7.29775 2.62463C4.59171 6.58384 2.26675 10.7905 0.354018 15.1881L0.263803 15.3956C-0.410252 16.9453 0.608112 18.705 2.28766 18.8927C7.41329 19.4656 12.5868 19.4656 17.7124 18.8927C19.392 18.705 20.4103 16.9453 19.7363 15.3956L19.6461 15.1881C17.7333 10.7905 15.4084 6.58385 12.7023 2.62463L12.2704 1.99268ZM8.96806 2.83909C9.46441 2.11288 10.5357 2.11288 11.032 2.83909L11.4639 3.47104C14.1165 7.35206 16.3956 11.4756 18.2705 15.7864L18.3608 15.9938C18.6322 16.6179 18.2221 17.3264 17.5458 17.402C12.5309 17.9625 7.46917 17.9625 2.45427 17.402C1.77797 17.3264 1.36791 16.6179 1.63933 15.9938L1.72954 15.7864C3.6045 11.4756 5.88354 7.35205 8.53613 3.47104L8.96806 2.83909Z" fill="currentColor"/>
		</svg>
		`
	setTimeout((()=>{
		btn.innerHTML = `Exportar`					
	}),2000)
		Mensaje2(0, 'ERROR', 'Entendido', 'Hubo un problema para generar el documento. Comunícate con el área de sistemas.')
	});
	// window.open(`${baseURL}Reportes/Reportes/miReporteLaboratorio?type=${type}&conFichas=${conFichas}&nro_muestra=${nro_muestra}&mis_enfermedades=${mis_enfermedades}&mis_pruebas=${mis_pruebas}&mis_resultados=${mis_resultados}&mis_serotipos=${mis_serotipos}&fecha_resultados_inicio=${fecha_resultados_inicio}&fecha_resultados_fin=${fecha_resultados_fin}&fecha_recepcion_lrr_inicio=${fecha_recepcion_lrr_inicio}&fecha_recepcion_lrr_fin=${fecha_recepcion_lrr_fin}&fecha_envio_ins_inicio=${fecha_envio_ins_inicio}&fecha_envio_ins_fin=${fecha_envio_ins_fin}&fecha_recepcion_ins_inicio=${fecha_recepcion_ins_inicio}&fecha_recepcion_ins_fin=${fecha_recepcion_ins_fin}`, '_blank');
})

document.getElementById('btn_limpiarFichaFiltros').addEventListener('click',e => {
	e.preventDefault()
	
			limpiarTabla('tbl_fichas')
			document.getElementById('buscar_mis_fichas').reset()
			$("#mis_establecimientos").val('').trigger("change");
			$("#mis_diresas").val('').trigger("change");
			$("#fecha_notificacion").flatpickr(calendarioConrangos).clear();
			$("#fecha_inicio_enfermedad").flatpickr(calendarioConrangos).clear();
			$("#fecha_muestra").flatpickr(calendarioConrangos).clear();

})

document.getElementById('btn_limpiarLaboratorioFiltros').addEventListener('click',e => {
	e.preventDefault()
			limpiarTabla('tbl_laboratorio')
			document.getElementById('buscar_mis_laboratorios').reset()
			$("#mis_enfermedades").val('').trigger("change");
			$("#mis_pruebas").val('').trigger("change");
			$("#mis_resultados").val('').trigger("change");
			$("#mis_serotipos").val('').trigger("change");
			$("#fecha_resultados").flatpickr(calendarioConrangos).clear();
			$("#fecha_recepcion_lrr").flatpickr(calendarioConrangos).clear();
			$("#fecha_envio_ins").flatpickr(calendarioConrangos).clear();
			$("#fecha_recepcion_ins").flatpickr(calendarioConrangos).clear();


})

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// INICIALIZACIONES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var formatForSlider = {
    from: function (formattedValue) {
        return Number(formattedValue);
    },
    to: function(numericValue) {
        return Math.round(numericValue);
    }
};

$(document).ready(function () {
	// ══════════════════════════════════════════ 
	// VALOR QUE SE EJECUTA AL INICIAR - DEFECTO
	// ════╦═════════════════════════════════════
	//     ║
	//     ╠═  Automatical started click
	// $("#mis_establecimientos").select2({});
	/*     ║  */
	// $("#mis_diresas").select2({});
	/*     ║  */
	// $("#mis_tipo_via").select2({});
	/*     ║  */
	// $("#mis_tipo_asociacion").select2({});
	/*     ║  */
	// $("#mis_enfermedades").select2({});
	/*     ║  */
	// $("#mis_pruebas").select2({});
	/*     ║  */
	// $("#mis_resultados").select2({});
	/*     ║  */
	// $("#mis_serotipos").select2({});
	/*     ║  */
	$("#fecha_notificacion").flatpickr(calendarioConrangos);
	/*     ║  */
	$("#fecha_inicio_enfermedad").flatpickr(calendarioConrangos);
	/*     ║  */
	$("#fecha_muestra").flatpickr(calendarioConrangos);
	/*     ║  */
	$("#fecha_resultados").flatpickr(calendarioConrangos);
	/*     ║  */
	$("#fecha_recepcion_lrr").flatpickr(calendarioConrangos);
	/*     ║  */
	$("#fecha_envio_ins").flatpickr(calendarioConrangos);
	/*     ║  */
	$("#fecha_recepcion_ins").flatpickr(calendarioConrangos);
	/*     ║  */

	//     ║
	//     ╚═  Tabla Citas
	/*        */
	$('#tbl_fichas').DataTable(params_tbl_laboratorio_ini);
	$('#tbl_laboratorio').DataTable(params_tbl_laboratorio_ini);
	


})


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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

const agregarDataBusquedaLaboratorio = (misMuestras) => {
		limpiarTabla('tbl_laboratorio')
		agregarDataTabla('tbl_laboratorio',misMuestras)
}

function openCity(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
	  tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
	  tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
  }

//   document.getElementById("defaultOpen").click();

  const colocarCabeceraParaSoloFichas = () => {
	let miTabla = document.querySelector('.cv_f')
	miTabla.innerHTML = `
	<th>#</th>
	<th>Establecimiento</th>
	<th>Diresa</th>
	<th class="text-center">Negativa</th>
	<th class="none">Fch Notificación</th>
	<th class="none">Fch Inicio Enf</th>
	<th class="none">Fch Muestra</th>
	<th class="none">Año</th>
	<th class="none">Semana</th>
	<th class="none">Resp Laboratorio</th>
	<th class="none">Resp Epidemiología</th>
	<th >Dni</th>
	<th >Nombres</th>
	<th >Apell Paterno</th>
	<th class="none">Apell Materno</th>
	<th class="none">Edad</th>
	<th class="none">Tipo Edad</th>
	<th class="none">Sexo</th>
	<th class="none">Dirección</th>
	<th class="none">Tipo Vía</th>
	<th class="none">Nombre Vía</th>
	<th class="none">Nro Puerta</th>
	<th class="none">Nro Manzana</th>
	<th class="none">Lote</th>
	<th class="none">Nombre Asociación</th>
	<th class="none">Tipo Asociación</th>
	<th class="none">Teléfono</th>
	<th class="none">Gestante</th>
	<th class="none">Fiebre</th>
	<th class="none">Rash</th>
	<th class="none">Conjuntivitis</th>
	<th class="none">Artralgia</th>
	<th class="none">Mialgia</th>
	<th class="none">Otro</th>
	<th class="none">Otro Síntoma</th>
	<th class="none">Evaluación Paciente</th>
	<th class="none">Área Captación</th>
	<th class="none">Diagnóstico Captación</th>
	<th class="none">País</th>
	<th class="none">Departamento</th>
	<th class="none">Provincia</th>
	<th class="none">Distrito</th>
	<th class="none">Localidad</th>
	<th class="none">Tipo Zona</th>
	<th class="none">Usuario registra</th>
	<th class="none">Nombre Usuario registra</th>
	<th class="none">Fech registro</th>
	`
}
  const colocarCabeceraParaSoloLabratorio = () => {
	let miTabla = document.querySelector('.cv_l')
	miTabla.innerHTML = `<th>Nro Muestra</th>
	<th class="">Enfermedad</th>
	<th class="">Prueba</th>
	<th class="">Resultado</th>
	<th class="">Serotipo</th>
	<th class="text-center none">Fch Resultado</th>
	<th class="text-center none">Fch Recepcion LRR</th>
	<th class="text-center none">Dias F.Res - F.LRR</th>
	<th class="text-center none">Fch Envio INS</th>
	<th class="text-center none">Fch Recepcion INS</th>
	<th class="text-center none">Id_Paciente</th>
	<th class="text-center none">Id_Muestra</th>`
}
  const colocarCabeceraParaSoloLabratorioconficha = () => {
	let miTabla = document.querySelector('.cv_l')
	miTabla.innerHTML = `
	<th class="">Paciente</th>
	<th class="none">Establecimiento</th>
	<th class="none">Diresa</th>
	<th class="none" class="text-center">Negativa</th>
	<th class="none">Fch Notificación</th>
	<th class="none">Fch Inicio Enf</th>
	<th class="none">Fch Muestra</th>
	<th class="none">Año</th>
	<th class="none">Semana</th>
	<th class="none">Resp Laboratorio</th>
	<th class="none">Resp Epidemiología</th>
	<th class="">Dni</th>
	<th class="">Nombres</th>
	<th class="">Apell Paterno</th>
	<th class="none">Apell Materno</th>
	<th class="none">Edad</th>
	<th class="none">Tipo Edad</th>
	<th class="none">Sexo</th>
	<th class="none">Dirección</th>
	<th class="none">Tipo Vía</th>
	<th class="none">Nombre Vía</th>
	<th class="none">Nro Puerta</th>
	<th class="none">Nro Manzana</th>
	<th class="none">Lote</th>
	<th class="none">Nombre Asociación</th>
	<th class="none">Tipo Asociación</th>
	<th class="none">Teléfono</th>
	<th class="none">Gestante</th>
	<th class="none">Fiebre</th>
	<th class="none">Rash</th>
	<th class="none">Conjuntivitis</th>
	<th class="none">Artralgia</th>
	<th class="none">Mialgia</th>
	<th class="none">Otro</th>
	<th class="none">Otro Síntoma</th>
	<th class="none">Evaluación Paciente</th>
	<th class="none">Área Captación</th>
	<th class="none">Diagnóstico Captación</th>
	<th class="none">País</th>
	<th class="none">Departamento</th>
	<th class="none">Provincia</th>
	<th class="none">Distrito</th>
	<th class="none">Localidad</th>
	<th class="none">Tipo Zona</th>
	<th class="none">Usuario registra</th>
	<th class="none">Nombre Usuario registra</th>
	<th class="none">Fech registro</th>
	<th class="none">Nro Muestra</th>
	<th class="text-center none">Id_Muestra</th>
	<th class="text-center">Enfermedad</th>
	<th class="text-center">Prueba</th>
	<th class="text-center">Resultado</th>
	<th class="text-center none">Serotipo</th>
	<th class="text-center none">Fch Resultado</th>
	<th class="text-center none">Fch Recepcion LRR</th>
	<th class="text-center none">Fch Envio INS</th>
	<th class="text-center none">Fch Recepcion INS</th>
	`
}

  