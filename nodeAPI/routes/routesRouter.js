const express = require("express")
const router = express.Router()
const studentController = require("../controller/studentController")
const adminController = require("../controller/adminController")

/******** Admin Routing**********/
router.post("/admin/login", adminController.Login) 


/******** User Routing**********/
router.post("/student/login", studentController.studentLogin) 


module.exports = router
