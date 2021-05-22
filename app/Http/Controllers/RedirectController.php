<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index(Request $request)
    {
        $short_url = $request->input('url', null);

        return view('index', ['short_url' => $short_url, 'base_url' => env('BASE_URL')]);
    }
}
