<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos =  Todo::orderBy('created_at','DESC')->get();
        // $todos = Todo::paginate(5);
         return response()->json(['response' => ['status' => 'success', 'todos' => $todos ]]);
    }

   
    public function search( $item)
    {
  
         $searched = Todo::where('name', 'like', '%'. $item  . '%' )->get();
        //  return $searched;
         return response()->json(['response' => ['status' => 'success', 'data' => $searched]]);

    }

    // public function searchCylinder( Request $request){
    //     $searchCylinders = Cylinder::where('unique_id', 'like', '%'. $request->searchQuest . '%' )
    //     ->orWhere('cylinder_number', 'like', '%'. $request->searchQuest . '%')
    //     ->get();

    //     return json_encode( $searchCylinders);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|string|unique:todos'
        ]);
        
        $todo = new Todo;
        $todo->name = $request->name;
         $todo->save();
        return response()->json(['response' => ['status' => 'success', 'todoItem' => $todo ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json(['response'=> ['status'=> 'Success', 'todo' => $todo ]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
        // return $request->all();
        $this->validate($request , [
            'name' => 'required|string|unique:todos,name,'.$id
        ]);
        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->update();
        
        return response()->json(['response' => ['status' => 'success', 'todo' => $todo ]]);

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
        // return $request->all();
        $theItem = Todo::find($id);
        if($theItem){
            $theItem->completed = $request->completed ? true : false; 
            $theItem->completed_at = $request->completed ? Carbon::now()  : null; 
            $theItem->save();
            return response()->json(['response' => ['status' => 'success', 'theItem' => $theItem ]]);
        }
        
        return response()->json(['response' => ['status' => 'fail' ]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json(['response' => ['status' => 'success']]);
        
    }
}
