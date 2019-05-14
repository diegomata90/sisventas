     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Venta
        <small>Add Venta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/Venta' ?>"><i class="fa fa-opencart"></i> Venta</a></li>
        <li class="active">Add Venta</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Venta</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <form method="POST" action="<?= FOLDER_PATH . '/Venta/Agregar' ?>" enctype="multipart/form-data">
            
            <!-- Inicio del Encabezado -->  
            <div class="row">
              
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                  <label for="cliente">Cliente</label>
                  <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
                    <?php 
                    while ($persona = $cliente->fetch_assoc()){
                          echo "<option value={$persona['idpersona']} >{$persona['nombre']}</option>";
                    }
                     ?>                      
                  </select>
                </div>
              </div>

              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-gruop">
                  <label >Tipo Comprobante</label>
                  <select name="tipo_comprobante" class="form-control" >
                      <option value="Boleta">Boleta</option>
                      <option value="Factura">Factura</option>
                      <option value="Ticket">Ticket</option>
                  </select>
                </div>
              </div>

              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label for="serie_comprobante">Serie Comprobante</label>
                      <input type="text" name="serie_comprobante" value=""class="form-control" placeholder="Serie Comprobante...">
                    </div>        
              </div>

              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label for="num_comprobante">Número Comprobante</label>
                      <input type="text" name="num_comprobante" required value="" class="form-control" placeholder="Numero Comprobante...">
                    </div>        
              </div>
            </div>
            <!-- /.div encabezado -->            
            
            <!-- Inicio del Cuerpo -->               
            <div class="row">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label >Articulo</label>
                        <select name="pidarticulo" class="form-control selectpicker" id='pidarticulo'data-live-search="true">
                          <?php 
                          while ($art = $articulo->fetch_assoc()){
                            echo "<option value={$art['idarticulo']}_{$art['stock']}_{$art['precio_promedio']}>{$art['articulo']}</option>";
                          }
                           ?>                         
                        </select>
                    </div>
                  </div>

                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label for="cantidad" >Cantidad</label>
                      <input type="number" name="pcantidad" id="pcantidad" class="form-control" 
                      placeholder="Cantidad">
                    </div>
                  </div>

                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label for="stock" >Stock</label>
                      <input type="number" disabled name="pstock" id="pstock" class="form-control" 
                      placeholder="Stock">
                    </div>
                  </div>

                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label for="precio_venta" >Precio Venta</label>
                      <input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control" 
                      placeholder="P. Venta">
                    </div>
                  </div>

                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label for="descuento" >Descuento</label>
                      <input type="number" name="pdescuento" id="pdescuento" class="form-control" 
                      placeholder="Descuento">
                    </div>
                  </div>

                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>

                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                      <thead style= "background: #A9D0F5">
                        <th>Opciones</th>
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>Precio Venta</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                      </thead>
                      <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>TOTAL</th>
                        <th><h4 id="total"> ¢  0.00 </h4><input type="hidden" name="total_venta" id="total_venta"></th>                  
                      </tfoot>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>

                </div>

                  </div>
                      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                            <div class="form-group">
                              <button class="btn btn-primary" type="submit">Guardar</button>
                              <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>  
                  </div>
                </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.div cuerpo -->  
      <!-- /.row -->

 <script>
  $(document).ready(function(){
    $('#bt_add').click(function(){
      agregar();
    });
  });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();
  $("#pidarticulo").change(mostrarValores);

  function mostrarValores()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');
    $("#pprecio_venta").val(datosArticulo[2]);
    $("#pstock").val(datosArticulo[1]);
  }

  function agregar()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');


    idarticulo=datosArticulo[0];
    articulo=$('#pidarticulo option:selected').text();  
    cantidad=$('#pcantidad').val();

    descuento=$('#pdescuento').val();
    precio_venta=$('#pprecio_venta').val();
    stock=$('#pstock').val();

    if(idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
    {
      if(stock>=cantidad)
      {
      subtotal[cont] = (cantidad*precio_venta-descuento);
      total=total+subtotal[cont];

      var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';
      cont++;

      limpiar();
      $("#total").html("¢/.  "+total);
      $("#total_venta").val(total);

      evaluar();
      $("#detalles").append(fila);
      }
      else
      {
        alert("La cantidad a vender supera el stock");
      }

    }
    else
    {
      alert("Error al ingresar el detalle del venta, revise los datos del articulo");
    }
  }

  function limpiar(){
    $('#pcantidad').val("");
    $('#pdescuento').val("");
    $('#pprecio_venta').val("");
  }

  function evaluar()
  {
    if(total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide();
    }
  }

  function eliminar(index){
    total=total-subtotal[index];
    $("#total").html("¢/.  " + total);
    $("#total_venta").val(total);
    $("#fila"+ index).remove();
    evaluar();    
  }

</script>
