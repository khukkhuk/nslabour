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
use App\Models\Backend\visa;
use App\Models\Backend\report;
use App\Models\Backend\nationalproof;
use App\Models\Backend\pinkcard;


class PinkcardController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'pinkcard';
    protected $folder = 'pinkcard';

    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','pinkcard')
        ->select('*','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
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
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('healthy','title_data.id',"=","healthy.title_id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','pinkcard')
        ->select('*','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
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
    public function datatable_workpermit(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('visa','title_data.id',"=","visa.title_id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','pinkcard')
        ->select('*','visa.status as visa_status','visa.notes as visa_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
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
    public function datatable_visa(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('visa','title_data.id',"=","visa.title_id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','pinkcard')
        ->select('*','visa.status as visa_status','visa.notes as visa_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
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
    public function datatable_nationalproof(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('nationalproof','title_data.id',"=","nationalproof.title_id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','pinkcard')
        ->select('*','nationalproof.status as nationalproof_status','nationalproof.notes as nationalproof_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
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
    public function datatable_pinkcard(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->leftjoin('pinkcard','title_data.id',"=","pinkcard.title_id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','pinkcard')
        ->select('*','pinkcard.status as pinkcard_status','pinkcard.notes as pinkcard_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
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
    public function index(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            'rows' => User::orderby('id','desc')->get(),
        ]);
    }
    public function add(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'add',
            'id' => $request->id, 
            'rows' => Employer::orderby('id','asc')->get(), 
        ]);
        
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
                $data->type = 'pinkcard';
                
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
                $dataEmployer->prefix_en = $request->prefix_en;
                $dataEmployer->name_en = $request->name_en;
                $dataEmployer->surname_en = $request->surname_en;
                $dataEmployer->nickname_en = $request->nickname_en;
                $dataEmployer->address_th = $request->address_th;
                $dataEmployer->group_th = $request->group_th;
                $dataEmployer->road_th =  $request->road_th;
                $dataEmployer->address_en = $request->address_en;
                $dataEmployer->group_en = $request->group_en;
                $dataEmployer->road_en = $request->road_en;
                $dataEmployer->province_id = $request->province;
                $dataEmployer->district_id = $request->district;
                $dataEmployer->subdistrict_id = $request->subdistrict;
                $dataEmployer->zipcode = $request->zipcode;
                $dataEmployer->tel_number = $request->tel_number;
                $dataEmployer->email = $request->email;
                $dataEmployer->employer_id = $request->employer_id;

                $dataEmployee->prefix = $request->prefix;
                $dataEmployee->name = $request->name;
                $dataEmployee->surname = $request->surname;
                $dataEmployee->gender = $request->gender;
                $dataEmployee->b_date = $request->b_date;
                $dataEmployee->age = $request->age;
                $dataEmployee->b_place = $request->b_place;
                $dataEmployee->tel_number = $request->e_tel_number;
                $dataEmployee->couple_status = $request->couple_status;
                $dataEmployee->business = $request->business;
                $dataEmployee->position = $request->e_position;
                $dataEmployee->workplace_type = $request->workplace_type;
                $dataEmployee->workplace_address_th = $request->e_address_th;
                $dataEmployee->workplace_group_th = $request->e_group_th;
                $dataEmployee->workplace_road_th = $request->e_road_th;
                $dataEmployee->workplace_address_en = $request->e_address_en;
                $dataEmployee->workplace_group_en = $request->e_group_en;
                $dataEmployee->workplace_road_en = $request->e_road_en;
                $dataEmployee->workplace_zipcode = $request->w_zipcode;
                

                $dataEmployee->f_prefix = $request->f_prefix;
                $dataEmployee->f_name = $request->f_name;
                $dataEmployee->f_surname = $request->f_surname;
                $dataEmployee->m_prefix = $request->m_prefix;
                $dataEmployee->m_name = $request->m_name;
                $dataEmployee->m_surname = $request->m_surname;
                $dataEmployee->passport_type = $request->passport_type;
                $dataEmployee->passport_number = $request->passport_number;
                $dataEmployee->passport_place = $request->passport_place;
                $dataEmployee->passport_country = $request->passport_country;
                $dataEmployee->passport_create = $request->passport_create;
                $dataEmployee->passport_expire = $request->passport_expire;
                $dataEmployee->permit_number = $request->permit_number;
                $dataEmployee->permit_create = $request->permit_create;
                $dataEmployee->permit_expire = $request->permit_expire;
                $dataEmployee->workplace_zipcode = $request->ezipcode;
                $dataEmployee->employee_id = $request->employee_id;
                
    
                
                // $dataFollower->prefix = $request->prefix;
                // $dataFollower->name = $request->name;
                // $dataFollower->surname = $request->surname;
                // $dataFollower->employee_id = $request->employee_id;

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
    public function add_pinkcard(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'add_pinkcard',
           
        ]);
        
    }
    public function health_check(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'health_check',
           
        ]);
        
    }
    public function setStatus(Request $request){
        $id = $request->id;
        $type = $request->type;
        $status = $request->status;
        // dd($request);
        \DB::beginTransaction();
        try
        {   
            if($type == "visa"){
                $data = visa::where("title_id","=",$id)->first();
                if($data == null){
                    $data = new visa;
                }
            }else if($type == "nationalproof"){
                $data = nationalproof::where("title_id","=",$id)->first();
                if($data == null){
                    $data = new nationalproof;
                }
            }else if($type == "pinkcard"){
                $data = pinkcard::where("title_id","=",$id)->first();
                if($data == null){
                    $data = new pinkcard;
                }
            }
            if($data->title != null){
                if(isset($request->notes)){
                    $data->notes = $request->notes;
                }
                $data->updated = date('Y-m-d H:i:s');
            }else{
                $data->title_id = $id;
                $data->created = date('Y-m-d H:i:s');
                $data->delete_status = "off";
            }
            $data->status = $status;
            
            if($data->save()){
                \DB::commit();
            }else{
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
    public function visa(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'visa',
           
        ]);
        
    }
    public function work_permit(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'work_permit',
           
        ]);
        
    }
    public function pinkcard(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'pinkcard',
           
        ]);
        
    }
    public function nationality_proof(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/pinkcard.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'nationlity_proof',
           
        ]);
        
    }

}
