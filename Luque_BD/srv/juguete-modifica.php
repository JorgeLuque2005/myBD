<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaMaterial.php";
require_once __DIR__ . "/../lib/php/validaMarca.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGUETE.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $marca = recuperaTexto("marca");
 $material = recuperaTexto("material");
 $nombre = validaNombre($nombre);
 $marca = validaMarca($marca);
 $material = validaMaterial($material);

 

 update(
  pdo: Bd::pdo(),
  table: JUGUETE,
  set: [JUE_NOMBRE => $nombre, JUE_MARCA => $marca, JUE_MATERIAL => $material],
  where: [JUE_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "marca" => ["value" => $marca],
  "material" => ["value" => $material],
 ]);
});
