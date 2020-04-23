<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\RegisteredCustomere;
use App\CustomerAddress ;
use App\CustomerContact;
use App\Feedback;

class FeedBack_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->delete_ID)){
            $deleteID=$request->delete_ID;

            Feedback::where('Feedback_ID',$deleteID)->update([
                'Remove_Status'=>0,
                'FB_Deleted_At'=>date('Y-m-d H:i:s')
            ]);

            $customer_FeedBacks = DB::table('feedback')
            ->join('registered_customeres', 'registered_customeres.Customer_ID', '=', 'feedback.Cus_ID')
            ->select('registered_customeres.*','feedback.*') 
            ->where('feedback.Remove_Status',1)
            ->orderBy('Feedback_Date','desc')
            ->get();
      
    
            return view('BackOffice-Layout.Pages.customer_feedback')
                  ->with('customer_FeedBacks',$customer_FeedBacks);
        
        }else{
            $customer_FeedBacks = DB::table('feedback')
            ->join('registered_customeres', 'registered_customeres.Customer_ID', '=', 'feedback.Cus_ID')
            ->select('registered_customeres.*','feedback.*')
            ->where('feedback.Remove_Status',1) 
            ->orderBy('Feedback_Date','desc')
            ->get();
      
    
            return view('BackOffice-Layout.Pages.customer_feedback')
                  ->with('customer_FeedBacks',$customer_FeedBacks);

        }
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $Show_cus_FeedBacks = DB::table('feedback')
        ->join('registered_customeres', 'registered_customeres.Customer_ID', '=', 'feedback.Cus_ID')
        ->select('registered_customeres.*','feedback.*') 
        ->where('feedback.Feedback_ID',$id)
        ->get();

        foreach($Show_cus_FeedBacks as $FD_Data_ID){
            if($FD_Data_ID->Feedback_ID == $id){
                return view('BackOffice-Layout.Pages.feedback_details')
                ->with('Show_cus_FeedBacks',$Show_cus_FeedBacks); 
            }
            else{
                 return view ('BackOffice-Layout.Pages.NotFound');
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

    public function searchFeedBack(Request $request){

        $search =$request->get('search');
        if( $search !='') {
                $customer_FeedBacks = DB::table('feedback')
                ->join('registered_customeres', 'registered_customeres.Customer_ID', '=', 'feedback.Cus_ID')
                ->select('registered_customeres.*','feedback.*') 
                ->orderBy('Feedback_Date','desc')
                ->where('Cust_first_name','LIKE','%'.$search.'%')
                ->orWhere('Cust_last_name','LIKE','%'.$search.'%')
                ->orWhere('Cus_Created_At','LIKE','%'.$search.'%')
                ->orwhere('Feedback_Date','LIKE','%'.$search.'%')
                ->orwhere('Feedback_Status','LIKE','%'.$search.'%')
                ->paginate(5);

                return view('BackOffice-Layout.Pages.customer_feedback')
                ->with('customer_FeedBacks',$customer_FeedBacks);  
        }

        else if($search ==''){
            $customer_FeedBacks = DB::table('feedback')
            ->join('registered_customeres', 'registered_customeres.Customer_ID', '=', 'feedback.Cus_ID')
            ->select('registered_customeres.*','feedback.*') 
            ->orderBy('Feedback_Date','desc')
            ->get();
      
    
            return view('BackOffice-Layout.Pages.customer_feedback')
                  ->with('customer_FeedBacks',$customer_FeedBacks); 
        }
    }

}
