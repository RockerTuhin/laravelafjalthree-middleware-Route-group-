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

Route::get('/', function () {
    return Redirect()->route('login');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'],function(){

	Route::get('/inbox', function () {
    echo "inbox";
	})->name('inbox')->middleware('verified');

	Route::get('/calendar', function () {
	    echo "calendar";
	})->name('calendar')->middleware('verified');

	Route::get('/typography', function () {
	    echo "typography";
	})->name('typography');
	
});


Route::get('/home', 'HomeController@index')->name('home');

//EMPLOYEE ROUTES ARE HERE -----------------------------
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employee', 'EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@AllEmployee')->name('all.employee');
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee');

//CUSTOMER ROUTES ARE HERE -----------------------------
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer', 'CustomerController@Store');
Route::get('/all-customer', 'CustomerController@AllCustomer')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer');

//SUPPLIERS ROUTES ARE HERE -----------------------------
Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/insert-supplier', 'SupplierController@Store');
Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all.supplier');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');
Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@UpdateSupplier');

//SALARY ROUTES ARE HERE -----------------------------
Route::get('/add-advanced-salary', 'SalaryController@AddAdvancedSalary')->name('add.advanced.salary');
Route::post('/insert-advanced-salary', 'SalaryController@InsertAdvancedSalary');
Route::get('/all-advanced-salary', 'SalaryController@AllAdvancedSalary')->name('all.advanced.salary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');

//CATEGORY ROUTES ARE HERE -----------------------------
Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
Route::post('/insert-category', 'CategoryController@InsertCategory');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');

//PRODUCT ROUTES ARE HERE -----------------------------
Route::get('/add-product', 'ProductController@AddProduct')->name('add.product');
Route::post('/insert-product', 'ProductController@InsertProduct');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/view-product/{id}', 'ProductController@ViewProduct');
Route::get('/edit-product/{id}', 'ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct');

//EXCEL IMPORT AND EXPORT
Route::get('/import-product', 'ProductController@ImportProduct')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');


//EXPENSE ROUTES ARE HERE -----------------------------
Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@InsertExpense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense')->name('edit.today.expense');
Route::post('/update-today-expense/{id}', 'ExpenseController@UpdateTodayExpense')->name('update.today.expense');
Route::get('/delete-today-expense/{id}', 'ExpenseController@DeleteTodayExpense')->name('delete.today.expense');
Route::get('/monthly-expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense', 'ExpenseController@YearlyExpense')->name('yearly.expense');
Route::get('/previousYear-expense', 'ExpenseController@PreviousYearExpense')->name('previousYear.expense');

//MONTHLY MORE EXPENSE ROUTES OF CURRENT YEAR ARE HERE -----------------------------
Route::get('/january-expense/{mymonth}', 'ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense/{mymonth}', 'ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense/{mymonth}', 'ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense/{mymonth}', 'ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense/{mymonth}', 'ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense/{mymonth}', 'ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense/{mymonth}', 'ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense/{mymonth}', 'ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense/{mymonth}', 'ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense/{mymonth}', 'ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense/{mymonth}', 'ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense/{mymonth}', 'ExpenseController@DecemberExpense')->name('december.expense');

//MONTHLY MORE EXPENSE ROUTES OF PREVIOUS YEAR ARE HERE -----------------------------
Route::get('/previous-year-january-expense/{mymonth}', 'ExpenseController@PreviousYearJanuaryExpense')->name('previous.year.january.expense');
Route::get('/previous-year-february-expense/{mymonth}', 'ExpenseController@PreviousYearFebruaryExpense')->name('previous.year.february.expense');
Route::get('/previous-year-march-expense/{mymonth}', 'ExpenseController@PreviousYearMarchExpense')->name('previous.year.march.expense');
Route::get('/previous-year-april-expense/{mymonth}', 'ExpenseController@PreviousYearAprilExpense')->name('previous.year.april.expense');
Route::get('/previous-year-may-expense/{mymonth}', 'ExpenseController@PreviousYearMayExpense')->name('previous.year.may.expense');
Route::get('/previous-year-june-expense/{mymonth}', 'ExpenseController@PreviousYearJuneExpense')->name('previous.year.june.expense');
Route::get('/previous-year-july-expense/{mymonth}', 'ExpenseController@PreviousYearJulyExpense')->name('previous.year.july.expense');
Route::get('/previous-year-august-expense/{mymonth}', 'ExpenseController@PreviousYearAugustExpense')->name('previous.year.august.expense');
Route::get('/previous-year-september-expense/{mymonth}', 'ExpenseController@PreviousYearSeptemberExpense')->name('previous.year.september.expense');
Route::get('/previous-year-october-expense/{mymonth}', 'ExpenseController@PreviousYearOctoberExpense')->name('previous.year.october.expense');
Route::get('/previous-year-november-expense/{mymonth}', 'ExpenseController@PreviousYearNovemberExpense')->name('previous.year.november.expense');
Route::get('/previous-year-december-expense/{mymonth}', 'ExpenseController@PreviousYearDecemberExpense')->name('previous.year.december.expense');


