<?php

class infoModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpoweb2;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllpesca() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM info_pesca WHERE id_pesca");
        $query->execute();

        // 3. obtengo los resultados
        $pesca = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $pesca;
    }  
    public function getAlllocalidades() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM localidades");
        $query->execute();

        // 3. obtengo los resultados
        $localidad = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $localidad;
    }  
 
    public function getAllinfopesca(){
      
        $query = $this->db->prepare("SELECT info_pesca.*,localidades.localidad  as localidad FROM info_pesca JOIN localidades ON info_pesca.id_localidad_fk = localidades.id_localidad");           
        $query->execute();
         $info=$query->fetchAll(PDO::FETCH_OBJ);
    return $info;
        }
    
    /**
     * Inserta info pesca en la base de datos.
     */
    public function insertinfopesca($embarcado, $tipo_embarcacion, $equipo_pesca,$carnada,$pesca,$Detalles_Pesca,$id_localidad_fk) {
        $query = $this->db->prepare("INSERT INTO info_pesca (embarcado, tipo_embarcacion, equipo_pesca,carnada,pesca,Detalles_Pesca,id_localidad_fk) VALUES (?,?, ?, ?, ?,?,?)");
        $query->execute([$embarcado, $tipo_embarcacion, $equipo_pesca,$carnada,$pesca,$Detalles_Pesca,$id_localidad_fk]);

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
        header("Location: " . BASE_URL.'infopesca'); 
    }
    /**
     * Elimina info pesca dado su id.
     */
    function deleteinfoById($id) {
        $query = $this->db->prepare('DELETE FROM info_pesca WHERE id_pesca = ?');
        $query->execute([$id]);
    }

}


