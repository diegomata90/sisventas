<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Ingreso/IngresoModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Proveedor/ProveedorModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class IngresoController extends Controller
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

    $this->model = new IngresoModel();
    $this->proveedormodel = new ProveedorModel();
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
    $proveedor = $this->proveedormodel->listar();
    $articulo = $this->model->ArticulosActivos();

    $params = array('avatar'    => $this->session->get('avatar'),
                    'email'     => $this->session->get('email'),
                    'rol'       => $this->session->get('rol'),
                    'show_form' => true,
                    'proveedor' => $proveedor,                   
                    'articulo'  => $articulo, 
                    'message'   => $message);
    
    $this->render(__CLASS__, $params);
  }

  public function Listar($message = '', $message_type = 'success')
  {
    $listado   = $this->model->Listar();

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
    $ingreso = $this->model->Obtener($id);
    $detalle = $this->model->ObtenerDetalle($id);
  
    $info_ingreso = !$ingreso->num_rows
    ? $info_ingreso = array()
    : $info_ingreso = $ingreso->fetch_object();


    $params = array('avatar'         => $this->session->get('avatar'),
                    'email'          => $this->session->get('email'),
                    'rol'            => $this->session->get('rol'), 
                    'show_detalle'   => true,
                    'ingreso'        => $info_ingreso, 
                    'detalle'        => $detalle);

    return $this->render(__CLASS__, $params);
  } 

  public function Agregar($request_params)
  {
    $result = $this->model->Registrar($request_params);  

    if($result = 0)
      return $this->new('Hubo un error al agregar el Ingreso');
    
    return $this->Listar('Ingreso registrado correctamente');
  }

  public function Eliminar($id)
  {
      if(empty($id))
        return $this->Listar('No se recibió el ID del Articulo', 'warning');

      if(!is_numeric($id))
        return $this->Listar('El ID del Articulo debe ser numérico', 'warning');

      $result = $this->model->Eliminar($id);

      if(!$result || !$this->model->affected_rows())
        return $this->Listar("Hubo un error al remover el Articulo número {$id}", 'warning');

      $this->Listar("Articulo número {$id} removido");

  }


}
