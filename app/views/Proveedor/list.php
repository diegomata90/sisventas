
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proveedor list
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/proveedor' ?>"><i class="fa fa-ship"></i> Proveedor</a></li>
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

              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/proveedor/New' ?>">+ Nuevo</a>              
              <br><br>
              <table id="TablaJquery" class="table table-bordered table-hover">
                <thead>
                  <th>Id</th>                  
                  <th>Nombre</th>
                  <th>Tipo Doc.</th>
                  <th>Número Doc.</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>Opciones</th>
                </thead>
                <tbody>
                  <?php
                  while ($row = $listado->fetch_assoc())
                  {
                    echo '<tr>';
                    echo "<td>{$row['idpersona']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['tipo_documento']}</td>";
                    echo "<td>{$row['num_documento']}</td>";
                    echo "<td>{$row['telefono']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>
                    <a href='" . FOLDER_PATH ."/proveedor/Obtener/{$row['idpersona']}' class='btn btn-primary fa fa-pencil'></a>
                    <a onclick='javascript:return asegurar();' href='" . FOLDER_PATH ."/proveedor/Eliminar/{$row['idpersona']}' class='btn btn-danger fa fa-trash' ></a>
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