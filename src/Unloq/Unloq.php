<?php
namespace Unloq;

use Unloq\Api\Base;
use Unloq\Api\Contracts as UnloqContracts;

/**
 * Class Unloq
 *
 * @package Unloq
 * @version 1.0.0
 * @author Florin Popescu florin@unloq.io
 * @copyright 2017 © UNLOQ Systems LTD.
 */
class Unloq extends Base {

    /**
     * Unloq constructor.
     *
     * @param null $apiKey
     */
    public function __construct($apiKey = null)
    {
        parent::__construct();

        $this->apiKey = $apiKey;
    }

    /************************ APPROVALS *************************/

    /**
     * @param Api\Contracts\Approval\Authenticate $payload
     *
     * @return object
     */
    public function authenticate(UnloqContracts\Approval\Authenticate $payload)
    {
        return $this->execute('POST', 'authenticate', $payload);
    }

    public function authorize(UnloqContracts\Approval\Authorize $payload)
    {
        return $this->execute('POST', 'authorize/' . $payload->getCode(), $payload);
    }

    public function encrypt(UnloqContracts\Approval\Encryption $payload)
    {
        return $this->execute('POST', 'encryption/user', $payload);
    }

    public function getApprovals($id = null)
    {
        $action = isset($id) ? 'approvals/' . $id : 'approvals';
        
        return $this->execute('POST', $action);
    }

    /************************ ENROLLMENT *************************/

    /**
     * @param Api\Contracts\Enrollment\Enroll $payload
     *
     * @return object
     */
    public function isEnrolled(UnloqContracts\Enrollment\Enroll $payload)
    {
        return $this->execute('GET', 'enrolled?email=' . $payload->getEmail(), $payload);
    }

    /**
     * @param Api\Contracts\Enrollment\Enroll $payload
     *
     * @return object
     */
    public function enroll(UnloqContracts\Enrollment\Enroll $payload)
    {
        return $this->execute('POST', 'enroll', $payload);
    }

    /**
     * @param Api\Contracts\Enrollment\Enroll $payload
     *
     * @return object
     */
    public function deactivate(UnloqContracts\Enrollment\Enroll $payload)
    {
        return $this->execute('POST', 'deactivate', $payload);
    }

}