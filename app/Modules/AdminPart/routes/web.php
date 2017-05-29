<?php

Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('AdminPart', 'AdminPartController');
    
});	
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('UserAccount', 'UserAccountController');
    
});	
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('Feedback', 'FeedbackController');
    
});	
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('PracticeAccount', 'PracticeAccountController');
    
});
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('BillingAndPayment', 'BillingAndPaymentController');
    
});	
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('AddSubscription', 'AddSubscriptionController');
    
});
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('MyKnowledgeBox', 'MyKnowledgeBoxController');
    
});	
Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('ReportProblem', 'ReportProblemController');
    
});	