<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/cliente/new.php' : '' ;
!empty($show_edit_form) ? 	require 'app/views/cliente/edit.php' : '';
!empty($show_list) ? 		require 'app/views/cliente/list.php' : '';


require 'app/views/Main/footer.php';



?>
