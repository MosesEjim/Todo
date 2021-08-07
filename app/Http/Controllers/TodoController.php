<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Auth::user()->todos()->paginate(5);
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('todo.create');   
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
            'title'=>'required|string',
            'description'=>'required|string',
            'date'=>'required',
            'time'=>'required',
        ]);

        try{

            $todo = Todo::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'date'=>$request->date,
                'time'=>$request->time,
                'user_id'=>Auth::id(),
            ]);

            return redirect()->route('todos.index');

        }catch(Exception $e){

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //just to ensure a user doesn't view anothe user's Todos using the url
        $todo = Auth::user()->todos()->where('id', $id)->first();
        if($todo){
            return view('todo.show', compact('todo'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //just to ensure a user doesn't edit anothe user's Todos using the url
        $todo = Auth::user()->todos()->where('id', $id)->first();
        if($todo){
            return view('todo.edit', compact('todo'));
        }else{
            abort(404);
        }
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
            'title'=>'required|string',
            'description'=>'required|string',
            'date'=>'required',
            'time'=>'required',
        ]);

        try{
            $todo = Auth::user()->todos()->where('id', $id)->first();
            $todo->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'date'=>$request->date,
                'time'=>$request->time
            ]);

            return redirect()->route('todos.index');

        }catch(Exception $e){

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       //just to ensure a user doesn't delete another user's Todos using the url
       $todo = Auth::user()->todos()->where('id', $id)->first();
       if($todo){
           $todo->delete();
           return redirect()->route('todos.index');
       }else{
           abort(404);
       }
    }
}
