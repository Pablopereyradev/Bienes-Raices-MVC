<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
// Este Ultimo require se agrego como solución, ya que no se reconocian las clases
require __DIR__ . '/../controllers/PropiedadController.php';

// Conectar a la base de datos
$db = conectarDb();

use Model\ActiveRecord;

//$propiedad = new Propiedad;

ActiveRecord::setDB($db);