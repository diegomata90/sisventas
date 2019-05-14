    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Articulo
        <small>Add Articulo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/Articulo' ?>"><i class="fa fa-database"></i> Articulo</a></li>
        <li class="active">Add Articulo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Articulo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <form method="POST" action="<?= FOLDER_PATH . '/Articulo/Agregar' ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" class="form-control" id="codigo" placeholder="codigo" data-validacion-tipo="requerido|min:3" value="">
              </div>                       
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" data-validacion-tipo="requerido|min:3" value="">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="descripcion" data-validacion-tipo="requerido|min:3" value="">
              </div>
              <div class="form-group ">
                <label for="idcategoria">Categoria</label>
                <select name="idcategoria" class="form-control" id="idcategoria">
                    <?php 
                    while ($cat = $categoria->fetch_assoc()){
                        if ($cat['idcategoria'] == $info_item->idcategoria) {
                          echo "<option value={$cat['idcategoria']} selected >{$cat['nombre']}</option>";
                        }else{
                          echo "<option value={$cat['idcategoria']} >{$cat['nombre']}</option>";
                        }
                    }
                     ?>                    
                </select>
              </div>                             
              <div class="form-group">
                  <label for="imagen">imagen</label>
                  <input type="file" name="imagen" placeholder="Ingrese una imagen"  class="form-control" id="imagen"/>
              </div>
              <?php
                !empty($message)
                ? print("<div class=\"alert alert-warning\">$message</div>")
                : ''
              ?>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/Articulo' ?>" role="button">Cancel</a>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->