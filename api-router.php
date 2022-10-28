<?php
require_once './libs/Router.php';
require_once './app/controllers/infop_app.controller.php';
require_once './app/controllers/localid_app.controller.php';
// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('infopesca', 'GET', 'InfopApiController', 'getinfops');
$router->addRoute('infopesca/:ID', 'GET', 'InfopApiController', 'getinfop');
$router->addRoute('infopesca/:ID', 'DELETE', 'InfopApiController', 'deleteinfop');
$router->addRoute('infopesca', 'POST', 'InfopApiController', 'insertinfop'); 

$router->addRoute('localid', 'GET', 'LocalidApiController', 'getlocalids');
$router->addRoute('localid/:ID', 'GET', 'LocalidApiController', 'getlocalid');
$router->addRoute('localid/:ID', 'DELETE', 'LocalidApiController', 'deletelocalid');
$router->addRoute('localid', 'POST', 'LocalidApiController', 'insertlocalid');
// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
