


function alerta(titulo, mensaje, tipo) {
  Swal.fire({
  title: titulo,
  html: mensaje,
  confirmButtonText: "OK",
  icon: tipo
  });
  }

  function alertaRedirect(titulo, mensaje, tipo, redirect) {
  Swal.fire({
  title: titulo,
  html: mensaje,
  confirmButtonText: "OK",
  icon: tipo,
  allowOutsideClick: false
  }).then(function () {
  window.location = site_url  + redirect;
  });
  }

function alertSuccess(mensaje)
{
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: mensaje,
    showConfirmButton: false,
    timer: 2000
  });
}

function alertWarning(mensaje)
{
  Swal.fire({
    icon: 'warning',
    title: 'Cuidado',
    text: mensaje,
  });
}

function alertInfo(mensaje)
{
  Swal.fire({
    icon: 'info',
    title: 'Atenci�n',
    html: mensaje,
    showCloseButton: true,
    showCancelButton: false,
    focusConfirm: false,    
    confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Entendido!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
    cancelButtonAriaLabel: 'Thumbs down'
    });
}

function alertError(mensaje)
{
  Swal.fire({
    icon: 'error',
    title: 'Error',
    text: mensaje,
  });
}    




	
	function isEmpty(value) {
	var isEmptyObject = function(a) {
		if (typeof a.length === 'undefined') { // it's an Object, not an Array
			var hasNonempty = Object.keys(a).some(function nonEmpty(element) {
				return !isEmpty(a[element]);
			});
			return hasNonempty ? false : isEmptyObject(Object.keys(a));
		}

		return !a.some(function nonEmpty(element) { // check if array is really not empty as JS thinks
			return !isEmpty(element); // at least one element should be non-empty
		});
	};
	return (
		value == false ||
		typeof value === 'undefined' ||
		value == null ||
		(typeof value === 'object' && isEmptyObject(value))
	);
}

$(".soloNumeros").on("keydown",function(e){
        let evento = window.Event ? true : false;
        let key = evento ? e.which : e.keyCode;
        return (key <= 13 || (key >=35 && key <= 40) || (key >= 45 && key <= 57) || (key >= 96 && key <= 105));
    });
	
	$('.logout').on('click', function(e){
      e.preventDefault();

      Swal.fire({
        title: '&#191;Est&#225; seguro&#63;',
        html: "Cerrar&#225; la sesi&#243;n y saldr&#225; del sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type:   'POST',
            url:    siteURL+'/login/logout',
            success: function(){
              window.localStorage.clear();
              sessionStorage.clear();
              document.location.reload();
            }
          });

        }
      });    
    });
	
	/*====================================
            METIS MENU 
            ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

	
