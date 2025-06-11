<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//ini didalam login
Route::group(['middleware'=>'auth'],function()
{


	Route::get('home', 'BeritasController@index');

	Route::get('beritas/destroy/{data}','BeritasController@destroy');
	Route::get('beritas/kotak','BeritasController@kotak');
	Route::resource('beritas','BeritasController');


	Route::get('jenis_beritas/destroy/{data}','Jenis_beritasController@destroy');
	Route::resource('jenis_beritas','Jenis_beritasController');

	Route::get('galleri_datas/destroy/{data}','Galleri_datasController@destroy');
	Route::resource('galleri_datas','Galleri_datasController');

	Route::get('lingkups/destroy/{data}','LingkupsController@destroy');
	Route::resource('lingkups','LingkupsController');

	Route::get('saranas/destroy/{data}','SaranasController@destroy');
	Route::resource('saranas','SaranasController');

	Route::get('agendas/destroy/{data}','AgendasController@destroy');
	Route::resource('agendas','AgendasController');

	Route::get('jenis_dokumens/destroy/{data}','Jenis_dokumensController@destroy');
	Route::resource('jenis_dokumens','Jenis_dokumensController');
	
	Route::get('sub_jenis_dokumens/destroy/{data}','Sub_jenis_dokumensController@destroy');
	Route::resource('sub_jenis_dokumens','Sub_jenis_dokumensController');

	Route::resource('dokumens','DokumensController');
	Route::get('dokumens/destroy/{data}','DokumensController@destroy');

	Route::resource('link_data','Link_datasController');
	Route::get('link_data/destroy/{data}','Link_datasController@destroy');


	Route::resource('sosials','SosialsController');
	Route::get('sosials/destroy/{data}','SosialsController@destroy');

	Route::get('users/password/{data}','UsersController@password_change');
	Route::post('users/update_password','UsersController@update_password');
	Route::get('users/hapus/{data}','UsersController@hapus');
	Route::get('users/profil/{data}','UsersController@profil');
	Route::post('users/profil_update','UsersController@profil_update');
	Route::get('users/struktur/{data}','UsersController@struktur');
	Route::post('users/struktur_update','UsersController@struktur_update');
	Route::resource('users','UsersController');
	
	
	Route::get('file_datas/destroy/{data}','file_datasController@destroy');
	Route::get('file_datas/create/{data}/{tipe}','file_datasController@create');
	Route::resource('file_datas','file_datasController');
});




Route::get('cobacoba','MainController@index2');
Route::get('dinopanel','Auth\AuthController@getLogout');
Route::get('/','MainController@index');
Route::get('mainmenu','MainController@index');
Route::get('main/dokumen/{data}','MainController@dokumen');
Route::get('main/berita_detail/{data}','MainController@berita_detail');
Route::get('main/link','MainController@link');
Route::get('main/timeline','MainController@timeline');
Route::get('main/agenda','MainController@agenda');
Route::get('main/profil','MainController@profil');
Route::get('main/galleri','MainController@galleri');
Route::get('main/prasarana/{data}','MainController@prasarana');
Route::get('main/detail/{data}','MainController@detail');
Route::post('main/saran_store','MainController@saran_store');
Route::post('main/komentar_store','MainController@komentar_store');
Route::post('main/search_store','MainController@search_store');
Route::get('main/excel/{data}','MainController@excel');
Route::get('main/tkpsda','MainController@tkpsda');
Route::get('main/komir','MainController@komir');
Route::get('main/dewan','MainController@dewan');
// Route::get('main/struktur','MainController@struktur');
Route::get('bidang','MainController@bidang');


	Route::get('databeritas/destroy/{data}','DataberitasController@destroy');
	Route::get('databeritas/kotak','DataberitasController@kotak');
	Route::resource('databeritas','DataberitasController');



Route::controllers([
   'auth' => 'Auth\AuthController',
   'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'android'],function()
{
	Route::get('/berita','AndroidApiController@berita');
	Route::get('/berita_jenis/{data}','AndroidApiController@berita_jenis');
	Route::get('/detail_berita/{data}','AndroidApiController@detail_berita');
	Route::get('/get_komentar_berita/{id}', 'AndroidApiController@get_komentar_berita');
	Route::post('/komentar_store','AndroidApiController@komentar_store');
	Route::get('/agenda','AndroidApiController@agenda');	//pagination
	Route::post('/berita_search','AndroidApiController@berita_search');	//pagination

});

