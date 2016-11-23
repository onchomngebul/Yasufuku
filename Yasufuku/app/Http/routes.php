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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('dashboard');
// });

Route::get('/', 'HomeController@dashboard');

Route::resource('prod_plans', 'prod_plansController');
Route::resource('prod_actual', 'prod_actualController');
Route::resource('prod_cycle', 'prod_cycleController');

Route::post('upload', function(){
       return Response::json(array('a'=>var_dump(Input::all()),'b'=>var_dump($_FILES)));
});

Route::post('upload', array('uses' => 'prod_plansController@uploadFile'));
Route::get('export', array('uses' => 'prod_actualController@exportCsv'));
Route::get('export2', array('uses' => 'prod_cycleController@exportCsv'));

Route::resource('ng_master', 'ng_masterController');
Route::resource('ng_record', 'ng_recordController');

// Route::get('/api/prod_plans/{id?}', ['middleware' => 'auth.basic', function($id = null) {
//        if ($id == null) {
//               $prod_plans = App\prod_plan::all(array('idprod_plans', 'pp_date', 'shift', 'machine_no'));
//        } else {
//               $prod_plans = App\prod_plan::find($id, array('idprod_plans', 'pp_date', 'shift', 'machine_no'));
//        }
//        return Response::json(array(
//               'error' => false,
//               'prod_plans' => $prod_plans,
//               'status_code' => 200
//        ));
// }]);

Route::group(['middlewareGroups' => 'web'], function () {
       Route::auth();
       Route::get('/home', 'HomeController@dashboard');
       Route::group(['middleware' => 'admin'], function()
       {
              Route::resource('admin', 'AdminController');
       });
});

Route::get('/api/prod_plans', function(){
       return view('prod_plans.test');
});

Route::post('/api/prod_plans', 'prod_plansController@getApi');

Route::resource('stoploss_master', 'stoploss_masterController');
Route::resource('stoploss_record', 'stoploss_recordController');
