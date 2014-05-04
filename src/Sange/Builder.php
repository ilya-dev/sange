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
     * @param string|null $type
     * @return array
     */
    public function getElements($type = null)
    {
        $elements = $this->elements;

        if (is_null($type))
        {
            return $elements;
        }

        return array_filter($elements, function(InputElement $element) use($type)
        {
            return ($element instanceof $type);
        });
    }

    /**
     * Build a new command based on the given elements.
     *
     * @return string
     */
    public function build()
    {
        $arguments = $this->convertArguments();
        $options   = $this->convertOptions();

        return $this->command.$arguments.$options;
    }

    /**
     * Convert all input elements of the type "Argument" to a string.
     *
     * @return string
     */
    protected function convertArguments()
    {
        $arguments = $this->getElements('Argument');

        $arguments = implode(' ', array_map([$this, 'escapeValue'], $arguments));

        return $arguments ? (' '.$arguments) : '';
    }

    /**
     * Convert all input elements of the type "Option" to a string.
     *
     * @return string
     */
    protected function convertOptions()
    {
        $options = $this->getElements('Option');

        $result = [];

        foreach ($options as $option)
        {
            $temporary = $option->isShort() ? '-' : '--';

            $temporary .= $option->getName();

            if ( ! $option->isFlag())
            {
                $temporary .= ' '.escapeshellarg($option->getValue());
            }

            $result[] = $temporary;
        }

        return ($result = implode(' ', $result)) ? (' '.$result) : '';
    }

    /**
     * Escape the element's value using escapeshellarg.
     *
     * @return string
     */
    protected function escapeValue(InputElement $element)
    {
        return escapeshellarg($element->getValue());
    }

}

