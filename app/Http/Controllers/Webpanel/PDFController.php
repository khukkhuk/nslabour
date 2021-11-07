<?php
namespace App\Http\Controllers\Webpanel;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use App\Models\Backend\Employer;
use App\Models\Backend\Employee;
use App\Models\Backend\Follower;
use App\Models\Backend\title_data;
use App\Models\Backend\employer_data;
use App\Models\Backend\employee_data;
use App\Models\Backend\follower_data;
use App\Models\Backend\Provinces;
use App\Models\Backend\District;
use App\Models\Backend\SubDistrict;
// use Codedge\Fpdf\Fpdf\Fpdf;
use PDF;
 
class PDFController extends Controller
{
   private $fpdf;
   protected $prefix = 'back-end';
   protected $segment = 'webpanel';
   protected $controller = 'pdf';
   protected $folder = 'file_pdf';

    public function getdata($id){
        $result = title_data::find($id);
        $employer_id  = $result->employer_id;
        $employee_id  = $result->employee_id;

        $resultr = employer_data::where("id","=",$employer_id)->first();
        $resulte = employee_data::where("id","=",$employee_id)->first();
        $rowrp = Provinces::where("id","=",$resultr->province_id)->first();
        $rowrd = District::where("id","=",$resultr->district_id)->first();
        $rowrsd = SubDistrict::where("id","=",$resultr->subdistrict_id)->first();
        $rowep = Provinces::where("id","=",$resulte->workplace_province_id)->first();
        $rowed = District::where("id","=",$resulte->workplace_district_id)->first();
        $rowesd = SubDistrict::where("id","=",$resulte->workplace_subdistrict_id)->first();
        $result = array(
            'result' => $result,
            'resulte' => $resulte,
            'resultr' => $resultr,
            'rowrp' => $rowrp,
            'rowrd' => $rowrd,
            'rowrsd' => $rowrsd,
            'rowep' => $rowep,
            'rowed' => $rowed,
            'rowesd' => $rowesd,
        );
        return $result;
    }
    public function view(request $request,$type,$id){
        $result = $this->getdata($id);
        // dd($result);
        $stype = substr($type,0,2);
        $file = substr($type,2,1);
        if($stype=="wv"){
            $folder = "work_visa";
        }else if($stype =="bd"){
            $folder = "borderpass";
        }else if($stype =="pk"){
            $folder = "pinkcard";
        }else if($stype =="mm"){
            $folder = "mou/myanmar";
        }else if($stype =="ml"){
            $folder = "mou/lao";
        }else if($stype =="mc"){
            $folder = "mou/cambodia";
        }
        view()->share('result',$result);
        $pdf = PDF::loadView('back-end/pages/file_pdf/'.$folder.'/'.$file,$result); 
        return $pdf->stream();    
    }
    
    // public function file_pdf(request $request){
    //     $id = $request->pdf_id;
    //     // dd($id);
    //     $country = $request->pdf_country;
    //     $doctype = $request->doc_type;
    //     // dd($request);
    //     $result = title_data::find($id);
    //     $employer_id  = $result->employer_id;
    //     $employee_id  = $result->employee_id;
        
    //     $resultr = MouEmployer::where("employer_id","=",$employer_id)->first();
    //     $resulte = MouEmployee::where("employee_id","=",$employee_id)->first();
    //     $rowrp = Provinces::where("id","=",$resultr->province_id)->first();
    //     $rowrd = District::where("id","=",$resultr->district_id)->first();
    //     $rowrsd = SubDistrict::where("id","=",$resultr->subdistrict_id)->first();
    //     $rowep = Provinces::where("id","=",$resulte->workplace_province_id)->first();
    //     $rowed = District::where("id","=",$resulte->workplace_district_id)->first();
    //     $rowesd = SubDistrict::where("id","=",$resulte->workplace_subdistrict_id)->first();
    //     $result = array(
    //         'resulte' => $resulte,
    //         'resultr' => $resultr,
    //         'rowrp' => $rowrp,
    //         'rowrd' => $rowrd,
    //         'rowrsd' => $rowrsd,
    //         'rowep' => $rowep,
    //         'rowed' => $rowed,
    //         'rowesd' => $rowesd,

    //     );
    //     // dd($result);
    //     view()->share('result',$result);
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/'.$country.$doctype,$result); 
    //     return $pdf->stream();
    // }   

