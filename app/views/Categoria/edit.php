    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Categoria
        <small>Edicion de la Categoria</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/categoria' ?>"><i class="fa fa-dropbox"></i> Categoria</a></li>
        <li class="active">Edicion Categoria</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
    <?php !$info_item ? exit('Hubo un error al cargar la información del cliente') : '' ?>  

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Categoria</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form method="POST" action="<?= FOLDER_PATH . '/Categoria/Actualizar' ?>" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" data-validacion-tipo="requerido|min:3" value="<?= $info_item->nombre ?>">
              </div>                       
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcionl" data-validacion-tipo="requerido|min:3" value="<?= $info_item->descripcion ?>">
              </div>
                             
              <input type="hidden" name="id" value="<?= $info_item->idcategoria ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-default" href="<?= FOLDER_PATH . '/Categoria' ?>" role="button">Cancel</a>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>






    </div>