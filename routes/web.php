<?php

use Illuminate\Support\Facades\Route;
use App\Category;
use App\Subcategory;
use Illuminate\Support\Facades\Input;

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


Route::get('/gm', function () {
    return view('generate-card');
});

Route::get('/ht', function () {
    return view('health-tip');
});

Route::get('/st', function () {
    return view('stat');
});

Route::get('/pww', function () {
    return view('pww');
});
Route::get('/dyn', function () {
    return view('dyn');
});
Route::get('/vp', function () {
    return view('view-patient');
});
/*Route::get('/cat', function () {
	$categories=Category::all();
    return view('cat')->with('categories',$categories);
});

/*Route::get('/ajax-subcat', function () {
	$cat_id=Input::get('cat_id');
	$subcategories=Subcategory::where('category_id','=',$cat_id)->get();
    return Response::json($subcategories);
});*/


Auth::routes();
Route::resource('sample', 'SampleController');
Route::resource('patient', 'PatientController');
Route::post('/sample/{id}', 'SampleController@nas')->name('sample.nas');
Route::post('sample/update', 'SampleController@update')->name('sample.update');
Route::get('sample/destroy/{id}', 'SampleController@destroy');

Route::post('/dynf', 'DynamicController@insert')->name('dynf');
Route::post('/create-phc', 'PhcController@PhcState')->name('PhcState');

Route::post('/patient-registration', 'PatientController@pat_reg')->name('pat_reg');
Route::post('/patient-records', 'PatientController@patRec')->name('patRec');
Route::post('/submit-patient-edit', 'PatientController@postPatientEdit')->name('postPatientEdit');
Route::post('/submit-health-tips', 'HealthTipsController@postTips')->name('postTips');

Route::post('/search-patients-record', 'PatientController@search')->name('search');
Route::post('/save-report', 'PatientController@saveReport')->name('saveReport');
Route::get('/all-patients-record', 'PatientController@getAllPatients')->name('getAllPatients');
Route::get('/patients-follow-up', 'PatientController@follow_up')->name('follow_up');
Route::get('/view-follow-up-report', 'PatientController@viewFollowupReport')->name('viewFollowupReport');
Route::post('/edit-patient-record', 'PatientController@postThread')->name('postThread');
Route::get('/create-sms-schedule', 'PatientController@getSmsSchedulePatients')->name('getSmsSchedulePatients');
Route::post('/post-sms-record', 'PatientController@smsSchedule')->name('smsSchedule');
Route::post('/post-sms-schedule', 'PatientController@postSmsSchedule')->name('postSmsSchedule');
Route::get('/generate-card={card_type}', 'PatientController@generate_card')->name('generate_card');

Route::post('/profile-phc', 'PhcController@addProfilePhc')->name('addProfilePhc');
Route::get('create-phc', 'PhcController@index');
Route::post('create-phc/insert', 'PhcController@insert')->name('create-phc.insert');
Route::post('add-maintenance-schedule', 'PhcController@add_maint_schedule')->name('add_maint_schedule');
Route::post('refer-patient', 'PhcController@add_refferal')->name('add_refferal');
Route::get('/view-maintenance-schedule={all}', 'PhcController@viewMaintenanceSchedule')->name('viewMaintenanceSchedule');
Route::get('/view-refferal={all}', 'PhcController@viewReferral')->name('viewReferral');
Route::post('/select-phc', 'HomeController@getPhc')->name('getPhc');
Route::get('/dashboard', 'PhcController@dashboard')->name('dashboard');
Route::get('/select-phc-list', 'HomeController@getPhcList')->name('getPhcList');
Route::post('/profile-picture', 'PhcController@uploadProfile')->name('uploadProfile');
Route::post('/submit-profile-phc', 'PhcController@submitProfilePhc')->name('submitProfilePhc');
Route::post('/submit-patient-diagnosis', 'PatientController@postPatientDiagnose')->name('postPatientDiagnose');
Route::post('/submit-birth-registration', 'PatientController@birthReg')->name('birthReg');
Route::get('/view-birth-record', 'PatientController@viewBirthReg')->name('viewBirthReg');
Route::post('/edit-birth-record', 'PatientController@editBirthRec')->name('editBirthRec');
Route::post('/search-antenatal-record', 'PatientController@search_antenatal')->name('search_antenatal');
Route::post('/search-birth-record', 'PatientController@search_birth')->name('search_birth');

Route::get('/create-antenatal-schedule', 'PatientController@getSchedulePatients')->name('getSchedulePatients');

Route::post('/schedule-antenatal', 'PatientController@postSchedule')->name('postSchedule');
Route::post('/register-antenatal', 'PatientController@antenatalReg')->name('antenatalReg');
Route::post('/view-antenatal', 'PatientController@viewAntenatalRec')->name('viewAntenatalRec');

Route::get('/pregnancy-health-tips', 'PregnantController@pregHealthTips')->name('pregHealthTips');
Route::get('/health-tip={id}', 'PregnantController@pregTip')->name('pregTip');

Route::get('/antenatal-enrollment={code}-id+{id}', 'PatientController@reEnroll')->name('reEnroll');
Route::get('/active-antenatal', 'PatientController@viewActiveRec')->name('viewActiveRec');
Route::get('/all-antenatal', 'PatientController@viewAllRec')->name('viewAllRec');

Route::get('/diagnose={patient}', 'PatientController@getPrescForm')->name('getPrescForm');
Route::get('/history+{patient}={id}', 'PatientController@getPatHistory')->name('getPatHistory');

Route::get('/home', 'PhcController@dashboard')->name('dashboard');
Route::get('/home', 'PhcController@dashboard')->name('home');
Route::get('/', 'PhcController@dashboard')->name('dashboard');
Route::get('/delete-need={id}+{phc}', 'HomeController@delete_need')->name('delete_need');

Route::post('/update-needs', 'HomeController@updateNeeds')->name('updateNeeds');
Route::post('/rem', 'HomeController@remove')->name('remove');
Route::post('/needs-submitted', 'HomeController@postNeeds')->name('postNeeds');
Route::get('/needs-indicator', 'HomeController@getNeeds')->name('getNeeds');
Route::post('/view-phc-need', 'HomeController@view_need')->name('view_need');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::post('comment', 'DynamicController@saveComment')->name('submit-comment.save');
Route::post('reply', 'DynamicController@saveReply')->name('submit-reply.save');
Route::post('submit-comment/save', 'HealthTipsController@saveComment')->name('');

Route::post('create-medicine-category', 'InventoryController@postMedicineCat')->name('postMedicineCat');
Route::post('load-medicine', 'InventoryController@postLoadMedicine')->name('postLoadMedicine');
Route::get('view-medicine-category', 'InventoryController@viewMedCat')->name('viewMedCat');
Route::get('view-medicine-store', 'InventoryController@viewMed')->name('viewMed');
Route::get('medicine-dashboard', 'InventoryController@indexMed')->name('indexMed');
Route::get('delete-medicine-category/delete-category={id}', 'InventoryController@delete_medcat')->name('delete_medcat');
Route::get('delete-medicine/delete={id}', 'InventoryController@delete_medicine')->name('delete_medicine');
Route::get('sales', 'InventoryController@sales')->name('sales');
Route::get('view-sales', 'InventoryController@viewSales')->name('viewSales');
Route::get('add-medicine', 'InventoryController@addMed')->name('addMed');
Route::post('edit-medicine-category', 'InventoryController@editMedcat')->name('editMedcat');
Route::post('submit-medicine', 'InventoryController@postAddmed')->name('postAddmed');

Route::post('save-sales/insert', 'InventoryController@insert')->name('save-sales.insert');

