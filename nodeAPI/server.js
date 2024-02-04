const express = require("express")
var cors = require('cors')
const app = express()
const bodyParser = require('body-parser');
var request = require('request');
global.server = require('http').Server(app)
const server = require('http').createServer(app)
const port = process.env.PORT || 3000
//const io = require('socket.io')(server)
const path = require('path')

// const io = require('socket.io')(global.server, {
//   path: '/chatSocket'
// });
var methodOverride = require("method-override")
const con = require("./config/db.js")
var CronJob = require('cron').CronJob;
var jwt = require('jsonwebtoken');


app.get('/media', (req, res) => {
    res.sendFile(__dirname + '/check.html');
});
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/public/index.html');
});

app.use(cors());



app.use(function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Credentials", "true");
	res.header("Access-Control-Allow-Headers", "Origin,Content-Type, Authorization, x-id, Content-Length, X-Requested-With");
	res.header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
	req.con = con
	next();
});

// parse requests of content-type - application/x-www-form-urlencoded
// app.use(bodyParser.urlencoded({ limit: '50mb', extended: true, parameterLimit: 1000000 }));
// app.use(bodyParser.json({
//     limit: '50mb'
// }));
// parsing body request
app.use(express.json({limit: '50mb', extended: true}))
app.use(express.urlencoded({ limit: '50mb', extended: true, parameterLimit: 1000000}))
app.use(methodOverride("_method"))

// io.on('connection', (socket) => {
//   console.log('a user connected');
// });

// include router
const routesRouter = require("./routes/routesRouter")
app.use("/studify", routesRouter)

// starting server
server.listen(3000, function() {
	console.log("server listening on port 3000")
})

