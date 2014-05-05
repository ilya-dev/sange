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

        array_map([$command, 'add'], array_map([$this, 'convertChunk'], $chunks));

        return $command;
    }

    /**
     * Convert a chunk to InputElement instance.
     *
     * @param string $chunk
     * @return InputElement
     */
    protected function convertChunk($chunk)
    {
        return new Argument(null, $this->cleanChunk($chunk));
    }

    /**
     * Remove all quotes in a string (undo shellescapearg).
     *
     * @param string $chunk
     * @return string
     */
    protected function cleanChunk($chunk)
    {
        return str_replace(['\'', "\""], '', $chunk);
    }

}

