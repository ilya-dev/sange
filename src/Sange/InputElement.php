<?php namespace Sange;

abstract class InputElement {

    /**
     * Name of the input element.
     *
     * @var string
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
     * @param string $name
     * @param string|null $value
     * @return Input
     */
    public function __construct($name, $value = null)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * Get name of the input element.
     *
     * @return string
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

