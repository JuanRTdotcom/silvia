///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// VARIABLES ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
let mis_colores = [
	"#8185F7",
	"#34C8E9",
	"#26E7A6",
	"#FEAB02",
	"#67C932",
	"#737E8D",
];
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// FUNCIONES  //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// OPCIONES  ///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// APIS - llamdas al servidor ///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const listarMuestraPorSemana = () => {
	return new Promise((resolve, reject) => {
		fetch("Graficos/listarMuestrasPorSemana", {
			method: "POST",
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

const listarEdades = () => {
	return new Promise((resolve, reject) => {
		fetch("Graficos/listarEdades", {
			method: "POST",
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

const listarGenero = () => {
	return new Promise((resolve, reject) => {
		fetch("Graficos/listarGenero", {
			method: "POST",
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

const listarCaptacionAnual = () => {
	return new Promise((resolve, reject) => {
		fetch("Graficos/listarCaptacionAnual", {
			method: "POST",
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

const listarCaptacionVigilanciaAnual = () => {
	return new Promise((resolve, reject) => {
		fetch("Graficos/listarCaptacionVigilanciaAnual", {
			method: "POST",
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

const listarCaptacionVigilanciaSemanal = () => {
	return new Promise((resolve, reject) => {
		fetch("Graficos/listarCaptacionVigilanciaSemanal", {
			method: "POST",
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

	// 	//     ║
	// 	//     ╚═  Tabla Citas
	// 	/*        */

	// 	// FUNCIONES A EJECUTAR COMO INICIALIZACIONES Y EN SIMULTANEO
	// var options_d = {
	// 	series: [{
	// 	name: 'series1',
	// 	data: [31, 40, 28, 51, 42, 109, 100]
	//   }, {
	// 	name: 'series2',
	// 	data: [11, 32, 45, 32, 34, 52, 41]
	//   }],
	// 	chart: {
	// 	height: 350,
	// 	type: 'area'
	//   },
	//   dataLabels: {
	// 	enabled: false
	//   },
	//   stroke: {
	// 	curve: 'smooth'
	//   },
	//   xaxis: {
	// 	type: 'datetime',
	// 	categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
	//   },
	//   tooltip: {
	// 	x: {
	// 	  format: 'dd/MM/yy HH:mm'
	// 	},
	//   },
	//   };
	// var chart = new ApexCharts(document.querySelector("#ape"), options_d);
	// chart.render();

	// listarMuestraPorSemana().then((data) => {
	// 	let misSeriesDeDatos = [];
	// 	let misSeriesDeDatos_n = [];
	// 	let misDatos = data.data;
	// 	let misanios = misDatos
	// 		.map((item) => item.anio)
	// 		.filter((value, index, self) => self.indexOf(value) === index);
	// 	let mayorMuestraNumero = Math.max(
	// 		...misDatos
	// 			.map((item) => item.muestras)
	// 			.filter((value, index, self) => self.indexOf(value) === index)
	// 			.map((i) => Number(i))
	// 	);
	// 	let misSemanas = [
	// 		1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21,
	// 		22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39,
	// 		40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
	// 	];
	// 	misanios.forEach((t) => {
	// 		let miDataDelAnio = [];
	// 		misSemanas.forEach((e) => {
	// 			let miArrayContenedor = misDatos.filter(function (el) {
	// 				return el.anio == `${t}` && el.semana == `${e}`;
	// 			});
	// 			miArrayContenedor.length == 0
	// 				? miDataDelAnio.push(0)
	// 				: miDataDelAnio.push(parseInt(miArrayContenedor[0].muestras));
	// 		});
	// 		misSeriesDeDatos.push({
	// 			name: `${t}`,
	// 			type: "bar",
	// 			tooltip: {
	// 				valueFormatter: function (value) {
	// 					return value;
	// 				},
	// 			},
	// 			data: miDataDelAnio,
	// 		});

	// 		misSeriesDeDatos_n.push({
	// 			name: `${t}`,
	// 			data: miDataDelAnio,
	// 		});
	// 	});
	// 	// ===================================
	// 	var options_d = {
	// 		series: misSeriesDeDatos_n,
	// 		chart: {
	// 			height: 350,
	// 			type: "bar",
	// 			toolbar: {
	// 				tools: {
	// 					download: `<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	// 						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.73798 0.25C5.96436 0.25 5.31904 0.841231 5.25148 1.61189C5.11024 3.22317 5.0745 4.84164 5.14436 6.45693C5.06003 6.46258 4.97571 6.46847 4.8914 6.47462L3.4019 6.5832C2.44985 6.6526 1.91764 7.71416 2.43163 8.51854C3.5278 10.2341 4.94026 11.7254 6.59369 12.9132L7.19043 13.3418C7.67425 13.6894 8.32591 13.6894 8.80972 13.3418L9.40646 12.9132C11.0599 11.7254 12.4724 10.2341 13.5685 8.51855C14.0825 7.71416 13.5503 6.6526 12.5983 6.5832L11.1088 6.47462C11.0245 6.46847 10.9401 6.46258 10.8558 6.45693C10.9257 4.84164 10.8899 3.22317 10.7487 1.61188C10.6811 0.841229 10.0358 0.25 9.26219 0.25H6.73798ZM6.68157 7.11473C6.56786 5.3275 6.58909 3.53417 6.74513 1.75H9.25503C9.41106 3.53417 9.4323 5.3275 9.31859 7.11473C9.30584 7.31509 9.37396 7.51221 9.5077 7.66195C9.64144 7.8117 9.82964 7.90156 10.0302 7.91144C10.3535 7.92737 10.6767 7.94711 10.9997 7.97065L12.0815 8.04951C11.1219 9.46281 9.92044 10.6971 8.53133 11.6949L8.00008 12.0765L7.46882 11.6949C6.07972 10.6971 4.87824 9.4628 3.9187 8.04951L5.00046 7.97065C5.32345 7.94711 5.64664 7.92737 5.96999 7.91144C6.17052 7.90156 6.35871 7.81169 6.49246 7.66195C6.6262 7.51221 6.69432 7.31509 6.68157 7.11473Z" fill="currentColor"/>
	// 						<path d="M1.75 14C1.75 13.5858 1.41421 13.25 1 13.25C0.585786 13.25 0.25 13.5858 0.25 14V16C0.25 16.9665 1.0335 17.75 2 17.75H14C14.9665 17.75 15.75 16.9665 15.75 16V14C15.75 13.5858 15.4142 13.25 15 13.25C14.5858 13.25 14.25 13.5858 14.25 14V16C14.25 16.1381 14.1381 16.25 14 16.25H2C1.86193 16.25 1.75 16.1381 1.75 16V14Z" fill="currentColor"/>
	// 						</svg>
	// 						`,
	// 					zoom: true,
	// 					zoomin: false,
	// 					zoomout: false,
	// 					pan: false,
	// 					reset: `<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
	// 						<path d="M3.54543 5.16265C3.33021 5.10587 3.15133 4.95643 3.05716 4.75474C2.963 4.55305 2.96329 4.31996 3.05795 4.11851L4.7187 0.584121C4.84246 0.320735 5.10742 0.152717 5.39843 0.153077C5.68944 0.153437 5.95398 0.32211 6.07709 0.585801L6.80971 2.15504C6.83591 2.14474 6.86295 2.13581 6.89078 2.12836C11.2381 0.963489 15.7067 3.5434 16.8715 7.89075C18.0364 12.2381 15.4565 16.7066 11.1091 17.8715C6.7618 19.0364 2.29326 16.4565 1.12839 12.1091C0.757969 10.7267 0.766303 9.32978 1.09074 8.03105C1.19112 7.62919 1.59828 7.38479 2.00015 7.48518C2.40201 7.58557 2.6464 7.99273 2.54602 8.39459C2.28172 9.45258 2.27444 10.5907 2.57728 11.7209C3.52774 15.268 7.17377 17.3731 10.7209 16.4226C14.2681 15.4722 16.3731 11.8261 15.4226 8.27898C14.4877 4.78982 10.9447 2.69601 7.45307 3.53307L8.19226 5.11637C8.31537 5.38006 8.27483 5.69116 8.08825 5.91449C7.90167 6.13783 7.60274 6.23307 7.32136 6.15883L3.54543 5.16265Z" fill="currentColor"/>
	// 						</svg>
	// 						`,
	// 					customIcons: [],
	// 				},
	// 			},
	// 		},
	// 		dataLabels: {
	// 			enabled: false,
	// 		},
	// 		stroke: {
	// 			curve: "smooth",
	// 		},
	// 		xaxis: {
	// 			type: "category",
	// 			categories: misSemanas,
	// 		},
	// 		title: {
	// 			text: "Tendencias de muestras de laboratorio por semana",
	// 			style: {
	// 				fontSize: "20px",
	// 				fontWeight: "600",
	// 				fontFamily: "Public Sans",
	// 				color: "#566A7F",
	// 			},
	// 		},
	// 		colors: mis_colores,
	// 		// subtitle: {
	// 		// 	text: 'Muestras de laboratorio',
	// 		// 	align: 'left',
	// 		// 	margin: 5,
	// 		// 	floating: false,
	// 		// 	style: {
	// 		// 		fontSize: '12px',
	// 		// 		fontWeight: 'normal',
	// 		// 		fontFamily: "Public Sans",
	// 		// 		color: '#9699a2'
	// 		// 	},
	// 		// },
	// 		legend: {
	// 			show: true,
	// 			offsetY: -10,
	// 			horizontalAlign: "left",
	// 			position: "top",
	// 			labels: {
	// 				colors: "#a1acb8",
	// 			},
	// 		},
	// 		xaxis: {
	// 			type: "category",
	// 			title: {
	// 				// text: 'Semanas',
	// 				offsetX: 0,
	// 				offsetY: -5,
	// 				style: {
	// 					color: "#a1acb8",
	// 					fontSize: "12px",
	// 					fontFamily: "Public Sans",
	// 					fontWeight: 300,
	// 				},
	// 			},
	// 			labels: {
	// 				style: {
	// 					fontSize: "12px",
	// 					colors: "#a1acb8",
	// 				},
	// 			},
	// 		},
	// 		yaxis: {
	// 			show: true,
	// 			title: {
	// 				// text: 'Muestras',
	// 				rotate: -90,
	// 				offsetX: 0,
	// 				offsetY: 0,
	// 				style: {
	// 					color: "#a1acb8",
	// 					fontSize: "12px",
	// 					fontFamily: "Public Sans",
	// 					fontWeight: 300,
	// 				},
	// 			},
	// 			labels: {
	// 				style: {
	// 					fontSize: "12px",
	// 					colors: "#a1acb8",
	// 					fontFamily: "Public Sans",
	// 				},
	// 			},
	// 		},
	// 		grid: {
	// 			show: true,
	// 			borderColor: "#ECEEF1",
	// 			strokeDashArray: 0,
	// 			position: "back",
	// 			padding: {
	// 				top: 0,
	// 				bottom: -8,
	// 				left: 20,
	// 				right: 20,
	// 			},
	// 		},
	// 	};
	// 	var chart = new ApexCharts(document.querySelector("#ape"), options_d);
	// 	chart.render();
	// });

// var options_edad = {
		// 	series: [cero_a_cuatro,cinco_a_nueve, diez_a_diecinueve, veinte_a_cincuentainueve, sesenta_a_mas],
		// 	chart: {
		// 		height: 350,
		// 		type: "radialBar",
		// 		toolbar: {
		// 			show: true,
		// 			tools: {
		// 				download: `<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		// 					<path fill-rule="evenodd" clip-rule="evenodd" d="M6.73798 0.25C5.96436 0.25 5.31904 0.841231 5.25148 1.61189C5.11024 3.22317 5.0745 4.84164 5.14436 6.45693C5.06003 6.46258 4.97571 6.46847 4.8914 6.47462L3.4019 6.5832C2.44985 6.6526 1.91764 7.71416 2.43163 8.51854C3.5278 10.2341 4.94026 11.7254 6.59369 12.9132L7.19043 13.3418C7.67425 13.6894 8.32591 13.6894 8.80972 13.3418L9.40646 12.9132C11.0599 11.7254 12.4724 10.2341 13.5685 8.51855C14.0825 7.71416 13.5503 6.6526 12.5983 6.5832L11.1088 6.47462C11.0245 6.46847 10.9401 6.46258 10.8558 6.45693C10.9257 4.84164 10.8899 3.22317 10.7487 1.61188C10.6811 0.841229 10.0358 0.25 9.26219 0.25H6.73798ZM6.68157 7.11473C6.56786 5.3275 6.58909 3.53417 6.74513 1.75H9.25503C9.41106 3.53417 9.4323 5.3275 9.31859 7.11473C9.30584 7.31509 9.37396 7.51221 9.5077 7.66195C9.64144 7.8117 9.82964 7.90156 10.0302 7.91144C10.3535 7.92737 10.6767 7.94711 10.9997 7.97065L12.0815 8.04951C11.1219 9.46281 9.92044 10.6971 8.53133 11.6949L8.00008 12.0765L7.46882 11.6949C6.07972 10.6971 4.87824 9.4628 3.9187 8.04951L5.00046 7.97065C5.32345 7.94711 5.64664 7.92737 5.96999 7.91144C6.17052 7.90156 6.35871 7.81169 6.49246 7.66195C6.6262 7.51221 6.69432 7.31509 6.68157 7.11473Z" fill="currentColor"/>
		// 					<path d="M1.75 14C1.75 13.5858 1.41421 13.25 1 13.25C0.585786 13.25 0.25 13.5858 0.25 14V16C0.25 16.9665 1.0335 17.75 2 17.75H14C14.9665 17.75 15.75 16.9665 15.75 16V14C15.75 13.5858 15.4142 13.25 15 13.25C14.5858 13.25 14.25 13.5858 14.25 14V16C14.25 16.1381 14.1381 16.25 14 16.25H2C1.86193 16.25 1.75 16.1381 1.75 16V14Z" fill="currentColor"/>
		// 					</svg>
		// 					`,
		// 				zoom: true,
		// 				zoomin: false,
		// 				zoomout: false,
		// 				pan: false,
		// 				reset: `<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
		// 					<path d="M3.54543 5.16265C3.33021 5.10587 3.15133 4.95643 3.05716 4.75474C2.963 4.55305 2.96329 4.31996 3.05795 4.11851L4.7187 0.584121C4.84246 0.320735 5.10742 0.152717 5.39843 0.153077C5.68944 0.153437 5.95398 0.32211 6.07709 0.585801L6.80971 2.15504C6.83591 2.14474 6.86295 2.13581 6.89078 2.12836C11.2381 0.963489 15.7067 3.5434 16.8715 7.89075C18.0364 12.2381 15.4565 16.7066 11.1091 17.8715C6.7618 19.0364 2.29326 16.4565 1.12839 12.1091C0.757969 10.7267 0.766303 9.32978 1.09074 8.03105C1.19112 7.62919 1.59828 7.38479 2.00015 7.48518C2.40201 7.58557 2.6464 7.99273 2.54602 8.39459C2.28172 9.45258 2.27444 10.5907 2.57728 11.7209C3.52774 15.268 7.17377 17.3731 10.7209 16.4226C14.2681 15.4722 16.3731 11.8261 15.4226 8.27898C14.4877 4.78982 10.9447 2.69601 7.45307 3.53307L8.19226 5.11637C8.31537 5.38006 8.27483 5.69116 8.08825 5.91449C7.90167 6.13783 7.60274 6.23307 7.32136 6.15883L3.54543 5.16265Z" fill="currentColor"/>
		// 					</svg>
		// 					`,
		// 				customIcons: [],
		// 			},
		// 		},
		// 	},
		// 	plotOptions: {
		// 		radialBar: {
		// 			offsetY: 0,
		// 			startAngle: 0,
		// 			endAngle: 270,
		// 			hollow: {
		// 				margin: 5,
		// 				size: "30%",
		// 				background: "transparent",
		// 				image: undefined,
		// 			},
		// 			dataLabels: {
		// 				name: {
		// 					show: false,
		// 					formatter: function (w) {
		// 						// By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
		// 						return w
		// 					  }
		// 				},
		// 				value: {
		// 					show: false,
		// 					formatter: function (w) {
		// 						// By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
		// 						return Number(w).toFixed(0)+'%'
		// 					  }
		// 				},
		// 				total: {
		// 					show: false,
		// 					label: 'Total',
		// 					formatter: function (w) {
		// 					  // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
		// 					  return 
		// 					}
		// 				  }
		// 			},
		// 		},
		// 	},
		// 	colors: ["#26E7A6","#1ab7ea", "#0084ff", "#39539E", "#0077B5"],
		// 	labels: ["0 a 4","5 a 9", "10 a 19", "20 a 59", "60 a más"],
		// 	legend: {
		// 		show: true,
		// 		floating: true,
		// 		fontSize: "13px",
		// 		position: "left",
		// 		offsetX: 170,
		// 		offsetY:25,
		// 		labels: {
		// 			// useSeriesColors: true,
		// 			colors: "#a1acb8",
		// 		},
		// 		markers: {
		// 			size: 0,
		// 		},
		// 		formatter: function(seriesName, opts) {
		// 		  return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex].toFixed(0) + '%'
		// 		},
		// 		itemMargin: {
		// 			vertical: 3,
		// 		},
		// 	},
		// 	stroke: {
		// 		lineCap: 'round'
		// 	  },
		// 	title: {
		// 		text: "Tendencia por rango de edades",
		// 		style: {
		// 			fontSize: "20px",
		// 			fontWeight: "600",
		// 			fontFamily: "Public Sans",
		// 			color: "#566A7F",
		// 		},
		// 	},
		// 	responsive: [
		// 		{
		// 		breakpoint: 1700,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 140,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 1550,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 110,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 1450,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 70,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 1270,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 55,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 1196,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 80,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 1040,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 40,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 870,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 20,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 768,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 170,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 710,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 100,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 550,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 50,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 460,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 20,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 400,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 10,
		// 		  }
		// 		}
		// 	  },
		// 	  {
		// 		breakpoint: 376,
		// 		options: {
		// 		  legend: {
		// 			  offsetX: 0,
		// 		  }
		// 		}
		// 	  },
		// 	]
		// };

	// listarGenero().then((data) => {
	// 	// debugger
	// 	let misGeneros = [];
	// 	let valor_misGeneros = [];
	// 	data.data.forEach((e) => {
	// 		if (e.name == "F") {
	// 			misGeneros.push("Femenino");
	// 		} else if (e.name == "M") {
	// 			misGeneros.push("Masculino");
	// 		} else {
	// 			misGeneros.push("N/A");
	// 		}
	// 		valor_misGeneros.push(parseFloat(e.value));
	// 	});

	// 	var options_gen = {
	// 		series: valor_misGeneros,
	// 		chart: {
	// 			type: "donut",
	// 			height: 350,
	// 			toolbar: {
	// 				show: true,
	// 				tools: {
	// 					download: `<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	// 						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.73798 0.25C5.96436 0.25 5.31904 0.841231 5.25148 1.61189C5.11024 3.22317 5.0745 4.84164 5.14436 6.45693C5.06003 6.46258 4.97571 6.46847 4.8914 6.47462L3.4019 6.5832C2.44985 6.6526 1.91764 7.71416 2.43163 8.51854C3.5278 10.2341 4.94026 11.7254 6.59369 12.9132L7.19043 13.3418C7.67425 13.6894 8.32591 13.6894 8.80972 13.3418L9.40646 12.9132C11.0599 11.7254 12.4724 10.2341 13.5685 8.51855C14.0825 7.71416 13.5503 6.6526 12.5983 6.5832L11.1088 6.47462C11.0245 6.46847 10.9401 6.46258 10.8558 6.45693C10.9257 4.84164 10.8899 3.22317 10.7487 1.61188C10.6811 0.841229 10.0358 0.25 9.26219 0.25H6.73798ZM6.68157 7.11473C6.56786 5.3275 6.58909 3.53417 6.74513 1.75H9.25503C9.41106 3.53417 9.4323 5.3275 9.31859 7.11473C9.30584 7.31509 9.37396 7.51221 9.5077 7.66195C9.64144 7.8117 9.82964 7.90156 10.0302 7.91144C10.3535 7.92737 10.6767 7.94711 10.9997 7.97065L12.0815 8.04951C11.1219 9.46281 9.92044 10.6971 8.53133 11.6949L8.00008 12.0765L7.46882 11.6949C6.07972 10.6971 4.87824 9.4628 3.9187 8.04951L5.00046 7.97065C5.32345 7.94711 5.64664 7.92737 5.96999 7.91144C6.17052 7.90156 6.35871 7.81169 6.49246 7.66195C6.6262 7.51221 6.69432 7.31509 6.68157 7.11473Z" fill="currentColor"/>
	// 						<path d="M1.75 14C1.75 13.5858 1.41421 13.25 1 13.25C0.585786 13.25 0.25 13.5858 0.25 14V16C0.25 16.9665 1.0335 17.75 2 17.75H14C14.9665 17.75 15.75 16.9665 15.75 16V14C15.75 13.5858 15.4142 13.25 15 13.25C14.5858 13.25 14.25 13.5858 14.25 14V16C14.25 16.1381 14.1381 16.25 14 16.25H2C1.86193 16.25 1.75 16.1381 1.75 16V14Z" fill="currentColor"/>
	// 						</svg>
	// 						`,
	// 					zoom: false,
	// 					zoomin: false,
	// 					zoomout: false,
	// 					pan: false,
	// 					reset: false,
	// 					customIcons: [],
	// 				},
	// 			},
	// 		},
	// 		dataLabels: {
	// 			enabled: true,
	// 			formatter: function (val) {
	// 				return val.toFixed(2) + "%";
	// 			},
	// 			dropShadow: {
	// 				enabled: false,
	// 				top: 4,
	// 				left: 4,
	// 				blur: 0,
	// 				color: "#000",
	// 				opacity: 0.45,
	// 			},
	// 			style: {
	// 				fontSize: "12px",
	// 				fontWeight: "300",
	// 				fontFamily: "Public Sans",
	// 				colors: ["#fff"],
	// 			},
	// 		},
	// 		labels: misGeneros,
	// 		title: {
	// 			text: "Tendencias de Género",
	// 			// subtext: "Fichas registradas",
	// 			style: {
	// 				fontSize: "20px",
	// 				fontWeight: "600",
	// 				fontFamily: "Public Sans",
	// 				color: "#566A7F",
	// 			},
	// 		},
	// 		colors: mis_colores,

	// 		plotOptions: {
	// 			pie: {
	// 				expandOnClick: false,
	// 				donut: {
	// 					size: "55%",
	// 				},
	// 			},
	// 		},
	// 		legend: {
	// 			show: true,
	// 			position: "top",
	// 			horizontalAlign: "left",
	// 			labels: {
	// 				colors: "#a1acb8",
	// 			},
	// 		},
	// 	};

	// 	var chart_genero = new ApexCharts(
	// 		document.querySelector("#genero_n"),
	// 		options_gen
	// 	);
	// 	chart_genero.render();
	// });

	// listarCaptacionAnual().then((data) => {
		

	// 	let misDatos = data.data;
	// 	let misSeriesDeDatos = [];
	// 	let misSeriesDeDatos_new = [];
	// 	let misSeriesDeDatos_new_valores = [];
	// 	let misanios = misDatos
	// 		.map((item) => item.name)
	// 		.filter((value, index, self) => self.indexOf(value) === index);
	// 	let mayorMuestraNumero = Math.max(
	// 		...misDatos
	// 			.map((item) => item.value)
	// 			.filter((value, index, self) => self.indexOf(value) === index)
	// 			.map((i) => Number(i))
	// 	);
	// 	// let misSemanas = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53]
	// 	misDatos.forEach((e) => {
	// 		misSeriesDeDatos.push(e.value);
	// 	});

	// 	misDatos.forEach((e) => {
	// 		misSeriesDeDatos_new.push(e.name);
	// 	});
	// 	misDatos.forEach((e) => {
	// 		misSeriesDeDatos_new_valores.push(e.value);
	// 	});
	// 	var options_ccd = {
	// 		series: [
	// 			{
	// 				name: "Muestras",
	// 				data: misSeriesDeDatos_new_valores,
	// 			},
	// 		],
	// 		chart: {
	// 			height: 350,
	// 			type: "bar",
	// 			toolbar: {
	// 				tools: {
	// 					download: `<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	// 						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.73798 0.25C5.96436 0.25 5.31904 0.841231 5.25148 1.61189C5.11024 3.22317 5.0745 4.84164 5.14436 6.45693C5.06003 6.46258 4.97571 6.46847 4.8914 6.47462L3.4019 6.5832C2.44985 6.6526 1.91764 7.71416 2.43163 8.51854C3.5278 10.2341 4.94026 11.7254 6.59369 12.9132L7.19043 13.3418C7.67425 13.6894 8.32591 13.6894 8.80972 13.3418L9.40646 12.9132C11.0599 11.7254 12.4724 10.2341 13.5685 8.51855C14.0825 7.71416 13.5503 6.6526 12.5983 6.5832L11.1088 6.47462C11.0245 6.46847 10.9401 6.46258 10.8558 6.45693C10.9257 4.84164 10.8899 3.22317 10.7487 1.61188C10.6811 0.841229 10.0358 0.25 9.26219 0.25H6.73798ZM6.68157 7.11473C6.56786 5.3275 6.58909 3.53417 6.74513 1.75H9.25503C9.41106 3.53417 9.4323 5.3275 9.31859 7.11473C9.30584 7.31509 9.37396 7.51221 9.5077 7.66195C9.64144 7.8117 9.82964 7.90156 10.0302 7.91144C10.3535 7.92737 10.6767 7.94711 10.9997 7.97065L12.0815 8.04951C11.1219 9.46281 9.92044 10.6971 8.53133 11.6949L8.00008 12.0765L7.46882 11.6949C6.07972 10.6971 4.87824 9.4628 3.9187 8.04951L5.00046 7.97065C5.32345 7.94711 5.64664 7.92737 5.96999 7.91144C6.17052 7.90156 6.35871 7.81169 6.49246 7.66195C6.6262 7.51221 6.69432 7.31509 6.68157 7.11473Z" fill="currentColor"/>
	// 						<path d="M1.75 14C1.75 13.5858 1.41421 13.25 1 13.25C0.585786 13.25 0.25 13.5858 0.25 14V16C0.25 16.9665 1.0335 17.75 2 17.75H14C14.9665 17.75 15.75 16.9665 15.75 16V14C15.75 13.5858 15.4142 13.25 15 13.25C14.5858 13.25 14.25 13.5858 14.25 14V16C14.25 16.1381 14.1381 16.25 14 16.25H2C1.86193 16.25 1.75 16.1381 1.75 16V14Z" fill="currentColor"/>
	// 						</svg>
	// 						`,
	// 					zoom: false,
	// 					zoomin: false,
	// 					zoomout: false,
	// 					pan: false,
	// 					reset: false,
	// 					customIcons: [],
	// 				},
	// 			},
	// 		},
	// 		grid: {
	// 			show: true,
	// 			borderColor: "#ECEEF1",
	// 			strokeDashArray: 0,
	// 			position: "back",
	// 			padding: {
	// 				top: 0,
	// 				bottom: -8,
	// 				left: 20,
	// 				right: 20,
	// 			},
	// 		},
	// 		annotations: {
	// 			yaxis: [
	// 				{
	// 					y: 100,
	// 					borderColor: "#8185F7",
	// 					strokeDashArray: 6,
	// 					label: {
	// 						show: true,
	// 						text: "100% ( 260 )",
	// 						style: {
	// 							color: "#fff",
	// 							background: "#8185F7",
	// 						},
	// 					},
	// 				},
	// 			],
	// 		},
	// 		colors: ["#26E7A6"],
	// 		dataLabels: {
	// 			enabled: false,
	// 		},
	// 		subtitle: {
	// 			text: "Muestras registradas ( fecha de resultado )",
	// 			align: "left",
	// 			margin: 5,
	// 			floating: false,
	// 			style: {
	// 				fontSize: "12px",
	// 				fontWeight: "normal",
	// 				fontFamily: "Public Sans",
	// 				color: "#9699a2",
	// 			},
	// 		},
	// 		plotOptions: {
	// 			bar: {
	// 				horizontal: false,
	// 				columnWidth: "50%",
	// 				borderRadius: 10,
	// 				startingShape: "rounded",
	// 				endingShape: "rounded",
	// 				dataLabels: {
	// 					position: "top", // top, center, bottom
	// 				},
	// 			},
	// 		},
	// 		dataLabels: {
	// 			enabled: true,
	// 			formatter: function (val) {
	// 				return val + "%";
	// 			},
	// 			offsetY: -20,
	// 			style: {
	// 				fontSize: "14px",
	// 				colors: ["#304758"],
	// 			},
	// 		},

	// 		xaxis: {
	// 			categories: misSeriesDeDatos_new,
	// 			position: "bottom",
	// 			axisBorder: {
	// 				show: false,
	// 			},
	// 			axisTicks: {
	// 				show: false,
	// 			},
	// 			crosshairs: {
	// 				fill: {
	// 					type: "gradient",
	// 					gradient: {
	// 						colorFrom: "#00E396",
	// 						colorTo: "#00E396",
	// 						stops: [0, 100],
	// 						opacityFrom: 0.4,
	// 						opacityTo: 0.5,
	// 					},
	// 				},
	// 			},
	// 			labels: {
	// 				style: {
	// 					fontSize: "12px",
	// 					colors: "#a1acb8",
	// 					fontFamily: "Public Sans",
	// 				},
	// 			},
	// 			tooltip: {
	// 				enabled: true,
	// 			},
	// 		},
	// 		yaxis: {
	// 			axisBorder: {
	// 				show: false,
	// 			},
	// 			axisTicks: {
	// 				show: false,
	// 			},
	// 			labels: {
	// 				show: false,
	// 				formatter: function (val) {
	// 					return val + "%";
	// 				},
	// 				style: {
	// 					fontSize: "12px",
	// 					colors: "#a1acb8",
	// 					fontFamily: "Public Sans",
	// 				},
	// 			},
	// 		},
	// 		title: {
	// 			text: "Cobertura anual",
	// 			style: {
	// 				fontSize: "20px",
	// 				fontWeight: "600",
	// 				fontFamily: "Public Sans",
	// 				color: "#566A7F",
	// 			},
	// 		},
	// 	};

	// 	var chart = new ApexCharts(
	// 		document.querySelector("#captacionAnual_d"),
	// 		options_ccd
	// 	);
	// 	chart.render();
		
		

	// });

	listarCaptacionVigilanciaAnual().then((data) => {
		console.log('llllllllllllllllllllll')
		console.log(data.data)
		let misAnios = []
		let misMetas = []
		let misCantidades = []
		let misDatos = data.data;
		misDatos.forEach(e => {
			misAnios.push(e.anio)
			misMetas.push(e.meta)
			misCantidades.push(e.cantidad)
		});
		var meta_anual = {
			series: [{
			name: 'Meta',
			data: misMetas
		  },{
			name: 'Paciente',
			data: misCantidades
		  }],
			chart: {
			type: 'bar',
			height: 450,
			// offsetY:10
			// width:'98%',
			// offsetX:10
		  },
		  grid:{
			show:false,
			borderColor: '#90A4AE',
			xaxis: {
				lines: {
					show: true
				}
			},   
			yaxis: {
				lines: {
					show: true
				}
			},  
			padding: {
				top: 20,
				right: 20,
				bottom: 0,
				left:20
			}, 
		  },
		  title:{
			text: 'LOGRO DE CAPTACIÓN  DE LA VIGILANCIA CENTINELA DE ARBOVIRISIS POR AÑO',
			style: {
				colors: ['#697A8D', '#697A8D'],
				fontSize: '18px',
				fontFamily: 'Helvetica, Arial, sans-serif',
				fontWeight: 500,
			}
		  },
		  colors:['#696CFF', '#F73C1C'],
		  plotOptions: {
			bar: {
			  horizontal: false,
			  columnWidth: '55%',
			  endingShape: 'rounded',
			  dataLabels: {
				position: 'top', // top, center, bottom
			  },
			},
		  },
		  dataLabels: {
			enabled: true,
			formatter: function (val, opts) {
				return val + " ( " +((parseInt(val)*100)/260).toFixed(2) + " % )"
			},
			offsetY: -25,
			style: {
				fontSize: '12px',
				fontFamily: 'Helvetica, Arial, sans-serif',
				fontWeight: '400',
				colors: ['#000', '#000']
			}
		  },
		  stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		  },
		  xaxis: {
			categories: misAnios,
			floating: false,
			title: {
				text: 'Año',
				offsetY: -10,
				style: {
					colors: ['#697A8D', '#697A8D'],
					fontSize: '14px',
					fontFamily: 'Helvetica, Arial, sans-serif',
					fontWeight: 400,
					cssClass: 'apexcharts-yaxis-title',
				}
			  }
		  },
		  yaxis: {
			title: {
			  text: 'N° de pacientes captados',
			  offsetX: -5,
			  style: {
				colors: ['#697A8D', '#697A8D'],
				fontSize: '14px',
				fontFamily: 'Helvetica, Arial, sans-serif',
				fontWeight: 400,
				cssClass: 'apexcharts-yaxis-title',
			},
			},
			floating: false,
		  },
		  fill: {
			opacity: 1
		  },
		  legend:{
			floating: false,
			position:"bottom",
			offsetY: 5,
			// itemMargin: {
			// 	horizontal: 0,
			// 	vertical: 0
			// },
		  },
		  tooltip: {
			shared: true,
			intersect: false,
			y: {
			  formatter: function (val) {
				return ((parseInt(val)*100)/260).toFixed(2) + " %"
			  }
			}
		  }
		  };

		var chart_n = new ApexCharts(
			document.querySelector("#meta_anual"),
			meta_anual
		);
		chart_n.render();
	})

	listarCaptacionVigilanciaSemanal().then((data) => {
		console.log('llllllllllllllllllllll')
		console.log(data.data)
		let misSemanas = []
		let i = 1;
		while(i<54){
			misSemanas.push(i)
			i++
		}
		let miData = data.data
		let miDataSource = []
		misSemanas.forEach(e => {
			let haySemana = 0
			miData.forEach(f=>{
				if(e == f.semana){
					miDataSource.push(parseInt(f.cantidad))
					haySemana = 1
				}
			})
			if(haySemana != 1){
				miDataSource.push(0)
			}
		})
		let miMax = [...miDataSource]
		miMax.push(5)
		let maximo = Math.max(...miMax)
		// let misAnios = []
		// let misMetas = []
		// let misCantidades = []
		// let misDatos = data.data;
		// misDatos.forEach(e => {
		// 	misAnios.push(e.anio)
		// 	misMetas.push(e.meta)
		// 	misCantidades.push(e.cantidad)
		// });

		var meta_semanal = {
			series: [{
			name: 'Pacientes',
			data: miDataSource
		  }],
			chart: {
			type: 'bar',
			height: 450,
			// offsetY:10
			// width:'98%',
			// offsetX:10
		  },
		  grid:{
			show:false,
			borderColor: '#90A4AE',
			xaxis: {
				lines: {
					show: true
				}
			},   
			yaxis: {
				lines: {
					show: true
				}
			},  
			padding: {
				top: 20,
				right: 20,
				bottom: 0,
				left:20
			}, 
		  },
		  title:{
			text: 'LOGRO DE CAPTACIÓN POR SEMANA',
			style: {
				fontSize: "20px",
				fontWeight: "600",
				fontFamily: "Public Sans",
				color: "#566A7F",
			},
		  },
		  colors:['#F73C1C'],
		  plotOptions: {
			bar: {
			  horizontal: false,
			  columnWidth: '55%',
			  endingShape: 'rounded',
			  dataLabels: {
				position: 'top', // top, center, bottom
			  },
			},
		  },
		  dataLabels: {
			// enabled: false,
			formatter: function (val, opts) {
				if(parseInt(val)>0){return val}else{return ''}
			},
			offsetY: -25,
			style: {
				fontSize: '12px',
				fontFamily: 'Helvetica, Arial, sans-serif',
				fontWeight: 'bold',
				colors: ['#000', '#000']
			}
		  },
		//   stroke: {
		// 	show: true,
		// 	width: 2,
		// 	colors: ['transparent']
		//   },
		  xaxis: {
			categories: misSemanas,
			floating: false,
			title: {
				text: 'Semana',
				offsetY: -10,
				style: {
					colors: ['#697A8D', '#697A8D'],
					fontSize: '14px',
					fontFamily: 'Helvetica, Arial, sans-serif',
					fontWeight: 400,
					cssClass: 'apexcharts-yaxis-title',
				}
			  }
		  },
		  yaxis: {
			title: {
			  text: 'N° de pacientes captados',
			  offsetX: -5,
			  style: {
				colors: ['#697A8D', '#697A8D'],
				fontSize: '14px',
				fontFamily: 'Helvetica, Arial, sans-serif',
				fontWeight: 400,
				cssClass: 'apexcharts-yaxis-title',
				},
			},
			floating: false,
			min:0,
			max: maximo + 1,
			// tickAmount:0,
			forceNiceScale: true,
			axisBorder: {
				show: true,
				color: '#E5E5E5',
				offsetX: 0,
				offsetY: 0,
				
			},
		  },
		  fill: {
			opacity: 1
		  },
		  legend:{
			floating: false,
			position:"top",
			// offsetY: 5,
			// itemMargin: {
			// 	horizontal: 0,
			// 	vertical: 0
			// },
		  },
		  annotations:{
			position: 'front' ,
			yaxis: [{
				y: 5,
				strokeDashArray: 0,
				borderColor: '#696CFF',
				label: {
				  borderColor: '#696CFF',
				  style: {
					color: '#fff',
					background: '#696CFF',
				  },
				  text: '5 semanal',
				}
			  }]
		  },
		tooltip: {
			enabled:true,
			shared: true,
			intersect: false,
			y: {
			  formatter: function (val) {
				return val
			  }
			}
		  }
		  };

		var chart_s = new ApexCharts(
			document.querySelector("#meta_semanal"),
			meta_semanal
		);
		chart_s.render();
	})



		listarEdades().then((data) => {
		console.log("edades");
		console.log(data);
		let cero_a_cuatro= 0
		let cinco_a_nueve=0
		let diez_a_diecinueve=0
		let veinte_a_cincuentainueve=0
		let sesenta_a_mas=0
		data.data.forEach(e=> {
			if(e.edad >= 5 && e.edad <= 11){
				cero_a_cuatro += parseFloat(e.cantidad)
			}else if(e.edad >= 12 && e.edad <= 17){
				cinco_a_nueve += parseFloat(e.cantidad)
			}else if(e.edad >= 18 && e.edad <= 29){
				diez_a_diecinueve += parseFloat(e.cantidad)
			}else if(e.edad >= 30 && e.edad <= 59){
				veinte_a_cincuentainueve += parseFloat(e.cantidad)
			}else if(e.edad >= 60){
				sesenta_a_mas += parseFloat(e.cantidad)
			}
			// if(e.name >= 0 && e.name <= 4){
			// 	cero_a_cuatro += parseFloat(e.value)
			// }else if(e.name >= 5 && e.name <= 9){
			// 	cinco_a_nueve += parseFloat(e.value)
			// }else if(e.name >= 10 && e.name <= 19){
			// 	diez_a_diecinueve += parseFloat(e.value)
			// }else if(e.name >= 20 && e.name <= 59){
			// 	veinte_a_cincuentainueve += parseFloat(e.value)
			// }else if(e.name >= 60){
			// 	sesenta_a_mas += parseFloat(e.value)
			// }
		})
		// debugger
		let el_Mayor = Math.max(cero_a_cuatro,cinco_a_nueve,diez_a_diecinueve,veinte_a_cincuentainueve,sesenta_a_mas) + ((Math.max(cero_a_cuatro,cinco_a_nueve,diez_a_diecinueve,veinte_a_cincuentainueve,sesenta_a_mas) * 25 ) / 100 )
		let miTotalSuma = cero_a_cuatro+cinco_a_nueve+diez_a_diecinueve+veinte_a_cincuentainueve+sesenta_a_mas
		var options_edad = {
			title:{
				text: 'GRUPO ETAREO DE PACIENTES CAPTADOS',
				style: {
					fontSize: "20px",
					fontWeight: "600",
					fontFamily: "Public Sans",
					color: "#566A7F",
				},
			  },
			series: [{
				name:'Porcentaje',
			data: [cero_a_cuatro,cinco_a_nueve, diez_a_diecinueve, veinte_a_cincuentainueve, sesenta_a_mas].reverse()
		  }],
			chart: {
			type: 'bar',
			height: 450
		  },
		  plotOptions: {
			bar: {
			  horizontal: true,
			  dataLabels: {
				position: 'top',
				// offsetY: -10,
			  },
			}
		  },
		  colors:['#696CFF'],
		  dataLabels: {
			enabled: true,
			offsetX: 35,
			formatter: function (val, opts) {
				if(parseInt(val)>0){return (Math.round((100 * val)/miTotalSuma))+`% (${val})`}else{return ''}
			},
			style: {
			  fontSize: '12px',
			  fontWeight: '400',
			  colors: ['#000']
			}
		  },
		//   stroke: {
		// 	show: true,
		// 	width: 1,
		// 	colors: ['#fff']
		//   },
		  grid:{
			show:false,
		  },
		  tooltip: {
			shared: true,
			intersect: false
		  },
		  xaxis: {
			max: el_Mayor,
			categories: ["Niño(5 a 11)", "Adolescente(12 a 17)", "Joven(18 a 29)","Adulto(30 a 59)" ,"Adulto mayor(60 a más)"].reverse(),
			axisBorder: {
				show: true,
				color: '#78909C',
				height: 1,
				width: '100%',
				offsetX: 0,
				offsetY: 0
			},
			axisTicks: {
				show: false,
				borderType: 'solid',
				color: '#78909C',
				height: 1,
				offsetX: 0,
				offsetY: 0
			},
			labels:{
				show:false
			}
		  },

		  yaxis:{
			axisBorder: {
				show: true,
				color: '#78909C',
				height: '100%',
				width: '1',
				offsetX: 0,
				offsetY: 0
			}
		  }
		  };
		

		var chart_edad = new ApexCharts(document.querySelector("#meta_grupo_anios"), options_edad);
		chart_edad.render();
	});



	listarGenero().then((data) => {
		// debugger
		let misGeneros = [];
		let valor_misGeneros = [];
		data.data.forEach((e) => {
			if (e.name == "F") {
				misGeneros.push("Femenino");
			} else if (e.name == "M") {
				misGeneros.push("Masculino");
			} else {
				misGeneros.push("N/A");
			}
			valor_misGeneros.push(parseFloat(e.value));
		});

		var options_gen = {
			series: valor_misGeneros,
			chart: {
				type: "donut",
				height: 450,
				toolbar: {
					show: true,
					tools: {
						download: `<svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M6.73798 0.25C5.96436 0.25 5.31904 0.841231 5.25148 1.61189C5.11024 3.22317 5.0745 4.84164 5.14436 6.45693C5.06003 6.46258 4.97571 6.46847 4.8914 6.47462L3.4019 6.5832C2.44985 6.6526 1.91764 7.71416 2.43163 8.51854C3.5278 10.2341 4.94026 11.7254 6.59369 12.9132L7.19043 13.3418C7.67425 13.6894 8.32591 13.6894 8.80972 13.3418L9.40646 12.9132C11.0599 11.7254 12.4724 10.2341 13.5685 8.51855C14.0825 7.71416 13.5503 6.6526 12.5983 6.5832L11.1088 6.47462C11.0245 6.46847 10.9401 6.46258 10.8558 6.45693C10.9257 4.84164 10.8899 3.22317 10.7487 1.61188C10.6811 0.841229 10.0358 0.25 9.26219 0.25H6.73798ZM6.68157 7.11473C6.56786 5.3275 6.58909 3.53417 6.74513 1.75H9.25503C9.41106 3.53417 9.4323 5.3275 9.31859 7.11473C9.30584 7.31509 9.37396 7.51221 9.5077 7.66195C9.64144 7.8117 9.82964 7.90156 10.0302 7.91144C10.3535 7.92737 10.6767 7.94711 10.9997 7.97065L12.0815 8.04951C11.1219 9.46281 9.92044 10.6971 8.53133 11.6949L8.00008 12.0765L7.46882 11.6949C6.07972 10.6971 4.87824 9.4628 3.9187 8.04951L5.00046 7.97065C5.32345 7.94711 5.64664 7.92737 5.96999 7.91144C6.17052 7.90156 6.35871 7.81169 6.49246 7.66195C6.6262 7.51221 6.69432 7.31509 6.68157 7.11473Z" fill="currentColor"/>
							<path d="M1.75 14C1.75 13.5858 1.41421 13.25 1 13.25C0.585786 13.25 0.25 13.5858 0.25 14V16C0.25 16.9665 1.0335 17.75 2 17.75H14C14.9665 17.75 15.75 16.9665 15.75 16V14C15.75 13.5858 15.4142 13.25 15 13.25C14.5858 13.25 14.25 13.5858 14.25 14V16C14.25 16.1381 14.1381 16.25 14 16.25H2C1.86193 16.25 1.75 16.1381 1.75 16V14Z" fill="currentColor"/>
							</svg>
							`,
						zoom: false,
						zoomin: false,
						zoomout: false,
						pan: false,
						reset: false,
						customIcons: [],
					},
				},
			},
			dataLabels: {
				enabled: true,
				formatter: function (val) {
					return val.toFixed(2) + "%";
				},
				dropShadow: {
					enabled: false,
					top: 4,
					left: 4,
					blur: 0,
					color: "#000",
					opacity: 0.45,
				},
				style: {
					fontSize: "12px",
					fontWeight: "300",
					fontFamily: "Public Sans",
					colors: ["#fff"],
				},
			},
			labels: misGeneros,
			colors:['#F73C1C','#696CFF'].reverse(),
			title: {
				text: "SEXO DE PACIENTES CAPTADOS",
				// subtext: "Fichas registradas",
				style: {
					fontSize: "20px",
					fontWeight: "600",
					fontFamily: "Public Sans",
					color: "#566A7F",
				},
			},
			// colors: mis_colores,

			plotOptions: {
				pie: {
					expandOnClick: false,
					donut: {
						size: "55%",
					},
				},
			},
			legend: {
				show: true,
				position: "bottom",
				horizontalAlign: "center",
				labels: {
					colors: "#a1acb8",
				},
			},
		};

		var chart_genero = new ApexCharts(
			document.querySelector("#meta_grupo_sexo"),
			options_gen
		);
		chart_genero.render();
	});
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

	// 		if (!revisionDatos(data[0])) {
	// 			return
	// 		}
	// 		let misEnfermedades = data[0].data
	// 		console.log(misEnfermedades)
	// 		limpiarTabla('tbl_enfermedades')
	// 		agregarDataTabla('tbl_enfermedades',misEnfermedades)

	// 	})
	// 	.catch(error => {
	// 		Mensaje2(0,'Error de sistema','Ok','Hubo un error en el sistema')
	// 	});
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////// UTILITIES //////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
