<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawMaterial;
use Validator;
use Auth;
use Session;

class RawMaterialController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $rawMaterials = RawMaterial::orderBy('id', 'desc')->get();

    return view('raw_material.index', compact('rawMaterials'));
  }

  public function create()
  {
    return view('raw_material.create');
  }

  public function store(Request $request)
  {
    $input = $request->all();
    $rules = [
      'name' => 'required|unique:raw_materials',
    ];
    $messages = [
      'name.required' => 'The Raw Material field is required.',
      'name.unique' => 'The Raw Material already exist.',
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
    $rawMaterial = new RawMaterial();
    $rawMaterial->name = $request->name;
    $rawMaterial->remarks = $request->remarks;
    $rawMaterial->created_by = Auth::id();
    $rawMaterial->save();

    Session::flash('message', 'Raw Material created successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('raw-materials');
  }

  public function edit($id)
  {
    $rawMaterial = RawMaterial::find($id);
    return view('raw_material.edit', compact('rawMaterial'));
  }

  public function update(Request $request, $id)
  {
    $rawMaterial = RawMaterial::find($id);
    $input = $request->all();
    $rules = [
      'name' => 'required|unique:raw_materials,name,' . $rawMaterial->id,
      'status' => 'required',
    ];
    $messages = [
      'name.required' => 'The Raw Material field is required.',
      'name.unique' => 'The Raw Material already exist.',
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
    $rawMaterial->name = $request->name;
    $rawMaterial->remarks = $request->remarks;
    $rawMaterial->status = $request->status;
    $rawMaterial->updated_by = Auth::id();
    $rawMaterial->save();

    Session::flash('message', 'Raw Material updated successfully');
    Session::flash('alert-class', 'alert-success');
    return redirect('raw-materials');
  }
}
