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
Route::get('/logout', 'Auth\LoginController@logout');

# admin part routes
Route::resource('dashboard', 'Admin\DashboardController');
Route::resource('billing', 'Admin\BillingAndPaymentController');
Route::resource('feedback', 'Admin\FeedbackController');
Route::resource('my_knowledge_box', 'Admin\MyKnowledgeBoxController');
Route::resource('practice_account', 'Admin\PracticeAccountController');
Route::resource('report_problem', 'Admin\ReportProblemController');
Route::resource('user_account', 'Admin\UserAccountController');
Route::resource('add_subscription', 'Admin\AddSubscriptionController');
Route::resource('plan_basic', 'Admin\PlanBasicController');
Route::resource('plan_business', 'Admin\PlanBusinessController');
Route::resource('plan_professional', 'Admin\PlanProfessionalController');

Route::get('/updateUser', 'Admin\UserAccountController@updateUser');
Route::post('/updateUser', 'Admin\UserAccountController@updateUser');

Route::post('/updatePassword', 'Admin\UserAccountController@updatePassword');
Route::post('/updatePassword', 'Admin\UserAccountController@updatePassword');

Route::post('/user_account', 'Admin\UserAccountController@index');

# public part routes
Route::resource('home', 'PublicPart\PublicPartController');
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
Route::resource('practice_operations', 'PublicPart\PracticeOperationsController');
Route::resource('public_part', 'PublicPart\PublicPartController');
