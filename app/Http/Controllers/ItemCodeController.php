<?php

namespace App\Http\Controllers;

use App\ItemCode;
use Illuminate\Http\Request;

class ItemCodeController extends Controller
{
    public function index()
    {
          $ItemCode = ItemCode::all()->toArray();   
      return view('admin.crud.category', compact('ItemCode') );
    }

    public function create()
    {
       return view('admin.crud.categorycreate');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ItemCode $itemCode)
    {
        //
    }

    public function edit(ItemCode $itemCode)
    {
        //
    }

  
    public function update(Request $request, ItemCode $itemCode)
    {
        //
    }

  
    public function destroy(ItemCode $itemCode)
    {
        //
    }
}