    // public function m01(request $request) {      
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/1'); 
    //     return $pdf->stream();
    // }
    // public function m02(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/2'); 
    //     return $pdf->stream();
    //     }
    // public function m03(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/3'); 
    //     return $pdf->stream();
    // }
    // public function m04(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/4'); 
    //     return $pdf->stream();
    // }
    // public function m05(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/5'); 
    //     return $pdf->stream();
    // }
    // public function m06(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/6'); 
    //     return $pdf->stream();
    // }
    // public function m07(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/7'); 
    //     return $pdf->stream();
    // }
    // public function m08(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/8'); 
    //     return $pdf->stream();
    // }
    // public function m09(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/9'); 
    //     return $pdf->stream();
    // }
    // public function m010(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/10'); 
    //     return $pdf->stream();
    // }
    // public function m011(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/11'); 
    //     return $pdf->stream();
    // }
    // public function m012(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/12'); 
    //     return $pdf->stream();
    // }
    // public function m013(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/13'); 
    //     return $pdf->stream();
    // }
    // public function m014(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/14'); 
    //     return $pdf->stream();
    // }
    // public function m015(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/15'); 
    //     return $pdf->stream();
    // }

    // public function fix(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/fix'); 
    //     return $pdf->stream();
    // }
    // public function wv1(request $request) {      
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/work_visa/1'); 
    //     return $pdf->stream();
    // }
    // public function wv2(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/work_visa/2'); 
    //     return $pdf->stream();
    //     }
    // public function wv3(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/work_visa/3'); 
    //     return $pdf->stream();
    // }
    // public function wv4(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/work_visa/4'); 
    //     return $pdf->stream();
    // }
    
    // public function pk1(request $request) {      
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/1'); 
    //     return $pdf->stream();
    // }
    // public function pk2(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/2'); 
    //     return $pdf->stream();
    //     }
    // public function pk3(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/3'); 
    //     return $pdf->stream();
    // }
    // public function pk4(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/4'); 
    //     return $pdf->stream();
    // }
    // public function pk5(request $request) {      
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/5'); 
    //     return $pdf->stream();
    // }
    // public function pk6(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/6'); 
    //     return $pdf->stream();
    //     }
    // public function pk7(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/pinkcard/7'); 
    //     return $pdf->stream();
    // }
    
    // public function bd1(request $request) {      
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/1'); 
    //     return $pdf->stream();
    // }
    // public function bd2(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/2'); 
    //     return $pdf->stream();
    //     }
    // public function bd3(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/3'); 
    //     return $pdf->stream();
    // }
    // public function bd4(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/4'); 
    //     return $pdf->stream();
    // }
    // public function bd5(request $request) {      
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/5'); 
    //     return $pdf->stream();
    // }
    // public function bd6(request $request) {  
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/6'); 
    //     return $pdf->stream();
    //     }
    // public function bd7(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/borderpass/7'); 
    //     return $pdf->stream();
    // }

    
    // public function ml1(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/lao/1'); 
    //     return $pdf->stream();
    // }
    // public function ml2(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/lao/2'); 
    //     return $pdf->stream();
    // }
    // public function ml3(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/lao/3'); 
    //     return $pdf->stream();
    // }
    // public function ml4(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/lao/4'); 
    //     return $pdf->stream();
    // }
    // public function mm1(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/myanmar/1'); 
    //     return $pdf->stream();
    // }
    // public function mm2(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/myanmar/2'); 
    //     return $pdf->stream();
    // }
    // public function mm3(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/myanmar/3'); 
    //     return $pdf->stream();
    // }
    // public function mm4(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/myanmar/4'); 
    //     return $pdf->stream();
    // }
    // public function mc1(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/cambodia/1'); 
    //     return $pdf->stream();
    // }
    // public function mc2(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/cambodia/2'); 
    //     return $pdf->stream();
    // }
    // public function mc3(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/cambodia/3'); 
    //     return $pdf->stream();
    // }
    // public function mc4(request $request) {    
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/mou/cambodia/4'); 
    //     return $pdf->stream();
    // }

    // public function pdf(){
    //     // $pdf = PDF::loadView('mou.1.1pdf')->setPaper('a4', 'potrait');
    // return view("back-end.pages.file_pdf.pdf");
    // // $pdf->download('pdf/1.pdf');
    // }
    // public function view_pdf(Request $request,$path ,$name){
    //     $pdf = PDF::loadView('back-end/pages/file_pdf/work_visa/1'); 
    //     return $pdf->stream();
    // }
    // public function conv($string) {
    //     return iconv('UTF-8', 'TIS-620', $string);
    // }
}