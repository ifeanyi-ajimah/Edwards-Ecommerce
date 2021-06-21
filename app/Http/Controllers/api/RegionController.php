<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\RegionImage;

class RegionController extends Controller
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
        // return $request->image->extension();
        $this->validate($request , [
            'name' => 'required|string|unique:regions',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        $region = new Region;
        $region->name = $request->name;
        $region->description = $request->description;
        $region->save();

        if($request->image ){
            $imageName = time().$request->image->getClientOriginalName();
            $imageDirPath = '/images/region/';
            $request->image->move('images/region',$imageName);
            $region->image = $imageDirPath . $imageName;
            $region->update();
        }

        if( $request->images)
        {
            foreach( $request->images as $image)
            {
                $imageName2 = time(). '_'. $image->getClientOriginalName();
                $imageDirPath2 = '/images/region/';
                $image->move('images/region',$imageName2 );
                $regionImage = new RegionImage;
                $regionImage->region_id = $region->id;
                $regionImage->name = $imageDirPath2 . $imageName2;
                $regionImage->save();
            }
        }
        // return response(['error' => ' Item does not exist ']);
        return response()->json(['response' => ['status' => 'success', 'message'=> 'Action Successful']]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function destroy($id)
    // {
    //     $theTodo = Todo::find($id);
    //     if( $theTodo )
    //     {
    //         $theTodo->delete();
    //         return response()->json( ['response' => ['status' => 'succes'] ], 201);
    //     }
    //     return response(['error' => ' Item does not found ']);
    // }
    
}
