
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?= FOLDER_PATH .'/main' ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <!-- Optionally, you can add icons to the links -->
<!--         
        <li><a href="<?= FOLDER_PATH .'/vary' ?>"><i class="fa fa-money"></i> <span>Variaciones</span></a></li>
-->

        <li class="treeview" >
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= FOLDER_PATH .'/proveedor' ?>"><i class="fa fa-ship"></i><span> Proveedor</span></a></li>
            <li><a href="<?= FOLDER_PATH .'/ingreso' ?>"><i class="fa fa-arrow-circle-down"></i><span> Ingreso</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-opencart"></i>
            <span>Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= FOLDER_PATH .'/cliente' ?>"><i class="fa fa-user"></i><span> Cliente</span></a></li>
            <li><a href="<?= FOLDER_PATH .'/venta' ?>"><i class="fa fa-opencart"></i><span> Venta</span></a></li>
          </ul>
        </li>        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Mantenimiento</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= FOLDER_PATH .'/user' ?>"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
            <li><a href="<?= FOLDER_PATH .'/articulo' ?>"><i class="fa fa-database"></i> Articulo</a></li>
            <li><a href="<?= FOLDER_PATH .'/categoria' ?>"><i class="fa fa-dropbox"></i> Categoria</a></li>   
          </ul>
        </li>
        
      </ul>
<script>
function clik ()
  {
 $classe = 'active treeview menu-open';
 return $classe;
  }

</script>

      <!-- /.sidebar-menu -->