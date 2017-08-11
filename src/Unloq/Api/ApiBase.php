<?php
namespace Unloq\Api;

use GuzzleHttp\Client;

class ApiBase
{
    public $payload;
    public $client;
    public $verb;
    public $endpoint;
    public $clientErrorCode;
    public $clientErrorMessage;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function execute()
    {
        if(is_object($this->payload) && method_exists($this->payload, 'toJson'))
            $this->payload = $this->payload->toJson();


        try {
            $res = $this->client->request($this->verb, $this->endpoint, $this->payload);

            if($res->getStatusCode() === 200){
                $response = $res->getBody()->getContents();
                return json_decode($response);
            } else {
                return false;
            }

        } catch (\GuzzleHttp\Exception\ClientException $e){
            $this->clientErrorCode = $e->getCode();
            $this->clientErrorMessage = $e->getMessage();
            return false;
        } catch (InvalidArgumentException $e){
            return false;
        } catch (\GuzzleHttp\Exception\ServerException $e){
            return false;
        }
    }
}