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
        $ItemCode = ItemCode::all();
         $ItemCode = new ItemCode([
          'category'     => $request->get('category'),
        ]);
         $ItemCode->save();
         return redirect('/category');
    }

    public function show(ItemCode $itemCode)
    {
        //
    }

    public function edit($id)
    {
        $ItemCode = ItemCode::find($id);
        return view('admin.crud.categoryedit', compact('ItemCode','id'));
    }

  
    public function update(Request $request, $id)
    {
        $ItemCode = ItemCode::find($id);

        $ItemCode->category = $request->get('category');

        $ItemCode->save();

        return redirect('/category'); 
    }

  
    public function destroy($id)
    {
       $ItemCode = ItemCode::find($id);
       $ItemCode->delete();

       return redirect('/category');
    }
}
