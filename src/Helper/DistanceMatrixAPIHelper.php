<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Helper;


class DistanceMatrixAPIHelper
{
    protected const API_URL = 'https://maps.googleapis.com/maps/api/distancematrix/json';

    public static function buildDMAQueryString($arrOrigins, $arrDestinations, $key) {
        $query = '?';

        $arrOrigins = str_replace(' ', '+', $arrOrigins);
        $arrDestinations = str_replace(' ', '+', $arrDestinations);

        $params[] = 'origins=' . implode('|', $arrOrigins);
        $params[] = 'destinations=' . implode('|', $arrDestinations);
        $params[] = 'key=' . $key;

        $query .= implode('&', $params);

        return static::API_URL . $query;
    }

    public static function fetchDMAQuery($queryString) {
        return json_decode(file_get_contents($queryString));
    }
}
