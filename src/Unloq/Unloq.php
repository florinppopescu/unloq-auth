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

        if(isset($apiKey))
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

        return $this->execute('GET', $action);
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

    /************************ TOKENS *************************/

    /**
     * @param Api\Contracts\Tokens\Token $payload
     *
     * @return object
     */
    public function token(UnloqContracts\Tokens\Token $payload)
    {
        return $this->execute('POST', 'token', $payload);
    }

    /**
     * @param Api\Contracts\Tokens\Session $payload
     *
     * @return object
     */
    public function tokenSession(UnloqContracts\Tokens\Session $payload)
    {
        return $this->execute('POST', 'token/session', $payload);
    }

    /**
     * @param Api\Contracts\Tokens\Device $payload
     *
     * @return object
     */
    public function tokenDevice(UnloqContracts\Tokens\Device $payload)
    {
        return $this->execute('POST', 'token/device', $payload);
    }

    /************************ ACTIONS *************************/

    /**
     * @param Api\Contracts\Actions\Action $payload
     *
     * @return object
     */
    public function createAction(UnloqContracts\Actions\Action $payload)
    {
        return $this->execute('POST', 'actions', $payload);
    }

    /**
     * @param Api\Contracts\Actions\Action $payload
     *
     * @return object
     */
    public function updateAction(UnloqContracts\Actions\Action $payload)
    {
        return $this->execute('PUT', 'actions/' . $payload->getCode(), $payload);
    }

    /**
     * @param null $id
     *
     * @return object
     */
    public function getActions($id = null)
    {
        $action = isset($id) ? 'actions/' . $id : 'actions';

        return $this->execute('GET', $action);
    }

    /**
     * @param $id
     *
     * @return object
     */
    public function deleteAction($id)
    {
        return $this->execute('DELETE', 'actions/' . $id);
    }
}