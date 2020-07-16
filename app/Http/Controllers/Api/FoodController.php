<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\Http\Resources\FoodResource;
use DB;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        $foods = FoodResource::collection($foods);
        return response()->json([
            'foods' => $foods
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          $request->validate([
            'food_name'    => 'required|min:3|max:30|unique:food_name',
            'calories'  => 'required|min:1|max:30',
            'category'  => 'required'
            // 'food_image'=> 'required' 
        ]);



        // if($request->hasfile('food_image')){
        //     $photo=$request->file('food_image');
        //     $name=time().'.'.$photo->getClientOriginalExtension();
        //     $photo->move(public_path().'/storage/photos/',$name);
        //     $image='/storage/photos/'.$name;
             
        //  }

      

            Food::create([
            'food_name'        => request('food_name'),
            'calories'      => request('calories'),
            'category_id'   => request('category'),
            'food_image'    => "/storage/photos/1592650870.jpg"
        ]);

            return response()->json([
                'message' => 'Successfully food Insert!'
            ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);
        $food = FoodResource::make($food);
        return response()->json([
            'food' => $food
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'food_name'    => 'required|min:3|max:30',
            'calories'  => 'required|min:1|max:30',
            'category'  => 'required'
        ]);



        if($request->hasfile('food_image')){
            $photo=$request->file('food_image');
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/photos/',$name);
            $image='/storage/photos/'.$name;
             
         }else{
            $image = $request->old_image;
         }

            $food = Food::find($id);
            $food->food_name = $request->food_name;
            $food->calories = $request->calories;
            $food->category_id = $request->category;
            $food->food_image = $request->food_image;
            $food->save();

            return response()->json([
                'message' => "Successfully Food Update!"
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food =Food::find($id);
        $food->delete();
        return response()->json([
            'message' => "Successfully food Delete!"
        ],200);
    }
    
    
     public function filterbyCategory(Request $request)
    {
      
        if($category_id =request('category_id'))
        $food= DB::table('food')
                ->join('categories','categories.id','=','food.category_id')
                ->where('food.category_id','=',$category_id)
                ->select('food.*')
                ->get();
                
        $food = FoodResource::collection($food);
        return response()->json([
            'food' => $food
        ],200);            
    }


    public function searchByName(Request $request ){
     $searchval = request('search_name');
        
        $food = Food::all();
     
        if($searchval!='')
        {
            $foods = Food::where('foods.food_name','like','%'.$searchval.'%','and','foods.permission','=','1')->get();
            if ( count($foods) > 0) {
                return response()->json(['foods' => $foods]);
            }else{
                return response()->json(['foods' => "nothing"]);
            }

        }
        
       
    } 

}
