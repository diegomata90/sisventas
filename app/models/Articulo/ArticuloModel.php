<?php 
/**
* 
*/
class ArticuloModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }

  public function Registrar($params,$foto)
  {
    try {
        $codigo      = $this->db->real_escape_string($params['codigo']);
        $imagen      = $foto;
        $nombre      = $this->db->real_escape_string($params['nombre']);
        $descripcion = $this->db->real_escape_string($params['descripcion']);
        $idcategoria = $this->db->real_escape_string($params['idcategoria']);

        $sql = "INSERT INTO articulo (codigo, imagen, nombre, descripcion, estado,idcategoria) VALUES ('$codigo', '$imagen', '$nombre','$descripcion','A','$idcategoria')";

        return $this->db->query($sql);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {
          $sql = 'SELECT articulo.*, categoria.idcategoria, categoria.nombre as categoria  FROM articulo LEFT JOIN categoria ON articulo.idcategoria=categoria.idcategoria';
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Obtener($id)
  {
    try {
        $sql = "SELECT * FROM articulo WHERE idarticulo='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());       
    }

  }

  public function Eliminar($id)
  {
    try {
        $sql = "DELETE FROM articulo WHERE idarticulo={$id}";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }

  public function Actualizar($params,$foto)
  {
    try {
        $codigo      = $this->db->real_escape_string($params['codigo']);
        $imagen      = $foto;
        $nombre      = $this->db->real_escape_string($params['nombre']);
        $descripcion = $this->db->real_escape_string($params['descripcion']);
        $estado      = $this->db->real_escape_string($params['estado']);
        $idcategoria = $this->db->real_escape_string($params['idcategoria']);

        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE articulo 
                SET codigo='{$codigo}', imagen='{$imagen}', nombre='{$nombre}', descripcion='{$descripcion}', estado='{$estado}', idcategoria='{$idcategoria}' 
                WHERE idarticulo='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }
   
}