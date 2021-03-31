<?php

echo "Initial: ".memory_get_usage()." bytes n";

// let’s use up some memory
for ($i = 0; $i < 100000; $i++) {
    $array [] = md5($i);
}
// let’s remove half of the array
for ($i = 0; $i < 100000; $i++) {
    unset($array[$i]);
}
echo "Final: ".memory_get_usage()." bytes n";
echo "Peak: ".memory_get_peak_usage()." bytes n";

print_r(getrusage());

sleep(3);
$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
        $data['ru_utime.tv_usec'] / 1000000);
echo "System time: ".
    ($data['ru_stime.tv_sec'] +
        $data['ru_stime.tv_usec'] / 1000000);
