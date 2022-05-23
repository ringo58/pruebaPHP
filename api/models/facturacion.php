<?php
require_once __DIR__ . '/facturacionData.php';

class Facturacion extends FacturacionData
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

  public function guardarCliente(stdClass $data)
  {
    try {


      $response = $this->guardarClienteD($data);
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
  public function guardarProducto(stdClass $data)
  {
    try {


      $response = $this->guardarProductoD($data);
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
  public function guardarFactura(stdClass $data)
  {
    try {


      $response = $this->guardarFacturaD($data);
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
  public function buscarCliente()
  {
    try {


      $response = $this->buscarClienteD();
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
  public function buscarProducto()
  {
    try {


      $response = $this->buscarProductoD();
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
