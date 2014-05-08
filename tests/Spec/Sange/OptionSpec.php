<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;

class OptionSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo', 'bar');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Option');
    }

    function it_checks_if_the_element_was_used_a_switch()
    {
        $this->isFlag()->shouldBe(false);
    }

    function it_checks_if_the_element_is_one_character_long()
    {
        $this->isShort()->shouldBe(false);
    }

    function it_returns_and_sets_proper_volume()
    {
        $this->getVolume()->shouldBe(1);

        $this->setVolume(3);

        $this->getVolume()->shouldBe(3);
    }

}

