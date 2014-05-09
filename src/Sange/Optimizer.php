<?php namespace Sange;

class Optimizer {

    /**
     * Optimize a command.
     *
     * @param Command $command
     * @return string
     */
    public function optimize(Command $command)
    {
        return trim(sprintf('%s %s',
            $command->getName(),
            $this->optimizeOptions($command->getElements('Option'))
        ));
    }

    /**
     * Optimize options.
     *
     * @param array $options
     * @return string
     */
    protected function optimizeOptions(array $options)
    {
        $combined = '-';

        foreach ($options as $key => $option)
        {
            if ($option->isShort() and ! $option->getValue())
            {
                $combined .= $option->getName();

                unset ($options[$key]);
            }
        }

        return $combined.' '.implode(' ', array_map('strval', $options));
    }

}

