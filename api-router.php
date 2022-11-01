<?php
require_once './libs/Router.php';
require_once './app/controllers/infop_app.controller.php';
require_once './app/controllers/localid_app.controller.php';
// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('infopescas', 'GET', 'InfopApiController', 'getinfops');
$router->addRoute('infopescas/:ID', 'GET', 'InfopApiController', 'getinfop');
$router->addRoute('infopescas/:ID', 'DELETE', 'InfopApiController', 'deleteinfop');
$router->addRoute('infopescas', 'POST', 'InfopApiController', 'insertinfop'); 
$router->addRoute('infopescas/:ID', 'PUT', 'InfopApiController', 'updateinfo'); 


$router->addRoute('localid', 'GET', 'LocalidApiController', 'getlocalids');
$router->addRoute('localid/:ID', 'GET', 'LocalidApiController', 'getlocalid');
$router->addRoute('localid/:ID', 'DELETE', 'LocalidApiController', 'deletelocalid');
$router->addRoute('localid', 'POST', 'LocalidApiController', 'insertlocalid');
$router->addRoute('localid/:ID', 'PUT', 'LocalidApiController', 'update'); 
// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
