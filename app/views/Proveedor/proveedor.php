<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/proveedor/new.php' : '' ;
!empty($show_edit_form) ? 	require 'app/views/proveedor/edit.php' : '';
!empty($show_list) ? 		require 'app/views/proveedor/list.php' : '';


require 'app/views/Main/footer.php';



?>
