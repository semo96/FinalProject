<?php

namespace App\Http\Controllers;

use App\Salespeople;
use App\Salesperson;
use App\SalespersonAddress;
use App\salespersonContact;
use App\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SP_Data_Controller extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return  $s_datas=Salespeople::join('salesperson_contacts','salespeoples.SP_ID','salesperson_contacts.SalespersonID')->join('salesperson_addresses','salespeoples.SP_ID','salesperson_addresses.SP_ID')->get();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


//
//         foreach ( $s_datas->salespersonContact as $s_d)
//         {
//             return $s_d;
//         }
        $s_datas=Salespeople::query()->select('SP_ID','SP_first_name','SP_last_name','SP_username','SP_Password','SP_status','SP_Type','SP_max_indebtedness')
            ->where('supervisorID',auth()->id())
            ->where('SP_status',1)
            ->with(['salespersonContact'=>function ($query)
            {
                $query->Select('SalespersonID','phone_number','email_address');
            },'SalespersonAddress'=>function ($query)
            {
                $query ->select('SP_ID','SP_Add_name');
            }])
            ->where('SP_status',1)
            ->get();
        $Supdervisore=Supervisor::query()->where('id',auth()->id())->first();
        return view('BackOffice-Layout.Pages.sp_data')->with(compact('s_datas','Supdervisore'));

