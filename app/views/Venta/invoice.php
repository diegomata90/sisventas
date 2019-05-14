  <br>
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> AdminLTE, Inc.
          <small class="pull-right">Date: <?=$venta->fecha_hora?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?=$venta->nombre?></strong><br>
          San José<br>
          Costa Rica<br>
          Teléfono: <?=$venta->telefono?><br>
          Email: <?=$venta->email?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b><?=$venta->tipo_comprobante?> #<?=$venta->serie_comprobante ."-". $venta->num_comprobante ;   ?></b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> <?=$venta->fecha_hora ?><br>
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Articulo</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Monto Descuento</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $detalle->fetch_assoc())
            {
              $subtotal = $row['cantidad'] * $row['precio_venta'];

              echo '<tr>';
              echo "<td>{$row['codigo']} - {$row['articulo']}</td>";
              echo "<td>{$row['cantidad']}</td>";
              echo "<td>{$row['precio_venta']}</td>";
              echo "<td>{$row['descuento']}</td>";
              echo "<td>{$subtotal}</td>";
            }
            ?>   
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="<?= PATH_ASSETS . 'dist/img/credit/visa.png' ?>" alt="Visa">
        <img src="<?= PATH_ASSETS . 'dist/img/credit/mastercard.png' ?>" alt="Mastercard">
        <img src="<?= PATH_ASSETS . 'dist/img/credit/american-express.png' ?>" alt="American Express">
        <img src="<?= PATH_ASSETS . 'dist/img/credit/paypal2.png' ?>" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        Muchas gracias por su visita los esperamos pronto,
        Bendiciones !! <br>
        Thank you for coming, We hope you come back soon, 
        Blessings !!
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?=$venta->total_venta?></td>
            </tr>
            <tr>
              <th>Tax (<?=$venta->impuesto?>%)</th>
              <td><?= ($venta->impuesto / 100) * $venta->total_venta ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?= ($venta->impuesto / 100) * $venta->total_venta + $venta->total_venta  ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </section>
