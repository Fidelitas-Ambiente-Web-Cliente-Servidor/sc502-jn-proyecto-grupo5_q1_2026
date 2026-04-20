function subirACloudinary($archivoTemporal) {
// REEMPLAZA ESTOS DATOS
$cloudName = "tu_cloud_name";
$uploadPreset = "proyecto_uni";

$url = "https://cloudinary.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// Enviamos el archivo y el preset
curl_setopt($ch, CURLOPT_POSTFIELDS, [
'file' => new CURLFile($archivoTemporal),
'upload_preset' => $uploadPreset
]);

$respuesta = curl_exec($ch);
curl_close($ch);

$json = json_decode($respuesta, true);

// Si todo sale bien, retornamos la URL segura
return isset($json['secure_url']) ? $json['secure_url'] : null;
}

// 1. Recibes tus datos de texto normales
$this->datosEnviados = $_POST;

// 2. Procesas la imagen si existe
if (isset($_FILES['imagen_producto'])) {
$urlImagen = subirACloudinary($_FILES['imagen_producto']['tmp_name']);

if ($urlImagen) {
$this->datosEnviados['url_final'] = $urlImagen;
// Ahora ya puedes hacer tu INSERT INTO productos ... con la URL
}
}