//     $Salespeoples=$this->Salespeople();
//     $Salesperson_address=$this->Salesperson_address();
//     $Salesperson_contacts=$this->Salesperson_contact();
//
//
//    return view('BackOffice-Layout.Pages.sp_data')->with(compact('Salespeoples','Salesperson_address','Salesperson_contacts'));
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
    public function searchCustomer(Request $request){
        $search =$request->get('search');
        if( $search !='') {
            $customers = DB::table('registered_customeres')
                ->join('salespeoples', 'salespeople.SP_ID', '=', 'registered_customeres.SalespersonID')
                ->select('registered_customeres.*','salespeople.SP_first_name','salespeople.SP_last_name')
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

    public function search(Request $request)
    {

        $search=$request->get('search');
        if( $search !='') {
            $s_datas=$this->sp_data($search);
            $Supdervisore=Supervisor::query()->where('id',auth()->id())->first();

            return view('BackOffice-Layout.Pages.sp_data')->with(compact('s_datas','Supdervisore'));
//          $Salespeoples = DB::table('Salespeoples')
//                ->join('supervisors', 'salespeoples.supervisorID', '=', 'supervisors.id')
//                ->select('salespeoples.*', 'supervisors.sup_first_name', 'supervisors.sup_last_name')
//                ->where('SP_first_name', 'like', '%' . $search . '%')
//                ->orwhere('SP_last_name', 'like', '%' . $search . '%')
//                ->orwhere('SP_Type', 'like', '%' . $search . '%')
//                ->orwhere('SP_max_indebtedness', 'like', '%' . $search . '%')
//                ->orwhere('SP_status', 'like', '%' . $search . '%')
//                ->orwhere('sup_first_name', 'like', '%' . $search . '%')
//                ->orwhere('sup_last_name', 'like', '%' . $search . '%')
//                ->orwhere('SP_username', 'like', '%' . $search . '%')
//                ->orwhere('SP_Password', 'like', '%' . $search . '%')
//                ->paginate(5);
//            $Salesperson_address=DB::table('salesperson_addresses')
//                ->join('Salespeoples','Salespeoples.SP_ID','=','salesperson_addresses.SP_ID')
//                ->select('SP_Add_name')
//                ->where('salesperson_addresses.SP_Add_name','LIKE','%'.$search.'%')
//                ->paginate(5);
//            $Salesperson_contacts = DB::table('salesperson_contacts')
//                ->join('Salespeoples','Salespeoples.SP_ID','=','salesperson_contacts.SalespersonID')
//                ->select('salesperson_contacts.phone_number','salesperson_contacts.email_address','salesperson_contacts.SalespersonID')
//                ->where('salesperson_contacts.phone_number','LIKE','%'.$search.'%')
//                ->orwhere('salesperson_contacts.email_address','LIKE','%'.$search.'%')
//                ->paginate(5);

//              $s_datas=Salespeople::query()->select('SP_ID','SP_first_name','SP_last_name','SP_username','SP_Password','SP_status','SP_Type','SP_max_indebtedness')
//                 ->whereHas('salespersonContact', function ($query) use($search)
//                 {
//                     $query->where('phone_number', 'like', '%' . $search . '%')
//                         ->orwhere('email_address', 'like', '%' . $search . '%');
//                 })
//                 ->whereHas ('SalespersonAddress',function ($query) use($search)
//                 {
//                     $query->where('SP_Add_name', 'like', '%' . $search . '%');
//                 })
////                 ->with(['salespersonContact'=>function($query) {$query->Select('SalespersonID','phone_number','email_address');},
////                 'SalespersonAddress'=>function($query) {$query->Select('SP_ID','SP_Add_name');}])
//                 ->where('SP_first_name', 'like', '%' . $search . '%')
//                 ->orwhere('SP_last_name', 'like', '%' . $search . '%')
//                 ->orwhere('SP_Type', 'like', '%' . $search . '%')
//                 ->orwhere('SP_max_indebtedness', 'like', '%' . $search . '%')
//                 ->orwhere('SP_status', 'like', '%' . $search . '%')
////                 ->orwhere('sup_first_name', 'like', '%' . $search . '%')
////                 ->orwhere('sup_last_name', 'like', '%' . $search . '%')
//                 ->orwhere('SP_username', 'like', '%' . $search . '%')
//                 ->orwhere('SP_Password', 'like', '%' . $search . '%')
//                 ->get();
////           $Salesperson_address=SalespersonAddress::query()->whereHas('Salespeople', function ($query)
//            {$query->where('SP_status',1);})
//               ->where('SP_Add_name', 'like', '%' . $search . '%')
//               ->paginate(5);
//         dd( $Salesperson_address);

//           $Salesperson_contacts=salespersonContact::query()->whereHas('Salespeople', function ($query)
//            {$query->where('SP_status',1);})
//             ->where('phone_number', 'like', '%' . $search . '%')
//             ->orwhere('email_address', 'like', '%' . $search . '%')
//               ->paginate('5');


//            return view('BackOffice-Layout.Pages.sp_data')->with(compact('Salespeoples','Salesperson_address','Salesperson_contacts'));

        }
                  elseif ($search=' ')
                  {
                     $s_datas=Salespeople::query()
                         ->select('SP_ID','SP_first_name','SP_last_name','SP_username','SP_Password','SP_status','SP_Type','SP_max_indebtedness')
                         ->where('SP_status',1)
                         ->where('supervisorID',auth()->id())
                          ->with(['salespersonContact'=>function ($query)
                          {
                              $query->Select('SalespersonID','phone_number','email_address');
                          },'SalespersonAddress'=>function ($query)
                          {
                              $query ->select('SP_ID','SP_Add_name');
                          }])->get();
                      $Supdervisore=Supervisor::query()->where('id',auth()->id())->first();

                      return view('BackOffice-Layout.Pages.sp_data')->with(compact('s_datas','Supdervisore'));

//                      $Salespeoples=$this->Salespeople();
//                      $Salesperson_address=$this->Salesperson_address();
//                      $Salesperson_contacts=$this->Salesperson_contact();
//                  return view('BackOffice-Layout.Pages.sp_data')->with(compact('Salespeoples','Salesperson_address','Salesperson_contacts'));

                  }

    }
    public function sp_data($search)
    {
        $s_datas=Salespeople::query()
            ->select('SP_ID','SP_first_name','SP_last_name','SP_username','SP_Password','SP_status','SP_Type','SP_max_indebtedness')
            ->where('supervisorID',auth()->id())
            ->where('SP_status',1)
            ->with(['salespersonContact'=>function ($query)
            {
                $query->Select('SalespersonID','phone_number','email_address');
            },'SalespersonAddress'=>function ($query)
            {
                $query ->select('SP_ID','SP_Add_name');
            }])
            ->whereHas('salespersonContact',function ($query) use($search)
            {
                $query->where('phone_number', 'like', '%' . $search . '%')
                    ->orwhere('email_address', 'like', '%' . $search . '%');
            })
            ->orwhereHas('SalespersonAddress',function ($query) use($search)
            {
                $query->where('SP_Add_name', 'like', '%' . $search . '%');
            })
            ->where('SP_first_name', 'like', '%' . $search . '%')
            ->orwhere('SP_last_name', 'like', '%' . $search . '%')
            ->orwhere('SP_Type', 'like', '%' . $search . '%')
            ->orwhere('SP_max_indebtedness', 'like', '%' . $search . '%')
            ->orwhere('SP_status', 'like', '%' . $search . '%')
            ->orwhere('SP_username', 'like', '%' . $search . '%')
            ->orwhere('SP_Password', 'like', '%' . $search . '%')
            ->get();
        return $s_datas;
    }
    public  function Salespeople()
    {
        $Salespeople =Salespeople::query()
            ->join('supervisors','salespeoples.supervisorID','=','supervisors.id')
            ->select('salespeoples.*','supervisors.sup_first_name','supervisors.sup_last_name')
            ->where('supervisorID',auth()->id())
            ->get();
      return $Salespeople;

    }
    public  function  Salesperson_address()
    {
        $Salesperson_address=SalespersonAddress::query()->whereHas('Salespeople', function ($query)
        {
            $query->where('SP_status',1);
        })->get();
        return $Salesperson_address;
    }
    public  function  Salesperson_contact()
    {
        $Salesperson_contacts=salespersonContact::query()->whereHas('Salespeople', function ($query)
            {
                $query->where('SP_status',1);
            })->get();
        return $Salesperson_contacts;
    }
    public  function  supervisorname()
    {
        $supervisor=Supervisor::query()->select('id','sup_first_name','sup_last_name')->where('id',auth()->id())->first();
     return $supervisor;
    }
}
