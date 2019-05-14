<?php 
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Diego Mata');
    $pdf->SetTitle('prueba de PDF');
    
    $pdf->setPrintHeader(false); 
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(20, 20, 20, false); 
    $pdf->SetAutoPageBreak(true, 20); 
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->addPage();

    $content = '';
    
    $content .= '
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center;">Prueba</h1>
        
      <table border="1" cellpadding="5">
        <thead>
          <tr>
              <th>Articulo</th>
              <th>Cantidad</th>
              <th>Precio Venta</th>
              <th>Descuento</th>
              <th>Subtotal</th>
          </tr>
        </thead>
    ';
    
    
    while ($row = $detalle->fetch_assoc()){
        $subtotal = $row['cantidad'] * $row['precio_venta'];
    $content .= '
        <tr>
            <td>'.$row['articulo'].'</td>
            <td>'.$row['cantidad'].'</td>
            <td>'.$row['precio_venta'].'</td>
            <td>'.$row['descuento'].'</td>
            <td>'.$subtotal.'</td>
        </tr>
    ';
    }
    
    $content .= '</table>';
    
    $content .= '
        <div class="row padding">
            <div class="col-md-12" style="text-align:center;">
                <span>Pdf Creator </span><a href="http://www.redecodifica.com">By Miguel Angel</a>
            </div>
        </div>
        
    ';
    
    $pdf->writeHTML($content, true, 0, true, 0);

    $pdf->lastPage();
    $pdf->output('Reporte.pdf', 'I');


























 ?>