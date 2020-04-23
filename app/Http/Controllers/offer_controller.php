<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Contracts\Validation\Validator;
use App\Offer;
use App\Offer_Detail;
use App\Product;
use App\ProductUniteOfMeasure;
use App\RegisteredCustomere;
use App\Salespeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\ValidName;
use SebastianBergmann\Environment\Console;
use function MongoDB\BSON\toJSON;

class offer_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Salespeoples;
    public function index(Request $request)
    {

        if (isset($request->delete_ID)) {
            $deleteID = $request->delete_ID;

            Offer::where('Offer_ID', $deleteID)->update([
                'Offer_status' => 0,
                'offer_Deleted_At' => date('Y-m-d H:i:s')

            ]);

            $Offers = $this->offer();
            return view('BackOffice-Layout.Pages.offers_list')->with(compact('Offers'));
//             $Offer_Details=$this->offerDetails();
//
//             return view('BackOffice-Layout.Pages.offers_list')
//                 ->with(compact(),'Offers')
//                 ->with('Offer_Details',$Offer_Details);
        } else {


            $Offers = $this->offer();
            return view('BackOffice-Layout.Pages.offers_list')->with(compact('Offers'));

//            foreach ($Offers as $Offer) {
//                foreach ($Offer->customers as $customer) {
//                    return $customer->Salesperson->SP_ID;
//                    foreach ($customer->Salesperson as $Salespersons) {
//                        return $Salespersons->SP_ID;
//                    }
//                }
//            }


//             $Offer_Details=$this->offerDetails();
//             return view('BackOffice-Layout.Pages.offers_list')
//                 ->with('Offers',$Offers)
//                 ->with('Offer_Details',$Offer_Details);
        }
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->Salespeoples = Salespeople::query()->where('supervisorID',auth()->id())->get();

        return view('BackOffice-Layout.Pages.create_offer')->with('Salespeoples',$this->Salespeoples);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->input('cname') == 'cname')
            {    //Validation Rules
            $this->validate($request,[
                'offer_start_date'   => 'required|date|before:offer_end_date',
                'offer_end_date'     =>'required|date|after:offer_start_date',
                'offer_status'      =>'required',
//                'offer_pict'        =>'image',
                'cus_name.*'=>'required',
                'SP_Name'            =>'required',
                'offer_category.*'       =>'required',
                'offer_product.*'       =>'required',
                'offer_qty.*'          =>'required|integer|min:0',
                'unit_of_measure.*'    =>'required',
                'offer_discount.*'     =>'required|numeric|between:0,1',
                'offer_description.*'    =>'required',

            ]);
                            /* upload image*/
            if($request->hasFile('offer_pict')){
                $imageExt =$request->file('offer_pict')->getClientOriginalExtension();
                $imageName=time().'offer.'.$imageExt ;
                $request->file('offer_pict')->storeAs('Offer_img',$imageName);

            }
            else{
                $imageName=null;

            }
                          /*  offer inserted    */
            $value_to_insert = $request->input('offer_status') == 'true' ? 1 : 0;
            $offer=new Offer();
            $offer->start_date=$request->input('offer_start_date');
            $offer->finish_date=$request->input('offer_end_date');
            $offer->Offer_status=$value_to_insert;
            $offer->Offer_Type="عملا محددين";
            $offer->Offer_image=$imageName;
            $offer->save();

            /*  customer_offer */
                $customers=$request->cus_name;
            $offer->customers()->attach( $customers);
            /* offer_details*/

            if(count($request->offer_qty )>0){
                foreach ($request->offer_qty  as $more_detail=>$value) {
                    $data=array(
                        'Quantity'   => $request->offer_qty[$more_detail],
                        'discount' => $request->offer_discount[$more_detail],
                        'Offer_desc'    => $request->offer_description[$more_detail],
                        'OfferID' =>  $offer->Offer_ID,
                        'product_unite_of_measure' =>$request->unit_of_measure[$more_detail],
                        'ProductID' =>$request->offer_product[$more_detail],
                        'CategoryID' =>$request->offer_category[$more_detail],
                        'PriceID' =>1,
                    );
                    Offer_Detail::insert($data);
                }
            }
            Session::flash('Add_msg','تمت الاظافة بنجاح ');
            return redirect()->back();
        }
        else {
            if ($request->input('cname') == 'ctype') {
                //Validation Rules
                $this->validate($request, [
                    'offer_start_date' => 'required|date|before:offer_end_date',
                    'offer_end_date' => 'required|after:offer_start_date',
                    'offer_status' => 'required',
//                'offer_pict'        =>'image',
                    'cus_type' => 'required',
                    'SP_Name' => 'required',
                    'offer_category.*' => 'required',
                    'offer_product.*' => 'required',
                    'offer_qty.*' => 'required|integer|min:0',
                    'unit_of_measure.*' => 'required',
                    'offer_discount.*' => 'required|numeric|between:0,1',
                    'offer_description.*' => 'required',

                ]);


                /* upload image*/
                if ($request->hasFile('offer_pict')) {
                    $imageExt = $request->file('offer_pict')->getClientOriginalExtension();
                    $imageName = time() . 'offer.' . $imageExt;
                    $request->file('offer_pict')->storeAs('Offer_img', $imageName);

                } else {
                    $imageName = null;

                }
                DB::beginTransaction();

                try {
                    /*  offer inserted    */
                    // Validate, then create if valid
                    $value_to_insert = $request->input('offer_status') == 'true' ? 1 : 0;
                    $offer = new Offer();
                    $offer->start_date = $request->input('offer_start_date');
                    $offer->finish_date = $request->input('offer_end_date');
                    $offer->Offer_status = $value_to_insert;
                    $offer->Offer_Type = "كل العملا";
                    $offer->Offer_image = $imageName;
                    $offer->save();

                 $cus_name = RegisteredCustomere::query()->where('Cust_category', 'LIKE', '%'.$request->cus_type.'%')->get('Customer_ID');
                    $offer->customers()->attach($cus_name);
                    if(count($request->offer_qty )>0){
                        foreach ($request->offer_qty  as $more_detail=>$value) {
                            $data=array(
                                'Quantity'   => $request->offer_qty[$more_detail],
                                'discount' => $request->offer_discount[$more_detail],
                                'Offer_desc'    => $request->offer_description[$more_detail],
                                'OfferID' =>  $offer->Offer_ID,
                                'product_unite_of_measure' =>$request->unit_of_measure[$more_detail],
                                'ProductID' =>$request->offer_product[$more_detail],
                                'CategoryID' =>$request->offer_category[$more_detail],
                                'PriceID' =>1,
                            );
                            Offer_Detail::insert($data);
                        }
                    }
//                    $offer_details = new Offer_Detail();
//                    $offer_details->Quantity = $request->input('offer_qty');
//                    $offer_details->discount = $request->input('offer_discount');
//                    $offer_details->Offer_desc = $request->input('offer_description');
//                    $offer_details->OfferID = $offer->Offer_ID;
//                    $offer_details->product_unite_of_measure = $request->input('unit_of_measure');
//                    $offer_details->ProductID = $request->input('offer_product');
//                    $offer_details->CategoryID = $request->input('offer_category');
//                    $offer_details->PriceID = 1;
//                    $offer_details->save();
                } catch (ValidationException $e) {
                    // Rollback and then redirect
                    // back to form with errors
                    DB::rollback();
                    return redirect()->back()
                        ->withErrors($e->getErrors())
                        ->withInput();
                }
//                try {
//                    /*  customer_offer */
//
//
//                } catch (ValidationException $e) {
//                    // Rollback and then redirect
//                    // back to form with errors
//                    DB::rollback();
//                    return redirect()->back()
//                        ->withErrors($e->getErrors())
//                        ->withInput();
//                }
//
//
//                try {
//                    /* offer_details*/
//                    $offer_details = new Offer_Detail();
//                    $offer_details->Quantity = $request->input('offer_qty');
//                    $offer_details->discount = $request->input('offer_discount');
//                    $offer_details->Offer_desc = $request->input('offer_description');
//                    $offer_details->OfferID = $offer->Offer_ID;
//                    $offer_details->product_unite_of_measure = $request->input('unit_of_measure');
//                    $offer_details->ProductID = $request->input('offer_product');
//                    $offer_details->CategoryID = $request->input('offer_category');
//                    $offer_details->PriceID = 1;
//                    $offer_details->save();
//
//                } catch (ValidationException $e) {
//                    // Rollback and then redirect
//                    // back to form with errors
//                    DB::rollback();
//                    return redirect()->back()
//                        ->withErrors($e->getErrors())
//                        ->withInput();
//                }
                DB::commit();
                Session::flash('Add_msg', 'تمت الاظافة بنجاح ');
                return redirect()->back();
            }
        }

       echo "nothing";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offers=\App\Offer::query()->select('Offer_ID','start_date', 'finish_date','Offer_status','Offer_Type','Offer_image')->where('Offer_ID',$id)->with(['customers'=>function($query) {
            $query->Select('Customer_ID','Cust_first_name','Cust_last_name','Cust_group_ID','Cust_category');
        }])->get();
        $Offer_Details=Offer_Detail::query()->select('ProductID','Quantity', 'discount','product_unite_of_measure','Offer_desc','OfferID')->where('OfferID',$id)->with(['products'=>function($query) {
            $query->Select('ProductID','Product_name');
        }])->get();
        return view('BackOffice-Layout.Pages.show_offer')->with(compact('offers','Offer_Details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offers=\App\Offer::query()->select('Offer_ID','start_date', 'finish_date','Offer_status','Offer_Type','Offer_image')->where('Offer_ID',$id)->with(['customers'=>function($query) {
            $query->Select('Customer_ID','Cust_first_name','Cust_last_name','Cust_group_ID','Cust_category');
        }])->get();
        $Offer_Details=Offer_Detail::query()->select('ProductID','Quantity', 'discount','product_unite_of_measure','Offer_desc','OfferID','CategoryID')->where('OfferID',$id)->with(['products'=>function($query) {
            $query->Select('Product_ID','Product_name');
        }])->get();
        return view('BackOffice-Layout.Pages.edit_offer')->with(compact('offers','Offer_Details'));
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


        if($request->has('cus_type'))
        {

            $this->validate($request,[
                'cus_type'=>'required',
            ]);

          $cus_name=RegisteredCustomere::query()->where('Cust_category','LIKE', '%' .$request->cus_type.'%')->get('Customer_ID');
        }
        else
        {
            $this->validate($request,[
                'cus_name'=>'required',
            ]);

          $cus_names=$request['cus_name'];
      $cus_name=RegisteredCustomere::query()->whereIn('Customer_ID',$cus_names)->get('Customer_ID');
        }
        if ($request->hasFile('offer_pict')) {
            $imageExt = $request->file('offer_pict')->getClientOriginalExtension();
            $imageName = time() . 'offer.' . $imageExt;
            $request->file('offer_pict')->storeAs('Offer_img', $imageName);

        } else {
            $imageName = null;

        }
        $this->validate($request,[
            'offer_start_date'   => 'required|date|before:offer_end_date',
            'offer_end_date'     =>'required|after:offer_start_date',
            'offer_status'      =>'required',
            'offer_pict'        =>'image',
            'SP_Name'            =>'required',
            'offer_category.*'       =>'required',
            'offer_product.*'       =>'required',
            'offer_qty.*'          =>'required|integer|min:0',
            'unit_of_measure.*'    =>'required',
            'offer_discount.*'     =>'required|numeric|between:0,1',
            'offer_description.*'    =>'required',

        ]);
        $offer_type = $request->input('offer_type') == 'true' ? "عملا محددين" : "كل العملا";
        $offer_status = $request->input('offer_status') == 'true' ? 1 : 0;
