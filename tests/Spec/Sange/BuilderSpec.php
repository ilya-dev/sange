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

    function it_adds_an_input_element()
    {
        $this->getElements()->shouldHaveCount(0);

        $this->add(new Argument);
        $this->add(new Option);

        $this->getElements()->shouldHaveCount(2);
        $this->getElements('Argument')->shouldHaveCount(1);
        $this->getElements('Option')->shouldHaveCount(1);
    }

    function it_builds_a_command()
    {
        $this->build()->shouldBe('foo');

        $this->add(new Argument(null, 'bar'));
        $this->add(new Argument(null, 'baz'));

        $this->build()->shouldBe("foo 'bar' 'baz'");

        $this->add(new Option('text', 'wow'));
        $this->add(new Option('no-backup'));
        $this->add(new Option('n', 10));

        $this->build()->shouldBe(
            "foo 'bar' 'baz' --text 'wow' --no-backup -n '10'"
        );
    }

}

