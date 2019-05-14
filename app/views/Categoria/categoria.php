<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/categoria/new.php' : '' ;
!empty($show_edit_form) ? 	require 'app/views/categoria/edit.php' : '';
!empty($show_list) ? 		require 'app/views/categoria/list.php' : '';


require 'app/views/Main/footer.php';



?>
