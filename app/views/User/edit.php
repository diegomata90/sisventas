    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Usuarios
        <small>Edicion de la Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/user' ?>"><i class="fa fa-users"></i> Usuarios</a></li>
        <li class="active">Edicion Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
    <?php !$info_item ? exit('Hubo un error al cargar la información del cliente') : '' ?>  

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Usuarios</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form method="POST" action="<?= FOLDER_PATH . '/User/Actualizar' ?>" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="usuario" data-validacion-tipo="requerido|min:3" value="<?= $info_item->usuario ?>">
              </div>                       
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="@email" data-validacion-tipo="requerido|email" value="<?= $info_item->email ?>">
              </div>
              <div class="form-group ">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control" id="estado">
                    <option <?php echo $info_item->estado == 'A' ? 'selected' : ''; ?> value="A">ACTIVO</option>
                    <option <?php echo $info_item->estado == 'I' ? 'selected' : ''; ?> value="I">INACTIVO</option>
                </select>
              </div>
              <div class="form-group ">
                <label for="rol">Rol</label>
                <select name="rol" class="form-control" id="rol">
                    <option <?php echo $info_item->rol == 1 ? 'selected' : ''; ?> value = 1 >Administrador</option>
                    <option <?php echo $info_item->rol == 2 ? 'selected' : ''; ?> value = 2 >Usuario</option>
                </select>
              </div>                             
              <div class="row">
                <div class="col-xs-6">
                  <label for="avatar">Avatar</label>
                  <input type="file" name="avatar" placeholder="Ingrese una imagen"  class="form-control" id="avatar"/>
                </div>
                <div class="col-xs-6">
                    <?php if($info_item->avatar != ''): ?>
                        <div class="img-thumbnail text-center">
                            <img src="<?= PATH_ASSETS . 'dist/img/'.$info_item->avatar ?>" style="width:100%" />
                        </div>
                    <?php endif; ?>            
                </div>
              </div> <!-- /.row -->

              <input type="hidden" name="id" value="<?= $info_item->id ?>">
              <input type="hidden" name="img_act" value="<?= $info_item->avatar ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-default" href="<?= FOLDER_PATH . '/User' ?>" role="button">Cancel</a>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>






    </div>