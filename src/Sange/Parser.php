<?php namespace Sange;

class Parser {

    /**
     * The chunks.
     *
     * @var array
     */
    protected $chunks = [];

    /**
     * Parse a string into Command instance.
     *
     * @param string $string
     * @return Command
     */
    public function parse($string)
    {
        $this->chunks = array_filter(array_map('trim', explode(' ', $string)));

        $command = new Command(array_shift($this->chunks));

        while ($this->chunks)
        {
            $command->add($this->convertChunk());
        }

        return $command;
    }

    /**
     * Convert a chunk to InputElement instance.
     *
     * @return InputElement
     */
    protected function convertChunk()
    {
        $chunk = array_shift($this->chunks);

        if ($this->isArgument($chunk))
        {
            return new Argument(null, $this->cleanChunk($chunk));
        }

        $value = null;

        if (($next = reset($this->chunks)) and $this->isArgument($next))
        {
            $value = $this->cleanChunk($next);

            array_shift($this->chunks);
        }

        return new Option($this->cleanChunk($chunk), $value);
    }

    /**
     * Remove all quotes in a string (undo shellescapearg).
     * This method will also remove all "-" characters.
     *
     * @param string $chunk
     * @return string
     */
    protected function cleanChunk($chunk)
    {
        $chunk = str_replace(['\'', "\""], '', $chunk);

        return preg_replace('/^(\-+)/', '', $chunk, 1);
    }

    /**
     * Determine whether a string is a valid argument declaration.
     *
     * @param string $string
     * @return boolean
     */
    protected function isArgument($string)
    {
        return strpos($string, '-') === false;
    }

}

