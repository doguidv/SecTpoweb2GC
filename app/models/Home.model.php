<?php

class HomeModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpoweb2;charset=utf8', 'root', '');
        }
    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllHomelocalid() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM localidades");
        $query->execute();

        // 3. obtengo los resultados
        $localid = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos      
        return $localid;
        }
    public function getAllinfopesca(){      
        $query = $this->db->prepare("SELECT info_pesca.*,localidades.* FROM info_pesca JOIN localidades ON info_pesca.id_localidad_fk = localidades.id_localidad");
        $query->execute();
         $info=$query->fetchAll(PDO::FETCH_OBJ);
         return $info;
         }
    public function GetAllInfoPescaXlocalidad($id){ 
        $query = $this->db->prepare("SELECT info_pesca.*,localidades.*  FROM info_pesca JOIN localidades ON info_pesca.id_localidad_fk = localidades.id_localidad WHERE id_localidad_fk =?"); 
        $query->execute([$id]);
        $infoXlocalidad= $query->fetchALL(PDO:: FETCH_OBJ);
        return $infoXlocalidad;
        }
    public  function GetinfoById($id){
        $sentencia= $this-> db->prepare("SELECT *FROM info_pesca WHERE id_pesca =?;");
        $sentencia->execute([$id]);
        $infop= $sentencia->fetch(PDO:: FETCH_OBJ);
        return $infop;
        }

}

