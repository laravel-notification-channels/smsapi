<?php

namespace NotificationChannels\Smsapi\Tests;

use InvalidArgumentException;
use NotificationChannels\Smsapi\SmsapiVmsMessage;

/**
 * @internal
 * @coversDefaultClass \NotificationChannels\Smsapi\SmsapiVmsMessage
 */
class SmsapiVmsMessageTest extends SmsapiMessageTest
{
    public function setUp()
    {
        parent::setUp();
        $this->message = new SmsapiVmsMessage();
    }

    /**
     * @test
     * @covers ::file
     */
    public function set_file()
    {
        $this->message->file('/file');
        $this->assertEquals('/file', $this->message->data['file']);
    }

    /**
     * @test
     * @covers ::file
     * @dataProvider provideNotString
     *
     * @param mixed $file
     */
    public function set_wrong_file($file)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->file($file);
    }

    /**
     * @test
     * @covers ::tts
     */
    public function set_tts()
    {
        $this->message->tts('Text to speech');
        $this->assertEquals('Text to speech', $this->message->data['tts']);
    }

    /**
     * @test
     * @covers ::tts
     * @dataProvider provideNotString
     *
     * @param mixed $tts
     */
    public function set_wrong_tts($tts)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->tts($tts);
    }

    /**
     * @test
     * @covers ::ttsLector
     */
    public function set_tts_lector()
    {
        $this->message->ttsLector('Agnieszka');
        $this->assertEquals('Agnieszka', $this->message->data['tts_lector']);
    }

    /**
     * @test
     * @covers ::ttsLector
     * @dataProvider provideNotString
     *
     * @param mixed $ttsLector
     */
    public function set_wrong_tts_ector($ttsLector)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->ttsLector($ttsLector);
    }

    /**
     * @test
     * @covers ::from
     */
    public function set_from()
    {
        $this->message->from('Eco');
        $this->assertEquals('Eco', $this->message->data['from']);
    }

    /**
     * @test
     * @covers ::from
     * @dataProvider provideNotString
     *
     * @param mixed $from
     */
    public function set_wrong_from($from)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->from($from);
    }

    /**
     * @test
     * @covers ::tries
     */
    public function set_tries()
    {
        $this->message->tries(3);
        $this->assertEquals(3, $this->message->data['tries']);
    }

    /**
     * @test
     * @covers ::tries
     * @dataProvider provideNotInt
     *
     * @param mixed $tries
     */
    public function set_wrong_tries($tries)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->tries($tries);
    }

    /**
     * @test
     * @covers ::interval
     */
    public function set_interval()
    {
        $this->message->interval(3000);
        $this->assertEquals(3000, $this->message->data['interval']);
    }

    /**
     * @test
     * @covers ::interval
     * @dataProvider provideNotInt
     *
     * @param mixed $interval
     */
    public function set_wrong_interval($interval)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->interval($interval);
    }

    /**
     * @test
     * @covers ::skipGsm
     * @dataProvider provideBool
     *
     * @param bool $skipGsm
     */
    public function set_skip_gsm($skipGsm)
    {
        $this->message->skipGsm($skipGsm);
        $this->assertEquals($skipGsm, $this->message->data['skip_gsm']);
    }

    /**
     * @test
     * @covers ::skipGsm
     * @dataProvider provideNotBool
     *
     * @param mixed $skipGsm
     */
    public function set_wrong_skip_gsm($skipGsm)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->skipGsm($skipGsm);
    }
}
