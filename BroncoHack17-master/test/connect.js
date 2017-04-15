
var mysql = require('mysql');
var connection = mysql.createConnection({
    host: 'https://broncohack17-yueqisu.c9users.io/phpmyadmin/',
    user: 'yueqisu',
    password: '',
    database: 'broncohack'
});

connection.connect();