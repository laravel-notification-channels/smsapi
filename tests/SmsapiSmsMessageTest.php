<?php

namespace NotificationChannels\Smsapi\Tests;

use InvalidArgumentException;
use NotificationChannels\Smsapi\SmsapiSmsMessage;

/**
 * @internal
 * @coversDefaultClass \NotificationChannels\Smsapi\SmsapiSmsMessage
 */
class SmsapiSmsMessageTest extends SmsapiMessageTest
{
    public function setUp()
    {
        parent::setUp();
        $this->message = new SmsapiSmsMessage();
    }

    /**
     * @test
     * @covers ::__construct
     */
    public function set_content_by_constructor()
    {
        $message = new SmsapiSmsMessage('Text');
        $this->assertEquals('Text', $message->data['content']);
    }

    /**
     * @test
     * @covers ::content
     */
    public function set_content()
    {
        $this->message->content('Text');
        $this->assertEquals('Text', $this->message->data['content']);
    }

    /**
     * @test
     * @covers ::content
     * @dataProvider provideNotString
     *
     * @param mixed $content
     */
    public function set_wrong_content($content)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->content($content);
    }

    /**
     * @test
     * @covers ::template
     */
    public function set_template()
    {
        $this->message->template('Template');
        $this->assertEquals('Template', $this->message->data['template']);
    }

    /**
     * @test
     * @covers ::template
     * @dataProvider provideNotString
     *
     * @param mixed $template
     */
    public function set_wrong_template($template)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->template($template);
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
     * @covers ::fast
     * @dataProvider provideBool
     *
     * @param bool $fast
     */
    public function set_fast($fast)
    {
        $this->message->fast($fast);
        $this->assertEquals($fast, $this->message->data['fast']);
    }

    /**
     * @test
     * @covers ::fast
     * @dataProvider provideNotBool
     *
     * @param mixed $fast
     */
    public function set_wrong_fast($fast)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->fast($fast);
    }

    /**
     * @test
     * @covers ::flash
     * @dataProvider provideBool
     *
     * @param bool $flash
     */
    public function set_flash($flash)
    {
        $this->message->flash($flash);
        $this->assertEquals($flash, $this->message->data['flash']);
    }

    /**
     * @test
     * @covers ::flash
     * @dataProvider provideNotBool
     *
     * @param mixed $flash
     */
    public function set_wrong_flash($flash)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->flash($flash);
    }

    /**
     * @test
     * @covers ::encoding
     */
    public function set_encoding()
    {
        $this->message->encoding('utf-8');
        $this->assertEquals('utf-8', $this->message->data['encoding']);
    }

    /**
     * @test
     * @covers ::encoding
     * @dataProvider provideNotString
     *
     * @param mixed $encoding
     */
    public function set_wrong_encoding($encoding)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->encoding($encoding);
    }

    /**
     * @test
     * @covers ::normalize
     * @dataProvider provideBool
     *
     * @param bool $normalize
     */
    public function set_normalize($normalize)
    {
        $this->message->normalize($normalize);
        $this->assertEquals($normalize, $this->message->data['normalize']);
    }

    /**
     * @test
     * @covers ::normalize
     * @dataProvider provideNotBool
     *
     * @param mixed $normalize
     */
    public function set_wrong_normalize($normalize)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->normalize($normalize);
    }

    /**
     * @test
     * @covers ::nounicode
     * @dataProvider provideBool
     *
     * @param bool $nounicode
     */
    public function set_nounicode($nounicode)
    {
        $this->message->nounicode($nounicode);
        $this->assertEquals($nounicode, $this->message->data['nounicode']);
    }

    /**
     * @test
     * @covers ::nounicode
     * @dataProvider provideNotBool
     *
     * @param mixed $nounicode
     */
    public function set_wrong_nounicode($nounicode)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->nounicode($nounicode);
    }

    /**
     * @test
     * @covers ::single
     * @dataProvider provideBool
     *
     * @param bool $single
     */
    public function set_single($single)
    {
        $this->message->single($single);
        $this->assertEquals($single, $this->message->data['single']);
    }

    /**
     * @test
     * @covers ::single
     * @dataProvider provideNotBool
     *
     * @param mixed $single
     */
    public function set_wrong_single($single)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->single($single);
    }
}
