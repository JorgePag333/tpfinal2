<?php
session_start();
require_once "library/configServer.php";
require_once "library/consulSQL.php";
require_once "inc/link.php";
require_once "certificadoMp.php";
// SDK de Mercado Pago


//echo $access;
foreach($_SESSION['carro'] as $codeProd){
      $consulta=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$codeProd['producto']."'");
      while($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
            $pref= $fila['Precio'] *$codeProd['cantidad'] ;

            $item->title = $fila['NombreProd'];
           // echo $fila['NombreProd'];
            $item->quantity =$codeProd['cantidad'];
            //echo $codeProd['cantidad'] ;
            $item->unit_price = $pref;
           // echo $pref;
            $preference->items = array($item);
      }
  };



$preference->notification_url="https://jorgepages.000webhostapp.com/pedido.php";
$preference->back_urls = array(
      "success" => "https://jorgepages.000webhostapp.com/pedido.php"

  );
  
  $preference->save();
?>
