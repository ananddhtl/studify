const mysql = require("mysql");

/******* Mysql Connection********/

const con  = mysql.createConnection({
	host: "127.0.0.1",
	port:"3306",
	user: "pmauser",
	password: "Tech$#@$#@123",
	database: "studify"
})

con.connect(function(err) {
  if (err) {
    console.error('error connecting: ' + err);
    return;
  }

 console.log('connected established');
});
module.exports = con
