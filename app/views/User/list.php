
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios list
        <small>Muestra todas las Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/User' ?>"><i class="fa fa-users"></i> Usuarios</a></li>
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

              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/user/New' ?>">Add Usuario</a>              
              <br><br>
              <table id="TablaJquery" class="table table-bordered table-hover">
                <thead>
                  <th>Avatar</th>
                  <th>Usuario</th>
                  <th>Email</th>
                  <th>Estado</th>
                  <th>Rol</th>
                  <th>Opciones</th>
                </thead>
                <tbody>
                  <?php
                  while ($row = $listado->fetch_assoc())
                  {
                    $estado = $row['estado'] == 'A' ? 'ACTIVO' : 'INACTIVO';
                    $roll   = $row['rol'] == '1' ? 'Administrado' : 'Usuario';

                    echo '<tr>';
                    echo "<td><img src='" . PATH_ASSETS ."/dist/img/{$row['avatar']}' class='img-rounded img-responsive' alt='{$row['avatar']}' width='75px' height='75px' ></td>";
                    echo "<td>{$row['usuario']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>$estado</td>"; 
                    echo "<td>$roll</td>";                        
                    echo "<td>
                    <a href='" . FOLDER_PATH ."/user/Obtener/{$row['id']}' class='btn btn-primary fa fa-pencil'></a>
                    <a href='" . FOLDER_PATH ."/user/ObtenerPas/{$row['id']}' class='btn btn-primary fa fa-key'></a>
                    <a onclick='javascript:return asegurar();' href='" . FOLDER_PATH ."/user/Eliminar/{$row['id']}' class='btn btn-danger fa fa-trash' ></a>
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