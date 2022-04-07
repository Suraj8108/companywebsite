<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landing;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\updatedetails;
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

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/dashboard');
    }
    return view('landing');
});
Route::post('register',"App\Http\Controllers\landing@register");
Route::post('login',"App\Http\Controllers\landing@login");
Route::get('dashboard',"App\Http\Controllers\landing@dashboard");
Route::get('logout',"App\Http\Controllers\landing@logout");

/* Add a Company */
Route::get('addcompany',"App\Http\Controllers\CompanyController@addCompany");
Route::post('addcompany',"App\Http\Controllers\CompanyController@postaddCompany");

/* List of Company */
Route::get('companydetails', "App\Http\Controllers\CompanyController@companydetails");

/* Delete a company */
Route::post('deletecompany', "App\Http\Controllers\CompanyController@deletecompany");

/* Autocomplete Company Name */
Route::get('autocomplete',"App\Http\Controllers\CompanyController@autocomplete")->name('autocomplete');

/* Find Searched Company*/
Route::get('findcompany',"App\Http\Controllers\CompanyController@findcompany");

/* Add a transaction */
Route::post('addtransaction',"App\Http\Controllers\CompanyController@addtransaction");

/* Delete a transaction */
Route::post('deletetrans', "App\Http\Controllers\CompanyController@deletetransaction");

/* Redirect to update details page */
Route::get('updatesdetails',"App\Http\Controllers\updatedetails@landing");

/* Update User Details */
Route::post('updateuser',"App\Http\Controllers\updatedetails@updateuser");

/* Update Basic Details */
Route::post('updatebasic',"App\Http\Controllers\updatedetails@updatebasic");

/* Generate Doc File */
Route::post('generatedoc',"App\Http\Controllers\landing@generatedoc");
