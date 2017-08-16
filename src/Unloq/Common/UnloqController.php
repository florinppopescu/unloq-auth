<?php

namespace Unloq\Api\Common;


class UnloqModel
{
    /**
     * Returns object JSON representation
     *
     * @param int $options http://php.net/manual/en/json.constants.php
     * @return string
     */
    public function toJSON($options = 0)
    {
        // Because of PHP Version 5.3, we cannot use JSON_UNESCAPED_SLASHES option
        // Instead we would use the str_replace command for now.
        // TODO: Replace this code with return json_encode($this->toArray(), $options | 64); once we support PHP >= 5.4
        if (version_compare(phpversion(), '5.4.0', '>=') === true) {
            return json_encode($this->toArray(), $options | 64);
        }
        return str_replace('\\/', '/', json_encode($this->toArray(), $options));
    }
}