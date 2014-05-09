<?php namespace Sange;

class Argument extends InputElement {

    /**
     * Convert the object to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

}

