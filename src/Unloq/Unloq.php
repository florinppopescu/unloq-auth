<?php
namespace Unloq;

use GuzzleHttp\Client;

/**
 * Class Unloq
 *
 * @package Unloq
 * @version 1.0.0
 * @author Florin Popescu florin@unloq.io
 * @copyright 2017 © UNLOQ Systems LTD.
 */
class Unloq {

    /**
     * @var string|$url Main API endpoint. Can be overwritten
     */
    protected $url = 'https://api.unloq.io/v1';
    /**
     * @var object|Client GuzzleHttp Client for Http requests
     */
    protected $client;

    public function __construct($apiKey = null, $cmsEndpoint = false)
    {
        $this->client = new Client();

        $this->apiKey = $apiKey;

        if($cmsEndpoint !== false)
            $this->url = 'https://cms.unloq.io/v1';

    }

}