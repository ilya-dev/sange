<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Command;

class ParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Parser');
    }

    function it_parses_a_string()
    {
        $this->parse('foo')->shouldBeLike(new Command('foo'));
    }

}

