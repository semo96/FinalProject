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


use App\Product;
use App\RegisteredCustomere;
use App\Salespeople;
use App\Salesperson;
use App\SalespersonAddress;
use App\salespersonContact;
use App\Supervisor;

Route::prefix('BackOffice')->group(function(){
       Route::get('test',function (){
        return   $cus_name=RegisteredCustomere::query()->where('Cust_category','LIKE', '%'. 'بقالة (تجزئة)'.'%')->get('Customer_ID');

//          return $registercustomers=RegisteredCustomere::all();
         \App\ProductUniteOfMeasure::all();
           $data=Product::find('1');
           return  $data->ProductUniteOfMeasures;
//         return  $Salespeoples = Salespeople::query()->where('supervisorID', 2)->get();


//           return   $Salespeoples = Salespeople::query()->where('supervisorID','=',auth()->id())->get();
//           return  $supervisor=Supervisor::query()->whereHas('Salespeople', function ($query)
//           {
//               $query->where('SP_status',1);
//           })->get();
//           return $Salesperson_contacts=salespersonContact::query()->whereHas('Salespeople', function ($query)
//               {
//                   $query->where('SP_status',1);
//               })->get();

//           return  $customer_address=SalespersonAddress::query()->whereHas('Salespeople', function ($query)
//        {
//            $query->where('SP_status',1);
//        })->get();
//           return \App\SalespersonAddress::all();
//           return $SalespersonAddress =\App\SalespersonAddress::has('Salespeople')->get();

       });

    //The Route Of Resource Controller
    Route::resource('customer','Customer_Controller');
    Route::resource('RegOrder','RegOrders_Controller');
    Route::resource('UnRegOrder','UnRegOrders_Controller');
    Route::resource('SP_Data','SP_Data_Controller');
    Route::resource('SPERBBills','SPERBBills_Controller');
    Route::resource('offer','offer_Controller');
    Route::resource('task','TaskController');
    Route::resource('feedback','FeedBack_Controller');
    // the Route of search Method
    Route::get('/searchSP','SP_Data_Controller@search')->name('searchSP');
    Route::get('/search','Customer_Controller@searchCustomer')->name('search');
    Route::get('/search','offer_Controller@searchoffer')->name('search');
    Route::get('/search','TaskController@searchTask')->name('search');
    Route::get('/search','FeedBack_Controller@searchFeedBack')->name('search');
    Route::get('/search','supervisorController@searchSupervisor')->name('searchSup');
    Route::get('/search','SV_RoleController@searchRoles')->name('searchRoles');
    //the route for ajax fetch
    Route::POST('/fetch_salsepepoles','offer_Controller@fetch_salsepepoles')->name('fetch_salsepepoles');
    Route::POST('/fetch_customers','offer_Controller@fetch_customers')->name('fetch_customers');
    Route::POST('/fetch_product','offer_Controller@fetch_product')->name('fetch_product');
    Route::POST('/fetch','offer_Controller@fetch_Unite_of_measure')->name('fetch_Unite_of_measure');
    Route::get('/', function () {
        return view('Auth.login');
    })->name('login');

    Route::get('/reset', function () {
        return view('Auth.passwords.reset');
    });

    Route::get('/respond_feedback', function () {
        return view('BackOffice-Layout.Pages.respond_feedback');
    })->name('respond_feedback');



    Route::get('/reset', function () {
        return view('Auth.passwords.reset');
    });

    Route::get('/index', function () {
        return redirect()->route('login');
    })->name('index');

    Route::get('/notification_page', function () {
        return view('BackOffice-Layout.Pages.notification_page');
    })->name('notification_page');


    Route::get('/edit_Reg_order', function () {
        return view('BackOffice-Layout.Pages.edit_Reg_order');
    })->name('edit_Reg_order');

    Route::get('/edit_Unreg_order', function () {
        return view('BackOffice-Layout.Pages.edit_Unreg_order');
    })->name('edit_Unreg_order');

    Route::get('/show_Reg_order', function () {
        return view('BackOffice-Layout.Pages.show_Reg_order');
    })->name('show_Reg_order');

    Route::get('/show_Unreg_order', function () {
        return view('BackOffice-Layout.Pages.show_Unreg_order');
    })->name('show_Unreg_order');

    Route::get('/create_task', function () {
        return view('BackOffice-Layout.Pages.create_task');
    })->name('create_task');

    Route::get('/created_tasks_list', function () {
        return view('BackOffice-Layout.Pages.created_tasks_list');
    })->name('created_tasks_list');

    Route::get('/show_created_tasks', function () {
        return view('BackOffice-Layout.Pages.show_created_tasks');
    })->name('show_created_tasks');

    Route::get('/products_list', function () {
        return view('BackOffice-Layout.Pages.Products_list');
    })->name('products_list');

    Route::get('/category_list', function () {
        return view('BackOffice-Layout.Pages.category_list');
    })->name('category_list');

    Route::get('/prices_list', function () {
        return view('BackOffice-Layout.Pages.prices_list');
    })->name('prices_list');

//    Route::get('/sp_data', function () {
//        return view('BackOffice-Layout.Pages.sp_data');
//    })->name('sp_data');

    Route::get('/sp_portfolio', function () {
        return view('BackOffice-Layout.Pages.sp_portfolio');
    })->name('sp_portfolio');

//    Route::get('/sp_erp_bills', function () {
//        return view('BackOffice-Layout.Pages.sp_erp_bills');
//    })->name('sp_erp_bills');

//    Route::get('/sp_erp_bills_details', function () {
//        return view('BackOffice-Layout.Pages.sp_erp_bills_details');
//    })->name('sp_erp_bills_details');
    Route::get('/reg_Cus_order', function () {
        return view('BackOffice-Layout.Pages.reg_Cus_order');
    })->name('reg_Cus_order');

    Route::get('/Unreg_Cus_order', function () {
        return view('BackOffice-Layout.Pages.Unreg_Cus_order');
    })->name('Unreg_Cus_order');
    Route::get('/orders_list', function () {
        return view('BackOffice-Layout.Pages.orders_list');
    })->name('orders_list');
    Route::get('/sp_tasks', function () {
        return view('BackOffice-Layout.Pages.sp_tasks');
    })->name('sp_tasks');

    Route::get('/sp_task_details', function () {
        return view('BackOffice-Layout.Pages.sp_task_details');
    })->name('sp_task_details');

    Route::get('/sp_sales_bills', function () {
        return view('BackOffice-Layout.Pages.sp_sales_bills');
    })->name('sp_sales_bills');

    Route::get('/sp_sales_bills_details', function () {
        return view('BackOffice-Layout.Pages.sp_sales_bills_details');
    })->name('sp_sales_bills_details');

    Route::get('/sp_return_bills', function () {
        return view('BackOffice-Layout.Pages.sp_return_bills');
    })->name('sp_return_bills');

    Route::get('/sp_return_bills_details', function () {
        return view('BackOffice-Layout.Pages.sp_return_bills_details');
    })->name('sp_return_bills_details');


    Route::get('/create_offer', function () {
        return view('BackOffice-Layout.Pages.create_offer');
    })->name('create_offer');

    Route::get('/offers_list', function () {
        return view('BackOffice-Layout.Pages.offers_list');
    })->name('offers_list');

    Route::get('/edit_offer', function () {
        return view('BackOffice-Layout.Pages.edit_offer');
    })->name('edit_offer');

    Route::get('/show_offer', function () {
        return view('BackOffice-Layout.Pages.show_offer');
    })->name('show_offer');

    Route::get('/tasks_report', function () {
        return view('BackOffice-Layout.Pages.tasks_report');
    })->name('tasks_report');

    Route::get('/orders_report', function () {
        return view('BackOffice-Layout.Pages.orders_report');
    })->name('orders_report');

    Route::get('/charts_report', function () {
        return view('BackOffice-Layout.Pages.charts_report');
    })->name('charts_report');

    Route::get('/edit_profile', function () {
        return view('BackOffice-Layout.Pages.edit_profile');
    })->name('edit_profile');


});


