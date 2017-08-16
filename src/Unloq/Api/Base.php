<?php
namespace Unloq\Api;

use GuzzleHttp\Client;
use Unloq\Constants\Environment;

class Base
{
    protected $client;

    public $apiKey;
    public $payload;
    public $verb;
    public $endpoint;
    public $clientErrorCode;
    public $clientErrorMessage;

    public function __construct()
    {
        $this->client = new Client();
        $this->endpoint = Environment::ENDPOINT_PROD;
    }

    public function execute($verb, $action, $payload = null)
    {
        try {
            $res = $this->client->request($verb, $this->endpoint . $action, $this->setData($payload));

            if($res->getStatusCode() === 200){
                return [
                    'status' => 200,
                    'response' => json_decode($res->getBody()->getContents())->result,
                ];
            }

        } catch (\GuzzleHttp\Exception\ClientException $e){
            return [
                'status' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        } catch (\GuzzleHttp\Exception\ServerException $e){
            return [
                'status' => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    public function setData($payload)
    {
        $data = [];

        if(is_object($payload)) {
            $data = [
                'json' => (array) $payload,
            ];

            // TODO : implement exception for when authorised is true and api key is not set
            if ($payload->authorised && isset($this->apiKey))
                $data['headers'] = ['Authorization' => 'Bearer ' . $this->apiKey];
        }

        return $data;
    }
}