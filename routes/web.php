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

Route::get('/', 'PublicPart\PublicPartController@index');
Route::get('/logout', 'Auth\LoginController@logout');

# admin part routes
Route::resource('dashboard', 'Admin\DashboardController');
Route::resource('notification', 'Admin\NotificationsController');
// Route::resource('messages', 'Admin\MessagesController');
// Route::resource('billing', 'Admin\BillingAndPaymentController');
Route::resource('feedback', 'Admin\FeedbackController');
Route::resource('my_knowledge_box', 'Admin\MyKnowledgeBoxController');
Route::resource('my_knowledge_box_features', 'Admin\MyKnowledgeBoxFeaturesController');
Route::resource('practice_account', 'Admin\PracticeAccountController');
Route::resource('report_problem', 'Admin\ReportProblemController');
Route::resource('user_account', 'Admin\UserAccountController');
Route::resource('add_subscription', 'Admin\AddSubscriptionController');
// Route::resource('plan_basic', 'Admin\PlanBasicController');
// Route::resource('plan_business', 'Admin\PlanBusinessController');
// Route::resource('plan_professional', 'Admin\PlanProfessionalController');
Route::resource('admin_blog', 'Admin\BlogController');
Route::resource('admin_posts', 'Admin\PostsController');
Route::resource('admin_pages', 'Admin\PagesController');
Route::resource('admin_pages_list', 'Admin\PagesListController');

Route::get('/plan_business', 'Admin\AddSubscriptionController@plan_business');
Route::get('/plan_basic', 'Admin\AddSubscriptionController@plan_basic');
Route::get('/plan_professional', 'Admin\AddSubscriptionController@plan_professional');
Route::get('/assignPractice', 'Admin\AddSubscriptionController@assignPractice');
Route::post('/practice_account', 'Admin\PracticeAccountController@index');

Route::post('/practice_account_billing', 'Admin\BillingAndPaymentController@index');
Route::get('/practice_account_billing', 'Admin\BillingAndPaymentController@index');

Route::post('/getUserInfo', 'Admin\UserController@getUserInfo');

Route::get('/billing/updateBilling', 'Admin\BillingAndPaymentController@updateBilling');
Route::post('/billing/updateBilling', 'Admin\BillingAndPaymentController@updateBilling');

Route::get('/report_problem/create', 'Admin\ReportProblemController@create');
Route::post('/report_problem/create', 'Admin\ReportProblemController@create');

Route::get('/billing', 'Admin\BillingAndPaymentController@index');
Route::post('/billing', 'Admin\BillingAndPaymentController@index');

Route::get('/practice_account', 'Admin\PracticeAccountController@index');

Route::get('/practices', 'Admin\PracticeController@index');
Route::post('/practices', 'Admin\PracticeController@index');

Route::get('/practices/updatePractice', 'Admin\PracticeController@updatePractice');
Route::post('/practices/updatePractice', 'Admin\PracticeController@updatePractice');

Route::get('/blogs/updateCategory', 'Admin\BlogController@updateCategory');
Route::post('/blogs/updateCategory', 'Admin\BlogController@updateCategory');

Route::get('/blogSingle', 'PublicPart\BlogController@blogSingle');
Route::post('/blogSingle', 'PublicPart\BlogController@blogSingle');

Route::post('/blogs/updateCatBlog', 'Admin\BlogController@updateCatBlog');

Route::get('/blogs', 'Admin\BlogController@index');
Route::post('/blogs', 'Admin\BlogController@index');

Route::get('/login/getLogin', 'Auth\LoginController@getLogin');
Route::post('/login/getLogin', 'Auth\LoginController@getLogin');

Route::get('/blogs/updateBlog', 'Admin\BlogController@updateBlog');
Route::post('/blogs/updateBlog', 'Admin\BlogController@updateBlog');

Route::get('/blogs/deleteBlog', 'Admin\BlogController@deleteBlog');
Route::post('/blogs/deleteBlog', 'Admin\BlogController@deleteBlog');

Route::get('/pages', 'Admin\PagesController@index');
Route::post('/pages', 'Admin\PagesController@index');

Route::get('/pages/updatePage', 'Admin\PagesController@updatePage');
Route::post('/pages/updatePage', 'Admin\PagesController@updatePage');

Route::get('/pages/deletePage', 'Admin\PagesController@deletePage');
Route::post('/pages/deletePage', 'Admin\PagesController@deletePage');

Route::get('/searchPages', 'Admin\PagesController@searchPages');
Route::post('/searchPages', 'Admin\PagesController@searchPages');

Route::get('/upload_images', 'Admin\PagesController@upload_images');
Route::post('/upload_images', 'Admin\PagesController@upload_images');

Route::get('/messages', 'Admin\MessagesController@index');
Route::post('/messages', 'Admin\MessagesController@index');

Route::get('/images', 'Admin\GalleryController@index');
Route::post('/images', 'Admin\GalleryController@index');

