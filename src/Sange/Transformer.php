<?php namespace Sange;

class Transformer {

    /**
     * Transform a raw command so it can be parsed.
     *
     * @param string $command
     * @return string
     */
    public function transform($command)
    {
        return preg_replace('/(\-\-\w+)\=([^\s]+)/', '$1 $2', $command);
    }

}
