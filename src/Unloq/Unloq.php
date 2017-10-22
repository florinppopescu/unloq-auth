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

    /************************ APIKEYS *************************/

    /**
     * @param UnloqContracts\ApiKeys\ApiKey $payload
     *
     * @return object
     */
    public function createApiKey(UnloqContracts\ApiKeys\ApiKey $payload)
    {
        return $this->execute('POST', 'api-keys', $payload);
    }

    /**
     * @param null $id
     *
     * @return object
     */
    public function getApiKeys($id = null)
    {
        $action = isset($id) ? 'api-keys/' . $id : 'api-keys';

        return $this->execute('GET', $action);
    }

    /**
     * @param null $id
     *
     * @return object
     */
    public function getApiKey($id)
    {
        return $this->execute('GET', 'api-keys/' . $id);
    }

    /**
     * @param null $id
     *
     * @return object
     */
    public function getApiKeyLogs($id)
    {
        return $this->execute('GET', 'api-keys/' . $id . '/logs');
    }

    /**
     * @param $id
     *
     * @return object
     */
    public function deleteApiKeys($id)
    {
        return $this->execute('DELETE', 'api-keys/' . $id);
    }

    /************************ EMAILS *************************/

    /**
     * @param UnloqContracts\Emails\Email $payload
     *
     * @return object
     */
    public function setEmailSettings(UnloqContracts\Emails\Email $payload)
    {
        return $this->execute('POST', 'custom/emails', $payload);
    }

    /**
     * @return object
     */
    public function getEmailSettings()
    {
        return $this->execute('GET', 'custom/emails');
    }

    /**
     * @return object
     */
    public function verifyEmailSettings()
    {
        return $this->execute('POST', 'custom/emails/verify');
    }

    /**
     * @return object
     */
    public function deleteEmailSettings()
    {
        return $this->execute('DELETE', 'custom/emails');
    }

    /************************ EMAIL TEMPLATES *************************/

    /**
     * @param UnloqContracts\Emails\Template $payload
     *
     * @return object
     */
    public function updateEmailTemplate(UnloqContracts\Emails\Template $payload)
    {
        return $this->execute('PUT', 'custom/emails/templates/' . $payload->getCode(), $payload);
    }

    /**
     * @param string $id
     *
     * @return object
     */
    public function getEmailTemplates($id = null)
    {
        $action = isset($id) ? 'custom/emails/templates/' . $id : 'custom/emails/templates';

        return $this->execute('GET', $action);
    }

    /**
     * @param string $id
     *
     * @return object
     */
    public function deleteEmailTemplate($id)
    {
        return $this->execute('DELETE', 'custom/emails/templates/' . $id);
    }
}