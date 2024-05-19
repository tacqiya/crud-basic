
Route::get('/', [FrontpageController::class, 'index']);

Route::get('categories', [CategoryController::class, 'index'])->name('category');
Route::get('categories/create',[CategoryController::class,'create'])->name('create-category');
Route::post('categories/store',[CategoryController::class,'store'])->name('store-category');
Route::get('categories/edit/{id}',[CategoryController::class,'edit'])->name('edit-category');
Route::put('categories/update/{id}',[CategoryController::class,'update'])->name('update-category');
Route::get('categories/delete/{id}',[CategoryController::class,'destroy'])->name('delete-category');

