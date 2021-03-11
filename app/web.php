

Route::get('/',function(){
	return view('welcome');
});
Route::get('/home','FontpageController@home');
