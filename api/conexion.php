<?php

class Conection extends PDO
{

  private $tipo_de_base = 'mysql';
  private $host = 'localhost';
  private $nombre_de_base = 'prueba_funcional';
  private $usuario = 'adminv';
  private $contrasena = 'Bzd#5*6D7k%d23V';


  private $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  public function __construct()
  {
    try {
      parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena, $this->opciones);
    } catch (PDOException $e) {
      echo 'Ha surgido un error y no se puede conectar a la base de datos prueba_validacion. Detalle: ' . $e->getMessage();
      exit;
    }
  }

}
