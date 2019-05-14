
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Articulos list
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/articulo' ?>"><i class="fa fa-database"></i> Articulos</a></li>
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

              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/articulo/New' ?>">+ Nuevo</a>              
              <br><br>
              <table id="TablaJquery" class="table table-bordered table-hover">
                <thead>
                  <th>Código</th>                  
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Stock</th>
                  <th>Imagen</th>
                  <th>Estado</th> 
                  <th>Opciones</th>
                </thead>
                <tbody>
                  <?php
                  while ($row = $listado->fetch_assoc())
                  {
                    $estado = $row['estado'] == 'A' ? 'ACTIVO' : 'INACTIVO';

                    echo '<tr>';
                    echo "<td>{$row['codigo']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['categoria']}</td>";
                    echo "<td>{$row['stock']}</td>";
                    echo "<td><img src='" . PATH_ASSETS ."/img/{$row['imagen']}' class='img-rounded img-responsive' alt='{$row['imagen']}' width='75px' height='75px' ></td>";
                    echo "<td>$estado</td>";
                    echo "<td>
                    <a href='" . FOLDER_PATH ."/articulo/Obtener/{$row['idarticulo']}' class='btn btn-primary fa fa-pencil'></a>
                    <a onclick='javascript:return asegurar();' href='" . FOLDER_PATH ."/articulo/Eliminar/{$row['idarticulo']}' class='btn btn-danger fa fa-trash' ></a>
                    </td>";
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
              <script>
                function asegurar ()
                  {
                      rc = confirm("¿Seguro que desea Eliminar?");
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