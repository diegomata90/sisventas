    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Proveedor
        <small>Add Proveedor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/proveedor' ?>"><i class="fa fa-ship"></i> Proveedor</a></li>
        <li class="active">Add Proveedor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Proveedor</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <form method="POST" action="<?= FOLDER_PATH . '/proveedor/Agregar' ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" data-validacion-tipo="requerido|min:3" value="">
              </div>                       
              <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="direccion" data-validacion-tipo="requerido|min:3" value="">
              </div>
              <div class="form-group ">
                <label for="tipo_documento">Documento</label>
                <select name="tipo_documento" class="form-control" id="tipo_documento">
                    <option value="Cedula_Fisica">Cedula_Fisica</option>
                    <option value="Cedula_Juridica">Cedula_Juridica</option>
                </select>
              </div>
              <div class="form-group">
                <label for="num_documento">Número documento</label>
                <input type="text" name="num_documento" class="form-control" id="num_documento" placeholder="num_documento" data-validacion-tipo="requerido|min:3" value="">
              </div>
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="telefono" data-validacion-tipo="requerido|min:3" value="">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="email" data-validacion-tipo="requerido|email" value="">
              </div>  
              <?php
                !empty($message)
                ? print("<div class=\"alert alert-warning\">$message</div>")
                : ''
              ?>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/proveedor/proveedor_list' ?>" role="button">Cancel</a>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->