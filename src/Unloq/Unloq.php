<?php
namespace Unloq;

use Unloq\Api\ApiBase;
use Unloq\Api\Contracts;

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

    public function authenticate(Contracts\Approval\Authenticate $payload)
    {
        $this->setPayload($payload);
        $this->endpoint = 'authenticate';
        $this->verb = 'post';

        $this->execute();
    }

    public function authorize(Contracts\Approval\Authorize $payload)
    {

        $this->payload = $payload;
        $this->endpoint = 'authorize';
        $this->verb = 'post';
    }

    public function encrypt(Contracts\Approval\Encryption $payload)
    {
        $this->payload = $payload;
        $this->endpoint = 'encrypt';
        $this->verb = 'post';
    }

    public function getApprovals($id = null)
    {

    }

}