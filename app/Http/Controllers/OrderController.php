<?php

namespace App\Http\Controllers;



use App\Models\Customer;
use App\Models\Shelf;
use App\Models\Tire;
use App\Rules\DateBetween;
use Illuminate\Http\Request;

class OrderController extends Controller
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
    public function fetchTire(){
        $shelf=Shelf::all();
        $customer=Customer::all();

        $tireComp=view('components.tireCreate',compact('customer','shelf'))->render();

        return response()->json([
            'tireComp'=>$tireComp,
        ]);
    }
    public function fetchDoor(){
        $shelf=Shelf::all();
        $customer=Customer::all();
        $doorComp=view('components.doors_create',compact('customer','shelf'))->render();

        return response()->json([
            'doorComp'=>$doorComp,
        ]);
    }

    public function create()
    {
        $shelf=Shelf::all();
        $customer=Customer::all();

        return view('orders.create',compact('shelf','customer'));
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
            'tire'=>'required',
            'car_id'=>'required',
            'shelf_id'=>'required',
            'customer_id'=>'required',
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
    public function destroy($id)
    {
        //
    }
}
