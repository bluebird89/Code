<?php


namespace Popp\behavior\observer;

class PartnershipTool extends LoginObserver
{

    // 指定ip 设置cookie
    public function doUpdate(Login $login)
    {
        print __CLASS__.":\ttest cookie if IP match a list.".PHP_EOL;
    }
}
