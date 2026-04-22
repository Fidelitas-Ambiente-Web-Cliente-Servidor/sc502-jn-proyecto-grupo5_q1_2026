<?php
function subirACloudinary($archivoTemporal) {
    $cloudName = "dvnzgjayg";
    $uploadPreset = "proyecto_ambiente_web";

    $url = "https://api.cloudinary.com/v1_1/" . $cloudName . "/image/upload";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'file' => new CURLFile($archivoTemporal),
        'upload_preset' => $uploadPreset
    ]);

    $respuesta = curl_exec($ch);
    $errorNum = curl_errno($ch);
    $errorMsg = curl_error($ch);
    
    if ($errorNum) {
        return "Error de conexión (cURL): " . $errorMsg;
    }

    $json = json_decode($respuesta, true);
    
    if (isset($json['error'])) {
        return "Error de Cloudinary: " . $json['error']['message'];
    }

    return isset($json['secure_url']) ? $json['secure_url'] : null;
}
