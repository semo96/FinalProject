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

class SV_RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =Role::all();
        
        return view('AdminPanel-Layout.Pages.SV_Roles',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SV_roles= new Role();
        $SV_roles->Role_name=$request->input('role_name');
        $SV_roles->Role_description=$request->input('role_desc');
        $SV_roles->created_date=date('Y-m-d H:i:s');

        $SV_roles->save();
        //dd($request->all());
        Session::flash('Add_msg','تمت الاضافة بنجاح ');
        return view('AdminPanel-Layout.Pages.SV_Roles');
        //return view('AdminPanel-Layout.Pages.SV_Roles',compact('SV_roles'));
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
        $Edited_roles=DB::table('roles')
        ->select('*')
        ->where('Role_ID',$id)
        ->get();

        return view('AdminPanel-Layout.Pages.edit_role')
        ->with('Edited_roles',$Edited_roles); 
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
        $this->validate($request ,[
			'role_name'=>'required',
			'role_desc'=>'required',

        ]);

        $Updated_roles  = Role::where('Role_ID',$id)->update([
            'Role_name'=>$request->input('role_name'),
            'Role_description'=> $request->input('role_desc')

        ]);

        Session::flash('update_msg','تم التعديل بنجاح ');
         return redirect(route('SV_Role.edit',$id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_role=DB::table('roles')->select('*')->where('Role_ID',$id)->delete();
       // return view('AdminPanel-Layout.Pages.SV_Roles');
         return redirect(route('SV_Role.create'));
    }

    public function searchRoles(Request $request){
        $search=$request->get('search');

        if($search !=""){
            $roles= DB::table('roles')->select('roles.*')
            ->where('Role_ID',"like",'%'.$search.'%')
            ->orWhere('Role_name',"like",'%'.$search.'%')
            ->orWhere('>Role_description',"like",'%'.$search.'%')
            ->orWhere('created_date',"like",'%'.$search.'%')
            ->paginate(5);
    
            return view('AdminPanel-Layout.Pages.SV_Roles',compact('roles'));
            
           //   return "roles";
        }
        else if($search =""){
            $roles=DB::table('roles')->select('*')->get();
            return view('AdminPanel-Layout.Pages.SV_Roles',compact('roles'));

        }

       
    }
}
