<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/ingreso/new.php' : '' ;
!empty($show_list) ? 		require 'app/views/ingreso/list.php' : '';

!empty($show_detalle) ? 	require 'app/views/ingreso/show.php' : '';

require 'app/views/Main/footer.php';



?>
