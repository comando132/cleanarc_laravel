<?php
namespace MyApp\Application\UseCases;

class Response {
    public const RESPONSE = [0,1];
    public const RESPONSE_FAIL = 0;
    public const RESPONSE_OK = 1;

    protected $response;
    protected $message;
    protected $data;

    public function __construct() {
        $this->setResponse(self::RESPONSE[0]);
        $this->setMessage();
        $this->setData();
    }

    public function setResponse(int $response): void {
        $this->response = $response;
    }

    public function setMessage(string $message = null): void {
        $this->message = $message;
    }

    public function setData($data = []): void {
        $this->data = $data;
    }

    /**
     * @param array $array arreglo de response, data y message
     */
    public function setArrayResponse(array $array): void {
        if (isset($array['response'])) {
            $this->setResponse($array['response']);
        }
        if (isset($array['message'])) {
            $this->setMessage($array['message']);
        }
        if (isset($array['data'])) {
            $this->setData($array['data']);
        }

    }

    /**
     * @return array regresa el response en forma de arreglo
     *  [
     *  'response' =>int  response,
     *  'message' => string message,
     *  'data' => mixed data
     *  ];
     */
    public function getArrayResponse() {
        return [
            'response' => $this->response,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
