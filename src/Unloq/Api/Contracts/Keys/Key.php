<?php
namespace Unloq\Api\Contracts\Keys;

use Unloq\Api\Common\UnloqModel;

/**
 * Class Key
 *
 * @package Unloq\Api\Contracts
 *
 * @property array scopes                           - Required
 */
class Key extends UnloqModel
{
    /**
     * @return array
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param array $scopes
     *
     * @return $this
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }

}