/*__________-Authontication _______________*/
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('/logout','Auth\LoginController@logout' )->name('logout');



Route::prefix('AdminPanel')->group(function(){

    Route::get('/', function () {
         return view('Auth.login');
     })->name('Admin_login');


    Route::get('/sv_profile', function () {
        return view('AdminPanel-Layout.Pages.sv_profile');
    })->name('sv_profile');
    
    Route::get('/add_sv', function () {
        $roles=App\Role::all();
        return view('AdminPanel-Layout.Pages.add_sv',compact('roles'));
    })->name('add_sv');


    Route::get('/supervisors_list', function () {
        $supervisors = App\Supervisor::all();
        $supervisorsContacts=App\SupervisorContact::all();
        $supervisorRoles=DB::table('supervisor__roles')
        ->join('supervisors','supervisor__roles.SupervisorID','=','supervisors.id')
        ->join('roles','roles.Role_ID','=','supervisor__roles.RoleID')
        //->select('roles.Role_name')->where('roles.Role_ID','=','supervisors.id')
        ->get();

        return view('AdminPanel-Layout.Pages.supervisors_list', compact('supervisors','supervisorsContacts',
        'supervisorRoles'));
        
    })->name('supervisors_list');



    Route::resource('supervisors','supervisorController'); 

    Route::post('/supervisor_store','supervisorController@store')->name('supervisors.store');
    Route::get('/edit_supervisor/{id}','supervisorController@edit')->name('supervisor.edit');
    Route::get('/destroy_supervisor/{id}','supervisorController@destroy')->name('supervisors.destroy');

// shared data 
 /*   View::composer(
        '*', function($view){
            $roles = Role::all();
            $view->with('roles',$roles);
        }
    );*/

//supervisor roles
Route::resource('SV_Role','SV_RoleController'); 
 });

