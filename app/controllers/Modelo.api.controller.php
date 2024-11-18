<?php
require_once './app/models/Modelo.model.php';
require_once './app/views/json.view.php';

class ModeloApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModeloModel();
        $this->view = new JSONView();
    }

    // /api/modelos
    public function getModelos($req, $res) {
       
        //ordenar por campo
        $orderBy = false;
        if(isset($req->query->orderBy)){
            $orderBy = $req->query->orderBy;
        }
         //ordenar en forma descendente
         $sort = false;
         if(isset($req->query->sort) ){
         $sort= $req->query->sort;
        }
        //paginado
        $page = false; //nro de pagina
        $limit = false; //cantidad de registros por pagina
        if(isset($req->query->limit) && is_numeric($req->query->limit) && isset($req->query->page) && is_numeric($req->query->page)){
           $limit = $req->query->limit;
           $page = $req->query->page;
        }
        $modelos = $this->model->getModelos($sort, $orderBy, $limit, $page);
        
        // mando los modelos a la vista
        return $this->view->response($modelos,200);
    }


    // /api/modelos/:id
    public function get($req, $res) {
        // obtengo el id del modelo desde la ruta
        $id = $req->params->id;

        // obtengo el modelo de la DB
        $modelo = $this->model->getModelo($id);

        if(!$modelo) {
            return $this->view->response("el modelo con el id=$id no existe", 404);
        }
        // mando el modelo a la vista
        return $this->view->response($modelo, 200);
    }

        // api/modelos/:id (PUT)
    public function update($req, $res) {
        $id = $req->params->id;

        // verifico que exista
        $modelo = $this->model->getModelo($id);
        if (!$modelo) {
            return $this->view->response("el modelo con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($req->body->nombre_modelo) || empty($req->body->precio) || empty($req->body->material) || empty($req->body->talle)) {
            
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $nombre_modelo = $req->body->nombre_modelo;       
        $precio = $req->body->precio;       
        $material = $req->body->material;
        $talle = $req->body->talle;
        
        // actualiza el modelo
        $this->model->updatemodelo($nombre_modelo,$precio, $material, $talle, $id);

        // obtengo el modelo modificado y lo devuelvo en la respuesta
        $modelo = $this->model->getmodelo($id);
        $this->view->response($modelo, 200);
    }
    
     
}

