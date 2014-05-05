<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Argument, Sange\Option;

class CommandSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Command');
    }

    function it_adds_an_input_element()
    {
        $this->getElements()->shouldHaveCount(0);

        $this->add(new Argument);
        $this->add(new Option);

        $this->getElements()->shouldHaveCount(2);
        $this->getElements('Argument')->shouldHaveCount(1);
        $this->getElements('Option')->shouldHaveCount(1);
    }

}

