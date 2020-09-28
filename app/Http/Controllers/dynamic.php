<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicField;
use Validator;

class DynamicsController extends Controller
{
    function index()
    {
     return view('df');
    }

    function insert(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'itemName.*'  => 'required',
       'desc.*'  => 'required'
       'qtty.*'  => 'required'
       'price.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $item = $request->itemName;
      $brief_desc = $request->desc;
      $qtty = $request->qtty;
      $price = $request->price;
      for($count = 0; $count < count($item); $count++)
      {
       $data = array(
        'item' => $item[$count],
        'brief_desc'  => $brief_desc[$count]
        'qtty'  => $qtty[$count]
        'price'  => $price[$count]
        'uploaded_by'  =>"dd"
        'verified'  => 0
        'picture'  => "ee"
       );
       $insert_data[] = $data; 
      }

      DynamicField::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }
}
