<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelf=Shelf::orderBy('id','DESC')->paginate(10);
        return view('admin.shelves.index',compact('shelf'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shelves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:shelves',
            'shelf_number'=>'required|numeric|unique:shelves',
            'status'=>'required',
            'capacity'=>'required|numeric',
        ]);
        $input = $request->all();
        shelf::create($input);
        return redirect()->route('shelf.index')
            ->with('success','shelf created successfully');
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
        $shelf=shelf::findOrFail($id);
        return view('admin.shelves.edit',compact('shelf'));

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
        $this->validate($request,[
           'name'=>'required|unique:name',
           'shelf_number'=>'required|unique:shelf_number',
           'status'=>'required',
           'capacity'=>'required',

        ]);
        $shelf=shelf::find($id);
        $shelf->name=$request->name;
        $shelf->shelf_number=$request->shelf_number;
        $shelf->status=$request->status;
        $shelf->capacity=$request->capacity;

        $shelf->save();
        return redirect()->route('shelf.index')->with('success','shelf Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        shelf::find($id)->delete();
        return redirect()->route('shelf.index')->with('success','Deleted Successfully');
    }
}
