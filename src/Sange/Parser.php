<?php namespace Sange;

class Parser {

    /**
     * Parse a string into Command instance.
     *
     * @param string $string
     * @return Command
     */
    public function parse($string)
    {
        // split the string into chunks
        $chunks = array_filter(array_map('trim', explode(' ', $string)));

        $command = new Command(array_shift($chunks));

        foreach ($chunks as $chunk)
        {
            $command->add($this->convertChunk($chunk, $chunks));
        }

        return $command;
    }

    /**
     * Convert a chunk to InputElement instance.
     *
     * @param string $chunk
     * @param array $chunks
     * @return InputElement
     */
    protected function convertChunk($chunk, array $chunks)
    {
        if ($this->isArgument($chunk))
        {
            return new Argument(null, $this->cleanChunk($chunk));
        }

        $index = array_search($chunk, $chunks) + 1;
        $value = null;

        if (isset ($chunks[$index]) and $this->isArgument($chunks[$index]))
        {
            $value = $this->cleanChunk($chunks[$index]);
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

