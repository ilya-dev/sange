<?php namespace Sange;

class Command {

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
     * @return Command
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Get the command name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->command;
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

        $type = 'Sange\\'.$type;

        return array_filter($elements, function(InputElement $element) use($type)
        {
            return ($element instanceof $type);
        });
    }

}

