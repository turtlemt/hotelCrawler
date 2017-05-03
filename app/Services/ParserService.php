<?php

namespace App\Services;

use Carbon\Carbon;

class ParserService
{

    /**
     * FileService constructor.
     */
    public function __construct()
    {

    }

    /**
     * main parser process
     *
     * @param  array  $parserData
     * @return array
     */
    public function mainProcess($parserData)
    {
        $parserData = $this->todayFilter($parserData);
        var_dump($parserData);
        return $parserData;
    }

    /**
     * filter today data
     *
     * @param  array  $parserData
     * @return array
     */
    public function todayFilter($parserData)
    {
        $carbon = Carbon::now();
        foreach ($parserData[0] as $resort) {
            foreach ($resort->data->elements as $key => $dayRoom) {
                if (false === strpos($dayRoom->date, $carbon->format('Y/m/d'))) {
                    unset($resort->data->elements[$key]);
                }
            }
        }
        return $parserData;
    }
}
