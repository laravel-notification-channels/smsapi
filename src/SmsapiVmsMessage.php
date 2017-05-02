<?php

namespace NotificationChannels\Smsapi;

use NotificationChannels\Smsapi\Exceptions\ExceptionFactory;

class SmsapiVmsMessage extends SmsapiMessage
{
    /**
     * @param  string $file
     * @return self
     */
    public function file($file)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $file);
        $this->data['file'] = $file;

        return $this;
    }

    /**
     * @param  string $tts
     * @return self
     */
    public function tts($tts)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $tts);
        $this->data['tts'] = $tts;

        return $this;
    }

    /**
     * @param  string $ttsLector
     * @return self
     */
    public function ttsLector($ttsLector)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $ttsLector);
        $this->data['tts_lector'] = $ttsLector;

        return $this;
    }

    /**
     * @param  string $from
     * @return self
     */
    public function from($from)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $from);
        $this->data['from'] = $from;

        return $this;
    }

    /**
     * @param  int $tries
     * @return self
     */
    public function tries($tries)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'integer', $tries);
        $this->data['tries'] = $tries;

        return $this;
    }

    /**
     * @param  int $interval
     * @return self
     */
    public function interval($interval)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'integer', $interval);
        $this->data['interval'] = $interval;

        return $this;
    }

    /**
     * @param  bool $skipGsm
     * @return self
     */
    public function skipGsm($skipGsm = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $skipGsm);
        $this->data['skip_gsm'] = $skipGsm;

        return $this;
    }
}
