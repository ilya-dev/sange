<?php namespace Sange;

abstract class InputElement {

    /**
     * Name of the input element.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Value of the input element.
     *
     * @var string|null
     */
    protected $value;

    /**
     * The constructor.
     *
     * @param string|null $name
     * @param string|null $value
     * @return Input
     */
    public function __construct($name = null, $value = null)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * Get name of the input element.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get value of the input element.
     *
     * @return string|null
     */
    public function getValue()
    {
        return $this->value;
    }

}

