<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaMaterial.php";
require_once __DIR__ . "/../lib/php/validaMarca.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGUETE.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $marca = recuperaTexto("marca");
 $material = recuperaTexto("material");
 $nombre = validaNombre($nombre);
 $marca = validaMarca( $marca);
 $material = validaMaterial($material);


 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: JUGUETE, values: [JUE_NOMBRE => $nombre, JUE_MARCA => $marca, JUE_MATERIAL => $material]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/juguete.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "marca" => ["value" => $marca],
  "material" => ["value" => $material],
 ]);
});
