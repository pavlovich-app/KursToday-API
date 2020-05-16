<?php

require_once __DIR__ . '/../vendor/autoload.php';

use kurstoday\Kurstoday;

$kurstoday = new Kurstoday;


$lutskService = $kurstoday->getService('lutsk'); // получение курсов валют в обменниках Луцка

$kharkivAverage = $kurstoday->getAverage('kharkiv'); // получение среднего курса валют в обменниках Харькова

$chart = $kurstoday->getChartData('2020-01', '2020-10', 1, Kurstoday::CUR_USD);

echo '<pre>'.print_r($kharkivAverage, true).'</pre>'; die;
