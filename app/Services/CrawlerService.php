<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class CrawlerService
{

    /**
     * CrawlerService constructor.
     */
    public function __construct()
    {

    }

    /**
     * get data by curl
     *
     * @param  Request  $request
     * @return Response
     */
    public function getData($target)
    {
        $response = Curl::to($target)->get();
        return $response;
    }

    /**
     * get data by curl
     *
     * @param  Request  $request
     * @return Response
     */
    public function getPostData($target)
    {
        $response = Curl::to($target)->post();
        return $response;
    }
}
