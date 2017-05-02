<?php

namespace NotificationChannels\Smsapi;

use NotificationChannels\Smsapi\Exceptions\ExceptionFactory;

class SmsapiMmsMessage extends SmsapiMessage
{
    /**
     * @param  string $subject
     * @return self
     */
    public function subject($subject)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $subject);
        $this->data['subject'] = $subject;

        return $this;
    }

    /**
     * @param  string $smil
     * @return self
     */
    public function smil($smil)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $smil);
        $this->data['smil'] = $smil;

        return $this;
    }
}
