<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Command, Sange\Argument, Sange\Option;

class ParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Parser');
    }

    function it_parses_a_string()
    {
        $this->parse('foo')->shouldBeLike($command = new Command('foo'));

        $command->add(new Argument(null, 'bar'));
        $command->add(new Argument(null, 'baz'));

        $this->parse("foo 'bar' 'baz'")->shouldBeLike($command);
    }

}

