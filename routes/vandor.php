<?php


Auth::routes();

Route::get('/login/vandor', [\App\Http\Controllers\Auth\LoginController::class, 'showVandorLoginForm']);
Route::get('/register/vandor', [\App\Http\Controllers\Auth\LoginController::class, 'showVandorRegisterForm'])->name('showVandorRegisterForm');
Route::post('/register/vandor/post', [\App\Http\Controllers\Auth\LoginController::class, 'StoreVandorRegisterForm'])->name('StoreVandorRegisterForm');
Route::post('/login/vandor', [\App\Http\Controllers\Auth\LoginController::class,'VandorLogin']);


Route::group(['middleware' => 'auth:vandor'], function () {

    Route::get('/Vandor/vandor-dashboard', [\App\Http\Controllers\Vandor\VandorDashboardController::class,'VandorDashobard'])->name('VandorDashobard');

    //---------------------------------Vandor Profile ---------------------------
    Route::get('/Vandor/vandor-account-setting/{id}', [\App\Http\Controllers\Vandor\VandorDashboardController::class,'VandorProfile'])->name('VandorProfile');
    Route::post('/Vandor/vandor-account-update', [\App\Http\Controllers\Vandor\VandorDashboardController::class,'VandorProfileUpdate'])->name('VandorProfileUpdate');

    //--------------------------Vandor Category Show-------------------------------
    Route::get('/Vandor/vandor-category-manage', [\App\Http\Controllers\Vandor\VandorCategoryManageController::class,'VandorCategoryManage'])->name('VandorCategoryManage');
   //----------------------------Vandor Product Section----------------------------
    Route::get('/Vandor/vandor-product-manage', [\App\Http\Controllers\Vandor\VandorProductManageController::class,'VandorProductManage'])->name('VandorProductManage');
    Route::get('/Vandor/vandor-approve-pro-list', [\App\Http\Controllers\Vandor\VandorProductManageController::class,'VandorApproveProductList'])->name('VandorApproveProductList');
    Route::get('/Vandor/vandor-panding-pro-list', [\App\Http\Controllers\Vandor\VandorProductManageController::class,'VandorPandingProductList'])->name('VandorPandingProductList');

    //----------------------------Vandor OrderManage Section----------------------------
    Route::get('/Vandor/vandor-order-manage', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorOrderManage'])->name('VandorOrderManage');
    Route::get('/Vandor/vandor-order-manage-ajax', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorOrderManageAjax'])->name('VandorOrderManageAjax');
    Route::get('/Vandor/vandor-order-details/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorOrderDetails'])->name('VandorOrderDetails');


    //------------------------Vandor Order Apporve Section---------------------------------

    Route::get('/Vandor/vandor-order-status-page/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorOrderStatusPage'])->name('VandorOrderStatusPage');
    Route::get('/Vandor/vandor-order-status-approve/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorOrderStatusApprove'])->name('VandorOrderStatusApprove');
    Route::get('/Vandor/vandor-order-status-panding/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorOrderStatusPanding'])->name('VandorOrderStatusPanding');

    Route::get('/Vandor/vandor-shipping-status-approve/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorShippingStatusApprove'])->name('VandorShippingStatusApprove');
    Route::get('/Vandor/vandor-shipping-status-panding/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorShippingStatusPanding'])->name('VandorShippingStatusPanding');

    Route::get('/Vandor/vandor-complete-status-approve/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorCompleteStatusApporve'])->name('VandorCompleteStatusApporve');
    Route::get('/Vandor/vandor-complete-status-panding/{id}/{shop_id}', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorCompleteStatusPanding'])->name('VandorCompleteStatusPanding');

    Route::get('/Vandor/vandor-order-mouseover-preview', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorMouseOverPreview'])->name('VandorMouseOverPreview');

    //------------------------Multi Order Prient Section---------------------------------

    Route::post('/Vandor/vandor-multi-order-print', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorMultiOrderPrient'])->name('VandorMultiOrderPrient');

    //------------------------Vandor Purches Section---------------------------------

    route::get('Vandor/purshes',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpurshesadd'])->name('Vandorpurshesadd');
    route::post('Vandor/purshesstore',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpurshesadd_store'])->name('Vandorpurshesadd_store');
    route::get('Vandor/purshes_view',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpurshesadd_view'])->name('Vandorpurshesadd_view');
//    route::get('Vandor/purshes_edite/{id}',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'purshesadd_edite'])->name('purshesadd_edite');
//    route::post('Vandor/purshes_update/{id}',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'purshesadd_update'])->name('purshesadd_update');
    route::get('Vandor/purshes_delete/{id}/{shop_id}',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpurshesadd_delete'])->name('Vandorpurshesadd_delete');
    route::get('Vandor/panding',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpanding_purshes'])->name('Vandorpanding_purshes');
    route::get('Vandor/approve/{id}/{shop_id}',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorapprove_purshes'])->name('Vandorapprove_purshes');
    route::get('Vandor/purshes_dailyreport',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpurshesadd_dailyreport'])->name('Vandorpurshesadd_dailyreport');
    route::get('Vandor/purshes_dailyreport_genarate',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'Vandorpurshesadd_dailyreport_genarate'])->name('Vandorpurshesadd_dailyreport_genarate');

    route::get('Vandor/purshes-cat-product',[\App\Http\Controllers\Vandor\VadorPurchesManageController::class,'VandorCatToProduct'])->name('VandorCatToProduct');

    //...............................Vandor Reprot Genarate Sectin...................................
    route::get('Vandor/report_genarate',[\App\Http\Controllers\Vandor\VadorReportGenarateController::class,'VandorReport_Genarator'])->name('VandorReport_Genarator');
    route::post('Vandor/final_report_genarate',[\App\Http\Controllers\Vandor\VadorReportGenarateController::class,'VandorFinal_Report_Genarator'])->name('VandorFinal_Report_Genarator');
    route::get('Vandor/report_genaratepdf',[\App\Http\Controllers\Vandor\VadorReportGenarateController::class,'VandroPdf_Report_Genarator'])->name('VandroPdf_Report_Genarator');
    route::post('Vandor/final_report_genaratepdf/',[\App\Http\Controllers\Vandor\VadorReportGenarateController::class,'VandorPdfFinal_Report_Genarator'])->name('VandorPdfFinal_Report_Genarator');

    //...............................Vandor Reprot Genarate Sectin...................................

    route::get('Vandor/stock_ganarete_page',[\App\Http\Controllers\Vandor\VadorStokeGenarateController::class,'VandorStockGenaratorPage'])->name('VandorStockGenaratorPage');
    route::post('Vandor/categoru_wise_stock',[\App\Http\Controllers\Vandor\VadorStokeGenarateController::class,'VandorCategoryWiseStock'])->name('VandorCategoryWiseStock');
    route::get('Vandor/stock_ganarete_pro_ajax',[\App\Http\Controllers\Vandor\VadorStokeGenarateController::class,'VandorStockGenaratorProductAjax'])->name('VandorStockGenaratorProductAjax');
    route::post('Vandor/product_wise_stock',[\App\Http\Controllers\Vandor\VadorStokeGenarateController::class,'VandorProductWiseStockGenare'])->name('VandorProductWiseStockGenare');


    Route::get('/Vandor/vandor-mail-template', [\App\Http\Controllers\Vandor\VandorOrderManageController::class,'VandorMailTemplate'])->name('VandorMailTemplate');

    //..............................Withdraw Section ---------------------

    Route::get('/Vandor/vandor-withdraw-request-form', [\App\Http\Controllers\Vandor\VandorWithDrawRequestController::class,'VandorWithdraRequest'])->name('VandorWithdraRequest');
    Route::post('/Vandor/vandor-withdraw-request-store', [\App\Http\Controllers\Vandor\VandorWithDrawRequestController::class,'VandorWithdraRequestStore'])->name('VandorWithdraRequestStore');
    Route::get('/Vandor/vandor-withdraw-panding-request', [\App\Http\Controllers\Vandor\VandorWithDrawRequestController::class,'VandorWithdraPandingRequest'])->name('VandorWithdraPandingRequest');
    Route::get('/Vandor/vandor-withdraw-panding-request-filter-ajax', [\App\Http\Controllers\Vandor\VandorWithDrawRequestController::class,'VandorWithdraPandingRequestAjaxFilter'])->name('VandorWithdraPandingRequestAjaxFilter');
    Route::get('/Vandor/vandor-withdraw-approve-request', [\App\Http\Controllers\Vandor\VandorWithDrawRequestController::class,'VandorWithdraApproveRequest'])->name('VandorWithdraApproveRequest');
    Route::get('/Vandor/vandor-withdraw-approve-request-filter-ajax', [\App\Http\Controllers\Vandor\VandorWithDrawRequestController::class,'VandorWithdraApproveRequestFilterAjax'])->name('VandorWithdraApproveRequestFilterAjax');


});





?>