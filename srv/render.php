<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    // Lista de personas con nombres
    $lista = [
        [
            "nombre" => "Lizet Garduno"
        ],
        [
            "nombre" => "Luis Izquierdo"
        ],
        [
            "nombre" => "Brandon Hernandez"
        ],
        [
            "nombre" => "Yanitzin Martinez"
        ],
        [
            "nombre" => "Edgar Ortiz"
        ]
    ];

    $chistes = [
        "Lizet Garduno" => "¿Cuál es el colmo de Batman? Que le Robin.",
        "Luis Izquierdo" => "¿Qué tiene Darth Vader en la nevera? Helado Oscuro.",
        "Brandon Hernandez" => "¿Cómo se llama el campeón de buceo japonés? Tokofondo.",
        "Yanitzin Martinez" => "Sí los zombies se deshacen con el paso del tiempo ¿zombiodegradables?",
        "Edgar Ortiz" => "¿Cómo se dice disparo en árabe? Ahí-va-la-bala."
    ];

    // Genera el código HTML de la lista con estilo Material Design.
    $render = "";
    foreach ($lista as $modelo) {
        // Codifica el nombre para evitar inyección de código
        $nombre = htmlentities($modelo["nombre"]);
        
        // Busca el chiste correspondiente al nombre
        $chiste = isset($chistes[$nombre]) ? htmlentities($chistes[$nombre]) : "Chiste no disponible.";
        
        // Crea los elementos HTML con clases MD
        $render .=
        "<li class='md-two-line'>
            <span class='headline'>{$nombre}</span>
            <span class='supporting'>{$chiste}</span>
         </li>";
    }

    // Devuelve el HTML generado en formato JSON
    devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {
    // Manejo de errores
    devuelveErrorInterno($error);
}
