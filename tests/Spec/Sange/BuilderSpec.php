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
        $this->build()->shouldBe('foo');

        $command->add(new Argument(null, 'bar'));
        $command->add(new Argument(null, 'baz'));

        $this->build()->shouldBe("foo 'bar' 'baz'");

        $command->add(new Option('text', 'wow'));
        $command->add(new Option('no-backup'));
        $command->add(new Option('n', 10));

        $this->build()->shouldBe(
            "foo 'bar' 'baz' --text 'wow' --no-backup -n '10'"
        );
    }

}

