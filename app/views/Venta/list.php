
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Venta list
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/venta' ?>"><i class="fa fa-opencart"></i> Venta</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Listado</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>

              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/venta/new' ?>">+ Nuevo</a>              
              <br><br>
              <table id="TablaJquery" class="table table-bordered table-hover">
                <thead>
                  <th>Fecha</th>
                  <th>Cliente</th>
                  <th>Comprobante</th>
                  <th>Impuesto</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                </thead>
                <tbody>
                  <?php
                  while ($row = $listado->fetch_assoc())
                  {
                    echo '<tr>';
                    echo "<td>{$row['fecha_hora']}</td>";                    
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['tipo_comprobante']}:{$row['serie_comprobante']}-{$row['num_comprobante']}</td>";
                    echo "<td>{$row['impuesto']}</td>";
                    echo "<td>{$row['total_venta']}</td>";
                    echo "<td>{$row['estado']}</td>";                      
                    echo "<td>
                    <a href='" . FOLDER_PATH ."/venta/Obtener/{$row['idventa']}' class='btn btn-primary fa fa-eye'></a>
                    <a onclick='javascript:return asegurar();' href='" . FOLDER_PATH ."/venta/Eliminar/{$row['idventa']}' class='btn btn-warning fa fa-safari'></a>
                    <a href='" . FOLDER_PATH ."/venta/imprimir/{$row['idventa']}' class='btn btn-primary fa fa-print'></a>
                    <a href='" . FOLDER_PATH ."/venta/Pdf/{$row['idventa']}' class='btn btn-primary fa fa-car'></a>
                    </td>";
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            
              <script>
                function asegurar ()
                  {
                      rc = confirm("¿Seguro que desea Cancelar la Venta?");
                      return rc;
                  }
              </script>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->