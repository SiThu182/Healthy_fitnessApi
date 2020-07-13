<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bmi;
use App\Http\Resources\BmiResource;
class CaloriesController extends Controller
{
    public function getBmiResult($value='')
    {
    	$bmis = Bmi::all();
    	$bmis = BmiResource::collection($bmis);
    	return response()->json([
    	    		'bmis' => $bmis
    	    	],200);
    }

    public function storeBmi(Request $request)
    {
    	echo request('status');
    	Bmi::create([
    		'user_id' => 1,
    		'weight'  => request('weight'),
    		'height'  => request('height'),
    		'result'  => request('result'),
    		'date' => request('date'),
    		'status'  => request('status'),			
    	]);

    	return response([
    		'message' => "Bmi added"
    	],200);

    }
}
