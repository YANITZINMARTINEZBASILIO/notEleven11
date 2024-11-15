<?php

header('Content-Type: application/json'); // Asegúrate de que el tipo de contenido sea JSON

// Manejo de errores en PHP
try {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];

        $chistes = [
            "lys" => "¿Cuál es el colmo de Batman? Que le Robin. 🤡🤡🤡",
            "luis" => "¿Qué tiene Darth Vader en la nevera? Helado Oscuro. 🤡🤡🤡",
            "bran" => "¿Cómo se llama el campeón de buceo japonés? Tokofondo. 🤡🤡🤡",
            "yani" => "Si los zombies se deshacen con el paso del tiempo, ¿zombiodegradables? 🤡🤡🤡",
            "edgar" => "¿Cómo se dice disparo en árabe? Ahí-va-la-bala. 🤡🤡🤡"
        ];

        if (array_key_exists($nombre, $chistes)) {
            $chiste = $chistes[$nombre];
        } else {
            $chiste = "No hay chistes.";
        }

        // Responder con JSON
        echo json_encode(["chiste" => $chiste]);
    } else {
        // Si no se envió el nombre
        echo json_encode(["error" => "No se envió ningún nombre."]);
    }
} catch (Exception $e) {
    // En caso de error, responder con el error en JSON
    echo json_encode(["error" => "Ocurrió un error en el servidor.", "details" => $e->getMessage()]);
}
?>
