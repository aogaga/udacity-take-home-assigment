<?php


namespace App\Infrastructure;


interface ResponseBuilderServiceInterface
{
    public function respondWithNotFound($message, $statusCode);
    public function respondWithSuccess($data, $statusCode);
    public function respondWithError($message, $statusCode);

}
