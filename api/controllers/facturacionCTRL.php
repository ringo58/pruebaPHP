<?php
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
$header = apache_request_headers();
require_once __DIR__ . "/../models/facturacion.php";
$data = json_decode(file_get_contents("php://input"), false);
try {


  if (isset($data->metodo)) {
    $facturacion = new Facturacion();
    switch ($data->metodo) {
      case 'guardarCliente':
        $facturacion->guardarCliente($data->info);
        break;
      case 'guardarProducto':
        $facturacion->guardarProducto($data->info);
        break;
      case 'guardarFactura':
        $facturacion->guardarFactura($data->info);
        break;
      case 'buscarCliente':
        $facturacion->buscarCliente();
        break;
      case 'buscarProducto':
        $facturacion->buscarProducto();
        break;
    }
  }


} catch (Exception $e) {
  jsonResponse(500, 'error en el controlador ' . $e->getMessage(), []);
}
