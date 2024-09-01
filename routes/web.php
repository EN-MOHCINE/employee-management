<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\login_users;
use App\Http\Controllers\PDFController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Mail\DepartmentCreatedMail;
use Illuminate\Support\Facades\Mail;



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


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});



Route::get('/login' ,[login_users::class,'index'])->name('login.index');
Route::get('/logout', [login_users::class, 'logout'])->name('logout');
Route::post('/login/store' ,[login_users::class,'login'])->name('login.store');


// Route::middleware(['AlreadyLoggedIn'])->group(function () {

            Route::get('/index', [UserController::class, 'index1'])->name('home');

            


            Route::get('/generate-pdf/{id}',[PDFController::class ,'generatepdf'])->name('pdf.generate'); ;








            // Route to list all employees
            Route::get('/employees', [EmpolyeeController::class, 'index'])->name('employees.index');

            // returns the form for adding an employee
            Route::get('/employees/create', [EmpolyeeController::class, 'create'])->name('employees.create');

            // Route to create a new employee
            Route::post('/employees', [EmpolyeeController::class, 'store'])->name('employees.store');

            // Route to show a specific employee by ID
            Route::get('/employees/{id}', [EmpolyeeController::class, 'show'])->name('employees.show');

            // Route to update a specific employee by ID
            Route::put('/employees/{id}', [EmpolyeeController::class, 'update'])->name('employees.update');

            // Route to edit a specific employee by ID
            Route::get('/employees/{id}/edit', [EmpolyeeController::class, 'edit'])->name('employees.edit');

            // Route to delete a specific employee by ID
            Route::delete('/employees/{id}', [EmpolyeeController::class, 'destroy'])->name('employees.destroy');












            // Route to list all departments
            Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

            // returns the form for adding a department
            Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');

            // Route to create a new department
            Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');

            // Route to show a specific department by ID
            Route::get('departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');

            // Route to update a specific department by ID
            Route::put('departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');

            // Route to edit a specific department by ID
            Route::get('departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');

            // Route to delete a specific department by ID
            Route::delete('departments/{id}', [DepartmentController::class,'destroy'])->name('departments.destroy');









            // Route to list all users
            Route::get('users', [UserController::class, 'index'])->name('users.index');

            // Export data
            Route::get('export-users', function () {
                return Excel::download(new UsersExport, 'users.xlsx');
            })->name('users.export');



            // returns the form for adding a post
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

            // Route to create a new user
            Route::post('users', [UserController::class, 'store'])->name('users.store');

            // Route to show a specific user by ID
            Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

            // Route to update a specific user by ID
            Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');


            // Route to edite a specific user by ID
            Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

            // Route to delete a specific user by ID
            Route::delete('users/{id}', [UserController::class,'destroy'])->name('users.destroy');
// });