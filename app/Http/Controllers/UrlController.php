<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $destination = $data['destination'];
        $url_code = $this->generateShortUrl();

        $short_url = env('BASE_URL');
        $short_url .= '/';
        $short_url .= $url_code;

        $user_id = 1;

        if (Auth::check()) {
            $user_id = auth()->user->id;
        }

        Url::create([
            'visits_count' => 0,
            'short' => $url_code,
            'destination' => urlencode($destination),
            'user_id' => $user_id
        ]);

        return redirect()->route('index', ['url' => $short_url]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        //
    }

    private function generateShortUrl()
    {
        $chars = ['A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r', 'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $url_code = 'a';
        $invalid = true;

        while ($invalid == true) {
            $index = array_rand($chars);
            $url_code = $chars[$index];

            for ($i = 0; $i < 5; $i++) {
                $index = array_rand($chars);
                $url_code .= $chars[$index];
            }

            $in_use = Url::where('short', $url_code)->get()->first();

            if ($in_use == null) {
                $invalid = false;
            }
        }

        return $url_code;
    }
}
