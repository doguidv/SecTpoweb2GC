<?php
require_once './app/models/localid.model.php';
require_once './app/views/api.view.php';

class TaskApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new localidModel();
        $this->view = new ApiView();
        
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
        $task = $this->model->get($id);

        // si no existe devuelvo 404
        if ($task)
            $this->view->response($task);
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
            $id = $this->model->insert($localid->localidad);
            $localid = $this->model->get($id);
            $this->view->response($localid, 201);
        }
    }

}
