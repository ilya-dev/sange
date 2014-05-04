<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;

class BuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Builder');
    }

}

