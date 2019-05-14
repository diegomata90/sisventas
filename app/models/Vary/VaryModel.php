<?php 
/**
* 
*/
class VaryModel extends Model
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
          $name = $this->db->real_escape_string($params['name']);
          $email = $this->db->real_escape_string($params['email']);
          $address = $this->db->real_escape_string($params['address']);

          $sql = "INSERT INTO clients (name, email, address) VALUES ('$name', '$email', '$address')";

          return $this->db->query($sql);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {
          $sql = 'SELECT * FROM clients';
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Obtener($id)
  {
    try {
        $sql = "SELECT * FROM clients WHERE id='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());       
    }

  }

  public function Eliminar($id)
  {
    try {
        $sql = "DELETE FROM clients WHERE id={$id}";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }

  public function Actualizar($params)
  {
    try {
        $name = $this->db->real_escape_string($params['name']);
        $email = $this->db->real_escape_string($params['email']);
        $address = $this->db->real_escape_string($params['address']);
        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE clients SET name='{$name}', email='{$email}', address='{$address}' WHERE id='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }
}