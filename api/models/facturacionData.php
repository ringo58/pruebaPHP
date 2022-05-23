<?php

error_reporting(E_ALL);

require_once __DIR__ . "/../conexion.php";

abstract class FacturacionData
{
  public function __construct()
  {
    $this->_DB = new Conection();
  }

  protected function guardarClienteD(stdClass $data)
  {
    $response = new stdClass();
    try {
      $guardar = $this->_DB->prepare('insert into clientes (nombre,apellido,telefono,identificacion,f_nacimiento) values ("' . $data->nombre . '","' . $data->apellido . '",' . $data->telefono . ',"' . $data->id . '","' . $data->date . '")');
      $guardar->execute();
      if ($guardar->rowCount() > 0) {
        $response->state = 200;
        $response->msg = 'Cliente guardado correctamente';
      } else {
        $response->state = 500;
        $response->msg = 'Error al guardar el cliente';
      }
      return $response;
    } catch
    (PDOException $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } catch (Error $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } finally {
      $this->_DB = null;
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }

  protected function guardarProductoD(stdClass $data)
  {
    $response = new stdClass();
    try {
      $guardar = $this->_DB->prepare('insert into productos (nombre,valor) values ("' . $data->nombre . '",' . $data->valor . ')');
      $guardar->execute();
      if ($guardar->rowCount() > 0) {
        $response->state = 200;
        $response->msg = 'Producto guardado correctamente';
      } else {
        $response->state = 500;
        $response->msg = 'Error al guardar el Producto';
      }
      return $response;
    } catch
    (PDOException $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } catch (Error $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } finally {
      $this->_DB = null;
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }
  protected function guardarFacturaD(stdClass $data)
  {
    $response = new stdClass();
    try {
      $items=json_decode(json_encode($data->items), true);
      $total = 0;
      foreach($items as $value){
        $total = $total + ($value['cantidad'] * $value['item']);
      }
      $guardar = $this->_DB->prepare('insert into facturas (id_cliente,factura,valor_total,empresa) values ("' . $data->cliente . '",' . $data->id . ','.$total.',"' . $data->empresa . '")');
      $guardar->execute();
      if ($guardar->rowCount() > 0) {
        $response->state = 200;
        $response->msg = 'Factura guardada correctamente';
      } else {
        $response->state = 500;
        $response->msg = 'Error al guardar la factura';
      }
      return $response;
    } catch
    (PDOException $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } catch (Error $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } finally {
      $this->_DB = null;
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }
  protected function buscarClienteD()
  {
    $response = new stdClass();
    try {
      $buscar = $this->_DB->prepare('select * from clientes');
      $buscar->execute();
      if ($buscar->rowCount() > 0) {
        $response->state = 200;
        $response->msg = 'clientes obtenidos correctamente';
        $response->dataArray = $buscar->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $response->state = 500;
        $response->msg = 'Error al guardar buscar clientes';
      }
      return $response;
    } catch
    (PDOException $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } catch (Error $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } finally {
      $this->_DB = null;
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }
  protected function buscarProductoD()
  {
    $response = new stdClass();
    try {
      $buscar = $this->_DB->prepare('select * from productos');
      $buscar->execute();
      if ($buscar->rowCount() > 0) {
        $response->state = 200;
        $response->msg = 'productos obtenidos correctamente';
        $response->dataArray = $buscar->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $response->state = 500;
        $response->msg = 'Error al guardar buscar productos';
      }
      return $response;
    } catch
    (PDOException $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } catch (Error $e) {
      $response->state = 500;
      $response->msg
        = $e->getMessage();

      return $response;
    } finally {
      $this->_DB = null;
      $memoria = array_keys(get_defined_vars());
      foreach ($memoria as $var) {
        unset(${"$var"});
      }
    }

  }
}
?>
