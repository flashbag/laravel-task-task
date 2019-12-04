<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PixabayController extends Controller
{
    public function searchImage(Request $request)
    {
    	$query = $request->get('query');

    	$url = 'https://pixabay.com/api/?key=' . config('services.pixabay.key') . '&q=' . $query;
    	$url = $url . '&per_page=200';

    	$client = new \GuzzleHttp\Client();

		$res = $client->request('GET', $url, [

		]);

		return $res->getBody();
    }
}
