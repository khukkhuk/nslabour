<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\MenuModel;
use Yajra\DataTables\DataTables;


class MenuController extends Controller
{
    protected $prefix = 'back-end';
    protected $segment = 'webpanel';
    protected $controller = 'menu';
    protected $folder = 'menu';

    public function datatable(Request $request)
    {
        $like = $request->Like;
        $sTable = MenuModel::where('position','main')->orderby('id','desc')
        ->when($like, function($query) use ($like){
            if(@$like['name'] != "")
            {
                $query->where('name','like','%'.$like['name'].'%');
            }
            if(@$like['status_active'] != "")
            {
                $query->where('status',$like['status_active']);
            }
        })
        ->get();
        return Datatables::of($sTable)
        ->addIndexColumn()
        ->addColumn('action_sort', function($row)
        {

        })
        ->editColumn('action_name', function($row)
        {
            $secondary = \App\Models\Backend\MenuModel::where('_id',$row->id)->get();
            $data = "<span>$row->name</span>";
            if(count($secondary)>0) 
            {
                $data.= "
                <span class='badge badge-success' type='button' data-toggle='collapse' data-target='.multi-collapse$row->id' aria-expanded='false' aria-controls='col2$row->id col3$row->id col4$row->id col5$row->id'>เมนูย่อย</span>
                <div class='collapse multi-collapse$row->id' id='col2$row->id'>   
                    <ul class='list-group' style='margin-top:5px'> ";
                    foreach($secondary as $col2)
                    {
                        $data.="
                        <li class='list-group-item d-flex justify-content-between p-2'>
                            <span>$col2->name</span>
                            <div class='justify-content-end'>
                                <a class='badge' href='javascript:'>".date('d/m/Y',strtotime($col2->created))."</a>
                                <a class='badge badge-dark badge-status' onclick='badge_status($col2->id)' href='javascript:void(0)'><span id='sub_status_$col2->id'>$col2->status</span></a>
                                <a class='badge badge-warning' href='$this->segment/$this->folder/$col2->id'><i class='far fa-edit'></i></a>
                                <a class='badge badge-danger' onclick='deleteItem($col2->id)' href='javascript:'><i class='far fa-trash-alt'></i></a>
                            </div>
                        </li>
                        ";
                    }
                $data.="
                    </ul>
                </div>
                ";
            }
            return $data;
        })
        ->addColumn('created', function($row)
        {
            $data = date('d/m/Y',strtotime($row->created));
            return $data;
        })
        ->addColumn('action', function($row)
        {
            return " <a href='$this->segment/$this->folder/$row->id' class='btn btn-sm btn-info' title='Edit'><i class='far fa-edit'></i></a>                                                
            <a href='javascript:' class='btn btn-sm btn-danger' onclick='deleteItem($row->id)' title='Delete'><i class='far fa-trash-alt'></i></a>
            ";
        })
        ->rawColumns(['action_name','created','action'])
        ->make(true);
        
    }

    public function index(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                
                ["type"=>"text/javascript","src"=>"backend/build/backend/menu.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'index',
            'rows' => MenuModel::where(['position'=>'main'])->orderby('sort','asc')->get(),
        ]);
    }

    public function icon(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/menu.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'icon',
        ]);
    }

    public function add(Request $request)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/menu.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'add',
            'main' => MenuModel::where('position','=','main')->get(),
        ]);
    }

    public function edit(Request $request, $id)
    {
        return view("$this->prefix.pages.$this->folder.index",[
            'js' => [
                ["type"=>"text/javascript","src"=>"backend/build/backend/menu.js"],
                ["src"=>'backend/js/sweetalert2.all.min.js'],
            ],
            'prefix' => $this->prefix,
            'folder' => $this->folder,
            'segment' => $this->segment,
            'page' => 'edit',
            'row' => MenuModel::find($id),
            'main' => MenuModel::where('position','=','main')->get(),
        ]);
    }

    //==== Function Insert Update Delete Status Sort & Others ====
    public function insert(Request $request)
    {
        $data = new MenuModel;
        $data->position = $request->position;
        $data->_id = $request->_id;
        $data->name = $request->name;
        $data->icon = $request->icon;
        $data->url = $request->url;
        $data->sort = 1;
        $data->status = 'on';
        $data->created = date('Y-m-d H:i:s');
        if($data->save())
        {
            if($data->position == "main")
            {
                MenuModel::where('id', '!=', $data->id)->where('position','main')->increment('sort');
            }
            elseif($data->position == "secondary")
            {
                MenuModel::where('_id', '!=', $data->id)->where('position','secondary')->increment('sort');
            }
            return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder")]);
        }else{
            return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder")]);
        }
    }

    public function update(Request $request,$id=null)
    {
        $data = MenuModel::find($id);
        $data->position = $request->position;
        $data->_id = $request->_id;
        $data->name = $request->name;
        $data->icon = $request->icon;
        $data->url = $request->url;
        $data->updated = date('Y-m-d H:i:s');
        if($data->save())
        {
            return view("$this->prefix.alert.success",['url'=> url("$this->segment/$this->folder")]);
        }else{
            return view("$this->prefix.alert.error",['url'=> url("$this->segment/$this->folder")]);
        }
    }

    public function status($id=null)
    {
        $data = MenuModel::find($id);
        $data->status = ($data->status=='off')?'on':'off';
        if($data->save()){ return response()->json(true); }else{ return response()->json(false); }
    }

    public function sub_status($id=null)
    {
        $data = MenuModel::find($id);
        if($data->status == "on")
        {
            $status = 'off';
            $data->status = 'off';
        }
        else
        {
            $status = 'on';
            $data->status = 'on';
        }
        if($data->save())
        { 
            return response()->json([
                'value' => true,
                'text' => $status,
                
            ]); 
        }
        else
        { 
            return response()->json(false); 
        }
    }
    public function destroy(Request $request)
    {
        $datas = MenuModel::find(explode(',', $request->id));
        if (@$datas) {
            foreach ($datas as $data) 
            {
                MenuModel::where('_id',$data->id)->delete();
                //update sort
                MenuModel::where('sort', '>', $data->sort)->decrement('sort');
                //destroy
                $query = MenuModel::destroy($data->id);
            }
        }

        if (@$query) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
