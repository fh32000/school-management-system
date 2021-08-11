<?php

use App\Http\Controllers\Auth\AuthRouteAPIController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();


//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath',]
    ], function () {

//==============================Guest pages============================
    Route::group(['middleware' => ['guest']], function () {

        Route::get('/', [AuthRouteAPIController::class, 'login']);
        Route::get('login', [AuthRouteAPIController::class, 'login']);

    });

//==============================Auth pages============================
    Route::group(
        [
            'middleware' => ['auth']
        ], function () {

        //==============================parents============================

        Route::view('add_parent', 'livewire.show_Form');
        //==============================dashboard============================
        Route::group(['namespace' => 'v1'], function () {
            Route::get('/dashboard', 'HomeController@index')->name('dashboard');

            //==============================dashboard============================

            Route::resource('Grades', 'GradeController');


            //==============================Classrooms============================
            Route::resource('Classrooms', 'ClassroomController');
            Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

            Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');


            //==============================Sections============================


            Route::resource('Sections', 'SectionController');

            Route::get('/classes/{id}', 'SectionController@getclasses');




            //==============================Teachers============================

            Route::resource('Teachers', 'TeacherController');


            //==============================Students============================

            Route::resource('Students', 'StudentController');
            Route::resource('Graduated', 'GraduatedController');
            Route::resource('Promotion', 'PromotionController');
            Route::resource('Fees_Invoices', 'FeesInvoicesController');
            Route::resource('Fees', 'FeesController');
            Route::resource('receipt_students', 'ReceiptStudentsController');
            Route::resource('ProcessingFee', 'ProcessingFeeController');
            Route::resource('Payment_students', 'PaymentController');
            Route::resource('Attendance', 'AttendanceController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');


            //==============================subjects============================

            Route::resource('subjects', 'SubjectController');


            //==============================Exams============================

            Route::resource('Exams', 'ExamController');
        });
    });
});
