<?php

namespace NotificationChannels\Smsapi;

use NotificationChannels\Smsapi\Exceptions\ExceptionFactory;

class SmsapiSmsMessage extends SmsapiMessage
{
    /**
     * @param string|null $content
     */
    public function __construct($content = null)
    {
        ExceptionFactory::assertArgumentTypes(1, __METHOD__, ['string', 'NULL'], $content);
        if ($content !== null) {
            $this->data['content'] = $content;
        }
    }

    /**
     * @param  string $content
     * @return self
     */
    public function content($content)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $content);
        $this->data['content'] = $content;

        return $this;
    }

    /**
     * @param  string $template
     * @return self
     */
    public function template($template)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $template);
        $this->data['template'] = $template;

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
     * @param  bool $fast
     * @return self
     */
    public function fast($fast = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $fast);
        $this->data['fast'] = $fast;

        return $this;
    }

    /**
     * @param  bool $flash
     * @return self
     */
    public function flash($flash = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $flash);
        $this->data['flash'] = $flash;

        return $this;
    }

    /**
     * @param  string $encoding
     * @return self
     */
    public function encoding($encoding)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'string', $encoding);
        $this->data['encoding'] = $encoding;

        return $this;
    }

    /**
     * @param  bool $normalize
     * @return self
     */
    public function normalize($normalize = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $normalize);
        $this->data['normalize'] = $normalize;

        return $this;
    }

    /**
     * @param  bool $nounicode
     * @return self
     */
    public function nounicode($nounicode = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $nounicode);
        $this->data['nounicode'] = $nounicode;

        return $this;
    }

    /**
     * @param  bool $single
     * @return self
     */
    public function single($single = true)
    {
        ExceptionFactory::assertArgumentType(1, __METHOD__, 'boolean', $single);
        $this->data['single'] = $single;

        return $this;
    }
}
