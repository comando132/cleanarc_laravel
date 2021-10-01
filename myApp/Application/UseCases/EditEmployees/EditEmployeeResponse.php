<?php

namespace MyApp\Application\UseCases\EditEmployees;

use MyApp\Application\UseCases\Response;

class EditEmployeeResponse extends Response{
    public function response(bool $success, ?string $message, $data = null): void {
        $response = ($success) ? parent::RESPONSE_OK : parent::RESPONSE_FAIL;
        $this->setResponse($response);
        if (!empty($message)) {
            $this->setMessage($message);
        }
        if (!empty($data)) {
            $this->setData($data);
        }
    }
}
