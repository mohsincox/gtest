<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderNo;
use App\Models\Customer;
use Validator;
use Auth;
use Session;

class OrderNoController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $orderNos = OrderNo::orderBy('id', 'desc')->get();

    return view('order_no.index', compact('orderNos'));
  }

  public function create()
  {
    $customerList = Customer::select('id', 'name', 'address')->get();

    return view('order_no.create', compact('customerList'));
  }

  public function store(Request $request)
  {
    $input = $request->all();
    $rules = [
      'order_no' => 'required|unique:order_nos',
      'order_date' => 'date|nullable',
      'customer_id' => 'required',
    ];
    $messages = [
      'customer_id.required' => 'The Customer field is required.',
    ];

    $validator = Validator::make($input, $rules, $messages);
    if ($validator->fails()) {
      Session::flash('message', 'Something went wrong!');
      Session::flash('alert-class', 'alert-danger');

      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }
    $orderNo = new OrderNo();
    $orderNo->order_no = $request->order_no;
    $orderNo->order_date = $request->order_date;
    $orderNo->customer_id = $request->customer_id;
    $orderNo->remarks = $request->remarks;
    $orderNo->created_by = Auth::id();
    $orderNo->save();

    Session::flash('message', 'Order No. created successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('order-nos');
  }

  public function edit($id)
  {
    $orderNo = OrderNo::find($id);
    $customerList = Customer::select('id', 'name', 'address')->get();

    return view('order_no.edit', compact('orderNo', 'customerList'));
  }

  public function update(Request $request, $id)
  {
    $orderNo = OrderNo::find($id);
    $input = $request->all();
    $rules = [
      'order_no' => 'required|unique:order_nos,order_no,' . $orderNo->id,
      'order_date' => 'date|nullable',
      'customer_id' => 'required',
      'status' => 'required',
    ];
    $messages = [
      'customer_id.required' => 'The Customer field is required.',
    ];

    $validator = Validator::make($input, $rules, $messages);
    if ($validator->fails()) {
      Session::flash('message', 'Something went wrong!');
      Session::flash('alert-class', 'alert-danger');

      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }
    $orderNo->order_no = $request->order_no;
    $orderNo->order_date = $request->order_date;
    $orderNo->customer_id = $request->customer_id;
    $orderNo->remarks = $request->remarks;
    $orderNo->status = $request->status;
    $orderNo->updated_by = Auth::id();
    $orderNo->save();

    Session::flash('message', 'Order No. updated successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('order-nos');
  }
}
