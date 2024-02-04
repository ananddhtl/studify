var md5 = require('md5');
const bcrypt = require('bcrypt');
const saltRounds = 10;
module.exports = {

    checkUserAlreadyExist: function(con, data, callback){
    	con.query("SELECT * FROM student where email ='"+data.email+"'",callback)
    }
}