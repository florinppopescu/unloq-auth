<?php
namespace Unloq\Api\Contracts;

use Unloq\Api\Common\UnloqModel;

/**
 * Class Encryption
 *
 * @package Unloq\Api\Contracts
 *
 * @property string unloq_id                            - Optional
 * @property string email                               - Required
 * @property integer message                            - Required
 * @property boolean requester_id                       - Optional
 * @property boolean public_key                         - Optional
 * @property boolean generate_token                     - Optional
 * @property string ip                                  - Optional
 */
class Encryption extends UnloqModel {
    /**
     * @return string
     */
    public function getUnloqId()
    {
        return $this->unloq_id;
    }

    /**
     * @param string $unloq_id
     *
     * @return $this
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
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param int $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRequesterId()
    {
        return $this->requester_id;
    }

    /**
     * @param bool $requester_id
     *
     * @return $this
     */
    public function setRequesterId($requester_id)
    {
        $this->requester_id = $requester_id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPublicKey()
    {
        return $this->public_key;
    }

    /**
     * @param bool $public_key
     *
     * @return $this
     */
    public function setPublicKey($public_key)
    {
        $this->public_key = $public_key;

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
     *
     * @return $this
     */
    public function setGenerateToken($generate_token)
    {
        $this->generate_token = $generate_token;

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
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

}