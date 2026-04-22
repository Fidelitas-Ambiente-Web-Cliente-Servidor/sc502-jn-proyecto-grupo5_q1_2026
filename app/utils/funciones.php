<?php

function obtenerJsonDeJs() {
$json = file_get_contents('php://input');
$datos = json_decode($json,true);
return $datos;
}

function enviarRespuestJson($datosResponse) {
    if (ob_get_length()) ob_clean();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($datosResponse);
    exit;
}

function cuerpoResponse($status,$code,$message,$data) {
    $response = [
        "status" => $status,
        "code" => $code,
        "message" => $message,
        "url" => $_GET,
        "data" => $data
    ];
    return $response;
}