<?php


namespace Popp\behavior\command\commands;

use Popp\behavior\command\Command;
use Popp\behavior\command\CommandContext;

class FeedbackCommand extends Command
{
    public function execute(CommandContext $context)
    {
        $msgSystem = Registry::getMessageSystem();
        $email = $context->get('email');
        $msg = $context->get('msg');
        $topic = $context->get('topic');
        $result = $msgSystem->send($email, $topic, $msg);
        if (!$result) {
            $context->setError($msgSystem->getError());
            return false;
        }

        return true;
    }
}
