<?php 
                 $numC; 
                 session_start();
                 include '../library/configServer.php';
                 include '../library/consulSQL.php';
                 $id=$_GET['id'];                
                 $ped=$_GET['np'];
                 
                 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El Porteño</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="control-bar">
  <div class="container">
    <div class="row">
      <div class="col-2-4">
        <div class="slogan">Facturación </div>

        <label for="config_tax">IVA:
          <input type="checkbox" id="config_tax" />
        </label>
        <label for="config_tax_rate" class="taxrelated">Tasa:
          <input type="text" id="config_tax_rate" value="10"/>%
        </label>
  
      </div>
      <div class="col-4 text-right">
        <a href="javascript:window.print()">Imprimir</a>
      </div><!--.col-->
    </div><!--.row-->
  </div><!--.container-->
</div><!--.control-bar-->

<header class="row">
  <div class="logoholder text-center" >
    <img src="../assets/img/bateria1.jpg">
  </div><!--.logoholder-->

  <div class="me">
    <p contenteditable>
      <strong>Taller y ventas de Baterias El Porteño</strong><br>
      22 de Obtubre 121, Chivilcoy<br>
      Buenos Aires, Argentina.<br>
      Cuil:20-15434567-5
      
    </p>
  </div><!--.me-->

  <div class="info">
    <p contenteditable>
      Web: <a href="http://tallerelporteño.com.ar">www.tallerelporteño.com.ar</a><br>
      E-mail: <a href="tallerelporteño@gmail.com">tallerelporteño@gmail.com</a><br>
      Tel: +5492346515541<br>
    </p>
  </div><!-- .info -->

  <div class="bank">
    <p contenteditable>
    </p>
  </div><!--.bank-->

</header>

<?php 
$consulta= ejecutarSQL::consultar("select * from venta where NumPedido = $ped");
$totalproductos = mysqli_num_rows($consulta);
                  if($totalproductos>0){
                      while($fila=mysqli_fetch_array($consulta)){
                         echo '




<div class="row section">

	<div class="col-2">
    <h1 contenteditable>Factura</h1>
  </div><!--.col-->

  <div class="col-2 text-right details">
    <p contenteditable>
      Fecha: '.$fila['Fecha'].'<br>
      Factura Numero:00'.$fila['NumPedido'].'<br>
    </p>
  </div><!--.col-->
  
 ';
 $numC=$fila['NumPedido'];

}
 }
  $consulta= ejecutarSQL::consultar("select * from cliente where NIT = $id");
  $totalproductos = mysqli_num_rows($consulta);
                  if($totalproductos>0){
                      while($fila=mysqli_fetch_array($consulta)){
                         echo '
  <div class="col-2">
    

    <p contenteditable class="client">
      <strong>Cliente:'.$fila['Nombre'].' '.$fila['Apellido'].'</strong><br>
      cuit/cuil:'.$fila['NIT'].'<br>
      Direccion:'.$fila['Direccion'].'<br>
	    Telefono:'.$fila['Telefono'].'<br>
	    Email:'.$fila['Email'].'
    </p>
  </div><!--.col-->
  '
  ;}
 }?> 
  
  <div class="col-2">
   

    <p contenteditable class="client">
    </p>
  </div><!--.col-->

  

</div><!--.row-->

<div class="row section" style="margin-top:-1rem">
<div class="col-1"><?php
$consulta= ejecutarSQL::consultar("select * from detalle where NumPedido='$numC'");
$totalproductos = mysqli_num_rows($consulta);
                  if($totalproductos>0){
                      while($fila=mysqli_fetch_array($consulta)){
                         echo '
	<table style="width:100%">
    <thead contenteditable>
	<tr class="invoice_detail">
       <th width="25%">Orden de compra </th>
      <th width="30%">Términos y condiciones</th>
	 </tr> 
    </thead>
    <tbody contenteditable>
	<tr class="invoice_detail">
       <td width="25%">'.$fila['OrdenDeCompra'].' </td>
      <td width="30%">Transferencia Bancaria</td>
	 </tr>
	</tbody>
	</table>
 
</div>

</div><!--.row-->

<div class="invoicelist-body">
  <table>
    <thead contenteditable>
      <th width="5%">Código</th>
      <th width="60%">Descripción</th>
      
      <th width="10%">Cant.</th>
      <th width="15%">Precio</th>
      <th class="taxrelated">IVA</th>
      <th width="10%">Total</th>
    </thead>
    <tbody>
      <tr>
        <td width="5%"><a class="control removeRow" href="#">x</a> <span contenteditable>'.$fila['CodigoProd'].'</span></td>
        <td width="60%"><span contenteditable>Descripción</span></td>
        <td class="amount">'.$fila['CantidadProductos'].'</td>
        <td class="rate">'.$fila['PrecioProd'].'</td>
        <td class="tax taxrelated"> </td>
        <td> '.($fila['CantidadProductos']*$fila['PrecioProd']) .'</td+>
      </tr>
    </tbody>
  </table>
</div><!--.invoice-body-->

<div class="invoicelist-footer">
  <table contenteditable>
    <tr class="taxrelated">
      <td>IVA:</td>
      <td id="total_tax"></td>
    </tr>
    <tr>
      <td><strong>Total:</strong></td>
      <td>'.($fila['CantidadProductos']*$fila['PrecioProd']) .'</td>
    </tr>
  </table>
</div>
';}
}?> 
<div class="note" contenteditable>
  <h2>Nota:</h2>
</div><!--.note-->

<footer class="row">
  <div class="col-1 text-center">
  <h6>El Porteño © 2021</h6>   
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="assets/js/main.js"></script>
</body>
</html>
