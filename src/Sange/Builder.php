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
     * Add an input element.
     *
     * @param InputElement $element
     * @return void
     */
    public function add(InputElement $element)
    {
        $this->elements[] = $element;
    }

    /**
     * Get all input elements.
     *
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Build a new command based on the given elements.
     *
     *
     * @return string
     */
    public function build()
    {
        $arguments = $this->convertArguments();

        return sprintf('%s %s', $this->command, $arguments);
    }

    /**
     * Convert all input elements of the type "Argument" to a string.
     *
     * @return string
     */
    protected function convertArguments()
    {
        $arguments = array_filter($this->elements, function(InputElement $element)
        {
            return ($element instanceof Argument);
        });

        return implode(' ', array_map('escapeshellarg', $arguments));
    }

}

