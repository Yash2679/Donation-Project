var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');
var cors = require('cors');
app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));
// default route
app.get('/', function(req, res) {
    return res.send({ error: true, message: 'Welcome to Php Coding Stuff website in phpcodingstuff.com' })
});
// connection configurations
var dbConn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'userform'
});
// connect to database
dbConn.connect();
// Retrieve all users 
app.get('/adhaar_details', function(req, res) {
    dbConn.query('SELECT * FROM adhaar_details', function(error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: 'adhaar_details list.' });
    });
});
// Retrieve user with id 
app.get('/user/:id', function(req, res) {
    let user_id = req.params.id;
    if (!user_id) {
        return res.status(400).send({ error: true, message: 'Please provide user_id' });
    }
    dbConn.query('SELECT * FROM adhaar_details where id=?', user_id, function(error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results[0], message: 'adhaar_details list.' });
    });
});
// Add a new user  
app.post('/user', function(req, res) {
    let user = req.body.user;
    if (!user) {
        return res.status(400).send({ error: true, message: 'Please provide user' });
    }
    dbConn.query("INSERT INTO adhaar_details SET ? ", { user: user }, function(error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: 'New user has been created successfully.' });
    });
});
//  Update user with id
app.put('/user', function(req, res) {
    let user_id = req.body.user_id;
    let user = req.body.user;
    if (!user_id || !user) {
        return res.status(400).send({ error: user, message: 'Please provide user and user_id' });
    }
    dbConn.query("UPDATE adhaar_details SET user = ? WHERE id = ?", [user, user_id], function(error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: 'user has been updated successfully.' });
    });
});
//  Delete user
app.delete('/user', function(req, res) {
    let user_id = req.body.user_id;
    if (!user_id) {
        return res.status(400).send({ error: true, message: 'Please provide user_id' });
    }
    dbConn.query('DELETE FROM adhaar_details WHERE id = ?', [user_id], function(error, results, fields) {
        if (error) throw error;
        return res.send({ error: false, data: results, message: 'User has been updated successfully.' });
    });
});
// set port
app.listen(3000, function() {
    console.log('Node app is running on port 3000');
});
module.exports = app;