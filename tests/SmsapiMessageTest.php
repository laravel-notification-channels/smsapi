<?php

namespace NotificationChannels\Smsapi\Tests;

use stdClass;
use InvalidArgumentException;
use NotificationChannels\Smsapi\SmsapiMessage;

/**
 * @internal
 * @coversDefaultClass \NotificationChannels\Smsapi\SmsapiMessage
 */
abstract class SmsapiMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SmsapiMessage
     */
    protected $message;

    /**
     * @return array
     */
    public function provideTo()
    {
        return [
            'one' => ['48100200300'],
            'bulk' => [['48100200300', '500000000']],
        ];
    }

    /**
     * @return array
     */
    public function provideWrongTo()
    {
        return [
            'boolean' => [true],
            'integer' => [48100200300],
            'object' => [new stdClass()],
        ];
    }

    /**
     * @return array
     */
    public function provideWrongDate()
    {
        return [
            'boolean' => [true],
            'object' => [new stdClass()],
            'array' => [[]],
        ];
    }

    /**
     * @return array
     */
    public function provideNotString()
    {
        return [
            'boolean' => [true],
            'integer' => [48100200300],
            'object' => [new stdClass()],
            'array' => [[]],
        ];
    }

    /**
     * @return array
     */
    public function provideBool()
    {
        return [
            'true' => [true],
            'false' => [false],
        ];
    }

    /**
     * @return array
     */
    public function provideNotBool()
    {
        return [
            'integer' => [48100200300],
            'string' => ['48100200300'],
            'object' => [new stdClass()],
            'array' => [[]],
        ];
    }

    /**
     * @return array
     */
    public function provideNotInt()
    {
        return [
            'boolean' => [true],
            'string' => ['48100200300'],
            'object' => [new stdClass()],
            'array' => [[]],
        ];
    }

    /**
     * @test
     * @covers ::to
     * @dataProvider provideTo
     *
     * @param string|string[] $to
     */
    public function set_to($to)
    {
        $this->message->to($to);
        $this->assertEquals($to, $this->message->data['to']);
    }

    /**
     * @test
     * @covers ::to
     * @dataProvider provideWrongTo
     *
     * @param mixed $to
     */
    public function set_wrong_to($to)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->to($to);
    }

    /**
     * @test
     * @covers ::group
     */
    public function set_group()
    {
        $this->message->group('Test');
        $this->assertEquals('Test', $this->message->data['group']);
    }

    /**
     * @test
     * @covers ::group
     * @dataProvider provideNotString
     *
     * @param mixed $group
     */
    public function set_wrong_group($group)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->group($group);
    }

    /**
     * @test
     * @covers ::date
     */
    public function set_date1()
    {
        $this->message->date(1287734110);
        $this->assertEquals(1287734110, $this->message->data['date']);
    }

    /**
     * @test
     * @covers ::date
     */
    public function set_date2()
    {
        $this->message->date('2012-05-10T08:40:27+00:00');
        $this->assertEquals('2012-05-10T08:40:27+00:00', $this->message->data['date']);
    }

    /**
     * @test
     * @covers ::date
     * @dataProvider provideWrongDate
     *
     * @param mixed $date
     */
    public function set_wrong_date($date)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->date($date);
    }

    /**
     * @test
     * @covers ::notifyUrl
     */
    public function set_notify_url()
    {
        $this->message->notifyUrl('http://example.com/');
        $this->assertEquals('http://example.com/', $this->message->data['notify_url']);
    }

    /**
     * @test
     * covers ::notifyUrl
     * @dataProvider provideNotString
     *
     * @param mixed $notifyUrl
     */
    public function set_wrong_notify_url($notifyUrl)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->notifyUrl($notifyUrl);
    }

    /**
     * @test
     * @covers ::partner
     */
    public function set_partner()
    {
        $this->message->partner('Test');
        $this->assertEquals('Test', $this->message->data['partner']);
    }

    /**
     * @test
     * @covers ::partner
     * @dataProvider provideNotString
     *
     * @param mixed $partner
     */
    public function set_wrong_partner($partner)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->partner($partner);
    }

    /**
     * @test
     * @covers ::test
     * @dataProvider provideBool
     *
     * @param bool $test
     */
    public function set_test($test)
    {
        $this->message->test($test);
        $this->assertEquals($test, $this->message->data['test']);
    }

    /**
     * @test
     * @covers ::test
     */
    public function set_default_test()
    {
        $this->message->test();
        $this->assertEquals(true, $this->message->data['test']);
    }

    /**
     * @test
     * @covers ::test
     * @dataProvider provideNotBool
     *
     * @param mixed $test
     */
    public function set_wrong_test($test)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->message->test($test);
    }
}
