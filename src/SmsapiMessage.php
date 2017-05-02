<?php

namespace NotificationChannels\Smsapi;

use NotificationChannels\Smsapi\Exceptions\ExceptionFactory;

abstract class SmsapiMessage
{
    /**
     * @internal
     * @var array
     */
    public $data = [];

    /**
     * @param  string|string[] $to
     * @return self
     */
    public function to($to)
    {
        ExceptionFactory::assertArgumentTypes(1, __METHOD__, ['string', 'array'], $to);
        $this->data['to'] = $to;

        return $this;
    }

    /**
     * @param  string $group
     * @return self
     */
    public function group($group)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $group);
        $this->data['group'] = $group;

        return $this;
    }

    /**
     * @param  int|string $date
     * @return self
     */
    public function date($date)
    {
        ExceptionFactory::assertArgumentTypes(1, __METHOD__, ['integer', 'string'], $date);
        $this->data['date'] = $date;

        return $this;
    }

    /**
     * @param  string $notifyUrl
     * @return self
     */
    public function notifyUrl($notifyUrl)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $notifyUrl);
        $this->data['notify_url'] = $notifyUrl;

        return $this;
    }

    /**
     * @param  string $partner
     * @return self
     */
    public function partner($partner)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $partner);
        $this->data['partner'] = $partner;

        return $this;
    }

    /**
     * @param  bool $test
     * @return self
     */
    public function test($test = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $test);
        $this->data['test'] = $test;

        return $this;
    }
}
