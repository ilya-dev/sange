<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;

class CommandSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Command');
    }

}

