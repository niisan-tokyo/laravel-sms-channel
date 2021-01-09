<?php
namespace Niisan\Notification;

class SmsMessage
{

    private $to = '';
    private $from = '';
    private $body = '';
    private $unicode = false;

    /**
     * set body.
     * 
     * @param string $body
     * @return self
     */
    public function body(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * set to
     * if already $to exists, can't update $to.
     * 
     * @param string $to
     * @return self
     */
    public function to(string $to): self
    {
        if (!$this->to) {
            $this->to = $to;
        }
        return $this;
    }
    
    /**
     * set from.
     *
     * @param string $from
     *
     * @return self
     */
    public function from(string $from): self
    {
        if (!$this->from) {
            $this->from = $from;
        }
        return $this;
    }
    
    /**
     * set unicode.
     *
     * @param bool $value
     *
     * @return self
     */
    public function unicode(bool $value = true): self
    {
        $this->unicode = $value;
        return $this;
    }

    public function __get($name)
    {
        if ($this->$name) {
            return $this->$name;
        }
    }
}