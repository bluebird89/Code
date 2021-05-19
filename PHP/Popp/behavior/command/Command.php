<?php


namespace Popp\behavior\command;


abstract class Command
{
    abstract function execute(CommandContext $context);
}
