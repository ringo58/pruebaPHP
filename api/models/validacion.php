<?php
require_once __DIR__ . '/validacionData.php';

class Validacion extends ValidacionData
{
function jsonResponse(
    int $state,
    string $msg,
    array $dataArray,
    stdClass $dataObjet = null
  )
  {
    echo json_encode(array(
      'state' => $state,
      'msg' => $msg,
      'dataArray' => $dataArray,
      'dataObjet' => $dataObjet,
    ));

    exit();
  }

  public function validarCliente(stdClass $data)
  {
    try {


      $response = $this->validarClienteD($data);
      echo json_encode( $response );


    } catch (Exception $e) {
      echo json_encode(500, $e->getMessage(), []);
    } catch (Error $e) {
      echo json_encode(500, $e->getMessage(), []);
    } finally {
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }
  public function validarProducto(stdClass $data)
  {
    try {


      $response = $this->validarProductoD($data);
      echo json_encode( $response );


    } catch (Exception $e) {
      echo json_encode(500, $e->getMessage(), []);
    } catch (Error $e) {
      echo json_encode(500, $e->getMessage(), []);
    } finally {
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }
  public function validarFactura(stdClass $data)
  {
    try {


      $response = $this->validarFacturaD($data);
      echo json_encode( $response );


    } catch (Exception $e) {
      echo json_encode(500, $e->getMessage(), []);
    } catch (Error $e) {
      echo json_encode(500, $e->getMessage(), []);
    } finally {
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }


}
