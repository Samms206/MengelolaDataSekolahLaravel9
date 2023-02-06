    <?php

use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;

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



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    //logout
    Route::get('/logout', [AuthController::class, 'logout']);

    //student
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::get('/student-add', [StudentController::class, 'create'])->middleware('must-admin');
    Route::post('/student', [StudentController::class, 'store']);
    Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
    Route::put('/student/{id}', [StudentController::class, 'update']);
    Route::get('/student-delete/{id}', [StudentController::class, 'delete']);
    Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy']);
    Route::get('/students-deleted', [StudentController::class, 'deleted']);
    Route::get('/student/{id}/restore', [StudentController::class, 'restore']);

    //class
    Route::get('/class', [ClasController::class, 'index']);
    Route::get('/class-detail/{id}', [ClasController::class, 'show']);
    Route::get('/class-add', [ClasController::class, 'create']);
    Route::post('/class', [ClasController::class, 'store']);
    Route::get('/class-edit/{id}', [ClasController::class, 'edit']);
    Route::put('/class/{id}', [ClasController::class, 'update']);

    //teacher
    Route::get('/teachers', [TeacherController::class, 'index']);
    Route::get('/teachers/{id}', [TeacherController::class, 'show']);
    Route::get('/teacher-add', [TeacherController::class, 'create']);
    Route::post('/teacher', [TeacherController::class, 'store']);
    Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit']);
    Route::put('/teacher/{id}', [TeacherController::class, 'update']);
    Route::delete('/teacher/{id}', [TeacherController::class, 'delete']);

    // 

    //mapel | mata pelajaran
    Route::get('/mapels',[MapelController::class,'index']);
    Route::get('/mapels/{id}', [MapelController::class, 'show']);
    Route::get('/mapel-add', [MapelController::class, 'create']);
    Route::post('/mapels', [MapelController::class, 'store']);
    Route::get('/mapel-edit/{id}', [MapelController::class, 'edit']);
    Route::put('/mapels/{id}', [MapelController::class, 'update']);
    Route::delete('/mapels/{id}', [MapelController::class, 'delete']);


    //ekstrakurikular
    Route::get('/extracurricular',[ExtracurricularController::class,'index']);
    Route::get('/ekskul-student-add',[ExtracurricularController::class,'add_student']);
    Route::get('/ekskul-student-add/{id}',[ExtracurricularController::class,'show_add_student']);
    Route::post('/add_student_ekskul/{id}',[ExtracurricularController::class,'update_pivot']);
    Route::get('/extracurricular/{id}',[ExtracurricularController::class,'show']);
    Route::get('/ekskul-add', [ExtracurricularController::class, 'create']);
    Route::post('/extracurricular', [ExtracurricularController::class, 'store']);
    Route::get('/extracurricular-edit/{id}', [ExtracurricularController::class, 'edit']);
    Route::put('/extracurricular/{id}', [ExtracurricularController::class, 'update']);

});
Route::middleware(['guest'])->group(function () {
    //login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authentication']);
});








