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

}

