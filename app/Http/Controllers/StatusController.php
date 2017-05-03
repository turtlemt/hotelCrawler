<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$name = $request->input('name');
        $name = 'ggg';
        $data = ['name' => $name];

        return view('status.index', $data);
    }
}
