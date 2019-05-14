<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Proveedor/ProveedorModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class ProveedorController extends Controller
{
  private $session;

  private $model;
  
  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 and empty($this->session->get('email')) and $this->session->get('rol') === 1) {
     
    }elseif ($this->session->get('rol') != 1) {
      exit('Acceso denegado ');
    }

    $this->model = new ProveedorModel();
  }

  public function exec()
  {
    $this->Listar();
  }

  public function logout()
  {
    $this->session->close();
    header('location:'.FOLDER_PATH.'/login');
  }

  public function New($message = '')
  {
    $params = array('avatar'    => $this->session->get('avatar'),
                    'email'     => $this->session->get('email'),
                    'rol'       => $this->session->get('rol'),
                    'show_form' => true, 
                    'message'   => $message);
    
    $this->render(__CLASS__, $params);
  }

  public function Listar($message = '', $message_type = 'success')
  {
    $listado = $this->model->Listar();

    $params = array('avatar'       => $this->session->get('avatar'),
                    'email'        => $this->session->get('email'),
                    'rol'          => $this->session->get('rol'),
                    'show_list'    => true,
                    'message_type' => $message_type, 
                    'message'      => $message, 
                    'listado'      => $listado);

    return $this->render(__CLASS__, $params);
  }

  public function Obtener($id)
  {
    $result = $this->model->Obtener($id);

    $info_item = !$result->num_rows
    ? $info_item = array()
    : $info_item = $result->fetch_object();

    $params = array('avatar'         => $this->session->get('avatar'),
                    'email'          => $this->session->get('email'),
                    'rol'            => $this->session->get('rol'), 
                    'show_edit_form' => true, 
                    'info_item'      => $info_item);

    return $this->render(__CLASS__, $params);
  }

  public function Agregar($request_params)
  {
    if(!$this->verify($request_params))
      return $this->New('Son necesarios todos los campos');

    $result = $this->model->Registrar($request_params);  


    if(!$result || !$this->model->affected_rows())
      return $this->New('Hubo un error al agregar el Proveedor');
    
    return $this->Listar('Proveedor dado de alta');
  }

  private function verify($request_params)
  {
    foreach ($request_params as $param)
      if(empty($param)) return false;

    return true;
  }

  public function Eliminar($id)
  {
      if(empty($id))
        return $this->Listar('No se recibió el ID del Proveedor', 'warning');

      if(!is_numeric($id))
        return $this->Listar('El ID del Proveedor debe ser numérico', 'warning');

      $result = $this->model->Eliminar($id);

      if(!$result || !$this->model->affected_rows())
        return $this->Listar("Hubo un error al remover el Proveedor número {$id}", 'warning');

      $this->Listar("Proveedor número {$id} removido");

  }

  public function Actualizar($request_params)
  {
    if(!$this->verify($request_params))
      return $this->Listar('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['id']))
      return $this->Listar('El ID del Proveedor debe ser numérico para editar', 'warning');
    
    $result = $this->model->Actualizar($request_params);

    if(!$result || !$this->model->affected_rows())
      return $this->Listar("Hubo un error al editar el Proveedor número {$request_params['id']}", 'warning');

    $this->Listar("Proveedor número {$request_params['id']} actualizado");
  }


}
