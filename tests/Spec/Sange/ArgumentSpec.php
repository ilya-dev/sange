<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;

class ArgumentSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo', 'bar');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Argument');
    }

}

