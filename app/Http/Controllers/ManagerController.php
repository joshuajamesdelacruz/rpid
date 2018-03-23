<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cruds = Crud::all()->toarray();   
        return view('manager.crud.index', compact('cruds') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'division' => 'required',
            'document' => 'required',
            'year_release' => 'required',
            'item_code' => 'required',
            'file' => 'required|mimes:pdf'
         ]);
      
        // rename image name or file name 
        $getimageName = time().'.'.$request->file->getClientOriginalExtension();
        
         //checking all the fields required after validation
         $crud = Crud::all();
         $crud = new Crud([
          'division'     => $request->get('division'),
          'document'     => $request->get('document'),
          'year_release' => $request->get('year_release'),
          'item_code'    => $request->get('item_code'),
          'file'         => $getimageName
        ]);
        
        
        // move file to storage/app/public
        $request->file->move(public_path('storage'), $getimageName);

        // save to the database
         $crud->save();
         return redirect('/manager');
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
