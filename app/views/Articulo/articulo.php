<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/articulo/new.php' : '' ;
!empty($show_edit_form) ? 	require 'app/views/articulo/edit.php' : '';
!empty($show_list) ? 		require 'app/views/articulo/list.php' : '';


require 'app/views/Main/footer.php';



?>
