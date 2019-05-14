<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? require 'app/views/Vary/new.php' : '' ;
!empty($show_edit_form) ? require 'app/views/Vary/edit.php' : '';
!empty($show_list) ? require 'app/views/Vary/list.php' : '';


require 'app/views/Main/footer.php';



?>
