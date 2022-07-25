<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shelf;
use App\Models\Tire;
use App\Rules\DateBetween;
use Illuminate\Http\Request;

class TireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tires=Tire::orderBy('id','DESC')->paginate(10);
        return view('tires.index',compact('tires'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shelf=Shelf::all();
        $customer=Customer::all();
        return view('tires.create',compact('customer','shelf'));
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
            'car_id'=>'required',
            'shelf_id'=>'required',
            'customer_id'=>'required',
            'type'=>'required',
            'manufacture_company'=>'required',
            'manufacture_year'=>['required','date',new DateBetween()],
            'rim_type'=>'required',
            'size1'=>'required',
            'size2'=>'required',
            'size3'=>'required',
            'malfunction_degree'=>'required',
        ]);
        $input=$request->all();
        Tire::create($input);
        return redirect()->route('tire.index')
            ->with('success','tire created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tire=Tire::find($id);
        return view('tires.show',compact('tire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shelf=Shelf::all();
        $customer=Customer::all();
        $tire=Tire::find($id);
        return view('tires.edit',compact('tire','shelf','customer'));
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
            'car_id'=>'required',
            'customer_id'=>'required',
            'shelf_id'=>'required',
            'type'=>'required',
            'manufacture_company'=>'required',
            'manufacture_year'=>'required',
            'rim_type'=>'required',
            'size'=>'required',
            'malfunction_degree'=>'required',
        ]);
        $tire=Tire::find($id);

        $tire->car_id=$request->car_id;
        $tire->shelf_id=$request->shelf_id;
        $tire->customer_id=$request->customer_id;
        $tire->type=$request->type;
        $tire->manufacture_company=$request->manufacture_company;
        $tire->manufacture_year=$request->manufacture_year;
        $tire->rim_type=$request->rim_type;
        $tire->size=$request->size;
        $tire->notes=$request->notes;
        $tire->malfunction_degree=$request->malfunction_degree;
        $tire->save();
        return redirect()->route('tire.index')->with('success','Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tire::find($id)->delete();
        return redirect()->route('tire.index')->with('success','Deleted Successfully');
    }
}
