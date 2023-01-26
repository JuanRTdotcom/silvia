$(document).ready(function(){ 
	var ajax_data = {
	  "nivel" 		: '00'
	};

	switch(ajax_data['nivel']){
		case "00":
		$.getScript(baseURL+'assets/js/mapas/peru.js', function(){ });
		break;
		case "01":
		$.getScript(baseURL+'assets/js/mapas/amazonas.js', function(){ });
		break;
		case "02":
		$.getScript(baseURL+'assets/js/mapas/ancash.js', function(){ });
		break;
		case "03":
		$.getScript(baseURL+'assets/js/mapas/apurimac.js', function(){ });
		break;
		case "04":
		$.getScript(baseURL+'assets/js/mapas/arequipa.js', function(){ });
		break;
		case "05":
		$.getScript(baseURL+'assets/js/mapas/ayacucho.js', function(){ });
		break;
		case "06":
		$.getScript(baseURL+'assets/js/mapas/cajamarca.js', function(){ });
		break;
		case "07":
		$.getScript(baseURL+'assets/js/mapas/callao.js', function(){ });
		break;
		case "08":
		$.getScript(baseURL+'assets/js/mapas/cusco.js', function(){ });
		break;
		case "09":
		$.getScript(baseURL+'assets/js/mapas/huancavelica.js', function(){ });
		break;
		case "10":
		$.getScript(baseURL+'assets/js/mapas/huanuco.js', function(){ });
		break;
		case "11":
		$.getScript(baseURL+'assets/js/mapas/ica.js', function(){ });
		break;
		case "12":
		$.getScript(baseURL+'assets/js/mapas/junin.js', function(){ });
		break;
		case "13":
		$.getScript(baseURL+'assets/js/mapas/lalibertad.js', function(){ });
		break;
		case "14":
		$.getScript(baseURL+'assets/js/mapas/lambayeque.js', function(){ });
		break;
		case "15":
		$.getScript(baseURL+'assets/js/mapas/lima.js', function(){ });
		break;
		case "16":
		$.getScript(baseURL+'assets/js/mapas/loreto.js', function(){ });
		break;
		case "17":
		$.getScript(baseURL+'assets/js/mapas/madrededios.js', function(){ });
		break;
		case "18":
		$.getScript(baseURL+'assets/js/mapas/moquegua.js', function(){ });
		break;
		case "19":
		$.getScript(baseURL+'assets/js/mapas/pasco.js', function(){ });
		break;
		case "20":
		$.getScript(baseURL+'assets/js/mapas/piura.js', function(){ });
		break;
		case "21":
		$.getScript(baseURL+'assets/js/mapas/puno.js', function(){ });
		break;
		case "22":
		$.getScript(baseURL+'assets/js/mapas/sanmartin.js', function(){ });
		break;
		case "23":
		$.getScript(baseURL+'assets/js/mapas/tacna.js', function(){ });
		break;
		case "24":
		$.getScript(baseURL+'assets/js/mapas/tumbes.js', function(){ });
		break;
		case "25":
		$.getScript(baseURL+'assets/js/mapas/ucayali.js', function(){ });
		break;
	}

	$.ajax({
		type: "POST",
		dataType: "json",
		url: "principal/jvmapa",
		data: ajax_data,
		success: function(data) {
		if(data == 2){
		  alert('No ha elegido el nivel para procesar.');
		  return;
		}

		$(".mapa").show();

		$('.mapa').html('');
			$('.mapa').vectorMap({
			  	map: data['mapa'],
			  	backgroundColor: '#CEE3F6',
			  	series: {
				  	regions: [{
						values:data,
						attribute: 'fill'
				  	}]
			  	}                
			})
		}
	});
});
