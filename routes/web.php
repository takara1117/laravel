<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\CustomerController;
	use App\Http\Controllers\ProductController;

	Route::get("/", 					  [CustomerController::class, "index"]);
	Route::get("/customer/login", 		  [CustomerController::class, "login"]);
	Route::get("/customer/logout",        [CustomerController::class, "logout"]);
	Route::post("/customer/authenticate", [CustomerController::class, "authenticate"]);
	Route::get("/customer/new",           [CustomerController::class, "new"]);
	Route::post("/customer/create",       [CustomerController::class, "create"]);
	Route::get("/customer/finish",        [CustomerController::class, "finish"]);
	Route::get("/customer/list",          [CustomerController::class, "list"]);

	Route::get("/product/list", 		  [ProductController::class, "list"]);
	Route::get("/product/new",            [ProductController::class, "new"]);
	Route::post("/product/create",        [ProductController::class, "create"]);
	Route::get("/product/detail/{id}", 	  [ProductController::class, "detail"]);
	Route::get("/product/edit/{id}", 	  [ProductController::class, "edit"]);
	Route::post("/product/update",	  	  [ProductController::class, "update"]);
	Route::get("/product/delete/{id}",	  [ProductController::class, "delete"]);

