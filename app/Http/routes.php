<?php

Route::get('/admin/create',['uses' => 'UserController@createAdmin','as' => 'admin.create']);
Route::post('/admin/create',['uses' => 'UserController@postAdmin','as' => 'post.admin']);

Route::group(['middleware' => 'tools'],function(){

	Route::group(['middleware' => 'guest'],function(){
		Route::get('/',['uses'=>'LoginController@index', 'as' => 'login']);
		Route::post('/',['uses'=>'LoginController@postLogin', 'as' => 'post.login']);
	});

	Route::group(['middleware' => 'auth'],function(){

		Route::get('/logout',['uses'=>'LoginController@logout', 'as' => 'logout']);

	    Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);

		Route::group(['prefix' => 'matpel'], function(){
			route::get('/',['uses'=>'MatpelController@index', 'as' => 'matpel.index']);
			route::get('/sampah',['uses'=>'MatpelController@sampah', 'as' => 'matpel.sampah']);
			route::get('/tambah',['uses'=>'MatpelController@add', 'as' => 'matpel.add']);
			route::get('/edit/{id}',['uses'=>'MatpelController@edit', 'as' => 'matpel.edit']);
			route::post('/edit/{id}',['uses'=>'MatpelController@update', 'as' => 'matpel.update']);
			route::get('/delete/{id}',['uses'=>'MatpelController@delete', 'as' => 'matpel.delete']);
			route::post('/tambah',['uses'=>'MatpelController@store', 'as' => 'matpel.store']);
			route::get('/restore/{id}',['uses' => 'MatpelController@restore', 'as' => 'matpel.restore']);
		});

		Route::group(['prefix' => 'guru'], function(){
			route::get('/',['uses' => 'GuruController@index', 'as' => 'guru.index']);
			route::get('/sampah',['uses' => 'GuruController@sampah', 'as' => 'guru.sampah']);
			route::get('/tambah',['uses' => 'GuruController@add', 'as' => 'guru.add']);
			route::post('/tambah',['uses' => 'GuruController@store', 'as' => 'guru.store']);
			route::get('/edit/{id}',['uses' => 'GuruController@edit', 'as' => 'guru.edit']);
			route::post('/edit/{id}',['uses' => 'GuruController@update', 'as' => 'guru.update']);
			route::get('/delete/{id}',['uses' => 'GuruController@delete', 'as' => 'guru.delete']);
			route::get('/restore/{id}',['uses' => 'GuruController@restore', 'as' => 'guru.restore']);
		});

		route::group(['prefix' => 'kelas'], function(){
			route::get('/',['uses' => 'KelasController@index', 'as' => 'kelas.index']);
			route::get('/sampah',['uses' => 'SiswaController@sampah', 'as' => 'siswa.sampah']);
			route::get('/tambah',['uses' => 'KelasController@add', 'as' => 'kelas.add']);
			route::post('/tambah',['uses' => 'KelasController@store', 'as' => 'kelas.store']);
			route::get('/edit/{id}',['uses' => 'KelasController@edit', 'as' => 'kelas.edit']);
			route::post('/edit/{id}',['uses' => 'KelasController@update', 'as' => 'kelas.update']);
			route::get('/delete/{id}',['uses' => 'KelasController@delete', 'as' => 'kelas.delete']);
		});

		route::group(['prefix' => 'siswa'], function(){
			route::get('/',['uses' => 'SiswaController@index', 'as' => 'siswa.index']);
			route::get('/tambah',['uses' => 'SiswaController@add', 'as' => 'siswa.add']);
			route::post('/tambah',['uses' => 'SiswaController@store', 'as' => 'siswa.store']);
			route::get('/edit/{id}',['uses' => 'SiswaController@edit', 'as' => 'siswa.edit']);
			route::post('/edit/{id}',['uses' => 'SiswaController@update', 'as' => 'siswa.update']);
			route::get('/delete/{id}',['uses' => 'SiswaController@delete', 'as' => 'siswa.delete']);
			route::get('/pdf',['uses' => 'SiswaController@pdf', 'as' => 'siswa.pdf']);
			route::get('/restore/{id}',['uses' => 'SiswaController@restore', 'as' => 'siswa.restore']);
		});

		route::group(['prefix' => 'walikelas'], function(){
			route::get('/',['uses' => 'WalikelasController@index', 'as' => 'walikelas.index']);
		});

		route::group(['prefix' => 'nilai'],function(){
			route::get('/',['uses' => 'NilaiController@index', 'as' => 'nilai.index']);
			route::get('/tambah/{id}/{semester}',['uses' => 'NilaiController@add', 'as' => 'nilai.add']);
			route::post('/tambah',['uses' => 'NilaiController@store', 'as' => 'nilai.store']);
			route::get('/edit/{id}/{semester}',['uses' => 'NilaiController@edit', 'as' => 'nilai.edit']);
			route::post('/edit/{id}',['uses' => 'NilaiController@update', 'as' => 'nilai.update']);
			route::get('/show/{id}',['uses' => 'NilaiController@show', 'as' => 'nilai.show']);
			route::post('/pdf/{id}/{semester}',['uses' => 'NilaiController@pdf', 'as' => 'nilai.pdf']);
		});
	});
});	