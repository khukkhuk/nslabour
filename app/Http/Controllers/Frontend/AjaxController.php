<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\User;
use App\Models\Backend\Provinces;
use App\Models\Backend\District;
use App\Models\Backend\Employee;
use App\Models\Backend\Employer;
use App\Models\Backend\SubDistrict;
use Yajra\DataTables\DataTables;
use App\Models\Backend\title_data;
use App\Models\Backend\employee_data;
use App\Models\Backend\employer_data;

class AjaxController extends Controller
{
    public function get_district(Request $request)
    {
        $id = $request->id;
        $data = '';
        $result = District::where(['_id'=>$id])->get();
        foreach($result as $row){
            $data.="<option value=".$row->id.">".$row->name_th."</option>";
        }
        echo $data;
    }
    public function get_subdistrict(Request $request)
    {
        $id = $request->id;
        $result = SubDistrict::where(['_id'=>$id])->get();
        $data = '';
        foreach($result as $row)
        {
            $data.="<option value=".$row->id.">".$row->name_th."</option>";
        }
        echo $data;
    }
    public function get_zipcode(Request $request)
    {
        $id = $request->id;
        $result = SubDistrict::where(['id'=>$id])->get();
        $data = '';
        foreach($result as $row){
            $data = $row->zipcode;
        }
        echo $data;
    }
    
    public function get_province_en(Request $request)
    {
        $id = $request->id;
        $result = Provinces::where(['id'=>$id])->get();
        $name_en = '';
        foreach($result as $row){
            $name_en= $row->name_en;    
        }
        echo $name_en;
    }
    public function get_district_en(Request $request)
    {
        $id = $request->id;
        $result = District::where(['id'=>$id])->get();
        $name_en = '';
        foreach($result as $row){
            $name_en= $row->name_en;    
        }
        echo $name_en;
    }
    public function get_subdistrict_en(Request $request)
    {
        $id = $request->id;
        $result = SubDistrict::where(['id'=>$id])->get();
        $name_en = '';
        foreach($result as $row){
            $name_en= $row->name_en;    
        }
        echo $name_en;
    }
    
    public function get_province_th(Request $request)
    {
        $id = $request->id;
        $result = Provinces::where(['id'=>$id])->get();
        $name_th = '';
        foreach($result as $row){
            $name_th = $row->name_th;    
        }
        echo $name_th;
    }
    public function get_district_th(Request $request)
    {
        $id = $request->id;
        $result = District::where(['id'=>$id])->get();
        $name_th = '';
        foreach($result as $row){
            $name_th = $row->name_th;    
        }
        echo $name_th;
    }
    public function get_subdistrict_th(Request $request)
    {
        $id = $request->id;
        $result = SubDistrict::where(['id'=>$id])->get();
        $name_th = '';
        foreach($result as $row){
            $name_th = $row->name_th;    
        }
        echo $name_th;
    }
    
    public function get_employee(Request $request)
    {
        $id = $request->id;
        $result = Employee::where(['employer_id'=>$id])->get();
        $data='<option hidden>เลือกแรงงาน</option>';
        foreach($result as $row)
        {
            $data.="<option value=".$row->id.">".$row->prefix.$row->name." ".$row->surname."</option>";
            // $data.="<option value=".$row->id.">".$row->name_th."</option>";
        }
        echo $data;
    }
    public function get_formdata(Request $request)
    {
        $employer_id = $request->employer_id;
        $employee_id = $request->employee_id;
        $resultr = Employer::where(['id'=>$employer_id])->first();
        $resulte = Employee::where(['id'=>$employee_id])->first();

        // return response()->json([
        //     'result' => $result,
        //     'resultE' => $resultE,
        // ]);
        // dd($resulte);
        $select_p_th = $this->select_pds($resultr->province_id,"th","p");
        $select_p_en = $this->select_pds($resultr->province_id,"en","p");
        $select_d_th = $this->select_pds($resultr->district_id,"th","d");
        $select_d_en = $this->select_pds($resultr->district_id,"en","d");
        $select_sd_th = $this->select_pds($resultr->subdistrict_id,"th","s");
        $select_sd_en = $this->select_pds($resultr->subdistrict_id,"en","s");
        
        $select_ep_th = $this->select_pds($resulte->province_id,"th","p");
        $select_ep_en = $this->select_pds($resulte->province_id,"en","p");
        $select_ed_th = $this->select_pds($resulte->district_id,"th","d");
        $select_ed_en = $this->select_pds($resulte->district_id,"en","d");
        $select_esd_th = $this->select_pds($resulte->subdistrict_id,"th","s");
        $select_esd_en = $this->select_pds($resulte->subdistrict_id,"en","s");

        $result = array(
            'resulte' => $resulte,
            'resultr' => $resultr,
            'select_p_th' => $select_p_th,
            'select_p_en' => $select_p_en,
            'select_d_th' => $select_d_th,
            'select_d_en' => $select_d_en,
            'select_sd_th' => $select_sd_th,
            'select_sd_en' => $select_sd_en,

            'select_ep_th' => $select_ep_th,
            'select_ep_en' => $select_ep_en,
            'select_ed_th' => $select_ed_th,
            'select_ed_en' => $select_ed_en,
            'select_esd_th' => $select_esd_th,
            'select_esd_en' => $select_esd_en,
        );
        return (object) $result;
    }
    
