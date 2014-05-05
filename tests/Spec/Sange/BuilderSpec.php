<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Command, Sange\Argument, Sange\Option;

class BuilderSpec extends ObjectBehavior {

    function let(Command $command)
    {
        $this->beConstructedWith($command);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Builder');
    }

    function it_builds_a_command(Command $command)
    {
        $command->getName()->willReturn('foo');
        $command->getElements('Option')->willReturn([]);
        $command->getElements('Argument')->willReturn([]);

        $this->build()->shouldBe('foo');

        $command->getElements('Argument')->willReturn([
            new Argument(null, 'bar'),
            new Argument(null, 'baz'),
        ]);

        $this->build()->shouldBe("foo 'bar' 'baz'");

        $command->getElements('Option')->willReturn([
            new Option('text', 'wow'),
            new Option('no-backup'),
            new Option('n', 10),
        ]);

        $this->build()->shouldBe(
            "foo 'bar' 'baz' --text 'wow' --no-backup -n '10'"
        );
    }

}

