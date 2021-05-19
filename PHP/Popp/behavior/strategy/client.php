<?php

use Popp\behavior\strategy\MarkLogicMaker;
use Popp\behavior\strategy\MatchMaker;
use Popp\behavior\strategy\RegexpMaker;

require './../../../vendor/autoload.php';

$makers = [
    new RegexpMaker('/f.ve/'),
    new MatchMaker('five'),
    new MarkLogicMaker('$input equals "five"')
];

foreach ($makers as $maker) {
    print get_class($maker).PHP_EOL;
    $question = new \Popp\behavior\strategy\TextQuestion("How many beans make five?", $maker);

    foreach (['five', 'four'] as $response) {
        print "\tresponse:$response: ";
        if ($question->mark($response)) {
            print 'Well dowe'.PHP_EOL;
        } else {
            print 'Never mind'.PHP_EOL;
        }
    }
}
