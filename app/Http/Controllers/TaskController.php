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
use App\Salesperson;         
use App\Area;
use App\ERP_Bill;
use App\AreasCoordinate;
use App\Task;
use Carbon\Carbon;
class TaskController extends Controller
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
    
            Task::where('Task_ID',$deleteID)->update([
                'Remove_Status'=>0,
                'Task_Deleted_At'=>date('Y-m-d H:i:s')
            ]);
            $CreatedTasks=$this->tasks();
            return view('BackOffice-Layout.Pages.created_tasks_list')
            ->with('CreatedTasks',$CreatedTasks);
    
        }else{
            $CreatedTasks=$this->tasks();
            return view('BackOffice-Layout.Pages.created_tasks_list')
            ->with('CreatedTasks',$CreatedTasks);
        }


       // dd(getAreaColor('Aden'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salespersons= $this->getSalespersonName();
        
        return view('BackOffice-Layout.Pages.create_task');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'task_start_date'   =>'date|required',
            'task_end_date'     =>'date|required',
            'salesperson_name'  =>'required',
            'areaName'          =>'required',
        ]);

        $taskData = new Task();
        $taskData->Task_Start_date = $request->input('task_start_date');
        $taskData->Task_End_date  = $request->input('task_end_date');
        $taskData->Task_sales_target  = $request->input('salesTarget');
        $taskData->Task_Area_ID  = $request->input('areaName');
        $taskData->SalespersonID   = $request->input('salesperson_name');
        $taskData->supervisorID  = 1;
        $taskData->save();

        Session::flash('Add_msg','تمت الاظافة بنجاح ');
        return view('BackOffice-Layout.Pages.create_task');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $showTasks=DB::table('tasks')
        ->join('areas', 'areas.Area_ID', '=', 'tasks.Task_Area_ID')
        ->join('salespeoples', 'salespeoples.SP_ID', '=', 'tasks.SalespersonID')
        ->join('supervisors', 'supervisors.id', '=', 'tasks.supervisorID')
        ->select('tasks.*','areas.*','salespeoples.*','supervisors.*')
        ->where('tasks.Task_ID',$id)
        ->get();


        foreach($showTasks as $showTasks_ID){
            if($showTasks_ID->Task_ID == $id){
                return view('BackOffice-Layout.Pages.show_created_tasks')
                ->with('showTasks', $showTasks);
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
        $this->validate($request,[
            'task_start_date'   =>'date|required',
            'task_end_date'     =>'date|required',
            'salesperson_name'  =>'required',
            'areaName'          =>'required',
        ]);



        $Updated_Task_Data  = Task::where('Task_ID',$id)->update([
            'Task_Start_date' => $request->input('task_start_date'),
            'Task_End_date' => $request->input('task_end_date'),
            'Task_sales_target'  => $request->input('salesTarget'),
            'Task_Area_ID' => $request->input('areaName'),
            'SalespersonID '  => $request->input('salesperson_name'),
            'supervisorID'  => 1

        ]);
      //  dd($Updated_Task_Data );


        Session::flash('update_msg','تم التعديل بنجاح ');
        return redirect(route('task.show',$id));
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
   
 

    public  function tasks()
    {
        $Tasks = DB::table('tasks')
        ->join('salespeoples', 'salespeoples.SP_ID', '=', 'tasks.SalespersonID')
        ->join('supervisors', 'supervisors.id', '=', 'tasks.supervisorID')
        ->select('tasks.*','supervisors.*','salespeoples.*')
        ->where('Remove_Status',1)
        ->orderBy('Task_ID','desc')
        ->get();

        return $Tasks;
    }


   public  function  areas()
   {
      $Areas=DB::table('areas')
                     ->select('areas.*')
                     ->get();
       return $Areas;
   }




   public function getSalespersonName(){
    $salespersons=Salesperson::all();
     return $salespersons;
 }


 public function getAreaName(){
        $area_names=Area::all();
        return $area_names;
}


public function searchTask(Request $request){
        $search =$request->get('search');
        if( $search !='') {
            $Tasks = DB::table('tasks')
            ->join('salespeoples', 'salespeoples.SP_ID', '=', 'tasks.SalespersonID')
            ->join('supervisors', 'supervisors.id', '=', 'tasks.supervisorID')
            ->select('tasks.*','supervisors.*','salespeoples.*')
            ->where('Task_Start_date','LIKE','%'.$search.'%')
            ->orWhere('Task_End_date','LIKE','%'.$search.'%')
            ->orWhere('Task_sales_target','LIKE','%'.$search.'%')
            ->orWhere('SP_first_name','LIKE','%'.$search.'%')
            ->orWhere('SP_last_name','LIKE','%'.$search.'%')
            ->paginate(5);

                return view('BackOffice-Layout.Pages.created_tasks_list')
                ->with('Tasks',$Tasks);

        }

        else if($search ==''){
            $Tasks=$this->tasks();
            return view('BackOffice-Layout.Pages.created_tasks_list')
            ->with('Tasks',$Tasks);
        }
    }

  
}
