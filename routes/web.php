<?php

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

Route::get('/', 'HomeController@index');

# admin part routes
Route::resource('billing', 'Admin\BillingAndPaymentController');
Route::resource('feedback', 'Admin\FeedbackController');
Route::resource('my_knowledge_box', 'Admin\MyKnowledgeBoxController');
Route::resource('prectice', 'Admin\PracticeController');
Route::resource('report_problem', 'Admin\ReportProblemController');
Route::resource('user_account', 'Admin\UserAccountController');

# public part routes
Route::resource('blog', 'Public\BlogController');
Route::resource('clinical_management', 'Public\ClinicalManagementController');
Route::resource('contact', 'Public\ContactController');
Route::resource('content', 'Public\ContentController');
Route::resource('data_protection', 'Public\DataProtectionController');
Route::resource('emergency_planning', 'Public\EmergencyPlanningController');
Route::resource('faqs', 'Public\FaqsController');
Route::resource('health_safety', 'Public\HealthSafetyController');
Route::resource('human_resources', 'Public\HumanResourcesController');
Route::resource('infection_prevention', 'Public\InfectionPreventionControlController');
Route::resource('information_security', 'Public\InformationSecurityController');
Route::resource('patient_management', 'Public\PatientManagementController');
Route::resource('patience_operation', 'Public\PatienceOperationsController');
Route::resource('public_part', 'Public\PublicPartController');