<?php namespace Sange;

class Option extends InputElement {

    /**
     * The option volume.
     *
     * @var integer
     */
    protected $volume = 1;

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

    /**
     * Get the option volume.
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set the option volume.
     *
     * @param integer $volume
     * @return void
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * Increase the option volume.
     *
     * @return void
     */
    public function increaseVolume()
    {
        $this->volume += 1;
    }

    /**
     * Convert the object to a string.
     *
     * @return string
     */
    public function __toString()
    {
        $name = ($this->isShort() ? '-' : '--').$this->name;

        $value = is_null($this->value) ? '' : escapeshellarg($this->value);

        return trim(sprintf('%s %s', $name, $value));
    }

}

