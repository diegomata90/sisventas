    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Articulo
        <small>Edicion de la Articulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/user' ?>"><i class="fa fa-database"></i> Articulo</a></li>
        <li class="active">Edicion Articulo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
    <?php !$info_item ? exit('Hubo un error al cargar la información del cliente') : '' ?>  

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Articulo</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form method="POST" action="<?= FOLDER_PATH . '/articulo/Actualizar' ?>" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" class="form-control" id="codigo" placeholder="codigo" data-validacion-tipo="requerido|min:3" value="<?= $info_item->codigo ?>">
              </div>                       
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" data-validacion-tipo="requerido|min:3" value="<?= $info_item->nombre ?>">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion" data-validacion-tipo="requerido|min:3" value="<?= $info_item->descripcion ?>">
              </div>
              <div class="form-group ">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control" id="estado">
                    <option <?php echo $info_item->estado == 'A' ? 'selected' : ''; ?> value="A">ACTIVO</option>
                    <option <?php echo $info_item->estado == 'I' ? 'selected' : ''; ?> value="I">INACTIVO</option>
                </select>
              </div>
              <div class="form-group ">
                <label for="idcategoria">Categoria</label>
                <select name="idcategoria" class="form-control" id="idcategoria">
                    <?php 
                    while ($cat = $categoria->fetch_assoc()){
                        if ($cat['idcategoria'] == $info_item->idcategoria) {
                          echo "<option value='{$cat['idcategoria']}' selected >{$cat['nombre']}</option>";
                        }else{
                          echo "<option value='{$cat['idcategoria']}' >{$cat['nombre']}</option>";
                        }
                    }
                     ?>                    
                </select>
              </div>                             
              <div class="row">
                <div class="col-xs-6">
                  <label for="imagen">imagen</label>
                  <input type="file" name="imagen" placeholder="Ingrese una imagen"  class="form-control" id="imagen"/>
                </div>
                <div class="col-xs-4">
                    <?php if($info_item->imagen != ''): ?>
                        <div class="img-thumbnail text-center">
                            <img src="<?= PATH_ASSETS . 'img/'.$info_item->imagen ?>" style="width:65%" class='img-rounded img-responsive' />
                        </div>
                    <?php endif; ?>            
                </div>
              </div> <!-- /.row -->

              <input type="hidden" name="id" value="<?= $info_item->idarticulo ?>">
              <input type="hidden" name="img_act" value="<?= $info_item->imagen ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-default" href="<?= FOLDER_PATH . '/articulo' ?>" role="button">Cancel</a>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>






    </div>