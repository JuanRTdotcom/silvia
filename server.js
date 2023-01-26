var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io')(server,{
    cors:{
        origin: '*'
    }
});
var port = process.env.PORT || 3001;

io.on('connection', (socket) => {
    console.log('usuario conectado => ' + socket.id)
    socket.on('saludo',  (data) => {
        console.log(data)
        socket.broadcast.emit('saludo','hola desde => '+ socket.id)
        // io.sockets.emit('new_message', {
        //     message: data.message,
        //     date: data.date,
        //     msgcount: data.msgcount
        // });
    });
});
server.listen(port, function () {
    console.log('Server listening at port %d', port);
});