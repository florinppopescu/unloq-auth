<?php
namespace Unloq\Api\Contracts;

use Unloq\Api\Common\UnloqModel;

/**
 * Class Authorise
 *
 * @package Unloq\Api\Contracts
 *
 * @property string code                                - Required
 *
 * @property string unloq_id                            - Optional
 * @property string email                               - Required
 * @property integer reference                          - Required
 * @property string ip                                  - Optional
 * @property boolean generate_token                     - Optional
 */
class Authenticate extends UnloqModel {
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

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
     * @param string $unloq_id
     */
    public function setUnloqId($unloq_id)
    {
        $this->unloq_id = $unloq_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param int $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

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
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return bool
     */
    public function isGenerateToken()
    {
        return $this->generate_token;
    }

    /**
     * @param bool $generate_token
     */
    public function setGenerateToken($generate_token)
    {
        $this->generate_token = $generate_token;

        return $this;
    }

}