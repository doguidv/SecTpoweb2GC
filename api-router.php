<?php
require_once './libs/Router.php';
require_once './app/controllers/infop_app.controller.php';

require_once './app/controllers/localid_app.controller.php';
// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('infopesca', 'GET', 'infopApiController', 'getinfops');
$router->addRoute('infopesca/:ID', 'GET', 'infopApiController', 'getinfop');
$router->addRoute('infopesca/:ID', 'DELETE', 'infopApiController', 'deleteinfop');
$router->addRoute('infopesca', 'POST', 'infopApiController', 'insertinfop'); 

$router->addRoute('localid', 'GET', 'localidApiController', 'getlocalids');
$router->addRoute('localid/:ID', 'GET', 'localidApiController', 'getlocalid');
$router->addRoute('localid/:ID', 'DELETE', 'localidApiController', 'deletelocalid');
$router->addRoute('localid', 'POST', 'localidApiController', 'insertlocalid');
// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
