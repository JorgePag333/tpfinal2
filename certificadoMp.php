<?php 
require_once 'Mercadopago/vendor/autoload.php';
// Agrega credenciales
$access = "APP_USR-6056389123923028-070523-6a2b868d50f5a9291cc40de55aa6249b-5428116";
MercadoPago\SDK::setAccessToken($access);
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
// Crea un ítem en la preferencia// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
//incluimos items
include ("Mp.php");



?>