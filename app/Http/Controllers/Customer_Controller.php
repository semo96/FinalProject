<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Illuminate\Support\Facades\File;
use Session;
use Validator;
//use App\LastId;
use App\RegisteredCustomere;
use App\CustomerAddress ;
use App\CustomerContact;
use App\Salespeople;
use App\Rules\VaildPhone;

class Customer_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       /*
         FOR TESTING
       $customers = DB::table('registered_customeres')
        ->join('salespeoples', 'salespeoples.SP_ID', '=', 'registered_customeres.SalespersonID')
        ->select('registered_customeres.*', 'salespeople.SP_first_name')
        ->get()->toArray();

        echo '<pre>';
        print_r($customers);
        exit;*/


        if(isset($request->delete_ID)){
            $deleteID=$request->delete_ID;

            RegisteredCustomere::where('Customer_ID',$deleteID)->update([
                'Cus_remove_status'=>0,
                'Cus_Deleted_At'=>date('Y-m-d H:i:s')
            ]);
            $customers=$this->customers();
            $customer_address=$this->customer_address();
            $customer_contacts=$this->customer_contact();

            return view('BackOffice-Layout.Pages.customer_data')
            ->with('customers',$customers)
            ->with('customer_address',$customer_address)
            ->with('customer_contacts',$customer_contacts);

        }else{
            $customers=$this->customers();
            $customer_address=$this->customer_address();
            $customer_contacts=$this->customer_contact();

            return view('BackOffice-Layout.Pages.customer_data')
            ->with('customers',$customers)
            ->with('customer_address',$customer_address)
            ->with('customer_contacts',$customer_contacts);
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $Salespeoples= $this->getSalespeoplesName();

        return view('BackOffice-Layout.Pages.create_customer')->with('Salespeoples',$Salespeoples);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation Rules
       $this->validate($request,[
            'cus_fname'           =>['valid_name'],
            'cus_lname'           =>['valid_name'],
            'cus_area.*'            =>['valid_address','array'],
            'cus_address.*'         =>['valid_address'],
            'cus_maximum_credit'  =>'required',
            'cus_email.*'         => 'required | email|array',
            'salesperson_name'    => 'required',
            'cus_phone.*'           =>'required',
            'cus_type'            =>'required',
            'cus_loc_in_map'      =>'required',
            'cus_img'             =>'image',
        ]);

        //uploading img
         if($request->hasFile('cus_img')){
             $imageExt =$request->file('cus_img')->getClientOriginalExtension();
             $imageName=time().'user.'.$imageExt ;
             $request->file('cus_img')->storeAs('Users_img',$imageName);
         }
         else{
            $imageName=null;

        }


       /*******First Method For Gerating Random numbers******
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $Active_Code = str_shuffle($pin);******** */

        //second one
        $Active_Code = mt_rand(100000,999999);

        $customer_Last_ID= DB::table('registered_customeres')
        ->insertGetId(
            [
                'Cust_first_name' => $request->input('cus_fname'),
                'Cust_last_name'  => $request->input('cus_lname'),
                'Cust_category'   => $request->input('cus_type'),
                'Maximum_credit'  => $request->input('cus_maximum_credit'),
                'Cus_Created_At'  => date('Y-m-d H:i:s'),
                'SalespersonID'   => $request->input('salesperson_name'),
                'Customer_photo'  => $imageName,
                'Cust_group_ID '  => $request->input('salesperson_name'),
                'Activation_code' => $Active_Code
            ]
        );


        $inputAddress = $request->all();
        $address_data=array();
        foreach ($request->cus_address as $key => $value) {
          if(!isset($request->location_name) and !isset($request->Area)){
               $address_data[]=[
                   'location_name' =>$value,
                   'Area' =>$request->cus_area [$key],
                   'Customerid' =>$customer_Last_ID
                ];
            }
            else if(isset($request->Area)){
               $address_data[]=[
                'location_name' =>$value,
                'Area' =>null,
                'Customerid' =>$customer_Last_ID
                ];
            }
            else if(isset($request->location_name)){
               $address_data[]=[
                'location_name' =>null,
                'Area' =>$value,
                'Customerid' =>$customer_Last_ID
                ];
            }

        }
        CustomerAddress::insert($address_data);


     $input = $request->all();
     $data=array();

     foreach ($request->cus_email  as $key => $value) {
         if(!isset($request->email_address) and !isset($request->phone_number)){
            $data[]=[
                'email_address' =>$value,
                'phone_number' =>$request->cus_phone[$key],
                'Customerid' =>$customer_Last_ID
             ];
         }
         else if(isset($request->email_address)){
            $data[]=[
                'email_address' =>null,
                'phone_number' =>$value,
                'Customerid' =>$customer_Last_ID
             ];
         }
         else if(isset($request->phone_number)){
            $data[]=[
                'email_address' =>$value,
                'phone_number' =>null,
                'Customerid' =>$customer_Last_ID
             ];
         }

     }
     CustomerContact::insert($data);


        Session::flash('Add_msg','تمت الاظافة بنجاح ');
        return view('BackOffice-Layout.Pages.create_customer');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showCus_Data=DB::table('registered_customeres')
        ->join('salespeoples', 'salespeoples.SP_ID', '=', 'registered_customeres.SalespersonID')
        ->select('registered_customeres.*','salespeoples.SP_first_name','salespeoples.SP_last_name')
        ->where('registered_customeres.Customer_ID',$id)
        ->get();


        $showCus_address=DB::table('customer_addresses')
        ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_addresses.Customerid')
        ->select('customer_addresses.Area','customer_addresses.location_name','customer_addresses.Customerid')
        ->where('customer_addresses.Customerid',$id)
        ->get();

        $showCus_contact=DB::table('customer_contacts')
        ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_contacts.Customerid')
        ->select('customer_contacts.phone_number','customer_contacts.email_address','customer_contacts.Customerid')
        ->where('customer_contacts.Customerid',$id)
        ->get();


        foreach($showCus_Data as $Cus_Data_ID){
            if($Cus_Data_ID->Customer_ID == $id){
                return view('BackOffice-Layout.Pages.show_customer')
                ->with('showCus_Data', $showCus_Data)
                ->with('showCus_address',$showCus_address)
                ->with('showCus_contact',$showCus_contact);
            }
            else{
               return  view  ('BackOffice-Layout.Pages.NotFound');
            }
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $EditCus_Data=DB::table('registered_customeres')
            ->join('salespeoples', 'salespeoples.SP_ID', '=', 'registered_customeres.SalespersonID')
            ->select('registered_customeres.*','salespeoples.SP_first_name','salespeoples.SP_last_name')
            ->where('registered_customeres.Customer_ID',$id)
            ->get();

            $EditCus_address=DB::table('customer_addresses')
            ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_addresses.Customerid')
            ->select('customer_addresses.Area','customer_addresses.location_name','customer_addresses.Customerid')
            ->where('customer_addresses.Customerid',$id)
            ->get();

            $EditCus_contact=DB::table('customer_contacts')
            ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_contacts.Customerid')
            ->select('customer_contacts.phone_number','customer_contacts.email_address','customer_contacts.Customerid')
            ->where('customer_contacts.Customerid',$id)
            ->get();

            foreach($EditCus_Data as $Cus_Data_ID){
                if($Cus_Data_ID->Customer_ID == $id){
                    return view('BackOffice-Layout.Pages.edit_customer')
                    ->with('EditCus_Data', $EditCus_Data)
                    ->with('EditCus_address',$EditCus_address)
                    ->with('EditCus_contact',$EditCus_contact);
                }
                else{
                   return view ('BackOffice-Layout.Pages.NotFound');
                }
            }



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
       //Validation Rules
       $this->validate($request,[
        'cus_fname'            =>'required',
         'cus_lname'           =>'required',
        // 'cus_area'            =>'required',
       //  'cus_address'         =>'required',
         'cus_maximum_credit'  =>'required',
        // 'cus_email'           =>'required' ,
        // 'cus_phone'           =>'required|min:9',
         'cus_type'            =>'required',
         'salesperson_name'    =>'required' ,
         'cus_loc_in_map'      =>'required',
         'cus_img'             =>'image',
     ]);

        //uploading img
        if($request->hasFile('cus_img')){
            $imageExt =$request->file('cus_img')->getClientOriginalExtension();
            $imageName=time().'user.'.$imageExt ;
            $request->file('cus_img')->storeAs('Users_img',$imageName);
        }
        else{
            $imageName=null;

        }

        $Updated_Cus_Data  = RegisteredCustomere::where('Customer_ID',$id)->update([
            'Cust_first_name' => $request->input('cus_fname'),
            'Cust_last_name ' => $request->input('cus_lname'),
            'Cust_category '  => $request->input('cus_type'),
            'Maximum_credit ' => $request->input('cus_maximum_credit'),
            'SalespersonID '  => $request->input('salesperson_name'),
            'Customer_photo'  => $imageName

        ]);



      /*  $Updated_Cus_contact  = CustomerContact::where('Customerid',$id)->update([
            'phone_number'    =>$request->input('cus_phone'),
            'email_address'   =>$request->input('cus_email')

        ]);

        $Updated_Cus_address  = CustomerAddress::where('Customerid',$id)->update([
            'Area'          => $request->input('cus_area'),
            'location_name' => $request->input('cus_address')
        ]);
*/









$dataAddress=array();

foreach ($request->cus_area  as $key => $value) {
    if(!isset($request->Area) and !isset($request->location_name)){
        $dataAddress[]=[
            'Area' =>$value,
            'location_name' =>$request->cus_address[$key],
           // 'Customerid'=>$id
        ];
    }
    else if(isset($request->Area)){
        $dataAddress[]=[
            'Area' =>null,
            'location_name' =>$value,
           // 'Customerid'=>$id
        ];
    }
    else if(isset($request->location_name)){
        $dataAddress[]=[
            'Area' =>$value,
            'location_name' =>null,
            //'Customerid'=>$id
        ];
    }
   // CustomerAddress::where('Customerid',$id)->update($dataAddress);
}
 // dd($dataAddress);
//$json = json_encode($dataAddress);
//CustomerAddress::where('Customerid',$id)->update(json_decode(json_encode($dataAddress),true));

// $updated_address=RegisteredCustomere::where('Customer_ID',$id);
 //$updated_address->CustomerAddress()->sync($dataAddress);

//
//  $updated_address->save()->first();
/*if(is_array($dataAddress)){
    CustomerAddress::where('Customerid',$id)->update($dataAddress);
}*/
///$json = json_encode($dataAddress);
//CustomerAddress::where('Customerid',$id)->update(json_decode(json_encode($dataAddress),true));



















         // $updated_address=CustomerAddress::where('Customerid',$id);
         /*   $address_data=array();
            foreach ($request->cus_address as $key=>$value ) {
                if(!isset($request->location_name) and !isset($request->Area)){

                 $Updated_Cus_address  = CustomerAddress::where('Customerid',$id[$key])->update([
                    'location_name' =>$request->cus_address[$key],
                    'Area' =>$request->cus_area [$key]

                 ]);

                }

            }*/

          /*  $input=$request->all();
            foreach($input['cus_address'] as $key=>$value){
                $Updated_Cus_address =array(
                    'location_name' =>$input['cus_address'][$key],
                    'Area' =>$input['cus_area'][$key]
                );
               // $Updated_Cus_address= str_replace("'", "\'", json_encode($Updated_Cus_address)) ;
                CustomerAddress::where('Customerid',$key)->update($Updated_Cus_address);
            }*/





          /*  DB::table('customer_addresses')->whereIn('Customerid', $id)->update([ $request->all()]
               );


           for ($i=0; $i<count($request->cus_address); $i++) {

                DB::table('customer_addresses')
                    ->where('Customerid',$request->cus_id)
                    ->update([
                        'location_name' =>array($request->cus_address[$i]),
                        'Area' => $request->cus_area[$i],

                ]);

            }*/





   /* $addressData = [];
    $i = 0;

    foreach ($request->cus_address as $key=>$value) {

        $addressData = [
            'location_name' => $request->cus_address[$key],
            'Area' => $request->cus_area[$key],
          'Customerid' =>$id,

        ];

        $i+=1;
        dd( $addressData);
    }*/






  /*  $addressData = [];
    $i = 0;

    foreach ($request->cus_address as $key) {

        $addressData[$key] = [
            'location_name' => $request->cus_address[$i],
            'Area' => $request->cus_area[$i],
          'Customerid' =>$id,

        ];

        $i+=1;
        dd( $addressData);
    }

    $Cus_Data= CustomerAddress::where('Customerid',$id);
    $Cus_Data->RegisteredCustomere()->sync($addressData);*/







           // CustomerAddress::where('Customerid',$id)->update([$address_data]);


      /*  $input = $request->all();
        $data=array();

        foreach ($request->cus_email  as $key => $value) {
            if(!isset($request->email_address) and !isset($request->phone_number)){
                $data[]=[
                    'email_address' =>$value,
                    'phone_number' =>$request->cus_phone[$key],
                    'Customerid'=>$id
                ];
            }
            else if(isset($request->email_address)){
                $data[]=[
                    'email_address' =>null,
                    'phone_number' =>$value,
                    'Customerid'=>$id
                ];
            }
            else if(isset($request->phone_number)){
                $data[]=[
                    'email_address' =>$value,
                    'phone_number' =>null,
                    'Customerid'=>$id
                ];
            }

        }
        CustomerContact::insert($data); */









        Session::flash('update_msg','تم التعديل بنجاح ');
        return redirect(route('customer.edit',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids=$id;

        return  $ids;

      /*  $DEL_Cus_Data = RegisteredCustomere::where('Customer_ID',$id)->update([
              'Cus_remove_status'=>0,
              'Cust_first_name'=>'shahed',
              'Cus_Deleted_At'=>date('Y-m-d H:i:s')
        ]);

        Session::flash('Add_msg','تم الحذف  بنجاح ');
        return view('BackOffice-Layout.Pages.customer_data')->with('DEL_Cus_Data',$DEL_Cus_Data);*/
    }




    //this method for search
    public function searchCustomer(Request $request){
        $search =$request->get('search');
        if( $search !='') {
            $customers = DB::table('registered_customeres')
                ->join('salespeoples', 'salespeoples.SP_ID', '=', 'registered_customeres.SalespersonID')
                ->select('registered_customeres.*','salespeoples.SP_first_name','salespeoples.SP_last_name')
                ->orderBy('Cus_Created_At','desc')
                ->where('Cust_first_name','LIKE','%'.$search.'%')
                ->orWhere('Cust_last_name','LIKE','%'.$search.'%')
                ->orWhere('Cus_Created_At','LIKE','%'.$search.'%')
                ->orWhere('Cust_category','LIKE','%'.$search.'%')
                ->orWhere('Maximum_credit','LIKE','%'.$search.'%')
                ->orWhere('SP_first_name','LIKE','%'.$search.'%')
                ->orWhere('SP_last_name','LIKE','%'.$search.'%')
                ->paginate(5);

                $customer_address=DB::table('customer_addresses')
                ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_addresses.Customerid')
                ->select('customer_addresses.*')
                ->where('customer_addresses.location_name','LIKE','%'.$search.'%')
                ->orwhere('customer_addresses.Area','LIKE','%'.$search.'%')
                ->paginate(5);

                $customer_contacts=DB::table('customer_contacts')
                ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_contacts.Customerid')
                ->select('customer_contacts.phone_number','customer_contacts.email_address','customer_contacts.Customerid')
                ->where('customer_contacts.phone_number','LIKE','%'.$search.'%')
                ->orwhere('customer_contacts.email_address','LIKE','%'.$search.'%')
                ->paginate(5);

         return view('BackOffice-Layout.Pages.customer_data')->with(compact('customers','customer_address','customer_contacts'));

        }

        else if($search ==''){

            $customers=$this->customers();
            $customer_address=$this->customer_address();
            $customer_contacts=$this->customer_contact();

          return view('BackOffice-Layout.Pages.customer_data')->with(compact('customers','customer_address','customer_contacts'));
        }
    }



   /* public function SalespeoplesName(){
        $salespersons = Salesperson::all();
        return  $salespersons;
    }*/

    public  function customers()
    {
     $customers = DB::table('registered_customeres')
        ->join('salespeoples', 'salespeoples.SP_ID', '=', 'registered_customeres.SalespersonID')
        ->select('registered_customeres.*','salespeoples.SP_first_name','salespeoples.SP_last_name')
        ->where('registered_customeres.Cus_remove_status',1)
        ->orderBy('Customer_ID','desc')
        ->get();

        return $customers;
    }
   public  function  customer_address()
   {
       $customer_address=DB::table('customer_addresses')
                     ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_addresses.Customerid')
                     ->select('customer_addresses.Area','customer_addresses.location_name','customer_addresses.Customerid')
                     ->where('registered_customeres.Cus_remove_status',1)
                   ->get();
       return $customer_address;
   }
    public  function  customer_contact()
        {
            $customer_contacts=DB::table('customer_contacts')
                     ->join('registered_customeres','registered_customeres.Customer_ID','=','customer_contacts.Customerid')
                     ->select('customer_contacts.phone_number','customer_contacts.email_address','customer_contacts.Customerid')
                     ->where('registered_customeres.Cus_remove_status',1)
                    ->get();
            return $customer_contacts;
        }

   public function getSalespeoplesName(){
       $Salespeoples=Salespeople::all();
        return $Salespeoples;
    }

    public function getPhone(){
        $input = Request::all();
        // $input_phone = $request->all();
       if(count($input)>0){
           for($i=0; $i<= count($input['cus_phone']) ; $i++) {
               if(empty($input['cus_phone'][$i])) continue;

                   $data = [
                     //  'email_address' =>$input['cus_email'][$i] ,
                       'phone_number' =>$input['cus_phone'][$i]
                     //  'Customerid' =>$customer_Last_ID
                       ];
                      return $data;

             }
        }

    }
}
