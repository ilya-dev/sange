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
        if (strpos($chunk, '-') === false)
        {
            return new Argument(null, $this->cleanChunk($chunk));
        }

        // $index = array_search($chunk, $chunks) + 1;
        return new Option($chunk);
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