//       $offer= Offer::query()->where('Offer_ID',$id)->update([
//            'start_date'=>$request->offer_start_date,
//            'finish_date'=>$request->offer_end_date,
//            'Offer_status'=>$offer_status,
//            'Offer_Type'=>$offer_type,
//            'Offer_image'=>$request->offer_pict,
//        ]);

        $offer = Offer::query()->where('Offer_ID', $id)->first();
        $offer->start_date = $request->input('offer_start_date');
        $offer->finish_date = $request->input('offer_end_date');
        $offer->Offer_status = $offer_status;
        $offer->Offer_Type = $offer_type;
        $offer->Offer_image = $imageName;
        $offer->save();

        $offer->customers()->sync($cus_name);

        if (count($request->offer_qty) > 0) {
            foreach ($request->offer_qty as $more_detail => $value) {

                $data[] =array(

                    'discount' => $request->offer_discount[$more_detail],
                    'Quantity' => $request->offer_qty[$more_detail],
                    'Offer_desc' => $request->offer_description[$more_detail],
                    'product_unite_of_measure' => $request->unit_of_measure[$more_detail],
                    'ProductID' => $request->offer_product[$more_detail],
                    'CategoryID' => $request->offer_category[$more_detail],
                    'PriceID' => 1,
                    'OfferID' => $offer->Offer_ID,);



            }
          $data;
           $offer_detailes=Offer_Detail::query()->where('offerID',$id)->get();


            foreach ($data as $key=>$d) {

               foreach ($d as $s=>$v)
               {
                   $offer_detailes[$key][$s]=$data[$key][$s];
               }
              $offer_detailes[$key];
             $offer_detailes[$key]->save();
//             Offer_Detail::query()->where('OfferID',$id)->update($d);
            }

//             $offer_detail = Offer_Detail::query()->where('OfferID',$id)->update([$data]);
           // $offer_detail->save($data);
//           'CategoryID'=>$request->get('offer_category'),
//           'Quantity'=>$request->get('offer_qty'),
//           'discount'=>$request->get('offer_discount'),
//           'product_unite_of_measure'=>$request->get('unit_of_measure'),
//           'Offer_desc'=>$request->get('offer_description'),
//        'ProductID'=>$request->get('offer_product'),
//       ]);

        }
        Session::flash('update_msg','تم التعديل بنجاح ');
        return redirect(route('offer.edit',$id));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy';
    }

    public  function fetch_product(Request $request)
    {
      $value = $request->get('value');

       $data = DB::table('products')
         ->where('CategoryID',$value)
        ->select('Product_ID','Product_name')
         ->get();
       return response()->json($data) ;
     }
    public  function fetch_Unite_of_measure(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
         $data=Product::find($value);
         $dd=$data->ProductUniteOfMeasures;
        return response()->json($dd) ;
    }
     public function fetch_salsepepoles(Request $request)
     {
          $Salespeople= Salespeople::query()
              ->select('SP_ID','SP_first_name','SP_last_name')
              ->where('supervisorID',auth()->id())->get();
         return response()->json($Salespeople) ;
     }
     public  function  fetch_customers(Request $request)
     {
         $customers=RegisteredCustomere::query()->where('SalespersonID',$request->value)->get();
         return response()->json($customers) ;
     }
    public  function offers()
    {
        $offers = DB::table('offers')
            ->join('offer__details', 'offers.Offer_ID', '=', 'offer__details.OfferID')
            ->select('offers.Offer_ID','offers.start_date','offers.finish_date','offers.Offer_Type','offers.Offer_status')
         //   ->orderBy('Cus_Created_At','desc')
            ->get();
        return $offers;
    }
    public  function  offer_detailes()
    {
        $offer_detailes=DB::table('offer__details')
            ->join('product__unite_of_measures','product__unite_of_measures.product_unite_of_measure_id','=','offer__details.product_unite_of_measure_id')
            ->select('Quantity', 'discount')
            ->get();
        return $offer_detailes;
    }
    public  function  products()
    {
        $products=DB::table('products')
            ->join('offer__details','offer__details.ProductID','=','products.productID')
            ->select('Product_name')
            ->get();
        return $products;
    }
  public function Recycle_bin()
  {
      //
//        $offers = DB::table('offers')
//            ->select('Offer_ID','start_date','finish_date','Offer_Type','Offer_status')
//            ->get();
//            $offers_details=DB::table('offer__details')
//            ->join('offers','offer__details.OfferID','=','offers.Offer_ID')
//            ->select('offer__details.Quantity','offer__details.discount')
//            ->get();
      // $offer=Offer::query()->find(1);
      $customer_offers= RegisteredCustomere::query()->select('Cust_first_name','Cust_last_name')->with('Offer');
//          $product_unite_of_measures=ProductUniteOfMeasure::query()->find(1)->offer_details;
//           $product = Offer_Detail::query()->find(1)->products;
//        $customer_contacts=DB::table('customer_contacts')
//            ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_contacts.Customerid')
//            ->select('customer_contacts.phone_number','customer_contacts.email_address','customer_contacts.Customerid')
//            ->get();

      $datas=Offer_Detail::query()->select('Quantity', 'discount','product_unite_of_measure')->with(['Offer' => function($query) {
          $query->Select('Offer_ID','start_date','finish_date','Offer_Type','Offer_status');
      },'products'=>function($query){
          $query->Select('Product_name');
      }])->get();

//        $offers= offers();
//        $offers_details=offer_detailes();
//        $products=products();
//       return view('BackOffice-Layout.Pages.offers_list')->with(compact('offers','offers_details','customer_offers','product'));
//            ->with('customers',$customers)
//            ->with('customer_address',$customer_address)
//            ->with('customer_contacts',$customer_contacts);

  }
    public function searchoffer(Request $request){
        $search =$request->get('search');
        if( $search !='') {

            $Offers=\App\Offer::query()
                ->select('Offer_ID','start_date', 'finish_date','Offer_status','Offer_Type')
                ->with(['customers'=>function($query) {
                    $query->Select('Customer_ID','Cust_first_name','Cust_last_name','Cust_group_ID','Cust_category','SalespersonID')
                        ->with(['Salesperson'=>function($query)
                        {
                            $query->select('SP_ID','SP_first_name','SP_last_name') ;
                        }]);
                }])
                ->with(['Offer_details'=>function($query){
                    $query->select('ProductID','Quantity', 'discount','product_unite_of_measure','OfferID')
                        ->with(['products'=>function($query) {
                            $query->Select('Product_ID','Product_name');
                        }])  ;
                }])
                ->Where('Offer_Type','LIKE','%'.$search.'%')
                ->orwhere('start_date','LIKE','%'.$search.'%')
                ->orWhere('finish_date','LIKE','%'.$search.'%')
                ->whereHas('customers',function($query) use($search)
                {
                    $query->where('Cust_first_name','LIKE','%'.$search.'%')
                    ->orWhereHas('Salesperson',function ($query) use($search)
                {
                    $query->where('SP_first_name','LIKE','%'.$search.'%')
                        ->orwhere('SP_first_name','LIKE','%'.$search.'%');

                });
//
                })
                ->orWhereHas('Offer_details',function ($query) use($search)
                {
                    $query->where('discount','LIKE','%'.$search.'%')
                        ->orwhere('Quantity','LIKE','%'.$search.'%')
                     ->orwhere('product_unite_of_measure','LIKE','%'.$search.'%')
                        ->orWhereHas('products',function ($query) use($search)
                        {
                            $query->where('Product_name','LIKE','%'.$search.'%');

                        });
                })

                ->orderBy('Offer_ID', 'asc')
                ->get();
//            ->paginate(5);
            return view('BackOffice-Layout.Pages.offers_list')->with(compact('Offers'));

        }
        else if($search ==''){

            $Offers = $this->offer();
            return view('BackOffice-Layout.Pages.offers_list')->with(compact('Offers'));
        }

    }

    public  function offer()
    {
        $offers=\App\Offer::query()->select('Offer_ID','start_date', 'finish_date','Offer_status','Offer_Type')
            ->where('Offer_status',1)
            ->orderBy('Offer_ID', 'asc')
            ->with(['customers'=>function($query) {
            $query->Select('Customer_ID','Cust_first_name','Cust_last_name','Cust_group_ID','Cust_category','SalespersonID')
            ->with(['Salesperson'=>function($query)
                {
                    $query->select('SP_ID','SP_first_name','SP_last_name') ;
                }]);
        }])
          ->with(['Offer_details'=>function($query){
              $query->select('ProductID','Quantity', 'discount','product_unite_of_measure','OfferID')
                  ->with(['products'=>function($query) {
                      $query->Select('Product_ID','Product_name');
                  }])  ;
          }])
            ->get();
        return $offers;
    }

    public function  offerDetails()
    {
        $Offer_Details=Offer_Detail::query()
            ->select('ProductID','Quantity', 'discount','product_unite_of_measure','OfferID')
            ->with(['products'=>function($query) {
            $query->Select('Product_ID','Product_name');
        }])->get();
   return $Offer_Details;
    }


}
