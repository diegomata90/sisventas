    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Cliente
        <small>Edicion de cliente</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= FOLDER_PATH .'/client' ?>"><i class="fa fa-user"></i> Clientes</a></li>
        <li class="active">Edicion Cliente</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
    <?php !$info_client ? exit('Hubo un error al cargar la información del cliente') : '' ?>  

      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Client</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <form method="POST" action="<?= FOLDER_PATH . '/client/updateClient' ?>">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= $info_client->name ?>">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $info_client->email ?>">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?= $info_client->address ?>">
              </div>
              <input type="hidden" name="id" value="<?= $info_client->id ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-default" href="<?= FOLDER_PATH . '/client/clientsList' ?>" role="button">Cancel</a>
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>






    </div>