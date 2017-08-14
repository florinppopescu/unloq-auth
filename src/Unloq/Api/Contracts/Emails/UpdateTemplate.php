<?php
namespace Unloq\Api\Contracts\Emails;

use Unloq\Api\Common\UnloqModel;

/**
 * Class UpdateTemplate
 *
 * @package Unloq\Api\Contracts
 *
 * @property string subject                             - Required
 * @property string content                             - Required
 */
class UpdateTemplate extends UnloqModel
{
    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}