var fs= require('fs');
const path = require('path');
const AdminModel = require("../model/adminModel")
var formidable = require('formidable');
 var jwt = require('jsonwebtoken');
 const bcrypt = require('bcrypt');
 const saltRounds = 10;

module.exports = {

	Login: function(req, res) {
		var data = req.body;
		
		var password = req.body.password;
		AdminModel.checkUserAlreadyExist(req.con, data, function(err, checkAlready) {

			if(checkAlready.length != '0'){
			 res.send({
						"code": 200,
						"status": 'true',
						"message":"Admin login successfully"
					});
				}
			
		 else{
				res.send({
					"code": 404,
					"status": 'false',
					"message":"Admin mail not exit"
				});
			}
		

		});
	},

}