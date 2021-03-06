<?php

use Illuminate\Http\Request;

/*
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=> 'auth:api'], function(){

    //CRUD SCHOOL
    Route::resource('school', 'API\SchoolController');

    //CRUD DISTRICT
    Route::resource('district', 'API\DistrictController');

    //CRUD PROVINCE
    Route::resource('province', 'API\ProvinceController');

    //CRUD DEPARTMENT
    Route::resource('department', 'API\DepartmentController');

    //CRUD SCHOOL GRADE
    Route::resource('school-grade', 'API\SchoolGradeController');

    //SEARCH SCHOOL
    Route::get('search-school/{param}', 'API\SchoolController@search');

    //GET PROVINCE BY DEPARTMENT
    Route::get('province-by-department/{dep_id}', 'API\ProvinceController@findByDepartment');

    //GET DISTRICT BY PROVINCE
    Route::get('district-by-province/{prov_id}', 'API\DistrictController@findByProvince');

    //VALIDATE IF EXISTS SCHOOL NAME
    Route::get('validate-school-name/{name}', 'API\SchoolController@validateName');

    //SEARCH PRODUCT-GROUP
    Route::get('search-product-group/{param}', 'API\ProductGroupController@search');

    //CRUD PRODUCT-GROUP
    Route::resource('product-group', 'API\ProductGroupController');

    //CRUD COLOR
    Route::resource('color', 'API\ColorController');

    //CRUD PRODUCT
    Route::resource('product', 'API\ProductController');

    Route::get('search-product/{param}', 'API\ProductController@search');

    //SEARCH LISTA UTILES
    Route::post('search-utiles/{param}', 'API\ListaController@search');

    //PARAMETER CRUD
    Route::resource('util', 'API\ListaController');

    //PARAMETER CRUD
    Route::resource('parameter', 'API\ParameterController');

    //VERIFY PERIOD
    Route::post('verify-period', 'API\ListaController@verifyPeriod');

    Route::resource('user', 'API\UserController');

    //SEARCH ARCHIVO
    Route::post('search-archivo/{param}', 'API\ArchivoController@search');

});



