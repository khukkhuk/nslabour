<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">แก้ไขข้อมูลMou</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">ข้อมูลMou</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลMou </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form id="menuForm" method="post" action="">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        @csrf
                                        

                                        <a class="btn btn-danger" style="margin-bottom:15px;" href="{{url("$segment/$folder")}}">ย้อนกลับ</a>
                                        <h4>ข้อมูลสถานประกอบการ</h4>
                                            <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" checked name="type" id="type" value="person">
                                                        <label for="">บุคคล</label>   
                                                        <input type="radio" name="type" id="type" value="office">  
                                                        <label for="">บริษัท</label>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="">เลขบัตรประชาชน</label>
                                                        <input class="form-control" value="{{$rowr->id_card}}" name="id_card" id="id_card" readonly type="number">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">เลขนิติบุคคล</label>
                                                        <input class="form-control" value="{{$rowr->legal_number}}" name="legal_number" id="legal_number" readonly type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">ชื่อบริษัท</label>
                                                        <input class="form-control" value="{{$rowr->company_name}}" name="company_name" id="company_name" readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">คำนำหน้า</label>
                                                        <input class="form-control" value="{{$rowr->prefix_th}}"  name="prefix_th" id="prefix_th" readonly type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อ(TH)</label>
                                                        <input class="form-control" value="{{$rowr->name_th}}"  name="name_th" id="name_th" readonly type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">นามสกุล(TH)</label>
                                                        <input class="form-control" value="{{$rowr->surname_th}}" name="surname_th" id="surname_th" readonly type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อเล่น(TH)</label></label>
                                                        <input class="form-control" value="{{$rowr->nickname_th}}"name="nickname_th" id="nickname_th" readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">คำนำหน้า(EN)</label>
                                                        <input class="form-control" value="{{$rowr->prefix_en}}"  name="prefix_en" id="prefix_en" readonly type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อ(EN)</label>
                                                        <input class="form-control"name="name_en" value="{{$rowr->name_en}}" id="name_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">นามสกุล(EN)</label>
                                                        <input class="form-control"name="surname_en" value="{{$rowr->surname_en}}" id="surname_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อเล่น(EN)</label></label>
                                                        <input class="form-control"name="nickname_en" value="{{$rowr->nickname_en}}" id="nickname_en" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">ที่อยู่(TH)</label>
                                                        <input class="form-control"name="address_th" value="{{$rowr->address_th}}"  id="e_address_th" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">หมู่(TH)</label>
                                                        <input class="form-control"name="group_th" value="{{$rowr->group_th}}" id="e_group_th" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ถนน(TH)</label>
                                                        <input class="form-control"nSame="road_th" value="{{$rowr->road_th}}" id="road_th" type="text">
                                                        </select>
                                                    </div>
                                                    <input type="text" value="{{$select_p_th}}" id="select_p_th" hidden>
                                                    <input type="text" value="{{$select_d_th}}" id="select_d_th" hidden>
                                                    <input type="text" value="{{$select_sd_th}}" id="select_sd_th" hidden>
                                                    
                                                    <input type="text" value="{{$select_p_en}}" id="select_p_en" hidden>
                                                    <input type="text" value="{{$select_d_en}}" id="select_d_en" hidden>
                                                    <input type="text" value="{{$select_sd_en}}" id="select_sd_en" hidden>
                                                    <div class="form-group col-md-2">
                                                        <label>จังหวัด(TH)</label>
                                                            <select name="province" id="province_edit" class="form-control">
                                                                <!-- <div id="province_edit" ></div> -->
                                                            </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="district">อำเภอ(TH)</label>
                                                            <select name="district" id="district_edit" class="form-control">
                                                                <!-- <div id="district_edit" ></div> -->
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(TH)</label>
                                                            <select name="subdistrict" id="subdistrict_edit" class="form-control">
                                                                <!-- <div id="subdistrict_edit" ></div> -->
                                                            </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control" name="zipcode" id="zipcode" value="{{$rowr->zipcode}}"  readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">ที่อยู่(EN)</label>
                                                        <input class="form-control"name="address_en"value="{{$rowr->address_en}}"  id="address_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">หมู่(EN)</label>
                                                        <input class="form-control"name="group_en" value="{{$rowr->group_en}}" id="group_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ถนน(EN)</label>
                                                        <input class="form-control"name="road_en" value="{{$rowr->road_en}}" id="road_en" type="text">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>จังหวัด(EN)</label>
                                                        <input type="text" class="form-control" value="{{$select_p_en}}" id="p_en" >
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="district">อำเภอ(EN)</label>
                                                        <input type="text" class="form-control" value="{{$select_d_en}}" id="d_en" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(EN)</label>
                                                        <input type="text" class="form-control" value="{{$select_sd_en}}" id="sd_en">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control" name="zipcode_en"  value="{{$rowr->zipcode}}"id="zipcode_en" readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="">เบอร์โทร</label>
                                                        <input class="form-control"name="tel_number" value="{{$rowr->tel_number}}" id="tel_number" type="number">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">E-mail</label>
                                                        <input class="form-control"name="email" value="{{$rowr->email}}" id="email" type="email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
           
                        
                                        <hr>
                                        <div class="form-group">
                                    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                     
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        
        
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                        

                                        <h4>ข้อมูลหนังสือเดินทาง</h4>
                                            <hr>
                                        @php 
                                            $prefix = $rowe->prefix;
                                            $gender = $rowe->gender;
                                            $couple_status = $rowe->couple_status;
                                            $f_prefix = $rowe->f_prefix;
                                            $m_prefix = $rowe->m_prefix;
                                            $f_prefix = $rowe->f_prefix;
                                            $workplace_type = $rowe->workplace_type;
                                            $passport_type = $rowe->passport_type;
                                        @endphp

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="">คำนำหน้า</label>
                                                        <select class="form-control" name="prefix" id="prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option checked value="นาย" @if($prefix=='นาย')selected @endif>นาย</option>
                                                            <option value="นาง" @if($prefix=='นาง') selected @endif >นาง</option>
                                                            <option value="นางสาว"@if($prefix=='นางสาว')selected @endif>นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อ</label>
                                                        <input class="form-control" value="{{$rowe->name}}"  name="name" id="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">นามสกุล</label>
                                                        <input class="form-control" value="{{$rowe->surname}}"   name="surname" id="surname" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">เพศ</label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option @if($gender=='ชาย')selected @endif value="ชาย">ชาย</option>
                                                            <option @if($gender=='หญิง')selected @endif value="หญิง">หญิง</option>
                                                            <option @if($gender=='อื่นๆ')selected @endif value="อื่นๆ">อื่นๆ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="">วันเดือนปีเกิด</label>
                                                        <input type="date"  value="{{$rowe->b_date}}" class="form-control" name="b_date" id="b_date">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">อายุ</label>
                                                        <input type="number"  value="{{$rowe->age}}" class="form-control" name="age" id="age" min="1" max="99">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">สถานที่เกิด</label>
                                                        <input class="form-control" value="{{$rowe->b_place}}"  name="b_place" id="b_place" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">เบอร์โทร</label>
                                                        <input class="form-control" value="{{$rowe->tel_number}}"  name="e_tel_number" id="e_tel_number" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">สถานภาพ</label>
                                                        <input type="radio" name="couple_status"@if($couple_status=='โสด')checked @endif selected value="โสด" id="couple_status">โสด
                                                        <input type="radio" name="couple_status"@if($couple_status=='สมรส')checked @endif value="สมรส" id="couple_status">สมรส
                                                        <input type="radio" name="couple_status"@if($couple_status=='หย่า')checked @endif value="หย่า" id="couple_status">หย่า
                                                        <input type="radio" name="couple_status"@if($couple_status=='หม้าย')checked @endif value="หม้าย" id="couple_status">หม้าย
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>ข้อมูลเพิ่มเติม</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="">คำนำหน้าบิดา</label>
                                                        <select class="form-control" name="f_prefix" >
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option selected value="นาย">นาย</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อบิดา</label>
                                                        <input class="form-control"  value="{{$rowe->f_name}}"  name="f_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">นามสกุลบิดา</label>
                                                        <input class="form-control"  value="{{$rowe->f_surname}}" name="f_surname" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="">คำนำหน้ามารดา</label>
                                                        <select class="form-control" name="m_prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option value="นาง" @if($m_prefix=='นาง')selected @endif >นาง</option>
                                                            <option value="นางสาว"@if($m_prefix=='นางสาว')selected @endif >นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ชื่อมารดา</label>
                                                        <input class="form-control" value="{{$rowe->f_name}}"  name="m_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">นามสกุลมารดา</label>
                                                        <input class="form-control"  value="{{$rowe->f_surname}}" name="m_surname" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h4>ข้อมูลสถานที่ทำงานของคนงานต่างด้าว</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">กิจการ</label>
                                                        <input class="form-control"   value="{{$rowe->business}}" name="business"  id="business" type="text">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">ตำแหน่งงาน</label>
                                                        <input class="form-control"  value="{{$rowe->position}}" name="e_position"  id="e_position" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" value="1" name="workplace_type"@if($workplace_type=='1')checked @endif  id="workplace_type"> 
                                                        <label for="">ที่เดียวกับที่ตั้งที่อยู่ของนายจ้าง</label>   
                                                        <input type="radio" value="0" checked name="workplace_type"@if($workplace_type=='0')checked @endif  id="workplace_type"> 
                                                        <label for="">อื่นๆ</label>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">ที่อยู่(TH)</label>
                                                        <input class="form-control" value="{{$rowe->workplace_address_th}}"  type="text" name="e_address_th"  id="e_address_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">หมู่(TH)</label>
                                                        <input class="form-control"  value="{{$rowe->workplace_group_th}}" type="text" name="e_group_th"  id="e_group_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ถนน(TH)</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->workplace_road_th}}" name="e_road_th"  id="e_road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">จังหวัด(TH)</label>
                                                        <select name="workplace_province_id_edit" id="workplace_province_id_edit" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="text" value="{{$select_ep_th}}" id="select_ep_th" hidden>
                                            <input type="text" value="{{$select_ed_th}}" id="select_ed_th" hidden>
                                            <input type="text" value="{{$select_esd_th}}" id="select_esd_th" hidden>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">อำเภอ(TH)</label> 
                                                        <select name="workplace_district_id_edit" id="workplace_district_id_edit" class="form-control">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ตำบล(TH)</label></label> 
                                                        <select name="workplace_subdistrict_id_edit" id="workplace_subdistrict_id_edit" class="form-control">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control"  value="{{$rowe->workplace_zipcode}}" name="w_zipcode" id="w_zipcode" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="">ที่อยู่(EN)</label>
                                                        <input class="form-control"  value="{{$rowe->workplace_address_en}}" type="text" name="e_address_en"  id="e_address_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">หมู่(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->workplace_group_en}}" name="e_group_en"  id="e_group_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ถนน(EN)</label>
                                                        <input class="form-control  "type="text" value="{{$rowe->workplace_road_en}}" name="e_road_en"  id="e_road_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">จังหวัด(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$select_ep_en}}" id="w_ep_en"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="">อำเภอ(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$select_ed_en}}" id="w_ed_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">ตำบล(EN)</label></label>
                                                        <input class="form-control"  type="text"  value="{{$select_esd_en}}" id="w_esd_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control"  type="number" value="{{$rowe->workplace_zipcode}}" id="w_zipcode_en" name="zipcode_en" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <h4>ข้อมูลหนังสือเดินทาง</h4>
                                        <hr>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">ประเภทหนังสือเดินทาง</label>    
                                                        <label for="">ไม่มีหนังสือเดินทาง</label>   
                                                        <input type="radio"  name="passport_type" @if($passport_type=='ไม่มีหนังสือเดินทาง')checked @endif id="passport_type" value="ไม่มีหนังสือเดินทาง"> 
                                                        <label for="">PASSPORT</label> 
                                                        <input type="radio"  name="passport_type" @if($passport_type=='PASSPORT')checked @endif id="passport_type" value="Passport"> 
                                                        <label for="">BorderPass</label> 
                                                        <input type="radio"  name="passport_type" @if($passport_type=='BorderPass')checked @endif id="passport_type" value="BorderPass">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">เลขหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->passport_number}}" name="passport_number"  id="passport_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="">สถานที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->passport_place}}" name="passport_place"  id="passport_place"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">ประเทศที่ออก</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->passport_country}}" name="passport_country"  id="passport_country"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="">วันที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="date" value="{{$rowe->passport_create}}" name="passport_create"  id="passport_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">วันหมดอายุหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="date" value="{{$rowe->passport_expire}}" name="passport_expire"  id="passport_expire"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <h4>ข้อมูลใบอนุญาติทำงาน</h4>
                                        <hr>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="">เลขที่ใบอนุญาติทำงาน</label>
                                                        <input class="form-control"  type="number" value="{{$rowe->permit_number}}" name="permit_number"  id="permit_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="">วันที่ออกใบอนุญาติทำงาน</label>
                                                        <input class="form-control"  type="date" value="{{$rowe->permit_create}}" name="permit_create"  id="permit_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="">วันหมดอายุใบอนุญาติทำงาน</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->permit_expire}}" name="permit_expire"  id="permit_expire"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                   

                                        <div class="form-group">
                                            <input type="text" hidden id="employer_id" name="employer_id" value="{{$rowr->id}}">
                                            <input type="text" hidden id="employee_id" name="employee_id" value="{{$rowe->id}}">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                    

                                </div>
                        
                                    </form> 
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                     
        
    </div>
    </div> <!-- end row -->

    </div>

    
</div>
