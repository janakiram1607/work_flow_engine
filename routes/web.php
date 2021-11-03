<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\work_flow_engine;
use App\Http\Controllers\AdminController;

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
    return redirect('register');
});

Route::get('/dashboard', function () {
    $data['getusers'] = User::where('role', '=','customer')->get();
    return view('dashboard', $data);
})->middleware(['auth'])->name('dashboard');

Route::get('/admin-control-panel', function () {
    if(!Gate::denies('isAdmin')){
        return view('admin-control-panel');
    }else{
        return response('Only admin can access this page',200);
    }
})->middleware(['auth']);
Route::get('/process/{user}/{typ}', [AdminController::class, 'processUser'])->middleware(['auth'])->name('process.req');

require __DIR__.'/auth.php';
