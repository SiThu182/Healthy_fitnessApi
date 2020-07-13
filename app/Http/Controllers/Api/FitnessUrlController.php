<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FitnessUrl;
use App\Http\Resources\FitnessUrlResource;
class FitnessUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fitness_urls = FitnessUrl::all();
        $fitness_urls = FitnessUrlResource::collection($fitness_urls);
        return response()->json([
            'fitness_urls' => $fitness_urls
        ]);
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
            'url_name'    => 'required',
            'url_address' =>'required',
            'gender'      =>'required'  
        ]);

 
 
       FitnessUrl::create([
            'url_name'      => request('url_name'),
            'url_address'  => request('url_address'),
            'gender'       => request('gender') 

        ]);
        return response()->json([
            
            'message' => 'Insert Successful'
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


        $fitness_url = FitnessUrl::find($id);

        $fitness_url = FitnessUrlResource::make($fitness_url);
        return response()->json([
            'fitness_url' => $fitness_url
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
            'url_name' => 'required',
            'url_address' =>'required'
        ]);
         
        $fitness_url = FitnessUrl::find($id);
        $fitness_url->url_name = request('url_name');
        $fitness_url->url_address = request('url_address');
        $fitness_url->gender = request('gender');
        $fitness_url->save();

        return response()->json([
            'message' => "Update Successful"
        ]);

 
      
    }

    /**
     * Remove  the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fitness_url = FitnessUrl::find($id);
        $fitness_url->delete();
        return response()->json([
            'message' => "Delete Successful"
        ]);
    }
}
