<?php
namespace Unloq\Api\Contracts;

use Unloq\Api\Common\UnloqModel;

/**
 * Class Enroll
 *
 * @package Unloq\Api\Contracts
 *
 * @property string email                               - Required
 * @property string name                                - Optional
 */
class Encryption extends UnloqModel {
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
}