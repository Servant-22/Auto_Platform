<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleDetailsController;
use App\Http\Controllers\VehicleInfoController;
use App\Http\Controllers\MaintenanceScheduleController;
use App\Http\Controllers\MaintenanceTaskController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FeedbackController;




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



//Pyton, Ruby Service - MQTT, REST
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

// Maintenance Task routes
Route::post('/maintenance_tasks', [MaintenanceTaskController::class, 'create']);
Route::put('/maintenance_tasks/{id}', [MaintenanceTaskController::class, 'update']);

 
//Javascrip node.js service - graphql
Route::get('/user-preferences/{userId}', [UserPreferenceController::class, 'getUserPreferences']);
Route::post('/user-preferences/{userId}', [UserPreferenceController::class, 'updateUserPreferences']);
Route::get('/test-user-preferences', [UserPreferenceController::class, 'test']);

//c# service - SOAP
Route::get('/vehicle', [VehicleDetailsController::class, 'index']);
Route::post('/vehicle', [VehicleDetailsController::class, 'getVehicleData']);

//go service - grpc/rest
Route::get('/grpc/schedule', [MaintenanceScheduleController::class, 'create']);
Route::post('/grpc/schedule', [MaintenanceScheduleController::class, 'scheduleAppointment']);
Route::post('/schedule-appointment', [MaintenanceScheduleController::class, 'scheduleAppointment']);

//python service - websocket
Route::get('/send-email', [EmailController::class, 'showEmailForm']);
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send-email');
// Route::get('/feedback/{email}', [FeedbackController::class, 'processFeedback']);
Route::post('/feedback/{email}', [FeedbackController::class, 'processFeedback']);
Route::get('/feedback/{email}', function ($email) {
    return view('feedback', ['email' => $email]);
});
