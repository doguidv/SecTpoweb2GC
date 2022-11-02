<?php
require_once './app/models/localid.model.php';
require_once './app/views/app.view.php';

class LocalidApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new LocalidModel();
        $this->view = new AppView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getlocalids($params = null) {
        $tasks = $this->model->getAlllocalid();
        $this->view->response($tasks);
    }

    public function getlocalid($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $localid = $this->model->get($id);

        // si no existe devuelvo 404
        if ($localid)
            $this->view->response($localid);
        else 
            $this->view->response("La localidad con el id=$id no existe", 404);
    }

    public function deletelocalid($params = null) {
        $id = $params[':ID'];

        $task = $this->model->get($id);
        if ($task) {
            $this->model->delete($id);
            $this->view->response($task);
        } else 
            $this->view->response("La localidad con el id=$id no existe", 404);
    }

    public function insertlocalid($params = null) {
        $localid = $this->getData();

        if (empty($localid->localidad)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertlocalid($localid->localidad);
            $localid = $this->model->get($id);
            $this->view->response($localid, 201);
        }
    }
    
    public function update($params = null) {
        $localid_id = $params[':ID'];
        $localid = $this->model->get($localid_id);
        if (isset($localid)) {
            $body = $this->getData();
            $tarea = $this->model->updatelocalid($body->localidad, $body->id_localidad);
            $this->view->response("Localidad con id=$localid_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Localidad con  id=$localid_id not found", 404);
    }
}
