<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\User;
use App\Http\Controllers\Webpanel\Log_backendController;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'user';
    protected $folder = 'user';

     
    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = User::orderby('id','desc')
        ->when($like, function($query) use ($like){
            if(@$like['name'] != "")
            {
                $query->where('name','like','%'.$like['name'].'%');
            }
            if(@$like['email'] != "")
            {
                $query->where('email','like','%'.$like['email'].'%');
            }
            if(@$like['status_user'] != "")
            {
                $query->where('status',$like['status_user']);
            }
        })
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
    public function index(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                
                ["type"=>"text/javascript","src"=>"backend/build/backend/users.js"],
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
                ["type"=>"text/javascript","src"=>"backend/build/backend/users.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'add',
           
        ]);
        
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
//==== Function Insert Update Delete Status Sort & Others ====
    public function insert(Request $request)
    {
        try
        {
            $check = User::where('email',$request->email)->first();
            if($check)
            {
                return view("backend/alert/sweet/alert",[
                    'url' => "$this->segment/$this->folder",
                    'title' => "เกิดข้อผิดพลาด",
                    'text' => "อีเมล์นี้มีอยู่ในระบบ ",
                ]);
            }
            else
            {
                $data = new User;
                $data->role = $request->role;
                $data->status = $request->status_check;
                $data->name = $request->name;
                $data->email = $request->username;
                $data->password = bcrypt($request->password);
                $data->created_at = date('Y-m-d H:i:s');
                if($data->save())
                {
                    return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder")]);
                }else{
                    return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder")]);
                }
            }
        }
        catch(\Exception $e)
        {
            $error_log = $e->getMessage();
            $error_line = $e->getLine();
            $type_status = 'error';
            $error_url = url()->current();
            $auth_id = Auth::guard()->id();
            $log_id = Log_backendController::save_logbackend($auth_id,$type_status, $error_log, $error_line, $error_url);
        
            return view("$this->prefix.alert.alert",[
                'url'=>$error_url,
                'title' => "เกิดข้อผิดพลาดทางโปรแกรม",
                'text' => "กรุณาแจ้งรหัส Code : $log_id ให้ทางผู้พัฒนาโปรแกรม ",
                'icon' => 'error'
            ]);
        }
        
    }

    public function update(Request $request,$id=null)
    {
        $data = User::find($id);
        $check = User::where('email',$request->email)->where('id','!=',$id)->first();
        if($check)
        {
            return view("backend/alert/sweet/alert",[
                'url' => "$this->segment/$this->folder",
                'title' => "เกิดข้อผิดพลาด",
                'text' => "อีเมล์นี้มีอยู่ในระบบ ",
            ]);
        }
        else
        {
            $data->role = $request->role;
            $data->status = $request->status_check;
            $data->name = $request->name;
            $data->email = $request->username;
            if($request->resetpassword == "on")
            {
                $data->password = bcrypt($request->password);
            }
            $data->updated_at = date('Y-m-d H:i:s');
            if($data->save())
            {
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder")]);
            }
        }
    }

    public function status($id=null)
    {
        $data = User::find($id);
        $data->status = ($data->status=='inactive')?'active':'inactive';
        if($data->save()){ return response()->json(true); }else{ return response()->json(false); }
    }

    // public function sub_status($id=null)
    // {
    //     $data = User::find($id);
    //     if($data->status == "on")
    //     {
    //         $status = 'off';
    //         $data->status = 'off';
    //     }
    //     else
    //     {
    //         $status = 'on';
    //         $data->status = 'on';
    //     }
    //     if($data->save())
    //     { 
    //         return response()->json([
    //             'value' => true,
    //             'text' => $status,
                
    //         ]); 
    //     }
    //     else
    //     { 
    //         return response()->json(false); 
    //     }
    // }
    public function destroy(Request $request)
    {
        $datas = User::find(explode(',', $request->id));
        if (@$datas) {
            foreach ($datas as $data) 
            {
                $query = User::destroy($data->id);
            }
        }

        if (@$query) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
