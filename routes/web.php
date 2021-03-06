<?php

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

// Home
Route::get("/", "HomeController@index")->name("index");
Route::get('/home', 'HomeController@index')->name('home');

// User Authentication
Auth::routes();

// Admin
Route::middleware(['auth.admin'])->group(function () {
    Route::name("admin.")->group(function () {
        Route::resource("admin/users", "UserController");
        Route::resource("admin/foods", "FoodController");
        Route::resource("admin/companies", "CompanyController");
        Route::resource("admin/transactions", "TransactionController")->only("index", "destroy");
    });
    Route::resource("admin", "AdminPanelController")->only("index");
});

// Company
Route::middleware(['auth.company'])->group(function () {
    Route::name("company.")->group(function () {
        Route::resource("company/foods", "FoodController");
        Route::resource("company/companies", "CompanyController");
        Route::resource("company/transactions", "TransactionController")->only("index", "destroy");
    });
    Route::resource("company", "CompanyPanelController")->only("index");
});

// Search
Route::get("search/{query}", "SearchController@index");

Route::group(['middleware' => ['auth']], function () {
    // cart
    Route::resource("cart", "CartController")->only("index", "store", "destroy");
    Route::get("cart/checkout", "CartController@checkout")->name("cart.checkout");

    // Food purchase
    Route::post("foods/{id}/buy", "FoodController@buy")->name("foods.buy");
});
