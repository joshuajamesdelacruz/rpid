<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Crud;


class CRUDController extends Controller
{

    //to make sure the user is login use this function


     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {

      $cruds = Crud::where('privacy', 0)->Paginate(50);

     return view('admin.crud.index', compact('cruds'));


    }

  
    public function create()
    {
         return view('admin.crud.create');
    }

    
    public function store(Request $request)
    {
     
      
        
        $request->validate([
            'division'      => 'required',
            'document'      => 'required',
            'year_release'  => 'required',
            'item_code'     => 'required',
            'file'          => 'required|mimes:pdf'
         ]);
      
        // rename image name or file name 
        $getimageName = time().'.'.$request->file->getClientOriginalExtension();

        //share token
        $dt = bcrypt( date('Y-m-d H:i:s') );

        //checking all the fields required after validation
         $crud = Crud::all();
         $crud = new Crud([

          'user_id'           => Auth::id(),
          'division'          => $request->get('division'),
          'document'          => $request->get('document'),
          'document_owner'    => Auth::id(),
          'year_release'      => $request->get('year_release'),
          'item_code'         => $request->get('item_code'),
          'file'              => $getimageName,
          'privacy'           => $request->get('privacy'),
          'sharetoken'        => $dt
          
        ]);
        
        
        // move file to storage/app/public
        $request->file->move(public_path('storage'), $getimageName);

        // save to the database
         $crud->save();
         return redirect('/adminhome');
    }


    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
          $crud = Crud::find($id);
        
        return view('admin.crud.edit', compact('crud','id'));
    }

    
    public function update(Request $request, $id)
    {
        $crud = Crud::find($id);

        if(isset($request->file)){

           $filename = $crud->file;
           $file = public_path().'\storage\\' .$filename;
        
             if(file_exists($file)){

                  @unlink($file);
                 
                  $crud->delete();

                 $getimageName = time().'.'.$request->file->getClientOriginalExtension();
                 $crud->division = $request->get('division');
                 $crud->document = $request->get('document');
                 $crud->year_release = $request->get('year_release');
                 $crud->item_code = $request->get('item_code');
                 $crud->file = $getimageName; 

                 $request->file->move(public_path('storage'), $getimageName);
                 $crud->save();
                 return redirect('/adminhome');                 

             }else{

                  echo "file does not exist";
             }

             


        }else{    
         
         $crud->division = $request->get('division');
         $crud->document = $request->get('document');
         $crud->year_release = $request->get('year_release');
         $crud->item_code = $request->get('item_code');
        

        
         $crud->save();
         return redirect('/adminhome');

        }

        
    }

  
    public function destroy($id)
    {

           $crud = Crud::find($id);
           $filename = $crud->file;
           $file = public_path().'\storage\\' .$filename;
        
         if(file_exists($file)){

              @unlink($file);
              echo 'file deleted' ;
              $crud->delete();
              return redirect('/adminhome');
             

         }else{

              echo "file does not exist";
         }
          
    }


    public function scopeSearch(Request $request){

     

      $cruds = Crud::search($request->q)
                  ->where('privacy',0)
                  ->paginate(50)
                  ->appends(["only" => "q"]);;


      return view( 'admin.crud.index',compact('cruds') );
    }



    public function share($id){

        $share = Crud::find($id);
        
        return view('admin.crud.share', compact('share','id'));

    }

    public function shareupdate(Request $request,$id){             

        if($request->category == "Person"){
        //get 2 [users/cruds] tables in the sharing and person to function name, division and the files    
        $cruds = DB::table('cruds')->where('id', $id)->first();
    
        $user_id = $request->Person;
        $users = DB::table('users')->where('id', $user_id)->first();
       
        $user_id = $users->id;
        $user_name = $users->name;

        $cruds_id = $cruds->id;
        $cruds_owner = $cruds->document_owner;
        $cruds_division = $cruds->division;
        $cruds_document = $cruds->document;
        $cruds_year_release = $cruds->year_release;
        $cruds_sharetoken = $cruds->sharetoken;
        $cruds_privacy = $cruds->privacy;
        $cruds_item_code = $cruds->item_code;
        $cruds_file = $cruds->file;
        $cruds_created_at = $cruds->created_at;
        $cruds_updated_at = $cruds->updated_at;

            DB::table('cruds')->insert([
            'division'         => $cruds_division, 
            'document'         => $cruds_document,
            'year_release'     => $cruds_year_release,
            'item_code'        => $cruds_item_code,
            'file'             => $cruds_file,
            'user_id'          => $user_id,     //share to this user
            'sharetoken'       => $cruds_sharetoken,
            'privacy'          => $cruds_privacy,
            'document_owner'   => $cruds_owner,   //user who owns the file
            'created_at'       => $cruds_created_at,
            'updated_at'       => $cruds_updated_at
            ]);
                 
        return redirect('adminhome')->withSuccess('Shared to ' . $user_name);
       
    }if($request->category == "Division"){

        $cruds = DB::table('cruds')->where('id', $id)->get();
        $user_id = $request->Division;
        $users = DB::table('users')->where('division', $user_id)->get();

         $users->division;
        


        //  return redirect('adminhome')->withSuccess('Shared to '. $request->Division .' Division!');
        }
         
    }

  
   
}
