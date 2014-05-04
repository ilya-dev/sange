<?php namespace Sange;

class Option extends InputElement {

    /**
     * Check if the element was used as a "switch" and its value is empty.
     *
     * @return boolean
     */
    public function isFlag()
    {
        return is_null($this->value);
    }

    /**
     * Determine whether the element name is exactly one character long.
     *
     * @return boolean
     */
    public function isShort()
    {
        return 1 == mb_strlen($this->name, mb_detect_encoding($this->name));
    }

}

