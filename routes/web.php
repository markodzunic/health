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
// Route::resource('prectice', 'Admin\PracticeController');
Route::resource('report_problem', 'Admin\ReportProblemController');
Route::resource('user_account', 'Admin\UserAccountController');

# public part routes
Route::resource('blog', 'PublicPart\BlogController');
Route::resource('clinical_management', 'PublicPart\ClinicalManagementController');
Route::resource('contact', 'PublicPart\ContactController');
Route::resource('content', 'PublicPart\ContentController');
Route::resource('data_protection', 'PublicPart\DataProtectionController');
Route::resource('emergency_planning', 'PublicPart\EmergencyPlanningController');
Route::resource('faqs', 'PublicPart\FaqsController');
Route::resource('health_safety', 'PublicPart\HealthSafetyController');
Route::resource('human_resources', 'PublicPart\HumanResourcesController');
Route::resource('infection_prevention', 'PublicPart\InfectionPreventionControlController');
Route::resource('information_security', 'PublicPart\InformationSecurityController');
Route::resource('patient_management', 'PublicPart\PatientManagementController');
Route::resource('patience_operation', 'PublicPart\PatienceOperationsController');
Route::resource('public_part', 'PublicPart\PublicPartController');