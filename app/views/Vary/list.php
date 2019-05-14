
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Variación list
        <small>Muestra todas las variaciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/vary' ?>"><i class="fa fa-money"></i> Variación</a></li>
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

              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/vary/New' ?>">Add Variación</a>              
              <br><br>
              <table id="TablaJquery" class="table table-bordered table-hover">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </thead>
                <tbody>
                  <?php
                  while ($row = $listado->fetch_assoc())
                  {
                    echo '<tr>';
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td><a href='" . FOLDER_PATH ."/vary/Obtener/{$row['id']}'>Edit</a></td>";
                    echo "<td><a onclick='javascript:return asegurar();' href='" . FOLDER_PATH ."/vary/Eliminar/{$row['id']}'>Eliminar</a></td>";
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