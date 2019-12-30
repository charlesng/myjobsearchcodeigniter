<?php

namespace News\Entities;

class News
{
    /**
     * @var String
     */
    private $title;
    /**
     * @var String
     */
    private $body;
    /**
     * @var String
     */
    private $slug;

    public function __get($key)
    {
        if (property_exists($this, $key)) {
            return $this->$key;
        }
    }

    public function __set($key, $value)
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        }
    }
}
