<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $customer = Customer::orderBy('id','DESC')->paginate(10);
        return view('admin.customers.index',compact('customer'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
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
           'name_ar'=>'required',
           'name_en'=>'required',
           'email'=>'required|email|unique:customers,email',
           'mobile'=>'required|unique:customers,mobile',
           'address'=>'required',
        ]);
        $input = $request->all();
        Customer::create($input);
        return redirect()->route('customers.index')
            ->with('success','customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('admin.customers.edit',compact('customers'));
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
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'mobile' => 'required'
        ]);

        $customer = customer::find($id);
        $customer->name_ar= $request->name_ar;
        $customer->name_en= $request->name_en;
        $customer->email= $request->email;
        $customer->mobile= $request->mobile;

        $customer->save() ;

        return redirect()->route('customers.index')
            ->with('success','تم التعديل بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customers.index')
            ->with('success','تم الحذف بنجاح');
    }
    public function export()
    {
        $all_customers = [];
        $customers = Customer::select('name', 'email','mobile', 'status','created_at')->get();

        foreach ($customers as $item) {
            $all_customers[] = [
                'name' => $item->name ??'N/A',
                'email' => $item->email ??'N/A',
                'mobile' => $item->mobile ??'N/A',
                'status' => $item->status_name  ??'N/A',
                'created_at' => $item->created_at  ??'N/A',
            ];
        }

        return Excel::download(new CustomerExport($all_customers), 'Customers.xlsx');

    }
    public function printCustomerData(){
        $customers = Customer::orderBy('id','DESC')->get();
        return view('admin.reports.print_customer',compact('customers'));

    }
    public function customer_car($id)
    {
        $car = Car::where('customer_id', $id)->get();
        $car_id = request('car_id') ?? '';
        $generatedOptions = '';
        foreach ($car as $car) {
            if ($car_id and $car_id == $car->id)
                $generatedOptions .= '<option value="' . $car->id . '" selected>' . $car->car_number . '</option>';
            else
                $generatedOptions .= '<option value="' . $car->id . '">' . $car->car_number . '</option>';
        }
        return response()->json(['options' => $generatedOptions]);
    }



}
