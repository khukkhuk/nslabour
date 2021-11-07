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
use App\Models\Backend\report;
use DateTime;

class RenewController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'renew';
    protected $folder = 'renew';

    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','renew')
        ->where('title_data.type_name','=','move')
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
    public function datatable_report(Request $request)
    {
        $like = $request->Like;
        // $sTable = report::when($like, function($query) use ($like){
        $sTable = report::leftjoin('title_data','report.title_id','=','title_data.id')
        ->leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->where('title_data.received_by','=',null)
        ->where('report.delete_status','=','off')
        ->select('*','report.created as report_create','report.id as report_id','report.typename as report_name','report.note as report_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
        ->when($like, function($query) use ($like){
            if(@$like['name'] != "")
            {
                $query->where('employer_name','like','%'.$like['name'].'%');
            }
            if(@$like['num_search'] != "")
            {
                $query->where('employee_name','like','%'.$like['num_search'].'%');
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
                
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
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
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
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
    public function move(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'move',
        ]);
    }
    public function move_add(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'move_add',
            'rows' => employer_data::orderby('id','asc')->get(), 
        ]);
    }
    public function report(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'report',
           
        ]);
        
    }
    public function add_report(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'report_add',
            'rows' => employer_data::orderby('id','asc')->get()
        ]);
        
    }
    public function insert_report(Request $request)
    {    
        \DB::beginTransaction();
        try
        {   
            $data = new report;
            $data->title_id = $request->title_id;
            $data->employer_name = $request->employer_name;
            $data->employee_name = $request->employee_name;
            $data->passport_number = $request->passport_number;
            $data->typename = $request->typename;
            $data->period = $request->period;
            $data->report_date = $request->report_date;
            
            $datetime = new DateTime($request->report_date);
            $datetime->modify('+'.$request->period.' day');
            $report_expire = $datetime->format('Y-m-d H:i:s');

            $data->report_expire = $report_expire;
            $data->note = $request->note;
            $data->created = date('Y-m-d H:i:s');
            $data->delete_status = "off";
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/report")]);
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
    public function update_report(Request $request,$id)
    {    
        \DB::beginTransaction();
        try
        {   
            $data = report::find($id);
            $data->passport_number = $request->passport_number;
            $data->typename = $request->typename;
            $data->period = $request->period;
            $data->report_date = $request->report_date;
           
            $datetime = new DateTime($request->report_date);
            $datetime->modify('+'.$request->period.' day');
            $report_expire = $datetime->format('Y-m-d H:i:s');
            
            // dd($request->report_date,$datetime,$report_expire);

            $data->report_expire = $report_expire;
            $data->note = $request->note;
            $data->updated = date('Y-m-d H:i:s');
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/report")]);
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
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
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
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'work_permit',
           
        ]);
        
    }
    public function renew(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'renew',
        ]);
    }
    public function get_employer(Request $request){
        $name_th = $request->name_th;
        $result = employer_data::where('name_th','=',$name_th)->get();
        return $result;
    }
    public function get_employee(Request $request){
        $id = $request->id;
        $result = title_data::where('employer_id','=',$id)->get();
        $i=0;
        foreach($result as $row){
            $data[$i] = employee_data::find($row->employee_id);
            $i++;
        }
        return $data;
    }
    public function employee_data(Request $request){
        $employer_id = $request->employer_id;
        $name_th = $request->name_th;
        $data = employee_data::where("name","=",$name_th)->get();
        foreach($data as $row){
            $passport_number = $row->passport_number;
            $employee_id = $row->id;
        }
        $data = title_data::where("employer_id",'=',$employer_id)
        ->where("employee_id",'=',$employee_id)->get();
        foreach($data as $row){
            $id = $row->employee_id;
            $title_id = $row->id;
        }
        $result = array(
            'passport_number' => $passport_number,
            'employee_id' => $employee_id,
            'id' => $title_id,
        );
        return (object) $result;
    }
    public function report_detail(Request $request,$id){
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'report_detail',
            'row' => report::where("id","=",$id)
        ]);
    }
    public function edit_report(Request $request,$id){
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/renew.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'report_edit',
            'rows_ee' => employee_data::get(),
            'rows_er' => employer_data::get(),
            'rows' => report::leftjoin('title_data','report.title_id','=','title_data.id')
                    ->leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
                    ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
                    ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
                    ->leftjoin('users','title_data.created_by',"=","users.id")
                    ->where('title_data.received_by','=',null)
                    ->where('report.delete_status','=','off')
                    ->where('report.id','=',$id)
                    ->select('*','employer_data.id as employer_id','employee_data.id as employee_id','report.created as report_create','report.id as report_id','report.typename as report_name','report.note as report_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
                    ->first(),
        ]);
    }
}