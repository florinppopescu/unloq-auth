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

    public function setPayload($payload)
    {
        if(is_object($payload)) {
            $this->payload = [
                'json' => $payload->toJson(),
            ];

            if ($payload->authorised)
                $this->payload['headers'] = ['Authorization' => 'Bearer ' . UNLOQ_API_KEY];
        }
    }
}