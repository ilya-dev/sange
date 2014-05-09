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

        return $this->prepareResult($arguments);
    }

    /**
     * Convert all input elements of the type "Option" to a string.
     *
     * @return string
     */
    protected function convertOptions()
    {
        $options = $this->command->getElements('Option');
        $options = implode(' ', array_map('strval', $options));

        return $this->prepareResult($options);
    }

    /**
     * Prepare spacing-aware result string.
     *
     * @param string $string
     * @return string
     */
    protected function prepareResult($string)
    {
        return $string ? ' '.$string : '';
    }

}

