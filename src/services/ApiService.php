<?php
namespace kurstoday\services;

class ApiService
{
    const BASIC_DOMAIN = 'https://kurstoday.com';

    const SERVICE_ENDPOINT = '/api/service/';
    const AVERAGE_ENDPOINT = '/api/average/';
    const CHART_ENDPOINT = '/api/chart/';

    /**
     * @example https://kurstoday.com/api/service/lutsk
     * @example https://kurstoday.com/api/service/banks
     *
     * @param string $serviceName
     * @return array
     */
    public static function getService(string $serviceName): ?array
    {
        $url = ApiService::BASIC_DOMAIN . ApiService::SERVICE_ENDPOINT . strtolower($serviceName);
        return ApiService::getJsonContent($url);
    }

    /**
     * @example https://kurstoday.com/api/average/lutsk
     * @example https://kurstoday.com/api/average/banks
     *
     * @param string $serviceName
     * @return array|null
     */
    public static function getAverage(string $serviceName): ?array
    {
        $url = ApiService::BASIC_DOMAIN . ApiService::AVERAGE_ENDPOINT . strtolower($serviceName);
        return ApiService::getJsonContent($url);
    }

    /**
     * @example https://kurstoday.com/api/chart?from=2000-01&to=2020-05&exchanger_id=9&currency=usd
     * 
     * @param string $from
     * @param string $to
     * @param int $exchangerId
     * @param string $currency
     * @return array|null
     */
    public static function getChartData(string $from, string $to, int $exchangerId, string $currency): ?array
    {
        $query = http_build_query([
            'from' => $from,
            'to' => $to,
            'exchanger_id' => $exchangerId,
            'currency' => $currency,
        ]);
        $url = ApiService::BASIC_DOMAIN . ApiService::CHART_ENDPOINT . '?' . $query;
        return ApiService::getJsonContent($url);
    }

    /**
     * @param string $url
     * @return array|null
     */
    private static function getJsonContent(string $url): ?array
    {
        try {
            $response = file_get_contents($url);
            $response = json_decode($response, true);
        } catch (\Exception $exception) {
            return null;
        }
        return $response;
    }
}