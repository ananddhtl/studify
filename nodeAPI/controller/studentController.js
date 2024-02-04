var fs= require('fs');
const path = require('path');
const UserModel = require("../model/studentModel")
var formidable = require('formidable');
 var jwt = require('jsonwebtoken');
 const bcrypt = require('bcrypt');
 const saltRounds = 10;

module.exports = {

	studentLogin: function(req, res) {
		var data = req.body;
		console.log(data)
		UserModel.checkUserAlreadyExist(req.con, data, function(err, checkAlready) {
			console.log(checkAlready)
				if(checkAlready.length != '0'){
			 res.send({
						"code": 200,
						"status": 'true',
						"message":"Student login successfully"
					});
				}
			
		 else{
				res.send({
					"code": 404,
					"status": 'false',
					"message":"Student mail not exit"
				});
			}
		
		

		});
	},

}