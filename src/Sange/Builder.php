<?php namespace Sange;

class Builder {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command;

    /**
     * The input elements.
     *
     * @var array
     */
    protected $elements = [];

    /**
     * The constructor.
     *
     * @param string $command
     * @return Builder
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Add an element.
     *
     * @param InputElement $element
     * @return void
     */
    public function add(InputElement $element)
    {
        $this->elements[] = $element;
    }

}

