<?php namespace Sange;

class Builder {

    /**
     * The Command we're working with.
     *
     * @var Command
     */
    protected $command;

    /**
     * The constructor.
     *
     * @param Command $command
     * @return Builder
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * Build a new command based on the given elements.
     *
     * @return string
     */
    public function build()
    {
        return $this->command->getName()
              .$this->convertArguments()
              .$this->convertOptions();
    }

    /**
     * Convert all input elements of the type "Argument" to a string.
     *
     * @return string
     */
    protected function convertArguments()
    {
        $arguments = $this->command->getElements('Argument');

        $arguments = implode(' ', array_map('strval', $arguments));

        return $arguments ? ' '.$arguments : '';
    }

    /**
     * Convert all input elements of the type "Option" to a string.
     *
     * @return string
     */
    protected function convertOptions()
    {
        $options = $this->command->getElements('Option');

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

        return $result ? ' '.implode(' ', $result) : '';
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

