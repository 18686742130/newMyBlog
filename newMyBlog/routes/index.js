var express = require('express');
var router = express.Router();
var user = require('../controllers/user');

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});
router.get('/login',user.login);


module.exports = router;
