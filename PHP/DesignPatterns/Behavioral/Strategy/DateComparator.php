<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * DateComparator类
 */
class DateComparator implements ComparatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function compare($a, $b)
    {
        $aDate = new \datetime($a['date']);
        $bDate = new \datetime($b['date']);

        if ($aDate == $bDate) {
            return 0;
        } else {
            return $aDate < $bDate ? -1 : 1;
        }
    }
}
