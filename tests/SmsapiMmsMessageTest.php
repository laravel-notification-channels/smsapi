<?php

namespace NotificationChannels\Smsapi\Tests;

use InvalidArgumentException;
use NotificationChannels\Smsapi\SmsapiMmsMessage;

/**
 * @internal
 */
class SmsapiMmsMessageTest extends SmsapiMessageTest
{
    public function setUp()
    {
        parent::setUp();
        $this->message = new SmsapiMmsMessage();
    }

    /** @test */
    public function set_subject()
    {
        $this->message->subject('Subject');
        $this->assertEquals('Subject', $this->message->data['subject']);
    }

    /**
     * @test
     * @dataProvider provideNotString
     *
     * @param mixed $subject
     */
    public function set_wrong_subject($subject)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->subject($subject);
    }

    /** @test */
    public function set_smil()
    {
        $this->message->smil('<smil></smil>');
        $this->assertEquals('<smil></smil>', $this->message->data['smil']);
    }

    /**
     * @test
     * @dataProvider provideNotString
     *
     * @param mixed $smil
     */
    public function set_wrong_smil($smil)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->smil($smil);
    }
}
