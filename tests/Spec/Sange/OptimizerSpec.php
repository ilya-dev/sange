<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Command, Sange\Argument, Sange\Option;

class OptimizerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Optimizer');
    }

    function it_optimizes_a_command()
    {
        $command = new Command('foo');

        $command->add(new Option('a'));
        $command->add(new Option('b'));
        $command->add(new Option('c'));
        $command->add(new Option('d', '10'));
        $command->add(new Option('bar'));
        $command->add(new Option('baz', 'test'));

        $this->optimize($command)->shouldBe("foo -abc -d '10' --bar --baz 'test'");
    }

}

