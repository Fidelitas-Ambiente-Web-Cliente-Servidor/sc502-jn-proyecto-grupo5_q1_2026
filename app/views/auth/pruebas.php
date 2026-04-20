<?php

$clave = '$2y$10$IGLFMwD4aXkAxTWf/GZ/SOYNIiPs9NSskIHnWfUWOHW42Ww7skNLK';
$clavenueva = 'prueba123';
$claveEncriptada = password_hash($clavenueva, PASSWORD_DEFAULT);
echo($clave);
echo("<br/>");
echo($claveEncriptada);

