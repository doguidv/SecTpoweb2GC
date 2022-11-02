<?php
require_once './app/models/info.model.php';
require_once './app/views/app.view.php';

class InfopApiController {
    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new InfoModel();
        $this->view = new AppView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getinfops($params = null) {
        $infops = $this->model->getAll();
        $this->view->response($infops);
    }

    public function getinfop($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $infop = $this->model->get($id);

        // si no existe devuelvo 404
        if ($infop)
            $this->view->response($infop);
        else 
            $this->view->response("La info con el id=$id no existe", 404);
    }

    public function deleteinfop($params = null) {
        $id = $params[':ID'];

        $infop = $this->model->get($id);
        if ($infop) {
            $this->model->deleteinfoById($id);
            $this->view->response($infop);
        } else 
            $this->view->response("La info con el id=$id no existe", 404);
    }

    public function insertinfop($params = null) {
        $infop = $this->getData();
        if (empty($infop->embarcado) || empty($infop->tipo_embarcacion) || empty($infop->equipo_pesca)  || empty($infop->carnada)  || empty($infop->pesca) || empty($infop->Detalles_Pesca) || empty($infop->id_localidad_fk) ) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertinfopesca($infop->embarcado, $infop->tipo_embarcacion, $infop->equipo_pesca,  $infop->carnada,  $infop->pesca,    $infop->Detalles_Pesca, $infop->id_localidad_fk);
            $infop = $this->model->get($id);
            $this->view->response($infop, 201);
        }
    }
    
    public function updateinfo($params = null) {
        $infop_id = $params[':ID'];
        $infop = $this->model->get($infop_id);
        if (isset ($infop)) {
            $body = $this->getData();
            $infop = $this->model->info_pesca($body->embarcado, $body->tipo_embarcacion, $body->equipo_pesca, $body->carnada, $body->pesca, $body->Detalles_Pesca, $body->id_localidad_fk, $body->id_pesca);
            $this->view->response("Localidad con id=$infop_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Localidad con  id=$infop_id not found", 404);
    }

}
