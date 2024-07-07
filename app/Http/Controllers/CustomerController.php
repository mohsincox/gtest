<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Country;
use Validator;
use Auth;
use Session;

class CustomerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $customers = Customer::with('country')
      ->orderBy('id', 'desc')
      ->get();

    return view('customer.index', compact('customers'));
  }

  public function create()
  {
    $countryList = Country::select('id', 'country_name')->get();

    return view('customer.create', compact('countryList'));
  }

  public function store(Request $request)
  {
    $input = $request->all();
    $rules = [
      'name' => 'required',
      'phone_number' => 'required',
    ];
    $messages = [];

    $validator = Validator::make($input, $rules, $messages);
    if ($validator->fails()) {
      Session::flash('message', 'Something went wrong!');
      Session::flash('alert-class', 'alert-danger');

      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }
    $customer = new Customer();
    $customer->name = $request->name;
    $customer->phone_number = $request->phone_number;
    $customer->email = $request->email;
    $customer->nid = $request->nid;
    $customer->address = $request->address;
    $customer->country_id = $request->country_id;
    $customer->created_by = Auth::id();
    $customer->save();

    Session::flash('message', 'Customer created successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('customers');
  }

  public function edit($id)
  {
    $customer = Customer::find($id);
    $countryList = Country::select('id', 'country_name')->get();
    return view('customer.edit', compact('customer', 'countryList'));
  }

  public function update(Request $request, $id)
  {
    $customer = Customer::find($id);
    $input = $request->all();
    $rules = [
      'name' => 'required',
      'phone_number' => 'required',
      'status' => 'required',
    ];
    $messages = [];

    $validator = Validator::make($input, $rules, $messages);
    if ($validator->fails()) {
      Session::flash('message', 'Something went wrong!');
      Session::flash('alert-class', 'alert-danger');

      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }
    $customer->name = $request->name;
    $customer->phone_number = $request->phone_number;
    $customer->email = $request->email;
    $customer->nid = $request->nid;
    $customer->address = $request->address;
    $customer->country_id = $request->country_id;
    $customer->status = $request->status;
    $customer->updated_by = Auth::id();
    $customer->save();

    Session::flash('message', 'Sustomer updated successfully');
    Session::flash('alert-class', 'alert-success');
    return redirect('customers');
  }
}
