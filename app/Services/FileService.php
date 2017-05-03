<?php

namespace App\Services;

class FileService
{

    /**
     * FileService constructor.
     */
    public function __construct()
    {

    }

    /**
     * get data from file
     *
     * @param  Request  $request
     * @return Response
     */
    public function getJsonData($path)
    {
        $fh = fopen($path,'r');
        $output = array();
        while ($line = fgets($fh)) {
          array_push($output, json_decode($line));
        }
        fclose($fh);
        return $output;
    }
}
