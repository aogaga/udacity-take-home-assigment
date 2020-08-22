<?php


namespace App\Service;


use App\Infrastructure\ResponseBuilderServiceInterface;

class ResponseBuilderService implements ResponseBuilderServiceInterface
{
    private $statusCode;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode): void
    {
        $this->statusCode = $statusCode;
    }
    public function respondWithNotFound($message, $statusCode)
    {
        $this->setStatusCode($statusCode);
        return response()->json([
            'error'=> $message
        ], $this->getStatusCode());
    }

    public function respondWithSuccess($data, $statusCode){
        $this->setStatusCode($statusCode);
        return response()->json([
            'data'=> $data
        ], $this->getStatusCode());
    }


    public function respondWithError($message, $statusCode)
    {
        $this->setStatusCode($statusCode);
        return response()->json([
            'error'=> $message
        ], $this->getStatusCode());
    }


}
