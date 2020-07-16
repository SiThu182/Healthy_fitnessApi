<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bmi;
use App\Http\Resources\BmiResource;
use App\Bmr;
use App\Http\Resources\BmrResource;
use App\WaterIntake;
use App\Http\Resources\WaterIntakeResource;
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

     public function getBmrResult($value='')
    {
        $waterintakes = WaterIntake::all();
        $waterintakes = WaterIntake::collection($waterintakes);
        return response()->json([
                    'waterintakes' => $waterintakes
                ],200);
    }

    public function storeBmr(Request $request)
    {
         
        WaterIntake::create([
            'user_id' => 1,
            'weight'  => request('weight'),
            'height'  => request('height'),
            'result'  => request('result'),
            'age'     => request('age'),
            'gender'  => request('gender'),
            'date' => request('date'),
                     
        ]);

        return response([
            'message' => "Bmr added"
        ],200);

    }

    public function getWaterIntake($value='')
    {
        $waterintakes = WaterIntake::all();
        $waterintakes = WaterIntake::collection($waterintakes);
        return response()->json([
                    'waterintakes' => $waterintakes
                ],200);
    }

    public function storeWaterIntake(Request $request)
    {
         
        WaterIntake::create([
            'user_id' => 1,
            'weight'  => request('weight'),
            'height'  => request('height'),
            'result'  => request('result'),
            'age'     => request('age'),
            'gender'  => request('gender'),
            'date' => request('date'),
                     
        ]);

        return response([
            'message' => "WaterIntake added"
        ],200);

    }



    // public function storeDailyCalories(Request $request)
    // {

    //     $request()->validate([
    //         'dailycal_id' => 'required',
    //         'user_id'     => 'required',
    //         'date'        => 'required'       
    //     ]);

    //       $orders = DailyCalories::create([
           
    //         'user_id'   => request('user_id'),
    //         'date'  => request('date'),
    //         'total'=> request('total'),
    //     ]);
      
    //     $order_details = array(
    //         array("1","2","20000"),
    //         array("2","2","40000")
    //     );
        
    //     foreach ($order_details as $order_detail) {
    //             DailyCaloriesItem::create([
    //             'daily_calories_id'      => request('dailycal_id'),
    //             'food_id'  => $voucher_no,
    //             'quantity'   => $order_detail,
                
    //         ]);
    //             }
    //     return response()->json([
    //         'orders'  =>  $orders,
    //         'message'   =>  'Successfully Order Added!'
    //     ],200);
    // }
}
