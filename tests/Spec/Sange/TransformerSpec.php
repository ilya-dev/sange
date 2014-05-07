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

}
