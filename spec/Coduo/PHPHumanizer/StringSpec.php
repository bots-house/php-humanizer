<?php

namespace spec\Coduo\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringSpec extends ObjectBehavior
{
    function it_humanize_string()
    {
        $this->humanize('news_count')->shouldReturn('News count');
    }

    function it_humanize_strings_without_capitalize()
    {
        $this->humanize('user', false)->shouldReturn('user');
    }

    function it_humanize_string_excluding_forbidden_words()
    {
        $this->humanize('news_id')->shouldReturn('News');
    }

    function it_truncate_string_to_word_closest_to_a_certain_number_of_characters()
    {
        $text = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';

        $this->truncate($text, 2)->shouldReturn("Lorem");
        $this->truncate($text, 10, '...')->shouldReturn("Lorem ipsum...");
        $this->truncate($text, 30)->shouldReturn("Lorem ipsum dolorem si amet, lorem");
        $this->truncate($text, 0)->shouldReturn("Lorem");
        $this->truncate($text, 0, '...')->shouldReturn("Lorem...");
        $this->truncate($text, -2)->shouldReturn($text);
    }
}
