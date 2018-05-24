<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
/* this is for the index files */
class AdminController extends Controller
{
     public function index()
    {
       $cruds = Crud::all()->toArray();   
      return view('admin.crud.index', compact('cruds') );
    }

  
    public function create()
    {
         return view('admin.create');
    }

    
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
         $admin = admin::all();
         $admin = new admin([
          'division'     => $request->get('division'),
          'document'     => $request->get('document'),
          'year_release' => $request->get('year_release'),
          'item_code'    => $request->get('item_code'),
          'file'         => $getimageName
        ]);
        
        
        // move file to storage/app/public
        $request->file->move(public_path('storage'), $getimageName);

        // save to the database
         $admin->save();
         return redirect('/admin');
    }


    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
          $admin = admin::find($id);
        
        return view('admin.edit', compact('admin','id'));
    }

    
    public function update(Request $request, $id)
    {
        $admin = admin::find($id);


        echo $admin->division = $request->get('division');
        echo $admin->document = $request->get('document');
        echo $admin->year_release = $request->get('year_release');
        echo $admin->item_code = $request->get('item_code');
        echo $admin->file =  $request->file->getClientOriginalName();

        $admin->save();
        return redirect('/admin');
    }

  
    public function destroy($id)
    {
       $admin = admin::find($id);
       $admin->delete();

        return redirect('/admin');
    }
}
