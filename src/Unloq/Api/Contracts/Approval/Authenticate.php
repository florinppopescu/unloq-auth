<?php
namespace Unloq\Api\Contracts;

use Unloq\Api\Common\UnloqModel;

/**
 * Class Authenticate
 *
 * @package Unloq\Api
 *
 * @property string email                               - Required
 * @property string unloq_id                            - Optional
 * @property string("UNLOQ", "OTP", "EMAIL") method     - Required
 * @property string ip                                  - Optional
 * @property integer token                              - Optional
 * @property boolean generate_token                     - Optional
 * @property boolean ask_trusted                        - Optional
 * @property object source_client                       - Optional
 * @property string public_key                          - Optional
 */
class Authenticate extends UnloqModel {
    /**
     * The UNLOQ User e-mail that initiated the authentication process
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->id = $email;

        return $this;
    }

    /**
     *
     * @deprecated Not publicly available
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * The UNLOQ id of the user when email is not available. Default is null.
     *
     * @param string $unloqId
     *
     * @return $this
     */
    public function setUnloqId($unloqId)
    {
        $this->unloq_id = $unloqId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnloqId()
    {
        return $this->unloq_id;
    }

    /**
     * Initiates the authentication request with the specified method.
     * Values are: UNLOQ, EMAIL, OTP
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * The originating IP address that will be displayed on the user's device.
     *
     * @param string $ip
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * The OTP token the user has provided. This is required for subsequent
     * authentication requests, after a user has denied the request.
     *
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Default is true. When set to false, we return the information directly. Only works for UNLOQ/OTP.
     *
     * @param bool $generate_token
     *
     * @return $this
     */
    public function setGenerateToken($generate_token)
    {
        $this->generate_token = $generate_token;

        return $this;
    }

    /**
     *
     * @return bool
     */
    public function isGenerateToken()
    {
        return $this->generate_token;
    }

    /**
     * Default is false
     *
     * @param bool $ask_trusted
     *
     * @return $this
     */
    public function setAskTrusted($ask_trusted)
    {
        $this->ask_trusted = $ask_trusted;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAskTrusted()
    {
        return $this->ask_trusted;
    }

    /**
     * Default is null
     *
     * @param object $source_client
     *
     * @return $this
     */
    public function setSourceClient($source_client)
    {
        $this->source_client = $source_client;

        return $this;
    }

    /**
     * @return object
     */
    public function getSourceClient()
    {
        return $this->source_client;
    }

    /**
     * Default is null
     *
     * @param string $public_key
     *
     * @return $this
     */
    public function setPublicKey($public_key)
    {
        $this->public_key = $public_key;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->public_key;
    }
}