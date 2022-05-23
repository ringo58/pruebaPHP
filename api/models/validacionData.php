<?php

error_reporting(E_ALL);

require_once __DIR__ . "/../conexionvalidacion.php";

abstract class ValidacionData
{
  public function __construct()
  {
    $this->_DB = new Conection();
  }
  protected function validarClienteD(stdClass $data)
  {

    $data = $data->info;
    $response = new stdClass();
    $valido=0;
    $modulo='clientes';
    try {
      $valido= $valido + $this->validarvalor($data->nombre,'T','Y',3,15,$modulo,'nombre');
      $valido= $valido + $this->validarvalor($data->apellido,'T','N',3,15,$modulo,'apellido');
      $valido= $valido + $this->validarvalor($data->telefono,'N','N',10,10,$modulo,'telefono');
      $valido= $valido + $this->validarvalor($data->id,'V','Y',0,12,$modulo,'identificacion');
      $valido= $valido + $this->validarvalor($data->date,'F','N',0,0,$modulo,'fecha');
      if($valido > 0) {
          $response->state = 500;
          $response->msg = 'Hay errores en el formulario';
      }else{
          $response->state = 200;
          $response->msg = 'formulario validado correctamente';
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
  protected function validarProductoD(stdClass $data)
  {

    $data = $data->info;
    $response = new stdClass();
    $valido=0;
    $modulo='productos';
    try {
      $valido= $valido + $this->validarvalor($data->nombre,'T','Y',0,0,$modulo,'nombre');
      $valido= $valido + $this->validarvalor($data->valor,'N','N',0,10,$modulo,'valor');
     if($valido > 0) {
        $response->state = 500;
        $response->msg = 'Hay errores en el formulario';
      }else{
        $response->state = 200;
        $response->msg = 'formulario validado correctamente';
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
  protected function validarFacturaD(stdClass $data)
  {

    $data = $data->info;
    $response = new stdClass();
    $valido=0;
    $modulo='facturas';
    try {
      $valido= $valido + $this->validarvalor($data->cliente,'N','Y',0,0,$modulo,'cliente');
      $valido= $valido + $this->validarvalor($data->id,'N','Y',0,5,$modulo,'factura');
      $valido= $valido + $this->validarvalor($data->empresa,'V','N',3,15,$modulo,'empresa');
      if($valido > 0) {
        $response->state = 500;
        $response->msg = 'Hay errores en el formulario';
      }else{
        $response->state = 200;
        $response->msg = 'formulario validado correctamente';
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
  protected function validarvalor($value,$type,$required,$min,$max,$modulo,$campo) {
      if($required == 'Y' and $value == ''){
        $queryLOG=$this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("'.$modulo.'","'.$campo.'","El valor es requerido y no fue enviado")');

        $queryLOG->execute();
        return 1;
      }
      $errores= 0;
      if($value != '') {
        switch ($type) {
          case 'F':
            list($year, $month, $day) = explode('-', $value);

            if (is_numeric($year) && is_numeric($month) && is_numeric($day)) {

            } else {
              $queryLOG = $this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("' . $modulo . '","' . $campo . '","La fecha ingresada no tiene un formato valido")');

              $queryLOG->execute();
              $errores++;
            }
            if ($year < 1922) {
              $queryLOG = $this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("' . $modulo . '","' . $campo . '","El año debe ser mayor a 1922")');

              $queryLOG->execute();
              $errores++;
            } else if ($year > 2005) {
              $queryLOG = $this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("' . $modulo . '","' . $campo . '","El año debe ser menor a 2005")');

              $queryLOG->execute();
              $errores++;
            } else {

            }
            break;
          case 'N':

            if (!is_numeric($value)) {
              $queryLOG = $this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("' . $modulo . '","' . $campo . '","El valor debe ser numerico")');

              $queryLOG->execute();
              $errores++;
            }
            break;
          case 'T':
            if (preg_match("/^([a-zA-Z' ]+)$/", $value)) {

            } else {
              $queryLOG = $this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("' . $modulo . '","' . $campo . '","El campo solo recibe letras")');

              $queryLOG->execute();
              $errores++;
            }
            break;
          case 'V':
            if (!is_string($value)) {
              $queryLOG = $this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("' . $modulo . '","' . $campo . '","El campo no es un string")');

              $queryLOG->execute();
              $errores++;
            }
            break;
        }
      }
      if($min > 0){
          if(strlen($value) < $min ){
              $queryLOG=$this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("'.$modulo.'","'.$campo.'","El campo tiene un minimo de '.$min.' caracteres")');
              $queryLOG->execute();
              $errores++;
          }
      }
      if($max > 0){
          if(strlen($value) > $max ){
              $queryLOG=$this->_DB->prepare('INSERT into log_excepciones (modulo,campo,mensaje) values ("'.$modulo.'","'.$campo.'","El campo tiene un maximo de '.$max.' caracteres")');
              $queryLOG->execute();
              $errores++;
          }
      }
      return $errores;
  }

}
