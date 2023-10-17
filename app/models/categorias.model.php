<?php
require_once './app/models/model.php';
class CategoriasModel extends Model{
    
    public function getAllCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        $categorias=$query->fetchAll(PDO::FETCH_OBJ);;
        
        return $categorias;
    }

    public function getCategoriaById($categoriaID) {
        $query = $this->db->prepare("SELECT * FROM categorias WHERE categoriaID = ?");
        $query->execute([$categoriaID]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function deleteCategoria($categoriaID) {
        // Primero, elimina los productos relacionados con esta categoría
        $query = $this->db->prepare('DELETE FROM productos WHERE categoriaID = :categoriaID');
        $query->bindParam(':categoriaID', $categoriaID, PDO::PARAM_INT);
        $query->execute();
    
        // Luego, elimina la categoría
        $query = $this->db->prepare('DELETE FROM categorias WHERE categoriaID = :categoriaID');
        $query->bindParam(':categoriaID', $categoriaID, PDO::PARAM_INT);
        $query->execute();
    }
    public function insertCategoria($nombre) {
        
        $query = $this->db->prepare('INSERT INTO categorias (nombre) VALUES(?)');
        $query->execute([$nombre]);
        
        return $this->db->lastInsertId();
        
    }
    function editCategoria($nombre, $categoriaID){
        $query = $this->db->prepare('UPDATE categorias SET nombre=? WHERE categoriaID=?');
        $query->execute([$nombre, $categoriaID]);
    }
}