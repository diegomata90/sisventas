<?php 
/**
* 
*/
class ProveedorModel extends Model
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
        $tipo_documento = $this->db->real_escape_string($params['tipo_documento']);
        $num_documento = $this->db->real_escape_string($params['num_documento']);
        $direccion = $this->db->real_escape_string($params['direccion']);
        $telefono = $this->db->real_escape_string($params['telefono']);
        $email = $this->db->real_escape_string($params['email']);

        $sql = "INSERT INTO persona (tipo_persona, nombre,tipo_documento,num_documento,direccion,telefono,email) VALUES ('Proveedor', '$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email')";

        return $this->db->query($sql);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {
          $sql = 'SELECT * FROM persona WHERE tipo_persona = "Proveedor"';
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Obtener($id)
  {
    try {
        $sql = "SELECT * FROM persona WHERE idpersona='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());       
    }

  }

  public function Eliminar($id)
  {
    try {
        $sql = "DELETE FROM persona WHERE idpersona={$id}";
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
        $tipo_documento = $this->db->real_escape_string($params['tipo_documento']);
        $num_documento = $this->db->real_escape_string($params['num_documento']);
        $direccion = $this->db->real_escape_string($params['direccion']);
        $telefono = $this->db->real_escape_string($params['telefono']);
        $email = $this->db->real_escape_string($params['email']);


        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE persona SET nombre='{$nombre}', tipo_documento='{$tipo_documento}', 
        num_documento='{$num_documento}', direccion='{$direccion}', telefono='{$telefono}', email='{$email}'WHERE idpersona='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }
}