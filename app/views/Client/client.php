<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? require 'app/views/Client/form.php' : '' ;
!empty($show_edit_form) ? require 'app/views/Client/edit_form.php' : '';
!empty($show_clients_list) ? require 'app/views/Client/clients_list.php' : '';

require 'app/views/Main/footer.php';



?>
