<?php 
/**
* 
*/
class UserModel extends Model
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
          $email = $this->db->real_escape_string($params['email']);

          $password = $this->db->real_escape_string($params['password']);
          $passHash = password_hash($password, PASSWORD_BCRYPT);
          $avatar   = $foto;
          $rol      = $this->db->real_escape_string($params['rol']);
          $usuario  = $this->db->real_escape_string($params['usuario']);

          $sql = "INSERT INTO usuarios (email, password, avatar,estado,rol,usuario) VALUES ('$email', '$passHash', '$avatar','A','$rol','$usuario')";

          return $this->db->query($sql);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {
          $sql = 'SELECT * FROM usuarios';
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Obtener($id)
  {
    try {
        $sql = "SELECT * FROM usuarios WHERE id='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());       
    }

  }

  public function Eliminar($id)
  {
    try {
        $sql = "DELETE FROM usuarios WHERE id={$id}";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }

  public function Actualizar($params,$foto)
  {
    try {
        $email    = $this->db->real_escape_string($params['email']);
        $avatar   = $foto;
        $estado   = $this->db->real_escape_string($params['estado']);
        $rol      = $this->db->real_escape_string($params['rol']);
        $usuario  = $this->db->real_escape_string($params['usuario']);

        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE usuarios SET email='{$email}', avatar='{$avatar}', estado='{$estado}', rol='{$rol}', usuario='{$usuario}'  WHERE id='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }
  
  public function ActualizarPass($params)
  {
    try {
        $password = $this->db->real_escape_string($params['password']);        
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE usuarios SET password='{$passHash}'WHERE id='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }  
}