    public function get_data_employee(Request $request)
    {
        $id = $request->id;
        $result = title_data::where("employer_id","=",$id)
        ->Orwhere("type","=","pinkcard")
        ->Orwhere("type","=","mou")
        ->get();
        $data='<option hidden>เลือกแรงงาน</option>';
        foreach($result as $row)
        {
            $employee_id = $row->employee_id;
            $result1 = employee_data::find($employee_id);
            $data.="<option value=".$result1->id.">".$result1->prefix.$result1->name." ".$result1->surname."</option>";
            // $data.="<option value=".$row->id.">".$row->name_th."</option>";
        }
        echo $data;
    }
    public function get_data_formdata(Request $request)
    {
        $employer_id = $request->employer_id;
        $employee_id = $request->employee_id;
        $resultr = employer_data::where(['id'=>$employer_id])->first();
        $resulte = employee_data::where(['id'=>$employee_id])->first();

        // return response()->json([
        //     'result' => $result,
        //     'resultE' => $resultE,
        // ]);
        // dd($resulte);
        $select_p_th = $this->select_pds($resultr->province_id,"th","p");
        $select_p_en = $this->select_pds($resultr->province_id,"en","p");
        $select_d_th = $this->select_pds($resultr->district_id,"th","d");
        $select_d_en = $this->select_pds($resultr->district_id,"en","d");
        $select_sd_th = $this->select_pds($resultr->subdistrict_id,"th","s");
        $select_sd_en = $this->select_pds($resultr->subdistrict_id,"en","s");
        
        $select_ep_th = $this->select_pds($resulte->province_id,"th","p");
        $select_ep_en = $this->select_pds($resulte->province_id,"en","p");
        $select_ed_th = $this->select_pds($resulte->district_id,"th","d");
        $select_ed_en = $this->select_pds($resulte->district_id,"en","d");
        $select_esd_th = $this->select_pds($resulte->subdistrict_id,"th","s");
        $select_esd_en = $this->select_pds($resulte->subdistrict_id,"en","s");

        $result = array(
            'resulte' => $resulte,
            'resultr' => $resultr,
            'select_p_th' => $select_p_th,
            'select_p_en' => $select_p_en,
            'select_d_th' => $select_d_th,
            'select_d_en' => $select_d_en,
            'select_sd_th' => $select_sd_th,
            'select_sd_en' => $select_sd_en,

            'select_ep_th' => $select_ep_th,
            'select_ep_en' => $select_ep_en,
            'select_ed_th' => $select_ed_th,
            'select_ed_en' => $select_ed_en,
            'select_esd_th' => $select_esd_th,
            'select_esd_en' => $select_esd_en,
        );
        return (object) $result;
    }
    public function select_pds($request,$language,$db){
        // return $request;
        if($db=="p"){
            $result = Provinces::orderby("id","asc")->get();
        }
        if($db=="d"){
            $result = District::orderby("id","asc")->get();
        }
        if($db=="s"){
            $result = SubDistrict::orderby("id","asc")->get();
        }
        $data = '';
        foreach($result as $row)
        {
            if($row->id==$request){
                if($language=="en"){
                    return $p_en = $row->name_en;
                }
                $data.="<option selected value=".$row->id.">".$row->name_th."</option>";
            }else{
                $data.="<option value=".$row->id.">".$row->name_th."</option>";
            }
        }
        return $data;
        
    }
}