Route::get('/images/uploadImage', 'Admin\GalleryController@uploadImage');
Route::post('/images/uploadImage', 'Admin\GalleryController@uploadImage');

Route::get('/images/deleteImage', 'Admin\GalleryController@deleteImage');
Route::post('/images/deleteImage', 'Admin\GalleryController@deleteImage');

Route::get('/documents/uploadDocument', 'Admin\DocumentsController@uploadDocument');
Route::post('/documents/uploadDocument', 'Admin\DocumentsController@uploadDocument');

Route::get('/documents/deleteDocument', 'Admin\DocumentsController@deleteDocument');
Route::post('/documents/deleteDocument', 'Admin\DocumentsController@deleteDocument');

Route::get('/documents', 'Admin\DocumentsController@index');
Route::post('/documents', 'Admin\DocumentsController@index');

Route::get('/messages/deleteMessage', 'Admin\MessagesController@deleteMessage');
Route::post('/messages/deleteMessage', 'Admin\MessagesController@deleteMessage');

Route::post('/messages/readMessage', 'Admin\MessagesController@readMessage');

Route::post('/payment', 'Admin\AddSubscriptionController@payment');

Route::post('/selectAdmin', 'Admin\PracticeAccountController@selectAdmin');

Route::get('/updateAdmin', 'Admin\PracticeAccountController@updateAdmin');
// Route::post('/updateAdmin', 'Admin\PracticeAccountController@updateAdmin');

Route::get('/practices/deletePractice', 'Admin\PracticeController@deletePractice');
Route::post('/practices/deletePractice', 'Admin\PracticeController@deletePractice');

Route::post('/practiceStuff', 'Admin\PracticeAccountController@practiceStuff');
Route::post('/practiceAdmin', 'Admin\PracticeAccountController@practiceAdmin');

Route::get('/updateUser', 'Admin\UserAccountController@updateUser');
Route::post('/updateUser', 'Admin\UserAccountController@updateUser');

Route::get('/users', 'Admin\UserController@index');
Route::post('/users', 'Admin\UserController@index');

Route::get('/users/deleteUser', 'Admin\UserController@deleteUser');
Route::post('/users/deleteUser', 'Admin\UserController@deleteUser');

Route::get('/users/logoutDialog', 'Admin\UserController@logoutDialog');
Route::post('/users/logoutDialog', 'Admin\UserController@logoutDialog');

Route::get('/users/updateUser', 'Admin\UserController@updateUser');
Route::post('/users/updateUser', 'Admin\UserController@updateUser');

Route::get('/approveUser', 'Admin\UserController@approveUser');
Route::post('/approveUser', 'Admin\UserController@approveUser');

Route::get('/users/messageUser', 'Admin\UserController@messageUser');
Route::post('/users/messageUser', 'Admin\UserController@messageUser');

Route::get('/deleteUser', 'Admin\UserAccountController@deleteUser');
Route::post('/deleteUser', 'Admin\UserAccountController@deleteUser');

Route::get('/updatePassword', 'Admin\UserAccountController@updatePassword');
Route::post('/updatePassword', 'Admin\UserAccountController@updatePassword');

Route::post('/user_account', 'Admin\UserAccountController@index');

Route::get('/site_map', 'Admin\SiteMapController@index');



# public part routes
Route::resource('home', 'PublicPart\PublicPartController');
Route::resource('blog', 'PublicPart\BlogController');
Route::resource('blog-single', 'PublicPart\BlogSingleController');
Route::resource('blog-category', 'PublicPart\BlogCategoryController');
Route::resource('blog-tag', 'PublicPart\BlogTagController');
Route::resource('clinical_management', 'PublicPart\ClinicalManagementController');
Route::resource('contact', 'PublicPart\ContactController');
Route::resource('pricing-plan', 'PublicPart\PricingPlanController');
Route::resource('features', 'PublicPart\FeaturesController');
Route::resource('data_protection', 'PublicPart\DataProtectionController');
Route::resource('emergency_planning', 'PublicPart\EmergencyPlanningController');
Route::resource('faqs', 'PublicPart\FaqsController');
Route::resource('health_safety', 'PublicPart\HealthSafetyController');
Route::resource('human_resources', 'PublicPart\HumanResourcesController');
Route::resource('infection_prevention', 'PublicPart\InfectionPreventionControlController');
Route::resource('finances', 'PublicPart\FinancesController');
Route::resource('patient_management', 'PublicPart\PatientManagementController');
Route::resource('practice_operations', 'PublicPart\PracticeOperationsController');
Route::resource('public_part', 'PublicPart\PublicPartController');


Route::get('/blogCategory', 'PublicPart\BlogController@blogCategory');
Route::post('/blogCategory', 'PublicPart\BlogController@blogCategory');

Route::get('/contact/create', 'PublicPart\ContactController@create');
Route::post('/contact/create', 'PublicPart\ContactController@create');

Route::get('/public_part/create', 'PublicPart\PublicPartController@create');
Route::post('/public_part/create', 'PublicPart\PublicPartController@create');
