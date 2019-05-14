<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/venta/new.php' : '' ;
!empty($show_list) ? 		require 'app/views/venta/list.php' : '';

!empty($show_detalle) ? 	require 'app/views/venta/show.php' : '';

!empty($imprimir_fac) ? 	require 'app/views/venta/invoice.php' : '';

!empty($Pdf_print) ? 		require 'app/views/venta/pdf_invoice.php' : '';

require 'app/views/Main/footer.php';



?>
