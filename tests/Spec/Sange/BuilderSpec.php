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
        $this->getElements()->shouldHaveCount(0);

        $this->add($argument);
        $this->add($option);

        $this->getElements()->shouldHaveCount(2);
    }

    function it_builds_a_command()
    {
        $this->build()->shouldBe('foo');

        $this->add(new Argument(null, 'bar'));
        $this->add(new Argument(null, 'baz'));

        $this->build()->shouldBe('foo "bar" "baz"');
    }

}

