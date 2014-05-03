<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;

class BaseInputElementSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo', 'bar');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\BaseInputElement');
    }

    function it_returns_name_of_the_input_element()
    {
        $this->getName()->shouldBe('foo');
    }

    function it_returns_value_of_the_input_element()
    {
        $this->getValue()->shouldBe('bar');
    }

}

namespace Sange;

class BaseInputElement extends InputElement {}

