<?php
    
    require_once 'libs/router.php';

    require_once 'app/controllers/Modelo.api.controller.php';
   
    $router = new Router();



    #                 endpoint        verbo      controller              metodo
    $router->addRoute('modelos'      ,            'GET',     'ModeloApiController',   'getModelos');
    $router->addRoute('modelos/:id'  ,            'GET',     'ModeloApiController',   'get'   );
    $router->addRoute('modelos/:id'  ,            'DELETE',  'ModeloApiController',   'delete');
    $router->addRoute('modelos'  ,                'POST',    'ModeloApiController',   'create');
    $router->addRoute('modelos/:id'  ,            'PUT',     'ModeloApiController',   'update');
  
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);