<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\eCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DemandsController;

Route::get('/', [eCommerceController::class, 'index'])->name('home');
Route::get('/search/category/{category}', [eCommerceController::class, 'searchCategory'])->name('search.category');
Route::get('/search/tag/{tag}', [eCommerceController::class, 'searchTag'])->name('search.tag');
Route::get('/search/product/',  [eCommerceController::class, 'searchProduct'])->name('search.product');
Route::get('/show/{product}', [eCommerceController::class, 'showProduct'])->name('show.product');


//Assinatura
Route::get('/assinatura', [eCommerceController::class, 'index2'])->name('assinatura');
Route::get('/searchD/category/{category}', [eCommerceController::class, 'searchCategoryD'])->name('search.categoryD');
Route::get('/searchD/tag/{tag}', [eCommerceController::class, 'searchTagD'])->name('search.tagD');
Route::get('/searchD/demand/',  [eCommerceController::class, 'searchDemand'])->name('search.demand');
Route::get('/showD/{demand}', [eCommerceController::class, 'showDemand'])->name('show.demand');



require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');

    //Assinatura
    Route::get('/cartD', [CartController::class, 'demand'])->name('cart.demand');
    Route::post('/cartD/{demand}', [CartController::class, 'storeD'])->name('cart.storeD');
    Route::delete('/cartD/{demand}', [CartController::class, 'destroyD'])->name('cart.destroyD');


});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product',[ProductController::class, 'index'])->name('product.index');
    Route::get('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/edit/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('/product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');

    Route::get('/demand/create', [DemandsController::class, 'create'])->name('demand.create');
    Route::post('/demand/create', [DemandsController::class, 'store'])->name('demand.store');
    Route::get('/demand',[DemandsController::class, 'index'])->name('demand.index');
    Route::get('/demand/destroy/{demand}', [DemandsController::class, 'destroy'])->name('demand.destroy');
    Route::get('/demand/edit/{demand}', [DemandsController::class, 'edit'])->name('demand.edit');
    Route::put('/demand/edit/{demand}', [DemandsController::class, 'update'])->name('demand.update');
    Route::get('/demand/trash', [DemandsController::class, 'trash'])->name('demand.trash');
    Route::get('/demand/restore/{demand}', [DemandsController::class, 'restore'])->name('demand.restore');


    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/edit/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');

    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag/create', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag',[TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
    Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/tag/edit/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::get('/tag/trash', [TagController::class, 'trash'])->name('tag.trash');
    Route::get('/tag/restore/{tag}', [TagController::class, 'restore'])->name('tag.restore');
});


