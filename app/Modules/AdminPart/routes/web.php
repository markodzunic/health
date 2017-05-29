<?php

Route::group(array('module' => 'AdminPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\AdminPart\Controllers'), function() {

    Route::resource('AdminPart', 'AdminPartController');
    Route::resource('login', 'LoginController');

    Route::get('/doLogin', 'LoginController@doLogin');
    Route::post('/doLogin', 'LoginController@doLogin');

    Route::get('/doLogout', 'LoginController@doLogout');
    
    Route::resource('UserAccount', 'UserAccountController');
    Route::resource('Feedback', 'FeedbackController');
    Route::resource('PracticeAccount', 'PracticeAccountController');
    Route::resource('BillingAndPayment', 'BillingAndPaymentController');
    Route::resource('AddSubscription', 'AddSubscriptionController');
    Route::resource('MyKnowledgeBox', 'MyKnowledgeBoxController');
    Route::resource('ReportProblem', 'ReportProblemController');
});	
