<?php
//xc
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' =>['auth']] , function(){
Route::group(['middleware' => ['admin']] , function (){


    Route::get('/profile' ,'Profile@profile' )->name('profile');
    Route::get('/repo/goods' ,'Profile@repo_goods' )->name('repo_goods');

    Route::get('/add/company' ,'CompanyController@create' )->name('add.company')->middleware('company_exist');
    Route::post('/add/company' ,'CompanyController@store' )->name('company')->middleware('company_exist');

//    Route::get('/add/roles' ,'RoleController@create' )->name('add.roles');
//    Route::post('/add/roles' ,'RoleController@store' )->name('roles');

    Route::get('/add/employees' ,'EmployeesController@create' )->name('add.employees')->middleware('check_company');
    Route::post('/add/employees' ,'EmployeesController@store' )->name('employees');
    Route::get('/all/employees', 'EmployeesController@all')->name('all.employees');
    Route::get('/employees/by/{employee}', 'EmployeesController@empById')->name('empById');

    Route::get('/add/repo' ,'RepositoryController@create' )->name('add.repo');
    Route::post('/add/repo' ,'RepositoryController@store' )->name('repo');

    Route::get('/add/goods' ,'GoodsController@create' )->name('add.goods');
    Route::post('/add/goods' ,'GoodsController@store' )->name('goods');
    Route::get('/add/available/{goods}' ,'GoodsController@available' )->name('available');

    Route::get('/asign/goods/{goods}' ,'OrderEmpController@asignForm')->name('asign.goods');
    Route::post('/asign/goods' ,'OrderEmpController@asign')->name('asign');



    Route::get('/home', 'HomeController@index')->name('home');
//

    Route::get('/add/customers', 'CustomersController@create')->name('add.customers');
    Route::get('/all/customers', 'CustomersController@index')->name('all.customers');
    Route::post('/add/customers', 'CustomersController@store')->name('customers');

    Route::get('/all/orders', 'OrdersController@index')->name('all.orders');
    Route::get('/add/orders', 'OrdersController@create')->name('add.orders');
    Route::post('/add/orders', 'OrdersController@store')->name('orders');//add
    Route::get('/order/by/{order}' ,'OrdersController@orderByID' )->name('ordById');
    Route::get('/task/finish', 'OrderEmpController@OrdersTakent')->name('order.taken');
    Route::get('/asign/order/{orders}' ,'OrderEmpController@asignOrderForm' )->name('asign.order');
    Route::post('/asign/order' ,'OrderEmpController@asign_order' )->name('order');//asign
});

    Route::group(['middleware' => ['superAdmin']] , function (){
    Route::get('/super/admin/add/user', 'SuperAdminController@index')->name('superAdmin.AddUser');
    });
    Route::group(['middleware' => ['delegate']] , function (){
//        Route::get('/super/admin/add/user', 'SuperAdminController@index')->name('superAdmin.AddUser');
    });


});
// for always
//Auth::routes([
//    'register' => true, // Registration Routes...
//    'reset' => false, // Password Reset Routes...
//    'verify' => false, // Email Verification Routes...
//    'login' => true
//]);




