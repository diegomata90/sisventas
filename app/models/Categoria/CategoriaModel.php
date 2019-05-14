<?php 
/**
* 
*/
class CategoriaModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }

  public function Registrar($params)
  {
    try {
        $nombre = $this->db->real_escape_string($params['nombre']);
        $descripcion = $this->db->real_escape_string($params['descripcion']);

        $sql = "INSERT INTO categoria (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

        return $this->db->query($sql);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {
          $sql = 'SELECT * FROM categoria';
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Obtener($id)
  {
    try {
        $sql = "SELECT * FROM categoria WHERE idcategoria='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());       
    }

  }

  public function Eliminar($id)
  {
    try {
        $sql = "DELETE FROM categoria WHERE idcategoria={$id}";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }

  public function Actualizar($params)
  {
    try {
        $nombre = $this->db->real_escape_string($params['nombre']);
        $descripcion = $this->db->real_escape_string($params['descripcion']);

        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE categoria SET nombre='{$nombre}', descripcion='{$descripcion}' WHERE idcategoria='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }
}