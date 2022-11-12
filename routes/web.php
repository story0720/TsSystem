<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});*/


//廠商清單管理
Route::get("/", [App\Http\Controllers\FactoryManagementController::class, 'index'])->name('management.index');
Route::get("/create", [App\Http\Controllers\FactoryManagementController::class, 'create'])->name('management.create');
Route::post("/", [App\Http\Controllers\FactoryManagementController::class, 'store'])->name('management.store');
Route::get("/{id}/edit", [App\Http\Controllers\FactoryManagementController::class, 'edit'])->name('management.edit');
Route::put("/{id}", [App\Http\Controllers\FactoryManagementController::class, 'update'])->name('management.update');
Route::delete("/{id}/delete", [App\Http\Controllers\FactoryManagementController::class, 'destroy'])->name('management.delete');



//廠商種類管理
Route::get("/category", [App\Http\Controllers\FactoryCategoryController::class, 'index'])->name('category.index');
Route::get("/category/create", [App\Http\Controllers\FactoryCategoryController::class, 'create'])->name('category.create');
Route::post("/category", [App\Http\Controllers\FactoryCategoryController::class, 'store'])->name('category.store');
Route::get("/category/{id}/edit", [App\Http\Controllers\FactoryCategoryController::class, 'edit'])->name('category.edit');
Route::put("/category/{id}", [App\Http\Controllers\FactoryCategoryController::class, 'update'])->name('category.update');
Route::delete("/category/{id}/delete", [App\Http\Controllers\FactoryCategoryController::class, 'destroy'])->name('category.delete');


//加工處理
Route::get("/processing", [App\Http\Controllers\ProcessingController::class, 'index'])->name('processing.index');
Route::get("/processing/create", [App\Http\Controllers\ProcessingController::class, 'create'])->name('processing.create');
Route::post("/processing", [App\Http\Controllers\ProcessingController::class, 'store'])->name('processing.store');
Route::get("/processing/{id}/edit", [App\Http\Controllers\ProcessingController::class, 'edit'])->name('processing.edit');
Route::put("/processing/{id}", [App\Http\Controllers\ProcessingController::class, 'update'])->name('processing.update');
Route::delete("/processing/{id}/delete", [App\Http\Controllers\ProcessingController::class, 'destroy'])->name('processing.delete');


//耗材管理
Route::get("/Consume", [App\Http\Controllers\ConsumeController::class, 'index'])->name('consume.index');
Route::get("/Consume/create", [App\Http\Controllers\ConsumeController::class, 'create'])->name('consume.create');
Route::post("/Consume", [App\Http\Controllers\ConsumeController::class, 'store'])->name('consume.store');
Route::get("/Consume/{id}/edit", [App\Http\Controllers\ConsumeController::class, 'edit'])->name('consume.edit');
Route::put("/Consume/{id}", [App\Http\Controllers\ConsumeController::class, 'update'])->name('consume.update');
Route::delete("/Consume/{id}/delete", [App\Http\Controllers\ConsumeController::class, 'destroy'])->name('consume.delete');

//耗材進貨管理
Route::get("/restock", [App\Http\Controllers\RestockController::class, 'index'])->name('restock.index');
Route::get("/restock/create", [App\Http\Controllers\RestockController::class, 'create'])->name('restock.create');
Route::post("/restock", [App\Http\Controllers\RestockController::class, 'store'])->name('restock.store');
Route::get("/restock/{id}/edit", [App\Http\Controllers\RestockController::class, 'edit'])->name('restock.edit');
Route::put("/restock/{id}", [App\Http\Controllers\RestockController::class, 'update'])->name('restock.update');
Route::delete("/restock/{id}/delete", [App\Http\Controllers\RestockController::class, 'destroy'])->name('restock.delete');

//耗材月結
Route::resource("/monthly",App\Http\Controllers\MonthlyController::class);

//耗材使用紀錄
Route::resource("/usage",App\Http\Controllers\UsageController::class);

//標籤雲
Route::resource("/tag",App\Http\Controllers\TagController::class)->only(['index','destory']);
