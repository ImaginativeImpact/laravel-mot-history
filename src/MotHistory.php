<?php

namespace ImaginativeImpact\LaravelMotHistory;

use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use ImaginativeImpact\LaravelMotHistory\Traits\GuzzleClientTrait;

class MotHistory
{
    use GuzzleClientTrait;

    /**
     * To retrieve a full extract of the database. The last page normally
     * increments by 10 each day.
     * @param Int $pageNumber This value increases daily starting from 0, last
     * recorded maximum was 58002 on 13th July 2017
     * @return mixed
     */
    public function getAllTests(Int $pageNumber) {
        return self::guzzle('?page='.$pageNumber);
    }

    /**
     * To retrieve all tests performed for a specific Vehicle Registration
     * @param $registration
     * @return mixed
     */
    public function getAllTestsForVehicle($registration) {
        return self::guzzle('?registration='.$registration);
    }

    /**
     * To retrieve all tests performed on a specific date. $time of 1 would return
     * tests completed at 00:01am, $time 300 would return tests completed at 05:00am,
     * $time 600 would return tests completed at 10:00am.
     * @param String $date Date in format YYYYMMDD
     * @param Int $time This is the minute of each day, from 1 to 1440
     * @return mixed
     */
    public function getAllTestsByDate(String $date, Int $time) {
        return self::guzzle('?date='.$date.'&page='.$time);
    }

    /**
     * To retrieve all tests performed for a specific Vehicle ID (retrieved from
     * one of the other methods)
     * @param String $vehicleID
     * @return mixed
     */
    public function getAllTestsForVehicleByVehicleID(String $vehicleID) {
        return self::guzzle('?vehicleId='.$vehicleID);
    }
}