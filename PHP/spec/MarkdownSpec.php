<?php

namespace spec;

use spec\Markdown;
use PhpSpec\ObjectBehavior;

class MarkdownSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->toHtml("Hi, there")->shouldReturn("<p>Hi, there</p>");
    }
}
