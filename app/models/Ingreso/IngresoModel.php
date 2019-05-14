<?php 
/**
* 
*/
class IngresoModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }

  public function Listar()
  {
    try {
          $sql = '
          SELECT i.idingreso, i.fecha_hora, p.nombre, i.tipo_comprobante, i.serie_comprobante, i.num_comprobante , i.impuesto, i.estado, sum(di.cantidad*di.precio_compra) as total
          FROM ingreso as i
          LEFT JOIN persona as p ON i.idproveedor = p.idpersona
          LEFT JOIN detalle_ingreso as di ON i.idingreso=di.idingreso
          GROUP BY  i.idingreso, i.fecha_hora, p.nombre, i.tipo_comprobante, i.serie_comprobante, i.num_comprobante , i.impuesto, i.estado
          ORDER BY i.idingreso DESC
          ';
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function ArticulosActivos()
  {
    try {
        $sql = 'SELECT concat(codigo," ",nombre) as articulo , idarticulo FROM articulo Where estado = "A"';
        return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Registrar($params)
  {
    try {

        $idproveedor       = $this->db->real_escape_string($params['idproveedor']);
        $tipo_comprobante  = $this->db->real_escape_string($params['tipo_comprobante']);
        $serie_comprobante = $this->db->real_escape_string($params['serie_comprobante']);
        $num_comprobante   = $this->db->real_escape_string($params['num_comprobante']);
        
        date_default_timezone_set("America/Costa_Rica"); 
        $fecha_hora        = $this->db->real_escape_string(date("Y-m-d H:i:s"));
        $impuesto          = '13';
        $estado            = 'A';

        $sql = "INSERT INTO ingreso (idproveedor, tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora,impuesto, estado)
                           VALUES ('$idproveedor', '$tipo_comprobante', '$serie_comprobante','$num_comprobante','$fecha_hora', '$impuesto','$estado')";
        $this->db->query($sql);

        //detalle ingreso
        $idarticulo        = $params['idarticulo'];
        $cantidad          = $params['cantidad'];
        $precio_compra     = $params['precio_compra'];
        $precio_venta      = $params['precio_venta'];

        $ult_idingreso     = $this->db->query('SELECT max(idingreso) as idingreso FROM ingreso ORDER by idingreso DESC'); 

        $cont = 0;

        $ult_idingreso = $ult_idingreso->fetch_object();

        while ( $cont < count($idarticulo)) {
          $idingreso      = $ult_idingreso->idingreso;
          $idart          = $this->db->real_escape_string($idarticulo[$cont]);
          $cant           = $this->db->real_escape_string($cantidad[$cont]);
          $p_compra       = $this->db->real_escape_string($precio_compra[$cont]);
          $p_venta        = $this->db->real_escape_string($precio_venta[$cont]);

          $sql = "INSERT INTO detalle_ingreso (idingreso, idarticulo, cantidad, precio_compra, precio_venta) 
          VALUES ('$idingreso', '$idart', '$cant', '$p_compra', '$p_venta')";
          
          $this->db->query($sql);

          $cont = $cont + 1;
        }
        return 1;
    } 
    catch (Exception $e) {
       die($e->getMessage());
       return 0;  
    }
  }

  public function Obtener($id)
  {
    try {
          $sql = "SELECT i.idingreso,i.fecha_hora,p.nombre,i.tipo_comprobante,i.serie_comprobante,i.num_comprobante,i.impuesto,i.estado,sum(di.cantidad*di.precio_compra) as total        
          FROM ingreso as i
          LEFT JOIN persona as p ON i.idproveedor = p.idpersona
          LEFT JOIN detalle_ingreso as di ON i.idingreso=di.idingreso        
          WHERE i.idingreso ={$id} ";
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function ObtenerDetalle($id)
  {
    try {
          $sql = "SELECT a.nombre as articulo,d.cantidad,d.precio_compra,d.precio_venta
          FROM detalle_ingreso as d
          LEFT JOIN articulo as a ON d.idarticulo = a.idarticulo
          WHERE d.idingreso = {$id} ";

          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Eliminar($id)
  {
    try {
        $sql = "UPDATE ingreso as i SET estado = 'C' WHERE i.idingreso = {$id}";

        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }  

}