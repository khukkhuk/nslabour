<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\User;
use App\Models\Backend\Employer;
use App\Models\Backend\Employee;
use App\Models\Backend\Provinces;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;
use App\Models\Backend\mNews;
use App\Http\Controllers\Webpanel\Log_backendController;
use Yajra\DataTables\DataTables;


class EmployeeController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'employee';
    protected $folder = 'employee';


    public function datatable(Request $request)
    {
        $like = $request->Like;
        $id = $request->id;
        $sTable = Employee::where('employer_id',$id)
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
                ["type"=>"text/javascript","src"=>"backend/build/backend/employee.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            'id'=> $request->id,
            'rows' => Employee::where('employer_id',$request->id)
            ->orderby('id','desc')->get(),
        ]);
    }
    public function add(Request $request)
    {
        if(isset($request->name)){
            return $this->insert($request);
        }else{
            return view("$this->prefix.pages.$this->folder.index",[
                'js' => [
                    ["type"=>"text/javascript","src"=>"backend/build/backend/employee.js"],
                    ["src"=>'backend/js/sweetalert2.all.min.js'],
                ],
                'prefix' => $this->prefix,
                'folder' => $this->folder,
                'segment' => $this->segment,
                'page' => 'add',
                'id' => $request->id,
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
        try
        {   
            if($id==null){
                $data = new Employee;        
                $data->created = date('Y-m-d H:i:s');
                $data->delete_status = "off";
            }
            else{
                $data = Employee::find($id);
                $data->updated = date('Y-m-d H:i:s');
            }
            $data->prefix = $request->prefix;
            $data->name = $request->name;
            $data->surname = $request->surname;
            $data->gender = $request->gender;
            $data->b_date = $request->b_date;
            $data->age = $request->age;
            $data->b_place = $request->b_place;
            $data->tel_number = $request->tel_number;
            $data->couple_status = $request->couple_status;
            
            $data->business = $request->business;
            $data->position = $request->position;
            $data->workplace_type = $request->workplace_type;
            $data->address_th = $request->address_th;
            $data->group_th = $request->group_th;
            $data->road_th = $request->road_th;
            $data->address_en = $request->address_en;
            $data->group_en = $request->group_en;
            $data->road_en = $request->road_en;
            
            
            $data->f_prefix = $request->f_prefix;
            $data->f_name = $request->f_name;
            $data->f_surname = $request->f_surname;

            
            $data->m_prefix = $request->m_prefix;
            $data->m_name = $request->m_name;
            $data->m_surname = $request->m_surname;
            
            $data->passport_type = $request->passport_type;
            $data->passport_number = $request->passport_number;
            $data->passport_place = $request->passport_place;
            $data->passport_country = $request->passport_country;
            $data->passport_create = $request->passport_create;
            $data->passport_expire = $request->m_surname;

            $data->permit_number = $request->permit_number;
            $data->permit_create = $request->permit_create;
            $data->permit_expire = $request->permit_expire;

            $data->province_id = $request->province_id;
            $data->district_id = $request->district_id;
            $data->subdistrict_id = $request->subdistrict_id;
            $data->zipcode = $request->zipcode;


            $data->employer_id = $request->id;
            $id = $data->employer_id;
            $filename = 'research_' . date('dmY-His');
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
                }
            }
            if($data->save()){
                \DB::commit();
                return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder/index/$id")]);
            }else{
                return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder/$id")]);
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
            // echo "<script>alert('catch')</script>";
        }
    }
    
    public function edit(Request $request,$id)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/employee.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'edit',
            'id' => $id,
            'rows' => Employee::find($id),
            'rowsP' =>Provinces::orderby("id","asc")->get(),
           
        ]);
        
    }

}
