<?php
function subirACloudinary($archivoTemporal) {
    $cloudName = "tu_cloud_name";
    $uploadPreset = "proyecto_uni";

    $url = "https://api.cloudinary.com/v1_1/" . $cloudName . "/image/upload";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'file' => new CURLFile($archivoTemporal),
        'upload_preset' => $uploadPreset
    ]);

    $respuesta = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($respuesta, true);
    return isset($json['secure_url']) ? $json['secure_url'] : null;
}