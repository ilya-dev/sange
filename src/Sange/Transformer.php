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
        $command = preg_replace('/(\-\-\w+)\=([^\s]+)/', '$1 $2', $command);

        $callback = function(array $matches)
        {
            return $this->convertCombined(reset($matches));
        };

        $command = preg_replace_callback('/\s\-(\w+)/', $callback->bindTo($this), $command);

        return $command;
    }

    /**
     * Convert a "combined" option: transform "-abc" to "-a -b -c".
     *
     * @param string $option
     * @return string
     */
    protected function convertCombined($option)
    {
        $option = trim(str_replace('-', '', $option));

        $options = [];

        foreach (str_split($option) as $each)
        {
            $options[] = '-'.$each;
        }

        return ' '.implode(' ', $options);
    }

}
