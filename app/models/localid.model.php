<?php

class LocalidModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpoweb2;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAlllocalid() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM localidades");
        $query->execute();
        // 3. obtengo los resultados
        $localid = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos       
        return $localid;
        }
    /**
     * Devuelve la lista de localidadpor id.
     */
    public function get($id) {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM localidades WHERE id_localidad=?");
        $query->execute([$id]);
        // 3. obtengo los resultados
        $localid = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos       
        return $localid;
        }

    /**
     * Inserta una localidad en la base de datos.
     */
    public function insertlocalid($localidad) {
        $query = $this->db->prepare("INSERT INTO localidades (localidad) VALUES (?)");
        $query->execute([$localidad]);
        return $this->db->lastInsertId();
        }
    /**
     * modifica una localidad dado su id.
     */
    function upDatelocalidById($id){
        $query= $this-> db->prepare("SELECT *FROM localidades WHERE id_localidad =?");
        $query->execute([$id]);
        $updatecateg= $query->fetch(PDO:: FETCH_OBJ);
        return $updatecateg;    
        }

    function updatelocalid($localidad,$id_localidad) {
        $query=$this->db->prepare('UPDATE localidades SET  localidad =? WHERE id_localidad =?;');
        $query->execute([$localidad,$id_localidad]);
         header("Location: " . BASE_URL .'localidad');  
        }
    /**
     * Elimina una localidad dado su id.
     */
    function deletelocalidById($idlocalid) {
        $query = $this->db->prepare('DELETE FROM localidades WHERE id_localidad = ?');
        $query->execute([$idlocalid]);
        }

}

