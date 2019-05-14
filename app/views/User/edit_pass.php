    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Password
        <small>Edicion del Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/user' ?>"><i class="fa fa-users"></i> Usuarios</a></li>
        <li class="active">Edicion Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
    <?php !$info_item ? exit('Hubo un error al cargar la información del cliente') : '' ?>  

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Password</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form method="POST" action="<?= FOLDER_PATH . '/User/ActualizarPass' ?>" enctype="multipart/form-data" >
              <div class="row">
                <div class="col-xs-6">
                    <?php if($info_item->avatar != ''): ?>
                        <div class="img-thumbnail text-center">
                            <img src="<?= PATH_ASSETS . 'dist/img/'.$info_item->avatar ?>" style="width:100%" />
                            <p><?= $info_item->usuario ?></p>
                        </div>
                    <?php endif; ?>            
                </div>
              </div> <!-- /.row -->     
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password" data-validacion-tipo="requerido|min:3" value="">
              </div>                     
              <input type="hidden" name="id" value="<?= $info_item->id ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-default" href="<?= FOLDER_PATH . '/User' ?>" role="button">Cancel</a>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>






    </div>