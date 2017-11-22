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

});



