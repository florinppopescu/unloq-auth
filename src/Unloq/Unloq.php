<?php
namespace Unloq;

use Unloq\Api\Base;
use Unloq\Api\Contracts;

/**
 * Class Unloq
 *
 * @package Unloq
 * @version 1.0.0
 * @author Florin Popescu florin@unloq.io
 * @copyright 2017 © UNLOQ Systems LTD.
 */
class Unloq extends Base {
    public function __construct($apiKey = null)
    {
        parent::__construct();

        $this->apiKey = $apiKey;
    }

    public function isApiKeyValid()
    {
    }
    /************************ APPROVALS *************************/
    public function authenticate($payload)
    {
    }

    public function authorize($payload)
    {
    }

    public function encrypt($payload)
    {
    }

    public function getApprovals($id = null)
    {

    }

    /************************ ENROLLMENT *************************/
    public function isEnrolled($payload)
    {
        return $this->execute('GET', 'enrolled?email=' . $payload->getEmail(), $payload);
    }

    public function enroll($payload)
    {
        return $this->execute('POST', 'enroll', $payload);
    }

    public function deactivate($payload)
    {
        return $this->execute('POST', 'deactivate', $payload);
    }

}