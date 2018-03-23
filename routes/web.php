<?php
use Illuminate\Support\Facades\Input;
use App\Crud;

Auth::routes();
// Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// Route::get('/', function(){
// 		return view('home');
// });

//View composer - this method can send all the data from the database to any VIEW

/* PRIVATE */
View::composer(['admin.crud.adminhome'], function($view){
	$cruds_private = Crud::where('privacy', 1)
						 ->where('document_owner', Auth::id() )
						 ->Paginate(50);
						
	$view->with('cruds_private',$cruds_private);
});
/* PUBLIC */
View::composer(['admin.crud.adminhome'], function($view){
	$cruds_public = Crud::where('privacy', 0)
						->where('document_owner', Auth::id() )
						->Paginate(50);
	$view->with('cruds_public',$cruds_public);
});

/* SHARE */
View::composer(['admin.crud.adminhome'], function($view){
	$cruds_shared = Crud::where('privacy', 1)
						->where('user_id', Auth::id() )
						->where('document_owner', '!=' , Auth::id() )
						->Paginate(50);
	$view->with('cruds_shared',$cruds_shared);
});


View::composer(['admin.crud.share'], function($view){
	 $users = DB::table('users')->get();
	 $view->with('users',$users);
});

Route::get('crud/search', 'CrudController@scopeSearch');

	Route::group(['middleware' => ['roles:admin']], function () {
		
		Route::resource('admin','AdminController'); 
		Route::resource('crud','CrudController'); 
		Route::resource('users','CrudUserController');

		Route::view('myaccount','admin.crud.myaccount');
		Route::view('mydocument','admin.crud.mydocument');
		Route::view('adminhome','admin.crud.adminhome');

		Route::get('share/{id}','CrudController@share');

	});


//Create the Manager pages


	Route::group(['middleware' => ['roles:manager']], function () {
		Route::get('managerhome','ManagerController@index');
		Route::resource('manager','ManagerController'); 
		Route::get('manager/crud/create','ManagerController@create');

	});

//Create the user pages

	Route::group(['middleware' => ['roles:user']], function () {
		Route::get('userhome','UserController@index');
		Route::resource('user','UserController'); 

	});

