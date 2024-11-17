<?php

class ModeloModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=db_zapatillas;charset=utf8', 'root', '');
    }
 
    public function getModelos($sort = false, $orderBy = false, $limit, $page) {
        $sql = 'SELECT * FROM modelo';

            if($orderBy) {
            switch($orderBy) {
                case 'nombre_modelo':
                    $sql .= ' ORDER BY nombre_modelo ';
                    break;
                case 'talle':
                    $sql .= ' ORDER BY talle ';
                    break;
                case 'precio':
                    $sql .= ' ORDER BY precio ';
                    break;
                case 'material':
                    $sql .= ' ORDER BY material ';
                    break;
            }
          }

          if($sort) {
            if(($sort == 'DESC')||$sort == 'desc'){
                $sql .= 'desc';
            }
        }          
            if($limit && $page){
            $offset = ($page - 1) * $limit;//calculo que valor toma offset segun en nro de page
            $sql .= ' LIMIT '. $limit ;
            $sql .= ' OFFSET '. $offset ;        
            }
            
            $query = $this->db->prepare($sql);
            $query->execute();
            $modelos = $query->fetchAll(PDO::FETCH_OBJ); 
            return $modelos;                   
    }
        
    public function getModelo($id) {    
        $query = $this->db->prepare('SELECT * FROM modelo WHERE id_modelo = ?');
        $query->execute([$id]);   
    
        $modelo = $query->fetch(PDO::FETCH_OBJ);
    
        return $modelo;
    }

      function updateModelo($nombre_modelo,$precio, $material, $talle, $id) {    
        $query = $this->db->prepare('UPDATE modelo SET nombre_modelo = ?, precio= ?, material = ?, talle = ? WHERE id_modelo = ?');
        $query->execute([$nombre_modelo,$precio, $material, $talle, $id]);
    }
    
    public function eliminarModelo($id) {
        $query = $this->db->prepare('DELETE FROM modelo WHERE id_modelo = ?');
        $query->execute([$id]);
    }

}