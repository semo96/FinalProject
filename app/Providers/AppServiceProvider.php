<?php

namespace App\Providers;

use App\Product;
use App\ProductCategory;
use App\Salespeople;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Providers\Auth;
use Validator;
use App\Rules\VaildPhone;
use App\Rules\ValidEmail;
use App\Rules\ValidName;
use App\Rules\ValidAddress;
use App\Http\Validator\Custom;
use Illuminate\Support\Facades\DB;
use Session;
use App\ERP_Bill;
use App\RegisteredCustomere;
use App\CustomerAddress ;
use App\CustomerContact;
use App\Area;
use App\Role;
//use App\Salesperson;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $Salespeoples = Salespeople::all();
         view()->share('Salespeoples', $Salespeoples);

        $registercustomers=RegisteredCustomere::all();
        view()->share('registercustomers',$registercustomers);

        $productCategories= ProductCategory::all();
        view()->share('productCategories',$productCategories);

        $products= Product::all();
        view()->share('products',$products);

        $area_names=Area::all();
        view()->share('area_names',$area_names);  

        $ERP_bills=ERP_Bill::all();
        view()->share('ERP_bills',$ERP_bills);

        $roles = Role::all();
        view()->share('roles', $roles);

        // Register My custom validation rule.
        Validator::extend('valid_phone', 'App\\Rules\\VaildPhone@passes');
        Validator::extend('valid_email', 'App\\Rules\\ValidEmail@passes');
        Validator::extend('valid_name', 'App\\Rules\\ValidName@passes');
        Validator::extend('valid_address', 'App\\Rules\\ValidAddress@passes');
      /*  Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new CustomValidation($translator, $data, $rules, $messages);
        });*/

    }
}
