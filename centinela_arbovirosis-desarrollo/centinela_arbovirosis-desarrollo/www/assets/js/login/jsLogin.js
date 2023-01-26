function utf8_to_b64( str ) {
  return window.btoa(unescape(encodeURIComponent( str )));
}

	$("#captcha").focus(function(){
        $("#txtPassword").val(utf8_to_b64($("#txtPassword").val()));
    });
	
	
	
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
