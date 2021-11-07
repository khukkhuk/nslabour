<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Backend\User;
use App\Models\Backend\Employer;
use App\Models\Backend\Employee;
use App\Models\Backend\Follower;
use App\Models\Backend\Provinces;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;
use App\Models\Backend\mNews;
use App\Http\Controllers\Webpanel\Log_backendController;
use Yajra\DataTables\DataTables;

use Intervention\Image\ImageManagerStatic as Image;
class FollowerController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'follower';
    protected $folder = 'follower';


    public function datatable(Request $request)
    {
        $like = $request->Like;
        $id = $request->id;
        $sTable = Follower::where('employee_id',$id)
        ->where('delete_status',"off")
        ->orderby('id','desc')
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
        // echo "<script>alert(".$request->id.")</script>";
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/follower.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            'id'=> $request->id,
            'rows' => Follower::
            where('delete_status',"off")->
            orderby('id','desc')->get(),
        ]);
    }
    public function add(Request $request)
    {
        if(isset($request->name)){
            return $this->insert($request);
        }else{
            $data = Employee::where('id',$request->id)->get();
            foreach($data as $row){
                $employer_id = $row->employer_id;
            }
            return view("$this->prefix.pages.$this->folder.index",[
                'js' => [
                    ["type"=>"text/javascript","src"=>"backend/build/backend/follower.js"],
                    ["src"=>'backend/js/sweetalert2.all.min.js'],
                ],
                'prefix' => $this->prefix,
                'folder' => $this->folder,
                'segment' => $this->segment,
                'page' => 'add',
                'id' => $request->id,
                'employer_id' => $employer_id,
                'rows' => Provinces::orderby('id','asc')->get(), 
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
            if($id==null){
                
                            
                            
                $result = Employee::where('id',$request->employee_id)->get();
                foreach($result as $row){
                    $employer_id = $row->employer_id;
                }
                $data = new Follower;        
                $data->created = date('Y-m-d H:i:s');
                $data->delete_status = "off";
                $data->employee_id = $request->employee_id;
            }
            else{
                $data = Follower::find($id);
                $data->updated = date('Y-m-d H:i:s');
            }
            $filename = 'research_' . date('Y-m-d H:i:s');
            $file = $request->image;
            if ($file) 
            {
                $lg = Image::make($file->getRealPath());
                $ext = explode("/", $lg->mime())[1];
                $height = Image::make($file)->height();
                $width = Image::make($file)->width();
                $lg->resize($width, $height)->stream();
                $newLG = 'uploads/research/' . $filename . '.' . $ext;
                $store = Storage::disk('public')->put($newLG, $lg);
                
                if($store)
                {
                    $data->image = $newLG;
                    // dd($newLG);
                }
            }
            $data->prefix = $request->prefix;
            $data->name = $request->name;
            $data->surname = $request->surname;
            // dd($request->employer_id);
            // dd($data);
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/employee/index/$employer_id")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/add/$employer_id")]);
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

    public function destroy(Request $request){
        \DB::beginTransaction();
        try{
            // echo "alert('des')";
            $id = $request->id;
            $data = Follower::find($id);
            $data->delete_status = "on";
            $data->deleted = date('Y-m-d H:i:s');
            $url = $request->url();

            if($data->save()){
                \DB::rollback();
                return response()->json(true);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/index/$request->id")]);
            }
        }catch(\Exception $e){
            \DB::rollback();
        }
        
    }
    public function edit(Request $request,$id)
    {
        $data = Follower::where('id',$id)->get();
        foreach($data as $row){
            $employee_id = $row->employee_id;
        }
        $data = Employee::where('id',$employee_id)->get();
        foreach($data as $row){
            $employer_id = $row->employer_id;
        }
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/follower.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'edit',
            'id' => $id,
            'employer_id'=>$employer_id,
            'rows' => Follower::find($id),
           
        ]);
        
    }

}
