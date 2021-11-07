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

class HomeController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'home';
    protected $folder = 'home';

    public function index(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            'rows' => $sTable = report::leftjoin('title_data','report.title_id','=','title_data.id')
                    ->leftjoin('employer_data','title_data.employer_id','=','employer_data.id')
                    ->leftjoin('employee_data','title_data.employee_id','=','employee_data.id')
                    ->leftjoin('follower_data','follower_data.employee_id','=','employee_data.id')
                    ->leftjoin('users','title_data.created_by',"=","users.id")
                    // ->where('title_data.received_by','=',null)
                    ->where('report.delete_status','=','off')
                    ->select('*','report.created as report_create','report.id as report_id','report.typename as report_name','report.note as report_note','title_data.created as title_created','employee_data.name as em_name','employee_data.surname as em_surname','employer_data.tel_number as tel','title_data.id as title_id')
                    ->get(),
        ]);
    }
}
