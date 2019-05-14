     <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detalle Ingreso
        <small>Detalle Ingreso</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/Ingreso' ?>"><i class="fa fa-arrow-circle-down"></i> Ingreso</a></li>
        <li class="active">Detalle Ingreso</li>
      </ol>
    </section>
    <!-- /.section header -->

    <!-- Main content -->
    <section class="content container-fluid">
      
      <div class="row">
        <div class="col-md-12">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detalle Ingreso</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->            
            <div class="box-body">
              
              <!-- ||Encabezado ||-->
              <div class="row">
                      
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Proveedor</label>
                    <p><?=$ingreso->nombre?></p>
                  </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-gruop">
                      <label >Comprobante</label>
                    <p><?=$ingreso->tipo_comprobante?></p>
                  </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                   <div class="form-group">
                        <label for="serie_comprobante">Serie Comprobante</label>
                        <p><?=$ingreso->serie_comprobante?></p>
                    </div>        
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="num_comprobante">Número Comprobante</label>
                        <p><?=$ingreso->num_comprobante?></p>
                    </div>        
                </div>
              </div>
              <!-- /.row -->

              <!-- ||Detalle ||-->
              <div class="row">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style= "background: #A9D0F5">
                          <th>Articulo</th>
                          <th>Cantidad</th>
                          <th>Precio Compra</th>
                          <th>Precio Venta</th>
                          <th>Subtotal</th>
                        </thead>
                        <tfoot>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>TOTAL</th>
                          <th><h4 id="total"><?=$ingreso->total?></h4></th>                 
                        </tfoot>
                        <tbody>
                          <?php
                          while ($row = $detalle->fetch_assoc())
                          {
                            $subtotal = $row['cantidad'] * $row['precio_compra'];

                            echo '<tr>';
                            echo "<td>{$row['articulo']}</td>";
                            echo "<td>{$row['cantidad']}</td>";
                            echo "<td>{$row['precio_compra']}</td>";
                            echo "<td>{$row['precio_venta']}</td>";
                            echo "<td>{$subtotal}</td>";
                          }
                          ?>                                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
              </div>            
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
