<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;
use Sange\Command, Sange\Argument, Sange\Option;

class ParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Parser');
    }

    function it_parses_a_string()
    {
        $this->parse('foo')->shouldBeLike($command = new Command('foo'));

        $command->add(new Argument(null, 'bar'));
        $command->add(new Argument(null, 'baz'));

        $this->parse("foo 'bar' 'baz'")->shouldBeLike($command);

        $command->add(new Option('text', 'wow'));
        $command->add(new Option('no-backup'));
        $command->add(new Option('f'));

        $result = $this->parse(" foo  'bar'  'baz' --text  'wow' --no-backup  -f ");

        //$result->shouldBeLike($command);

        var_dump($result->getWrappedObject());exit;
    }

}

