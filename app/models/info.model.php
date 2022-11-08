<?php

class InfoModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpoweb2;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAll($Column=null,$order=null,$starAt=null,$endAt=null,$equalTo=null) {
//ordenar
        if  (($Column)&&($order)){
        $query = $this->db->prepare("SELECT * FROM info_pesca ORDER BY $Column $order");
        $query->execute();
        }else {
            $query = $this->db->prepare("SELECT * FROM info_pesca ");
            $query->execute();       
        }// Paginado
       if($starAt){
        $query = $this->db->prepare("SELECT * FROM info_pesca  LIMIT $starAt,$endAt");
        $query->execute();
        }  //Filtro   
        if($equalTo!=null){
        $query = $this->db->prepare("SELECT * FROM info_pesca  WHERE embarcado = ? ;");
        $query->execute([$equalTo]);
        }
        $pesca = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        return $pesca; 
    }  
    /**
     * Devuelve la lista de info pesca segun id.
     */
    public function get($id) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM info_pesca WHERE id_pesca=?");
        $query->execute([$id]);

        // 3. obtengo los resultados
        $pesca = $query->fetch(PDO::FETCH_OBJ); // devuelve un arreglo
        
        return $pesca;
    }  
    
   
  /**
     * Inserta info pesca en la base de datos.
     */
    public function insertinfopesca($embarcado, $tipo_embarcacion, $equipo_pesca,  $carnada,  $pesca,   $Detalles_Pesca,  $id_localidad_fk) {
        $query = $this->db->prepare("INSERT INTO info_pesca (embarcado, tipo_embarcacion, equipo_pesca, carnada, pesca,   Detalles_Pesca, id_localidad_fk) VALUES (?,?, ?, ?, ?,?,?)");
        $query->execute([$embarcado, $tipo_embarcacion, $equipo_pesca,  $carnada, $pesca,  $Detalles_Pesca,  $id_localidad_fk]);
        return $this->db->lastInsertId();
        }
/**
     * modifica info pesca dado su id.
     */
    function updateinfoById($id){
        $sentencia= $this-> db->prepare("SELECT *FROM info_pesca WHERE id_pesca =?;");
        $sentencia->execute([$id]);
        $infop= $sentencia->fetch(PDO:: FETCH_OBJ);
        return $infop;
        }
    function info_pesca($embarcado, $tipo_embarcacion, $equipo_pesca,$carnada,$pesca,$Detalles_Pesca,$id_localidad_fk,$id_pesca) {
        $query=$this->db->prepare('UPDATE info_pesca SET  embarcado = ?, tipo_embarcacion= ?, equipo_pesca= ?, carnada = ?,pesca = ?,Detalles_Pesca=?,id_localidad_fk = ? WHERE id_pesca= ?;');
        $query->execute ([$embarcado, $tipo_embarcacion, $equipo_pesca,$carnada,$pesca,$Detalles_Pesca,$id_localidad_fk,$id_pesca]);      
        }
    /**
     * Elimina info pesca dado su id.
     */
    function deleteinfoById($id) {
        $query = $this->db->prepare('DELETE FROM info_pesca WHERE id_pesca = ?');
        $query->execute([$id]);
        }

}


