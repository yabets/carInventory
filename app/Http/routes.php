<?php


use App\Param;

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


//Car inventory routes
Route::resource('owners', 'OwnerController');
Route::resource('cars', 'CarController');
Route::resource('buyers', 'BuyerController');
Route::resource('foundcars', 'FoundCarController');
Route::resource('callrecords', 'CallRecordController');
Route::resource('requestedcars', 'RequestedCarController');

Route::get('/params',function()
{
    $params = Param::first();
    return ($params);
});

Route::get('/param/{brand}', function ($brand){
    $names = DB::table('names')->where('Brand', $brand)->get();
    foreach ($names as $name) {
        return $name->Name;
    }
});

Route::get('/paramupdate', 'ParamController@updates');
Route::get('/parambrand', 'ParamController@brand');
Route::get('/param', 'ParamController@show');
//Route::post('/paramupdate', 'ParamController@updates');
//Route::post('/parambrand', 'ParamController@brand');
Route::get('/paramedit', 'ParamController@edit');
//Route::get('/param/{brand}', 'ParamController@brand');

Route::put('/param/', 'ParamController@update')->name('param.update');


Route::get('/', function()
{
    return redirect('index.php/cars');
});

Route::post('/cars/search', 'CarController@search');
Route::post('/cars/filter', 'CarController@filter');
Route::post('/requestedcars/search', 'RequestedCarController@search');
Route::post('/requestedcars/filter', 'RequestedCarController@filter');
Route::post('/callrecords/filter', 'CallRecordController@filter');
Route::post('/callrecords/search', 'CallRecordController@search');
Route::post('/owners/search', 'OwnerController@search');
Route::post('/buyers/search', 'BuyerController@search');

Route::get('/charts', function()
{
    return View::make('mcharts');
});

Route::get('/tables', function()
{
    return View::make('table');
});

Route::get('/forms', function()
{
    return View::make('form');
});

Route::get('/grid', function()
{
    return View::make('grid');
});

Route::get('/buttons', function()
{
    return View::make('buttons');
});


Route::get('/icons', function()
{
    return View::make('icons');
});

Route::get('/panels', function()
{
    return View::make('panel');
});

Route::get('/typography', function()
{
    return View::make('typography');
});

Route::get('/notifications', function()
{
    return View::make('notifications');
});

Route::get('/blank', function()
{
    return View::make('blank');
});

Route::get('/login', function()
{
    return View::make('login');
});

Route::get('/documentation', function()
{
    return View::make('documentation');
});

