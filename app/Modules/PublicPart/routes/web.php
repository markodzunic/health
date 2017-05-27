<?php

Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('PublicPart', 'PublicPartController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('Content', 'ContentController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('Blog', 'BlogController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('Contact', 'ContactController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('Faqs', 'FaqsController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('ClinicalManagement', 'ClinicalManagementController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('DataProtection', 'DataProtectionController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('EmergencyPlanning', 'EmergencyPlanningController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('HealthSafety', 'HealthSafetyController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('HumanResources', 'HumanResourcesController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('InfectionPreventionControl', 'InfectionPreventionControlController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('InformationSecurity', 'InformationSecurityController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('PatientManagement', 'PatientManagementController');
    
});	
Route::group(array('module' => 'PublicPart', 'middleware' => ['web'], 'namespace' => 'App\Modules\PublicPart\Controllers'), function() {

    Route::resource('PracticeOperations', 'PracticeOperationsController');
    
});	


