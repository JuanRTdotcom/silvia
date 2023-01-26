<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Servidor</title>
</head>
<body>
    aqui va el contenido

    <script src="<?php echo base_url('node_modules/socket.io/client-dist/socket.io.js');?>"></script>
    <script>
        var socket = io.connect( 'http://'+window.location.hostname+':3001' );
        socket.emit('saludo','hola')
        socket.on( 'saludo', function( data ) {
            console.log(data)
        });
    </script>
</body>
</html>