<?php
namespace Unloq;

use Unloq\Api\ApiBase;

/**
 * Class Unloq
 *
 * @package Unloq
 * @version 1.0.0
 * @author Florin Popescu florin@unloq.io
 * @copyright 2017 © UNLOQ Systems LTD.
 */
class Unloq extends ApiBase {
    public function __construct($payload = null)
    {
        parent::__construct();

        $this->payload = $payload;
    }

    public function isApiKeyValid()
    {
        $this->verb = 'GET';
        $this->endpoint = 'organization';

        return $this->execute();
    }

}