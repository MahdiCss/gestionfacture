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

Route::get('/', 'UserController@index');
Route::post('/login', 'UserController@login');
Route::get('/login' ,'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::post('/chercher','UserController@datesearch');



Route::resource('listtypeuser','TypeUserController',['except' => ['destroy','create','update','store']]);
Route::post('ajouterroleuser', 'TypeUserController@store')->name('listtypeuser.store');
Route::get('liststation', 'TypeUserController@listestation');
Route::post('ajouterstation','TypeUserController@ajouterstation');




Route::resource('listclient','UtilController',['except' => ['destroy','update','create','edit']]);
Route::get('edit/{idusr}','UtilController@edit')->name('listclient.edit');
Route::get('destroy/{id}','UtilController@destroy')->name('listclient.destroy');
Route::post('update/{id}','UtilController@update')->name('listclient.update');
Route::get('ajoutclient', 'UtilController@create')->name('listclient.create');
Route::post('ajouter', 'UtilController@store')->name('listclient.store');




Route::resource('listdocument','DocumentController',['except' => ['destroy','update','create']]);
Route::get('listdocument/affiche/pdf/{idpdf}', ['as' => 'order.pdf', 'uses' => 'DocumentController@orderPdf']);
Route::get('ajoutdoc','DocumentController@create')->name('listdocument.create');
Route::get('listdevise','DocumentController@listdevise');
Route::post('ajoutnouvdevise','DocumentController@ajoutnouvdevise');
Route::get('listdeviseedit/{id}','DocumentController@listdeviseedit');
Route::get('listdevisedestroy/{id}','DocumentController@listdevisedestroy');
Route::post('deviseupdate/{id}','DocumentController@deviseupdate');
Route::get('listtva','DocumentController@listtva');
Route::get('reactivedevise/{id}','DocumentController@reactivedevise');
Route::post('ajouttva','DocumentController@ajouttva');






Route::resource('list1document','Document1Controller',['except' => ['destroy','update','create']]);
Route::get('listdocument/affiche/{id}', 'Document1Controller@show')->name('list1document.show');
Route::get('ajoutldevis/{id}', 'Document1Controller@listldev');
Route::post('list1document/{id}/modifetat','Document1Controller@update')->name('list1document.update');
Route::post('ajoutldevis/ajouternouvdev/{idmdoc}', 'Document1Controller@ajouternouvdev');
Route::get('listdocument/affiche/transformation/{id}/{idmdoc}', 'Document1Controller@transformation');




Route::resource('listarticle','ArticleConroller',['except' => ['destroy','create','update','store']]);
Route::get('listarticle/destroy/{id}','ArticleConroller@destroy')->name('listarticle.destroy');
Route::get('nonactive/reactive/{id}','ArticleConroller@reactive');
Route::post('listarticle/{id}/update','ArticleConroller@update')->name('listarticle.update');
Route::get('ajoutarticle','ArticleConroller@create')->name('listarticle.create');
Route::post('ajouterart','ArticleConroller@store')->name('listarticle.store');
Route::get('nonactive/{id}','ArticleConroller@nonactiver');
Route::post('cherchfam/{id}','ArticleConroller@parfamille');
Route::post('cherchmrq/{id}','ArticleConroller@parmarque');



Route::resource('listtypearticle','TypeArticleController',['except' => ['destroy','create','update','store']]);
Route::post('ajouttypeart','TypeArticleController@store')->name('listtypearticle.store');
Route::get('listfamille','TypeArticleController@listfamille');
Route::post('ajoutfamille','TypeArticleController@ajoutfamille');
Route::get('listmarque','TypeArticleController@listmarque');
Route::post('ajoutmarque','TypeArticleController@ajoutmarque');





Route::resource('ajouttype','TypeController',['except' => ['destroy','store','show','create']]);
Route::get('listdocument/devcli/{id}','TypeController@show')->name('ajouttype.show');
Route::post('ajoutdevisclient', 'TypeController@create')->name('ajouttype.create');
Route::post('ajoutdocclient/{id}', 'TypeController@store')->name('ajouttype.store');
Route::get('ajoutldevis/creation/{id}','TypeController@creation');
Route::get('ajoutldevis/annulerdevis/{id}','TypeController@annuldevis');






Route::resource('listtiers','TiersController',['except' => ['destroy','update','create','store']]);
Route::get('listtiers/destroy/{id}','TiersController@destroy')->name('TiersController.destroy');
Route::get('ajouttier','TiersController@create')->name('TiersController.create');
Route::post('listtiers/{id}/update','TiersController@update')->name('TiersController.update');
Route::post('ajoutertier','TiersController@store')->name('TiersController.store');
Route::get('listtiers/reactivetier/{id}','TiersController@reactivetier');