<?php
namespace Unloq\Api\Contracts\Enrollment;

use Unloq\Common\UnloqModel;

/**
 * Class Enroll
 *
 * @package Unloq\Api\Contracts
 *
 * @property string email                               - Required
 * @property string name                                - Optional
 */
class Enroll extends UnloqModel {
    /**
     * @var bool
     */
    public $authorised = true;

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