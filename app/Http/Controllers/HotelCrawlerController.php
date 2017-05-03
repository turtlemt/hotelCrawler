<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CrawlerService;
use App\Services\FileService;
use App\Services\ParserService;

class HotelCrawlerController extends Controller
{
    protected $crawlerService;
    protected $FileService;
    protected $ParserService;

    /**
     * HotelCrawlerController constructor.
     * @param CrawlerService $crawlerService
     */
    public function __construct(CrawlerService $crawlerService, FileService $fileService, ParserService $parserService)
    {
        $this->crawlerService = $crawlerService;
        $this->fileService = $fileService;
        $this->parserService = $parserService;
    }

    /**
     * Parser crawler data
     *
     * @param  Request  $request
     * @return Response
     */
    public function process(Request $request)
    {
        $crawlerData = $this->fileService->getJsonData('/var/web/crawler/resources/txt/output.txt');
        //var_dump($crawlerData);
        $this->parserService->mainProcess($crawlerData);
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function processOld(Request $request)
    {
        /*$target = 'http://www.twstay.com/Site/booking.aspx?BNB=value&orderType=2';
        $response = $this->crawlerService->getPostData($target);
        $this->parserService->caseTwstay($response);*/

    }
}
