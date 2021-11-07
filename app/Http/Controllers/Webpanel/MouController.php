<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\User;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Webpanel\Log_backendController;
use App\Http\Controllers\Frontend\AjaxController;

use App\Models\Backend\Employer;
use App\Models\Backend\Employee;
use App\Models\Backend\Follower;

use App\Models\Backend\employer_data;
use App\Models\Backend\employee_data;
use App\Models\Backend\follower_data;
use App\Models\Backend\title_data;
use App\Models\Backend\detail_data;
use App\Models\Backend\doc_data;

use App\Models\Backend\Provinces;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;


class MouController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'mou';
    protected $folder = 'mou';


    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        // ->leftjoin('healthy','title_data.id',"=","healthy.title_id")
        ->where('title_data.received_by','=',null)
        ->where('title_data.type','=','mou')
        ->select('*','title_data.created as mou_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as mou_id')
        ->get();
        // dd($request);
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
        // echo "<script>alert(".$request->id.")</script>";
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            // 'rows' => Employer::orderby('id','desc')->get(),
        ]);
    }
    public function add(Request $request)
    {
        if(isset($request->name)){
            return $this->insert($request);
        }else{
            return view("$this->prefix.pages.$this->folder.index",[
                'js' => [
                    ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
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
    }
    public function get_district(Request $request){
        echo $request;
        $id = $request;
        $result = District::where(_id,id)->get();

        foreach($result as $row){
            $data.='<option>'.$row->name_th.'</option>';
        }
        return response()->json(['success' => true, 'html' => $html]);
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
                $data->created = date('Y-m-d');
                $data->delete_status = "off";
                $data->created_by=  Auth::guard()->id();
                
                $dataEmployer = new employer_data;
                $dataEmployee = new employee_data;
                $dataFollower = new follower_data;
                
                $data->type_name = $request->select_type;
                $data->country = $request->select_country;
                
                $employer_data = employer_data::orderby('id','DESC')->first();
                $employee_data = employee_data::orderby('id','DESC')->first();
                $data->employer_id = $employer_data->id + 1;
                $data->employee_id = $employee_data->id + 1;
                $data->type = 'mou';
                
                $dataEmployee->workplace_province_id = $request->e_province_id;
                $dataEmployee->workplace_district_id = $request->e_district_id;
                $dataEmployee->workplace_subdistrict_id = $request->e_subdistrict_id;
            }
            else{
                $data = title_data::find($id);
                $data->updated = date('Y-m-d');
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
                $dataEmployee->passport_expire = $request->m_surname;
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
        $result = title_data::find($id); 
        $employer_id  = $result->employer_id;
        $employee_id  = $result->employee_id;
        
        $resultr = employer_data::where("id","=",$employer_id)->first();
        $resulte = employee_data::where("id","=",$employee_id)->first();
        // dd($resulte);
        $ajax = app(\App\Http\Controllers\Frontend\AjaxController::class);
            
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'edit',
            'id'=>$id,
            'rowr' => employer_data::where("id",'=',$employer_id)->first(),
            'rowe' => employee_data::where("id",'=',$employee_id)->first(),
            'rowrp' => Provinces::where("id","=",$resultr->province_id)->first(),
            'rowrd' => District::find($resultr->district_id),
            'rowrsd' => SubDistrict::find($resultr->subdistrict_id),
            'rowep' => Provinces::where("id","=",$resulte->workplace_province_id)->first(),
            'rowed' => District::where("id","=",$resulte->workplace_district_id)->first(),
            'rowesd' => SubDistrict::where("id","=",$resulte->workplace_subdistrict_id)->first(),
            
            'select_p_th' => $ajax->select_pds($resultr->province_id,"th","p"),
            'select_p_th' => $ajax->select_pds($resultr->province_id,"th","p"),
            'select_p_en' => $ajax->select_pds($resultr->province_id,"en","p"),
            'select_d_th' => $ajax->select_pds($resultr->district_id,"th","d"),
            'select_d_en' => $ajax->select_pds($resultr->district_id,"en","d"),
            'select_sd_th' => $ajax->select_pds($resultr->subdistrict_id,"th","s"),
            'select_sd_en' => $ajax->select_pds($resultr->subdistrict_id,"en","s"),
            
            'select_ep_th' => $ajax->select_pds($resulte->workplace_province_id,"th","p"),
            'select_ep_en' => $ajax->select_pds($resulte->workplace_province_id,"en","p"),
            'select_ed_th' => $ajax->select_pds($resulte->workplace_district_id,"th","d"),
            'select_ed_en' => $ajax->select_pds($resulte->workplace_district_id,"en","d"),
            'select_esd_th' => $ajax->select_pds($resulte->workplace_subdistrict_id,"th","s"),
            'select_esd_en' => $ajax->select_pds($resulte->workplace_subdistrict_id,"en","s"),

        ]);
    }
    public function detail(Request $request,$id)
    {
        $result = title_data::find($id);
        $employer_id  = $result->employer_id;
        $employee_id  = $result->employee_id;
        
        $resultr = employer_data::where("id","=",$employer_id)->first();
        $resulte = employee_data::where("id","=",$employee_id)->first();
        // dd($employee_id);
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'detail',
            'id'=>$id,
            'rowr' => employer_data::where("id",'=',$employer_id)->first(),
            'rowe' => employee_data::where("id",'=',$employee_id)->first(),
            'rowrp' => Provinces::where("id","=",$resultr->province_id)->first(),
            'rowrd' => District::find($resultr->district_id),
            'rowrsd' => SubDistrict::find($resultr->subdistrict_id),
            'rowep' => Provinces::where("id","=",$resulte->workplace_province_id)->first(),
            'rowed' => District::where("id","=",$resulte->workplace_district_id)->first(),
            'rowesd' => SubDistrict::where("id","=",$resulte->workplace_subdistrict_id)->first(),
        ]);
    }
    public function detail_employee(Request $request,$id)
    {
        $result = title_data::find($id);
        $employer_id  = $result->employer_id;
        $employee_id  = $result->employee_id;
        
        $resultr = employer_data::where("id","=",$employer_id)->first();
        $resulte = employee_data::where("id","=",$employee_id)->first();
        // dd($employee_id);
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'detail_employee',
            'id'=>$id,
            'rowr' => employer_data::where("id",'=',$employer_id)->first(),
            'rowe' => employee_data::where("id",'=',$employee_id)->first(),
            'rowrp' => Provinces::where("id","=",$resultr->province_id)->first(),
            'rowrd' => District::find($resultr->district_id),
            'rowrsd' => SubDistrict::find($resultr->subdistrict_id),
            'rowep' => Provinces::where("id","=",$resulte->workplace_province_id)->first(),
            'rowed' => District::where("id","=",$resulte->workplace_district_id)->first(),
            'rowesd' => SubDistrict::where("id","=",$resulte->workplace_subdistrict_id)->first(),
        ]);
    }
    public function detail_follower(Request $request,$id)
    {
        $result = title_data::find($id);
        $employer_id  = $result->employer_id;
        $employee_id  = $result->employee_id;
        
        $resultr = employer_data::where("employer_id","=",$employer_id)->first();
        $resulte = employee_data::where("employee_id","=",$employee_id)->first();

        // dd($employee_id);
        // dd($resulte->workplace_province_id);
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'detail_follower',
            'id'=>$id,
            'rowr' => employer_data::where("employer_id",'=',$employer_id)->first(),
            'rowe' => employee_data::where("employee_id",'=',$employee_id)->first(),
            'rowrp' => Provinces::where("id","=",$resultr->province_id)->first(),
            'rowrd' => District::where("id","=",$resultr->district_id)->first(),
            'rowrsd' => SubDistrict::where("id","=",$resultr->subdistrict_id)->first(),
            'rowep' => Provinces::where("id","=",$resulte->workplace_province_id)->first(),
            'rowed' => District::where("id","=",$resulte->workplace_district_id)->first(),
            'rowesd' => SubDistrict::where("id","=",$resulte->workplace_subdistrict_id)->first(),
        ]);
    }
    public function mou_status(Request $request){
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'mou_status',
            'row' => title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
            ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
            ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
            ->where("title_data.type",'=','mou')
            ->select('*')
            ->get(),
        ]);
    }
    public function tb_mou_status(Request $request){
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.employer_id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.employee_id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->where('title_data.type','=','mou')
        ->select('*','title_data.updated as updated_title','title_data.created as created_title','users.name as created_name','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as mou_id')
        ->get();
        
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

    public function check_doc(Request $request){
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'check_doc',
            'row' => title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
            ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
            ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
            ->select('*')
            ->get(),
        ]);
    }
    public function tb_check_doc(Request $request){
        $like = $request->Like;
        $sTable = title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.employer_id')
        ->leftjoin('employee_data','title_data.employee_id','=','employee_data.employee_id')
        ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
        ->leftjoin('users','title_data.created_by',"=","users.id")
        ->where("title_data.received_by","=",null)
        ->select('*','users.name as created_name','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as mou_id')
        ->get();
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
    public function notes(Request $request,$id){
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'note',
            'row' => title_data::leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
            ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
            ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
            ->select('*')
            ->where('title_data.id','=',$id)
            ->first(),
        ]);
    }
    public function up_notes(request $request){
        try
        {   
            // dd($request);
            $data = title_data::find($request->id);
            $data->updated = date('Y-m-d');
            $data->notes = $request->notes;
            
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/check_doc")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/check_doc")]);
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
    public function shownote(request $request,$id){
      
        $result = title_data::find($id);
        // dd($data);
        $data = '<textarea readonly name="" class="form-control" id="" cols="80" rows="6">'.$result->notes.'</textarea>';
        echo $data;
    }
    public function formnote(request $request,$id){
      
        $result = title_data::find($id);
        $data = '
            <input type="text" name="id" id="id" hidden value="'.$id.'">             
            <textarea name="notes" class="form-control" id="notes" cols="80" rows="6" placeholder="แสดงความคิดเห็นของรายการ'.$result->type_name.'"></textarea>
            <center><input type="submit" class="btn btn-success" value="ยืนยันการส่งข้อมูล">';
        echo $data;
    }
    public function confirmcheck(request $request,$id){
        \DB::beginTransaction();
        try
        {   
            $data = title_data::find($request->id);
            // $data->updated = date('Y-m-d');
            // $data->received_by = $request->id;
            $data->received = date('Y-m-d');
            $data->received_by = 2;
            
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/check_doc")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/check_doc")]);
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
    public function mou_detail(request $request,$id){
        $result = title_data::find($id);
        // dd($result);
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/mou.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'mou_detail',
            'result' => $result,
            'rows' => detail_data::where("title_id",'=',$id)->get()
        ]);
    }
    public function up_mou_detail(request $request){
        \DB::beginTransaction();
        try
        {   
            if($request->type=="file"){
                $data = new doc_data;
                $data->created = date('Y-m-d');
                $data->delete_status = "off";
                $data->detail_id= $request->detail_id;
                
                $file = $request->fileupload;
                $filename = $file->getClientOriginalName();
            if ($file) 
            {
                $lg = $file->getRealPath();
                $newLG = 'uploads/documents/mou/'.$request->mou_id.'/'.$request->detail_id.'/'.$filename;
                $store = Storage::disk('public')->put($newLG, $lg);
                
                if($store)
                {
                    $data->doc_name = $filename;
                    $data->path = $newLG;
                }
            }
            }else if($request->type=='data'){
                $data = new detail_data;        
                $data->created = date('Y-m-d');
                $data->delete_status = "off";
                $data->created_by=  Auth::guard()->id();
                $data->type= $request->select_type;
                $data->title_id= $request->title_id;
            // $data->sent = date('Y-m-d');
            // $data->sent_by = Auth::guard()->id();
            }else{
                $data = detail_data::find($request->id);
                $data->sent_by =  Auth::guard()->id();
                $data->sent = date('Y-m-d');
                $data->updated = date('Y-m-d');
            }
            // dd($data);
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/mou_detail/".$request->title_id)]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/mou_detail/".$request->title_id)]);
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
    public function showdoc(request $request){
        $mou_detail = $request->id;
        // dd($mou_id);
        $result = doc_data::where("detail_id",'=',$mou_detail)->get();
        $res = detail_data::find($mou_detail);
        $html ='<table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"><tr><th colspan="2"><center>รายการ'.$res->type.'</th></tr><tr><th style="text-align:center;width:10%">#</th><th style="text-align:center">ชื่อเอกสาร</th></tr>';
        if(!$result){
            $html = $html.'<tr><td colspan="2" style="text-align:center">ไม่พบข้อมูล</td></tr>';
        }else{
            $i =0;
            foreach($result as $row){
                $i++;
                $html = $html.'<tr><td style="text-align:center">'.$i.'</td><td style="text-align:center"><a href="'.$row->path.'">'.$row->doc_name.'</a></td></tr>';
            }
        }
    $html = $html.'</table>';
        return $html;
    }
}
