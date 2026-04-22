<?php

$contrasemn = 'Prueba123';
$contrasemnHash = password_hash($contrasemn, PASSWORD_BCRYPT);

echo($contrasemnHash);

