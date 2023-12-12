<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckCashier;


// Route::get('/', [
//     App\Http\Controllers\DashboardController::class, 'index'
// ])->name('dashboard');
Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('dashboard');

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::post('permissions/loadFromRouter', [App\Http\Controllers\PermissionController::class, 'LoadPermission'])->name('permissions.load-router');

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::get('profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.profile');
Route::patch('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('users.updateProfile');

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder.index');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator_builder.field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('generator_builder.relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator_builder.generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('generator_builder.rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('generator_builder.from_file');


Route::resource('fileUploads', App\Http\Controllers\FileUploadController::class);

Route::resource('catalogs', App\Http\Controllers\catalogController::class);

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('products', App\Http\Controllers\ProductsController::class);


//เริ่มต้นเขียนโปรแกรม
// Route::resource('product_files', App\Http\Controllers\ProductFilesController::class);

Route::middleware([CheckAdmin::class])->group(function () {

    Route::get('product_files', [App\Http\Controllers\DASHBOARD_ADMIN\ProductFilesController::class, 'index'])->name('product_files.index');
    Route::get('purchasesummary', [App\Http\Controllers\DASHBOARD_ADMIN\ProductFilesController::class, 'purchasesummary'])->name('purchasesummary.index');
    Route::get('summaryreportbyproduct', [App\Http\Controllers\DASHBOARD_ADMIN\ProductFilesController::class, 'summaryreportbyproduct'])->name('summaryreportbyproduct.index');
    Route::get('ordersummaryreportbynumber',[App\Http\Controllers\DASHBOARD_ADMIN\ProductFilesController::class, 'ordersummaryreportbynumber'])->name('ordersummaryreportbynumber.index');
    Route::get('summaryreportbydate', [App\Http\Controllers\DASHBOARD_ADMIN\ProductFilesController::class, 'summaryreportbydate'])->name('summaryreportbydate.index');
    Route::get('dashboard', [App\Http\Controllers\DASHBOARD_ADMIN\ProductFilesController::class, 'dashboard'])->name('dashboard.index');

    // Route::resource('takeTheJobs', App\Http\Controllers\take_the_jobsController::class);
    // Route::resource('product_files', App\Http\Controllers\Antiques\ProductFiles\ProductFilesController::class);
    // Route::get('product_files/{id}/type', [App\Http\Controllers\Antiques\ProductFiles\TypeController::class, 'index'])->name('product_files.type.index');
    // Route::get('product_files/{id}/type/edit', [App\Http\Controllers\Antiques\ProductFiles\TypeController::class, 'edit'])->name('product_files.type.edit');
    // Route::get('product_files/{id}/type/{type_id}/detail', [App\Http\Controllers\Antiques\ProductFiles\DetailController::class, 'index'])->name('product_files.detail.index');
    // Route::get('product_files/{id}/type/{type_id}/detail/edit', [App\Http\Controllers\Antiques\ProductFiles\DetailController::class, 'edit'])->name('product_files.detail.edit');
});

// CheckCashier
Route::middleware([CheckCashier::class])->group(function () {
});




