<?php

namespace NotificationChannels\Smsapi\Tests;

use InvalidArgumentException;
use NotificationChannels\Smsapi\SmsapiMmsMessage;

/**
 * @internal
 * @coversDefaultClass \NotificationChannels\Smsapi\SmsapiMmsMessage
 */
class SmsapiMmsMessageTest extends SmsapiMessageTest
{
    public function setUp()
    {
        parent::setUp();
        $this->message = new SmsapiMmsMessage();
    }

    /**
     * @test
     * @covers ::subject
     */
    public function set_subject()
    {
        $this->message->subject('Subject');
        $this->assertEquals('Subject', $this->message->data['subject']);
    }

    /**
     * @test
     * @covers ::subject
     * @dataProvider provideNotString
     *
     * @param mixed $subject
     */
    public function set_wrong_subject($subject)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->subject($subject);
    }

    /**
     * @test
     * @covers ::smil
     */
    public function set_smil()
    {
        $this->message->smil('<smil></smil>');
        $this->assertEquals('<smil></smil>', $this->message->data['smil']);
    }

    /**
     * @test
     * @covers ::smil
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
