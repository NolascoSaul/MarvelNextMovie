<?php
    const API_URL = "https://www.whenisthenextmcufilm.com/api";

    // Iniciar una nueva sesión de cURL; cURL handle
    $ch = curl_init(API_URL);
    
    // Recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Deshabilitar la verificación SSL para evitar errores si el certificado no es válido
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
    // Ejecutar la petición y guardamos el resultado
    $result = curl_exec($ch);

    // Transformar el resultado en un JSON
    $data = json_decode($result, true);
    
    // Cerrar la sesión de cURL
    curl_close($ch);

    // $result = file_get_contents(API_URL); Si solo quieres hacer GET de API
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <!-- Pico css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
    <style>
        main{
            display: grid;
            place-content: center;
        }
        
        section{
            display: flex;
            justify-content: center;
            text-align: center;
        }

        hgroup{
            display: flex;
            flex-direction: column;

            text-align: center;
        }
    </style>
</head>
<body>
    <main>
        <section>
            <img 
                src="<?= $data["poster_url"]; ?>" 
                width="300" 
                style= "border-radius: 6px;"
                alt="Poster de <?= $data["title"]; ?> "
            >
        </section>

        <hgroup>
            <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
            <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
            <p>La siguiente película es <?= $data["following_production"]["title"]; ?></p>
        </hgroup>
    </main>
</body>
</html>