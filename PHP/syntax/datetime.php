<?php

namespace \syntax;

class datetime
{
    private function getConfigTimezone()
    {
    }

    public function date($date = null, $locale = null, $useTimezone = true, $includeTime = true)
    {
        $locale = $locale ?: $this->_localeResolver->getLocale();
        $timezone = $useTimezone
            ? $this->getConfigTimezone()
            : date_default_timezone_get();

        switch (true) {
            case (empty($date)):
                return new \datetime('now', new \DateTimeZone($timezone));
            case ($date instanceof \datetime):
                return $date->setTimezone(new \DateTimeZone($timezone));
            case ($date instanceof \DateTimeImmutable):
                return new \datetime($date->format('Y-m-d H:i:s'), $date->getTimezone());
            case (!is_numeric($date)):
                $timeType = $includeTime ? \IntlDateFormatter::SHORT : \IntlDateFormatter::NONE;
                $formatter = new \IntlDateFormatter(
                    $locale,
                    \IntlDateFormatter::SHORT,
                    $timeType,
                    new \DateTimeZone($timezone)
                );

                $date = $this->appendTimeIfNeeded($date, $includeTime);
                $date = $formatter->parse($date) ?: (new \datetime($date))->getTimestamp();
                break;
        }

        return (new \datetime(null, new \DateTimeZone($timezone)))->setTimestamp($date);
    }

    private function appendTimeIfNeeded($date, $includeTime)
    {
        if ($includeTime && !preg_match('/\d{1}:\d{2}/', $date)) {
            $date .= " 0:00am";
        }
        return $date;
    }
}

$datetime = new datetime('2016-06-06 10:00 pm');
$datetime1 = datetime::createFromFormat('M j, Y H:i:s', 'June 6, 2016 22:00:00');

//创建长度为两天的间隔
$interval = new DateInterval('P2D');

//修改DateTime实例
$datetime->add($interval);
echo $datetime->format('Y-m-d H:i:s');

$datetime = new datetime();
$interval = DateInterval::createFromDateString('-1 day');
$period = new DatePeriod($datetime, $interval, 3);

foreach ($period as $date) {
    echo $date->format('Y-m-d'), PHP_EOL;
}

$timezone = new DateTimeZone('Asia/Shanghai');
$datetime = new datetime('2016-06-06', $timezone);
$datetime->setTimezone(new DateTimeZone('Asia/Hong_kong'));

$datetime = new datetime();
$interval = new DateInterval('P2D');
$period = new DatePeriod($datetime, $interval, 3, DatePeriod::EXCLUDE_START_DATE);
foreach ($period as $date) {
    echo $date->format('Y-m-d H:i:s'), PHP_EOL;
}
