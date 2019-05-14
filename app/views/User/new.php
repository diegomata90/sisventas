    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Usuario
        <small>Add Usuario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/user' ?>"><i class="fa fa-users"></i> Usuario</a></li>
        <li class="active">Add Usuario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Usuario</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <form method="POST" action="<?= FOLDER_PATH . '/user/Agregar' ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="usuario..@ " >
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="email..@ " >
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password" >
              </div>
              <div class="form-group ">
                <label for="rol">Rol</label>
                <select name="rol" class="form-control" id="rol">
                    <option value= 2 >Usuario</option>
                    <option value= 1 >Administrador</option>
                </select>
              </div>               
              <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control" id="avatar" >
              </div>
              <?php
                !empty($message)
                ? print("<div class=\"alert alert-warning\">$message</div>")
                : ''
              ?>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-primary" href="<?= FOLDER_PATH . '/User' ?>" role="button">Cancel</a>
            </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->