<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Food;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $foods = Food::all();
        return view('food.index',compact('categories','foods'));
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
         
          $request->validate([
            'food_name'    => 'required|min:3|max:30',
            'calories'  => 'required|min:1|max:30',
            'category'  => 'required',
            'food_image'=> 'required' 
        ]);


          
        if($request->hasfile('food_image')){
            $photo=$request->file('food_image');
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/photos/',$name);
            $image='/storage/photos/'.$name;
             
         }

         

            Food::create([
            'food_name'        => request('food_name'),
            'calories'      => request('calories'),
            'category_id'   => request('category'),
            'food_image'    => $image
        ]);
       

        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $food = Food::find($id);
        return view('food.edit',compact('food','categories'));
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
            $food->food_name = $request->f_name;
            $food->calories = $request->calories;
            $food->category_id = $request->category;
            $food->food_image = $request->food_image;
            $food->save();
       

        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food.index');
    }
}
