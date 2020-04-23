<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;
use App\Role;
use App\SupervisorContact;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use App\Rules\VaildPhone;

class supervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$supervisors=DB ::table('supervisors')->get();
//		$supervisors =DB::table('supervisors')->select('sup_first_name','sup_last_name','sup_username','sup_password','address')->get();
//		
		$supervisorsContacts=DB::table('supervisor_contacts')
			->join('supervisors','supervisors.supervisor_ID','=','supervisor_contacts.supervisorID')
		    ->select('supervisor_contacts.phone_number','supervisor_contacts.email_address',
					 'supervisor_contacts.supervisorID')->first();
		$supervisorTypes=DB::table('user_types')
			->join('supervisors','user_types.user_type_ID','=','supervisors.usertype_ID')
			->select('user_types.user_type_name')
			->get();
			
		return view('AdminPanel-Layout.Pages.supervisors_list')
			->with('supervisors',$supervisors)
			->with('supervisor_contacts',$supervisorsContacts)
			->with('user_types',$supervisorTypes);
			
//		$supervisors =DB::table('supervisors')
//			->join('supervisor_contacts','supervisors.supervisor_ID','=','supervisor_contacts.supervisorID')
//			->join('user_types','user_types.user_type_ID','=','supervisor.usertype_ID')
//			->select('supervisor_contacts.phone_number','supervisor_contacts.email_address',				 'supervisors.supervisor_ID','supervisors.sup_first_name','supervisors.sup_last_name',
//		    'user_types.user_type_name''supervisors.sup_username','supervisors.sup_password','supervisors.address')
//			->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
		return view('AdminPanel-Layout.Pages.add_sv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // try {
             //add here the name of the form element 	
        $this->validate($request ,[
			'sup_phone_number'=>['valid_phone','max:9'],
            'sup_email_address'=>'valid_email',
            'sup_password'=>['string', 'min:8'],
            'confirm_pass'=>['nullable', 'required_with:sup_password',
            'same:sup_password'],

        ]);

        $supervisor =new Supervisor();
        $supervisorContact =new SupervisorContact ();
        $roles =new Role();

        if($request->input('sup_password')==$request->input('confirm_pass')){
           
         
            $supervisor->sup_first_name =$request->input('sup_first_name');
            $supervisor->sup_last_name =$request->input('sup_second_name');
            $supervisor->username =$request->input('sup_user_name');
            $supervisor->password =Hash::make($request->input('sup_password'));
            $supervisor->confirm_pass=Hash::make($request->input('confirm_pass'));
            $supervisor->address =$request->input('sup_address');
            $supervisor->sup_status = 1;


            $supervisor->save();
    
            $supervisorContact->supervisorID=$supervisor->id;
            $supervisorContact->phone_number= $request->input('sup_phone_number');
            $supervisorContact->email_address= $request->input('sup_email_address');
            $supervisorContact->save();
    
            Session::flash('Add_msg','تمت الاضافة بنجاح ');
            //return redirect(route('supervisors_list'));
            return view('AdminPanel-Layout.Pages.add_sv');
    
        }else  if($request->input('sup_password')!=$request->input('confirm_pass')){

            Session::flash('pass_alert','كلمة المرور ليست متوافقة ');
            //return redirect(route('supervisors_list'));
            return view('AdminPanel-Layout.Pages.add_sv');
        }
		
       /* } catch (\Throwable $th) {
            return back()->with('error', 'هناك خطأ');
            
        }*/
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id){

        $edit_supervisors=DB::table('supervisors')->select('*')->where('id',$id)->get();
        //		$supervisors =DB::table('supervisors')->select('sup_first_name','sup_last_name','sup_username','sup_password','address')->get();
        //		
                $edit_supervisorsContacts=DB::table('supervisor_contacts')
                    ->join('supervisors','supervisors.id','=','supervisor_contacts.supervisorID')
                    ->select('supervisor_contacts.phone_number','supervisor_contacts.email_address',
                             'supervisor_contacts.supervisorID')
                    ->where('supervisor_contacts.supervisorID',$id)
                    ->get();
                
                     return view('AdminPanel-Layout.Pages.edit_supervisor')
                            ->with('edit_supervisors',$edit_supervisors)
                            ->with('edit_supervisorsContacts',$edit_supervisorsContacts);

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

        
		$this->validate($request ,[
			'sup_first_name'=>'valid_name',
			'sup_second_name'=>'valid_name',
			'user_name'=>'valid_name',
			'sup_address'=>'valid_address',
            'sup_phone_number'=>'valid_phone',
            'sup_email_address'=>'valid_email',
           /* 'NewPassord'=>['string', 'min:8'],
            'confirm_pass'=>['nullable', 'required_with:NewPassord',
            'same:NewPassord'],*/

        ]);
        
        $supervisors =Supervisor::all()->where('id',$id);
        foreach($supervisors as $supervisor){
            $oldPass=$supervisor->password;
        }
    //dd($NewPass);

        $NewPass=$request->input('old_password');  

    if (Hash::check($NewPass, $oldPass))
    {
        $Updated_supervisor_Data  = Supervisor::where('id',$id)->update([
            'sup_first_name' =>$request->input('sup_first_name'),
            'sup_last_name' =>$request->input('sup_second_name'),
            'username' =>$request->input('sup_user_name'),
            'password' =>Hash::make($request->input('NewPassord')),
            'address' =>$request->input('sup_address')
        
        ]);
    
        $Updated_supervisor_contact  = SupervisorContact::where('supervisorID',$id)->update([
                'phone_number'=>$request->input('sup_phone_number'),
                'email_address'=> $request->input('sup_email_address')
    
        ]);
    
            Session::flash('update_msg','تم التعديل بنجاح ');
            return redirect(route('supervisor.edit',$id));
          //return view('AdminPanel-Layout.Pages.edit_supervisor');
   }else if(!Hash::check($NewPass, $oldPass)) {
         Session::flash('pass_alert','كلمة المرور ليست متوافقة ');
         return redirect(route('supervisor.edit',$id));
    }
    

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
		//
         return "destroy";
        // Supervisor::find($id)->delete();
        // $delete_supervisors=DB::table('supervisors')->select('*')->where('id',$id)->delete();
       // $delete_supervisors->delete($id);
        return redirect(route('supervisors_list'));
    }

    public function searchSupervisor (Request $request)
    {

    $search=$request->get('search');
    if(!empty($search)){

        $supervisors =DB::table('supervisors')->select('supervisors.*')
        ->where('sup_first_name','like','%'.$search.'%')
        ->orWhere('sup_last_name','like','%'.$search.'%')
        ->orWhere('address','like','%'.$search.'%')
        ->orWhere('username','like','%'.$search.'%')
        ->paginate(5);

        $supervisorsContacts =DB ::table('supervisor_contacts')
        ->join('supervisors','supervisor_contacts.supervisorID','=','supervisors.id')
        ->select('supervisor_contacts.email_address','supervisor_contacts.phone_number','supervisor_contacts.supervisorID')
        ->where('phone_number','like','%'.$search.'%')
        >orWhere('email_address','like','%'.$search.'%')
        ->paginate(5);

        $supervisorRoles=DB::table('supervisor__roles')
        ->join('supervisors','supervisor__roles.SupervisorID','=','supervisors.id')
        ->join('roles','roles.Role_ID','=','supervisor__roles.RoleID')
        ->select('roles.Role_name')->where('roles.Role_ID','=','supervisors.id' && 'Role_name','like','%'.$search.'%');
        
        return view('AdminPanel-Layout.Pages.supervisors_list', compact('supervisors','supervisorsContacts',
        'supervisorRoles'));


    }   else if(empty($search)){

        $supervisors=DB ::table('supervisors')->get();
//		
//		
		$supervisorsContacts=DB::table('supervisor_contacts')
			->join('supervisors','supervisors.id','=','supervisor_contacts.supervisorID')
		    ->select('supervisor_contacts.phone_number','supervisor_contacts.email_address',
                     'supervisor_contacts.supervisorID')->get();
                     
                     $supervisorRoles=DB::table('supervisor__roles')
                     ->join('supervisors','supervisor__roles.SupervisorID','=','supervisors.id')
                     ->join('roles','roles.Role_ID','=','supervisor__roles.RoleID')
                     //->select('roles.Role_name')->where('roles.Role_ID','=','supervisors.id')
                     ->get();

      

        return view('AdminPanel-Layout.Pages.supervisors_list', compact('supervisors','supervisorsContacts',
        'supervisorRoles'));
    }


    }



}