//ATTENDENCE ROUTES ARE HERE -----------------------------
Route::get('/take-attendence', 'AttendenceController@TakeAttendence')->name('take.attendence');
Route::post('/insert-attendence', 'AttendenceController@InsertAttendence');
Route::get('/all-attendence', 'AttendenceController@AllAttendence')->name('all.attendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@EditAttendence')->name('edit.attendence');
Route::post('/update-attendence', 'AttendenceController@UpdateAttendence');
Route::get('/view-attendence/{view_date}', 'AttendenceController@ViewAttendence')->name('view.attendence');
Route::get('/monthly-attendence', 'AttendenceController@MonthlyAttendence')->name('monthly.attendence');

//MONTHLY MORE ATTENDENCE ROUTES OF CURRENT YEAR ARE HERE -----------------------------
Route::get('/january-attendence/{mymonth}', 'AttendenceController@JanuaryAttendence')->name('january.attendence');
Route::get('/february-attendence/{mymonth}', 'AttendenceController@FebruaryAttendence')->name('february.attendence');
Route::get('/march-attendence/{mymonth}', 'AttendenceController@MarchAttendence')->name('march.attendence');
Route::get('/april-attendence/{mymonth}', 'AttendenceController@AprilAttendence')->name('april.attendence');
Route::get('/may-attendence/{mymonth}', 'AttendenceController@MayAttendence')->name('may.attendence');
Route::get('/june-attendence/{mymonth}', 'AttendenceController@JuneAttendence')->name('june.attendence');
Route::get('/july-attendence/{mymonth}', 'AttendenceController@JulyAttendence')->name('july.attendence');
Route::get('/august-attendence/{mymonth}', 'AttendenceController@AugustAttendence')->name('august.attendence');
Route::get('/september-attendence/{mymonth}', 'AttendenceController@SeptemberAttendence')->name('september.attendence');
Route::get('/october-attendence/{mymonth}', 'AttendenceController@OctoberAttendence')->name('october.attendence');
Route::get('/november-attendence/{mymonth}', 'AttendenceController@NovemberAttendence')->name('november.attendence');
Route::get('/december-attendence/{mymonth}', 'AttendenceController@DecemberAttendence')->name('december.attendence');
Route::get('/previousYear-december-attendence/{mymonth}', 'AttendenceController@PreviousYearDecemberAttendence')->name('previousYear.december.attendence');

//SETTINGS ROUTES ARE HERE -----------------------------
Route::get('/website-setting', 'SettingController@Setting')->name('setting');
Route::post('/update-website/{id}', 'SettingController@UpdateWebsite');

//POS ROUTES ARE HERE -----------------------------
Route::get('/pos','PosController@index')->name('pos');
Route::get('/pending-orders','PosController@PendingOrders')->name('pending.orders');
Route::get('/view-order/{id}','PosController@ViewOrder');
Route::get('/order-done-successfully/{id}','PosController@OrderSuccess');
Route::get('/succeed-orders','PosController@SucceedOrders')->name('succeed.orders');

//CART ROUTES ARE HERE -----------------------------
Route::post('/add-to-cart','CartController@AddtoCart');
Route::post('/update-cart/{rowId}','CartController@UpdateCart');
Route::get('/cart-remove/{rowId}','CartController@RemoveCart');
Route::post('/create-invoice','CartController@CreateInvoice');
Route::post('/final-invoice','CartController@FinalInvoice');
