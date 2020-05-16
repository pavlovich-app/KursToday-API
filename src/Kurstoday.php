<?php

namespace kurstoday;

use kurstoday\services\ApiService;

class Kurstoday
{
    const CUR_USD = 'usd';
    const CUR_EUR = 'eur';
    const CUR_RUR = 'rur';
    const CUR_GBP = 'gbp';
    const CUR_CHF = 'chf';
    const CUR_PLN = 'pln';

    const AVAILABLE_CURRENCIES = [
        Kurstoday::CUR_USD,
        Kurstoday::CUR_EUR,
        Kurstoday::CUR_RUR,
        Kurstoday::CUR_GBP,
        Kurstoday::CUR_CHF,
        Kurstoday::CUR_PLN,
    ];

    /**
     * @param string $name
     * @return array|null
     */
    public function getService(string $name): ?array
    {
        return ApiService::getService($name);
    }

    /**
     * @param string $name
     * @return array|null
     */
    public function getAverage(string $name): ?array
    {
        return ApiService::getAverage($name);
    }

    /**
     * @param string $from
     * @param string $to
     * @param int $exchangerId
     * @param string $currency
     * @return array|null
     */
    public function getChartData(string $from, string $to, int $exchangerId, string $currency): ?array
    {
        if (!in_array($currency, Kurstoday::AVAILABLE_CURRENCIES)) {
            new \Exception('Unavailable currency', 500);
        }
        return ApiService::getChartData($from, $to, $exchangerId, $currency);
    }
}