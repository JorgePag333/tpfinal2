<?php
 include 'carrito2.php';
// SDK de Mercado Pago
require_once '/xampp/htdocs/tpfinal/Mercadopago/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2371823201368807-070701-496d4cef65f8e0a6ec52c5e1438338da-787164345');
?>
<?php
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
// Crea un ítem en la preferencia// Crea un ítem en la preferencia
$item = new MercadoPago\Item();



$item->title = $fila['NombreProd'];
$item->quantity =$codeProd['cantidad'] ;
$item->unit_price = $pref;
$preference->items = array($item);
$preference->save();
$preference->notification_url="http://localhost/tpFinal1-main/acreditacionMp.php";
$preference->back_urls = array(
      "success" => "http://localhost/tpFinal1-main/acreditacionMp.php",
      "failure" => "http://localhost/tpFinal1-main/acreditacionMp.php",
      "pending" => "http://localhost/tpFinal1-main/acreditacionMp.php"
  );

?>
            

<script src="https://sdk.mercadopago.com/js/v2"></script>
          
<script>
// Agrega credenciales de SDK
  const mp = new MercadoPago('TEST-1942e861-dca3-4126-b52a-543cee356680', {
        locale: 'es-AR'
  });

  // Inicializa el checkout
  mp.checkout({
      preference: {
          id: '2371823201368807'
      },
      render: {
            container: '.$preference->init_point', // Indica dónde se mostrará el botón de pago
            label: 'Pagar', // Cambia el texto del botón de pago (opcional)
      }
});
</script>