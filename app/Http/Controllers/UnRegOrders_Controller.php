<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Salesperson;
use App\Rules\VaildPhone;
use App\SalesOrder;
use App\Product;
use App\ProductUniteOfMeasure;
use App\SalesOrderDetail;
use Session;
use App\RegisteredCustomere;
use App\CustomerAddress ;
use App\CustomerContact;
use App\ProductCategory;

class UnRegOrders_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customer_order=$this->customerOrder();
        $orderDetails=$this->orderDetails();
        $products=$this->products();

        return view('BackOffice-Layout.Pages.unreg_orders_list')
              ->with(compact('customer_order','orderDetails','products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_names= $this->getProductName();
        $Unit_Of_Measures= $this->getUnit_Of_Measure();
        $product_categries= $this->getProductCategry();

        return view('BackOffice-Layout.Pages.Unreg_Cus_order')->with(compact('product_names','Unit_Of_Measures','product_categries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function customerOrder(){
        $customer_order=DB::table('sales_orders')
            ->join('unreg_customeres','unreg_customeres.Unreg_Customer_ID','=','sales_orders.Unreg_Customerid')
            ->select('sales_orders.*','unreg_customeres.*')
            ->get();
            return $customer_order;
    }

    public function orderDetails(){
        $orderDetails=DB::table('sales_order_details')
        ->join('sales_orders','sales_orders.SalesOrders_id','=','sales_order_details.OrderID')
        ->join('products','products.Product_ID','=','sales_order_details.ProductID')
        ->select('sales_order_details.*','sales_orders.*','products.*')
       ->get();
        return $orderDetails;

    }

    public function products(){
        $products=DB::table('products')
        ->join('product_categories','product_categories.Category_ID','=','products.CategoryID')
        ->join('product_prices','product_prices.Price_ID','=','products.PriceID')
        ->join('products_unite_of_measures','products_unite_of_measures.Unite_of_measure_id','=','products.Unite_of_measure_id')
        ->select('products.*','product_categories.*','product_prices.*','products_unite_of_measures.*')
       ->get();
        return $products;
    }

     public function getProductName(){
         $product_names=Product::all();
         return $product_names;
     }

     public function getUnit_Of_Measure(){
        $Unit_Of_Measures=ProductUniteOfMeasure::all();
        return $Unit_Of_Measures;
    }

    public function getProductCategry(){
        $product_categries=ProductCategory::all();
        return $product_categries;
    }

    public function getCustomerName(){
        $CustomerNames=RegisteredCustomere::all();
        return $CustomerNames;
    }

}
