<?php
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGUETE.php";

ejecutaServicio(function () {
    $lista = select(pdo: Bd::pdo(), from: JUGUETE, orderBy: JUE_NOMBRE);

    // Inicia la lista de descripción con clases de Bootstrap
    $render = "<dl class='row'>";

    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[JUE_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[JUE_NOMBRE]);
        $marca = htmlentities($modelo[JUE_MARCA]);
        $material = htmlentities($modelo[JUE_MATERIAL]);

        $render .= "
            <div class='col-12 mb-4 p-3 border rounded shadow-sm' style='border-color: #1e90ff;'>
                <dt style='font-size: 1.25rem; font-weight: 600; color: #1e90ff;'>
                    <a href='modifica.html?id=$id' style='text-decoration: none; color: #1e90ff;'>$nombre</a>
                </dt>
                <dd style='color: #1e90ff; margin-bottom: 0.5rem;'>
                    <a href='modifica.html?id=$id' style='text-decoration: none; color: #1e90ff;'>$marca, $material</a>
                </dd>
                <button class='btn w-100' style='background-color: #add8e6; border: 2px solid #1e90ff; color: #1e90ff;' disabled>
                    <i class='fas fa-spinner fa-spin'></i> 
                </button>
            </div>";
    }

    $render .= "</dl>";

    devuelveJson(["tabla" => ["innerHTML" => $render]]);
});
