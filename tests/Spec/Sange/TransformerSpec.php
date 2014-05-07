<?php namespace Spec\Sange;

use PhpSpec\ObjectBehavior;

class TransformerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Sange\Transformer');
    }

    function it_replaces_equal_sign_with_a_white_space()
    {
        $this->transform('foo --param=value')->shouldBe('foo --param value');

        $this->transform('foo --param="value"')->shouldBe('foo --param "value"');

        $this->transform('foo --param="--param=value"')->shouldBe('foo --param "--param=value"');
    }

    function it_discloses_combined_options()
    {
        $this->transform('foo -abc --bar')->shouldBe('foo -a -b -c --bar');
    }

    function it_adds_a_white_space_between_a_short_option_and_its_value()
    {
        $this->transform('foo -n10')->shouldBe('foo -n 10');

        $this->transform('foo -abc10')->shouldBe('foo -a -b -c 10');
    }

}
