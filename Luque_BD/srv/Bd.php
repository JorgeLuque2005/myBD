<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

  // self::$pdo->exec("DROP TABLE IF EXISTS JUGUETE");
//  self::$pdo->exec("DROP TABLE IF EXISTS JUGUETE");
  

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS JUGUETE (
      JUE_ID INTEGER,
      JUE_NOMBRE TEXT NOT NULL,
      JUE_MARCA TEXT NOT NULL,
      JUE_MATERIAL TEXT NOT NULL,

      CONSTRAINT JUE_PK
       PRIMARY KEY(JUE_ID),

      CONSTRAINT JUE_NOM_NV
       CHECK(LENGTH(JUE_NOMBRE) > 0),
       
      CONSTRAINT JUE_MAR_NV
       CHECK(LENGTH(JUE_MARCA) > 0),
       
      CONSTRAINT JUE_MAT_NV
       CHECK(LENGTH(JUE_MATERIAL) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
