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
use App\Models\Backend\type;
use App\Models\Backend\typedetail;

class TypeController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'type';
    protected $folder = 'type';

    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = Type::get();
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
    public function datatable_type_detail(Request $request)
    {
        // dd($request);
        // $like = $request->Like;
        $sTable = typedetail::where("type_id",'=',$request->id)->get();
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
                
                ["type"=>"text/javascript","src"=>"backend/build/backend/type.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            'rows' => type::orderby('id','desc')->get(),
        ]);
    }
    public function add(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/type.js"],
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
            if($request->status == "insert"){
                $data = new type;
                $data->created = date('Y-m-d H:i:s');
            }else{
                $data = type::find($request->id);
                $data->updated = date('Y-m-d H:i:s');
            }
            $data->type  = $request->type;
            $data->type_name  = $request->type_name;
            $data->cost  = $request->cost;
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
    
    public function edit(Request $request,$id)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/type.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'edit',
            'row' => type::find($id),
           
        ]);
        
    }
    public function type_detail(Request $request,$id){
        return view("$this->prefix.pages.$this->folder.index",[
        'js' => [
            ["type"=>"text/javascript","src"=>"backend/build/backend/type.js"],
            ["src"=>'backend/js/sweetalert2.all.min.js'],
        ],
        'prefix' => $this->prefix,
        'folder' => $this->folder,
        'segment' => $this->segment,
        'page' => 'type_detail',
        'id'=> $id,
        'row' => type::find($id),
        'rows' => typedetail::where("type_id",'=',$id)->get(),
        ]);
    }
    public function store_detail(Request $request)
    {
        \DB::beginTransaction();
        try
        {
            dd($request);
            if($request->status == "insert"){
                $data = new typedetail;
                $data->created = date('Y-m-d H:i:s');
                $data->type_id = $request->id;
                $data->name  = $request->type_name;
                $data->cost  = $request->price;
            }else{
                $data = typedetail::find($request->detail_id);
                $data->updated = date('Y-m-d H:i:s');
                $data->name = $request->type_name_edit;
                $data->cost = $request->price_edit;
            }
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/type_detail/$request->id")]);
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
    public function getdata(Request $request , $id){
        return typedetail::find($id);
    }    

}
