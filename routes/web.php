<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Controllers\UserController;



// Middleware global pour les routes d'administration
// Route::middleware('role:super-admin')->group(function () {

//     // Routes pour les permissions
//     Route::prefix('permissions')->name('permissions.')->group(function () {
//         Route::get('/', [PermissionController::class, 'index'])->name('index');
//         Route::post('/', [PermissionController::class, 'store'])->name('store');
//         Route::get('/create', [PermissionController::class, 'create'])->name('create');
//         Route::get('/{permission}', [PermissionController::class, 'show'])->name('show');
//         Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('edit');
//         Route::put('/{permission}', [PermissionController::class, 'update'])->name('update');
//         Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('destroy');
//     });

//     // Routes pour les rôles
//     Route::prefix('roles')->name('roles.')->group(function () {
//         Route::get('/', [RoleController::class, 'index'])->name('index');
//         Route::post('/', [RoleController::class, 'store'])->name('store');
//         Route::get('/create', [RoleController::class, 'create'])->name('create');
//         Route::get('/{role}', [RoleController::class, 'show'])->name('show');
//         Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
//         Route::put('/{role}', [RoleController::class, 'update'])->name('update');
//         Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
//         // Routes supplémentaires pour les permissions des rôles
//         Route::get('/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
//         Route::put('/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
//     });

//     // Routes pour les utilisateurs
//     Route::prefix('users')->name('users.')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');
//         Route::post('/', [UserController::class, 'store'])->name('store');
//         Route::get('/create', [UserController::class, 'create'])->name('create');
//         Route::get('/{user}', [UserController::class, 'show'])->name('show');
//         Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
//         Route::put('/{user}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
//     });

// });












/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::group(['middleware' => ['role:super-admin']], function () {
//     //
    
//     Route::resource('permissions', App\Http\Controllers\PermissionController::class);
//     Route::resource('roles', App\Http\Controllers\RoleController::class);
    
//     Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
//     Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']); 
//     Route::resource('users', App\Http\Controllers\UserController::class);
// });



// Routes pour les permissions
Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->middleware('role:super-admin')->name('permissions.index');
Route::post('permissions', [App\Http\Controllers\PermissionController::class, 'store'])->middleware('role:super-admin')->name('permissions.store');
Route::get('permissions/create', [App\Http\Controllers\PermissionController::class, 'create'])->middleware('role:super-admin')->name('permissions.create');
Route::get('permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'show'])->middleware('role:super-admin')->name('permissions.show');
Route::get('permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->middleware('role:super-admin')->name('permissions.edit');
Route::put('permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'update'])->middleware('role:super-admin')->name('permissions.update');
Route::delete('permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->middleware('role:super-admin')->name('permissions.destroy');


Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

// Routes pour les rôles
Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('role:super-admin')->name('roles.index');
Route::post('roles', [App\Http\Controllers\RoleController::class, 'store'])->middleware('role:super-admin')->name('roles.store');
Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->middleware('role:super-admin')->name('roles.create');
Route::get('roles/{role}', [App\Http\Controllers\RoleController::class, 'show'])->middleware('role:super-admin')->name('roles.show');
Route::get('roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('role:super-admin')->name('roles.edit');
Route::put('roles/{role}', [App\Http\Controllers\RoleController::class, 'update'])->middleware('role:super-admin')->name('roles.update');
Route::delete('roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('role:super-admin')->name('roles.destroy');

// Routes pour les utilisateurs
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->middleware('role:super-admin')->name('users.index');
Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->middleware('role:super-admin')->name('users.store');
Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->middleware('role:super-admin')->name('users.create');
Route::get('users/{user}', [App\Http\Controllers\UserController::class, 'show'])->middleware('role:super-admin')->name('users.show');
Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('role:super-admin')->name('users.edit');
Route::put('users/{user}', [App\Http\Controllers\UserController::class, 'update'])->middleware('role:super-admin')->name('users.update');
Route::delete('users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('role:super-admin')->name('users.destroy');










Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
