<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Country;
use Validator;
use Auth;
use Session;

class SupplierController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $suppliers = Supplier::with('country')
      ->orderBy('id', 'desc')
      ->get();

    return view('supplier.index', compact('suppliers'));
  }

  public function create()
  {
    $countryList = Country::select('id', 'country_name')->get();

    return view('supplier.create', compact('countryList'));
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
    $supplier = new Supplier();
    $supplier->name = $request->name;
    $supplier->phone_number = $request->phone_number;
    $supplier->email = $request->email;
    $supplier->nid = $request->nid;
    $supplier->address = $request->address;
    $supplier->country_id = $request->country_id;
    $supplier->created_by = Auth::id();
    $supplier->save();

    Session::flash('message', 'Supplier created successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('suppliers');
  }

  public function edit($id)
  {
    $supplier = Supplier::find($id);
    $countryList = Country::select('id', 'country_name')->get();
    return view('supplier.edit', compact('supplier', 'countryList'));
  }

  public function update(Request $request, $id)
  {
    $supplier = Supplier::find($id);
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
    $supplier->name = $request->name;
    $supplier->phone_number = $request->phone_number;
    $supplier->email = $request->email;
    $supplier->nid = $request->nid;
    $supplier->address = $request->address;
    $supplier->country_id = $request->country_id;
    $supplier->status = $request->status;
    $supplier->updated_by = Auth::id();
    $supplier->save();

    Session::flash('message', 'Supplier updated successfully');
    Session::flash('alert-class', 'alert-success');
    return redirect('suppliers');
  }
}
