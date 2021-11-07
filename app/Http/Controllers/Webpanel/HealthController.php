<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\User;
use App\Http\Controllers\Webpanel\Log_backendController;
use Yajra\DataTables\DataTables;
use App\Models\Backend\Employer;
use App\Models\Backend\Employee;
use App\Models\Backend\Follower;
use App\Models\Backend\title_data;
use App\Models\Backend\employer_data;
use App\Models\Backend\employee_data;
use App\Models\Backend\follower_data;
use App\Models\Backend\detail_data;
use App\Models\Backend\health;

class HealthController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'health';
    protected $folder = 'health';

    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('health','title_data.id',"=","health.title_id")
        ->where('title_data.received_by','=',null)
        ->orWhere('title_data.type','=','mou')
        ->orWhere('title_data.type','=','borderpass')
        // ->where('title_data.type','=','pinkcard')
        ->select('*','health.id as health_id','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
        ->when($like, function($query) use ($like){
            if(@$like['name'] != "")
            {
                $query->where('employer_data.name_th','like','%'.$like['name'].'%');
            }
            if(@$like['num_search'] != "")
            {
                $query->where('employer_data.tel_number','like','%'.$like['num_search'].'%');
            }
        })
        ->get();
        // dd($sTable);
        return Datatables::of($sTable)
        ->addIndexColumn()
        ->addColumn('created_at', function($row)
        {
            $data = date('d/m/Y',strtotime($row->created_at));
            return $data;
        })
        ->rawColumns(['created_at'])
        ->make(true);
        
    }
    public function datatable_health(Request $request)
    {
        // dd($request);
        $data = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('health','title_data.id',"=","health.title_id")
        ->where('title_data.id','=',$request->id)
        ->select('*','health.id as health_id','employer_data.type as employer_type','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
        
        ->first();
        return $data;
    }
    public function formhealth(Request $request)
    {
        // dd($request);
        $data = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('health','title_data.id',"=","health.title_id")
        ->where('title_data.id','=',$request->id)
        ->select('*','health.id as health_id','employer_data.type as employer_type','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
        
        ->first();
        return $data;
    }
    public function index(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                
                ["type"=>"text/javascript","src"=>"backend/build/backend/health.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
        ]);
    }
    public function add(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'add',
            'id' => $request->id, 
        ]);
        
    }
    public function add_health(Request $request){
        \DB::beginTransaction();
        try
        {
            // dd($request);
            if($request->health_id != null){
                $data = health::find($request->health_id);
                $data->updated = date('Y-m-d H:i:s');
            }else{
                $data = new health;
                $data->title_id = $request->title_id;
                $data->created = date('Y-m-d H:i:s');
            }
            
            $data->inspector = $request->inspector ;
            $data->insurance_right = $request->insurance_right ;
            $data->insurance_create = $request->insurance_create ;
            $data->insurance_expire = $request->insurance_expire ;
            $data->insurance_period = $request->insurance_period ;
            $data->social_security = $request->social_security ;
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/add")]);
            }
        }
        catch(\Exception $e)
        {
            \DB::rollback();
            $error_log = $e->getMessage();
            $error_line = $e->getLine();
            $type_status = 'error';
            $error_url = url()->current();
            echo $error_log." ".$error_line." ".$error_url;
        }
    }
    public function insert(Request $request)
    {
        return $this->store_system($request,$id=NULL);
    }

    public function update(Request $request, $id=null)
    {
        return $this->store_system($request,$id);
    }

    public function store_system($request, $id=null)
    {    
        \DB::beginTransaction();
        try
        {   
            // dd($request->w_zipcode);
            if($id==null){
                $data = new title_data;        
                $data->created = date('Y-m-d H:i:s');
                $data->delete_status = "off";
                $data->created_by=  Auth::guard()->id();
                $dataEmployee = new follower_data;
                $data->type_name = $request->select_type;
                $data->country = $request->select_country;
                
                $employer_id = employer_data::orderby('id','DESC')->first();
                $employee_id = employee_data::orderby('id','DESC')->first();
                $data->employer_id = $employer_id + 1;
                $data->employee_id = $employee_id + 1;
                $data->type = 'renew';
                
                $dataEmployee->workplace_province_id = $request->e_province_id;
                $dataEmployee->workplace_district_id = $request->e_district_id;
                $dataEmployee->workplace_subdistrict_id = $request->e_subdistrict_id;
            }
            else{
                $data = title_data::find($id);
                $data->updated = date('Y-m-d H:i:s');
                if($request->notes!=null){
                    $data->notes = $request->notes;
                }
                $dataEmployer = employer_data::find($request->employer_id);
                $dataEmployee = employee_data::find($request->employee_id);
                // dd($dataEmployee);
                
                $dataEmployee->workplace_province_id = $request->workplace_province_id_edit;
                $dataEmployee->workplace_district_id = $request->workplace_district_id_edit;
                $dataEmployee->workplace_subdistrict_id = $request->workplace_subdistrict_id_edit;
            }

                
                $dataEmployer->type = $request->type;
                $dataEmployer->id_card = $request->id_card;
                $dataEmployer->legal_number = $request->legal_number;
                $dataEmployer->company_name = $request->company_name;
                $dataEmployer->prefix_th = $request->prefix_th;
                $dataEmployer->name_th = $request->name_th;
                $dataEmployer->surname_th = $request->surname_th;
                $dataEmployer->nickname_th = $request->nickname_th;
            if(($data->save())&&($dataEmployer->save())&&($dataEmployee->save())){
            // if(($dataEmployer->save())&&($dataEmployee->save())){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/add")]);
            }
        }
        catch(\Exception $e)
        {
            \DB::rollback();
            $error_log = $e->getMessage();
            $error_line = $e->getLine();
            $type_status = 'error';
            $error_url = url()->current();
            echo $error_log." ".$error_line." ".$error_url;
        }
    }
    
    public function edit(Request $request,$id)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/users.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'edit',
            'row' => User::find($id),
           
        ]);
        
    }

}
