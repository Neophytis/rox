<?php

namespace App\Form\CustomDataClass;

class MessageIndexRequest
{
    /** @var array */
    private $messages;

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function getMessages()
    {
        return $this->messages;
    }
}
