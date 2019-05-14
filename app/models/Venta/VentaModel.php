<?php 
/**
* 
*/
class VentaModel extends Model
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
          $sql ='
          SELECT v.idventa, v.fecha_hora,p.nombre, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, v.impuesto, v.estado, v.total_venta
          FROM venta as v 
          LEFT JOIN persona as p ON v.idcliente = p.idpersona
          LEFT JOIN detalle_venta as dv ON v.idventa = dv.idventa
          GROUP BY v.idventa,v.fecha_hora,p.nombre,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.impuesto,v.estado
          ORDER BY v.idventa DESC';

          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function ArticulosActivos()
  {
    try {
        $sql = "
          SELECT CONCAT(art.codigo,' ',art.nombre) AS articulo,art.idarticulo,art.stock, avg(di.precio_venta) as precio_promedio
          FROM articulo as art
          LEFT JOIN detalle_ingreso as di ON art.idarticulo = di.idarticulo
          WHERE art.estado = 'A' and art.stock > '0'
          GROUP BY articulo,art.idarticulo,art.stock";

        return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Registrar($params)
  {
    try {

        $idcliente         = $this->db->real_escape_string($params['idcliente']);
        $tipo_comprobante  = $this->db->real_escape_string($params['tipo_comprobante']);
        $serie_comprobante = $this->db->real_escape_string($params['serie_comprobante']);
        $num_comprobante   = $this->db->real_escape_string($params['num_comprobante']);
        $total_venta       = $this->db->real_escape_string($params['total_venta']);
        
        date_default_timezone_set("America/Costa_Rica"); 
        $fecha_hora        = $this->db->real_escape_string(date("Y-m-d H:i:s"));
        $impuesto          = '13';
        $estado            = 'A';

        $sql = "INSERT INTO venta (idcliente, tipo_comprobante, serie_comprobante, num_comprobante,total_venta, fecha_hora,impuesto, estado)
                           VALUES ('$idcliente', '$tipo_comprobante', '$serie_comprobante','$num_comprobante','$total_venta', '$fecha_hora', '$impuesto','$estado')";
        $this->db->query($sql);

        //detalle venta
        $idarticulo        = $params['idarticulo'];
        $cantidad          = $params['cantidad'];
        $descuento         = $params['descuento'];
        $precio_venta      = $params['precio_venta'];

        $ult_idventa     = $this->db->query('SELECT max(idventa) as idventa FROM venta ORDER by idventa DESC'); 

        $cont = 0;

        $ult_idventa = $ult_idventa->fetch_object();

        while ( $cont < count($idarticulo)) {
          $idventa        = $ult_idventa->idventa;
          $idart          = $this->db->real_escape_string($idarticulo[$cont]);
          $cant           = $this->db->real_escape_string($cantidad[$cont]);
          $desc           = $this->db->real_escape_string($descuento[$cont]);
          $p_venta        = $this->db->real_escape_string($precio_venta[$cont]);

          $sql = "INSERT INTO detalle_venta (idventa, idarticulo, cantidad, descuento, precio_venta) 
                                     VALUES ('$idventa', '$idart', '$cant', '$desc', '$p_venta')";
          
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
          $sql = "
          SELECT v.idventa,v.fecha_hora,p.nombre,p.telefono, p.email ,v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.impuesto,v.estado,v.total_venta       
          FROM venta as v
          LEFT JOIN persona as p ON v.idcliente = p.idpersona
          LEFT JOIN detalle_venta as dv ON v.idventa = dv.idventa        
          WHERE v.idventa ={$id} ";

          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function ObtenerDetalle($id)
  {
    try {
          $sql = "SELECT a.codigo, a.nombre as articulo,d.cantidad,d.descuento,d.precio_venta
          FROM detalle_venta as d
          LEFT JOIN articulo as a ON d.idarticulo = a.idarticulo
          WHERE d.idventa = {$id} ";
    
          return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Eliminar($id)
  {
    try {
        $sql = "UPDATE venta as v SET estado = 'C' WHERE v.idventa = {$id}";

        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }  
  
}