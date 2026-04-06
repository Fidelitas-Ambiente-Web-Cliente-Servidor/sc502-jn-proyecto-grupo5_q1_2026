<?php

class Api {
    private $response;

    public function __construct()
    {
        $this->response = [
            'status' => null,
            'code' => null,
            'message' => null,
            'redirect' => null
        ];
    }

    public function setResponseGeneral($status,$code,$message,$redirect) {
        $this->response['status'] = $status;
        $this->response['code'] = $code;
        $this->response['message'] = $message;
        $this->response['redirect'] = $redirect;
    }
}