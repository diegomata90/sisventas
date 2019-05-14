<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Venta/VentaModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Cliente/ClienteModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Articulo/ArticuloModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class VentaController extends Controller
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

    $this->model = new VentaModel();
    $this->clientemodel = new ClienteModel();
    
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
    $cliente = $this->clientemodel->listar();
    $articulo = $this->model->ArticulosActivos();

    $params = array('avatar'    => $this->session->get('avatar'),
                    'email'     => $this->session->get('email'),
                    'rol'       => $this->session->get('rol'),
                    'show_form' => true,
                    'cliente'   => $cliente,                   
                    'articulo'  => $articulo, 
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
    $venta = $this->model->Obtener($id);
    $detalle = $this->model->ObtenerDetalle($id);
  
    $info_venta = !$venta->num_rows
    ? $info_venta = array()
    : $info_venta = $venta->fetch_object();


    $params = array('avatar'         => $this->session->get('avatar'),
                    'email'          => $this->session->get('email'),
                    'rol'            => $this->session->get('rol'), 
                    'show_detalle'   => true,
                    'venta'          => $info_venta, 
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
        return $this->Listar('No se recibió el ID del Venta', 'warning');

      if(!is_numeric($id))
        return $this->Listar('El ID del Venta debe ser numérico', 'warning');

      $result = $this->model->Eliminar($id);

      if(!$result || !$this->model->affected_rows())
        return $this->Listar("Hubo un error al remover el Venta número {$id}", 'warning');

      $this->Listar("Venta número {$id} removido");

  }

  public function imprimir($id)
  {
    $venta = $this->model->Obtener($id);
    $detalle = $this->model->ObtenerDetalle($id);
  
    $info_venta = !$venta->num_rows
    ? $info_venta = array()
    : $info_venta = $venta->fetch_object();


    $params = array('avatar'         => $this->session->get('avatar'),
                    'email'          => $this->session->get('email'),
                    'rol'            => $this->session->get('rol'), 
                    'imprimir_fac'   => true,
                    'venta'          => $info_venta, 
                    'detalle'        => $detalle);

    return $this->render(__CLASS__, $params);
  }

}
