<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleDetailsController;
use App\Http\Controllers\VehicleInfoController;
use App\Http\Controllers\MaintenanceScheduleController;




use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', function () {
    return view('login_register');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Register Routes
Route::get('/register', function () {
    return view('login_register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

//test database working:

Route::get('/db-test', function () {
    try {
        $users = DB::table('users')->get();
        return response()->json($users);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});


// Displaying the form might be handled by another method, like an 'index' or 'create' method.
Route::get('/maintenance', [VehicleController::class, 'index'])->name('maintenance.index');

// The form submission is handled here.
Route::post('/maintenance', [VehicleController::class, 'store'])->name('maintenance.store');


Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('maintenance.edit');
Route::put('/vehicles/{id}', [VehicleController::class, 'update'])->name('maintenance.update');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('maintenance.destroy');


// Vehicle routes
Route::post('/vehicles', [VehicleController::class, 'store']);
Route::get('/vehicles/{id}', [VehicleController::class, 'show']);

// Route voor het ophalen van voertuigdetails van de Java SOAP-service
// Route::get('/api/get-vehicle-details/{id}', [VehicleController::class, 'getVehicleDetails']);


// Maintenance Task routes
Route::post('/maintenance_tasks', [MaintenanceTaskController::class, 'create']);
Route::put('/maintenance_tasks/{id}', [MaintenanceTaskController::class, 'update']);

 
// User Preferences routes
Route::get('/user-preferences/{userId}', [UserPreferenceController::class, 'getUserPreferences']);
Route::post('/user-preferences/{userId}', [UserPreferenceController::class, 'updateUserPreferences']);

Route::get('/test-user-preferences', [UserPreferenceController::class, 'test']);

Route::get('/vehicle', [VehicleDetailsController::class, 'index']);

Route::post('/vehicle', [VehicleDetailsController::class, 'getVehicleData']);

//grpc
Route::get('/grpc/schedule', [MaintenanceScheduleController::class, 'create']);
Route::post('/grpc/schedule', [MaintenanceScheduleController::class, 'schedule']);