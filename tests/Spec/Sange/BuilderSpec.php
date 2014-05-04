<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Argument, Sange\Option;

class BuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Builder');
    }

    function it_adds_an_input_element(Argument $argument, Option $option)
    {
        $this->add($argument);
        $this->add($option);
    }

}

