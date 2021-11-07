<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">สร้างข้อมูลเมนู</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">รายการเมนู</a></li>
                        <li class="breadcrumb-item active">สร้างข้อมูลเมนู </li>
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
                                        

                                        <h4>ข้อมูลหนังสือเดินทาง</h4>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ย้อนกลับ</a>
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
                                                        <label for="position">คำนำหน้า</label>
                                                        <select class="form-control" name="prefix" id="prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option checked value="นาย" @if($prefix=='นาย')selected @endif>นาย</option>
                                                            <option value="นาง" @if($prefix=='นาง') selected @endif >นาง</option>
                                                            <option value="นางสาว"@if($prefix=='นางสาว')selected @endif>นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ</label>
                                                        <input class="form-control" value="{{$rowe->name}}"  name="name" id="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล</label>
                                                        <input class="form-control" value="{{$rowe->surname}}"   name="surname" id="surname" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">เพศ</label>
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
                                                        <label for="position">วันเดือนปีเกิด</label>
                                                        <input type="date"  value="{{$rowe->b_date}}" class="form-control" name="b_date" id="b_date">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">อายุ</label>
                                                        <input type="number"  value="{{$rowe->age}}" class="form-control" name="age" id="age" min="1" max="99">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">สถานที่เกิด</label>
                                                        <input class="form-control" value="{{$rowe->b_place}}"  name="b_place" id="b_place" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">เบอร์โทร</label>
                                                        <input class="form-control" value="{{$rowe->tel_number}}"  name="tel_number" id="tel_number" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">สถานภาพ</label>
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
                                                        <label for="position">คำนำหน้าบิดา</label>
                                                        <select class="form-control" name="f_prefix" id="position">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option selected value="นาย">นาย</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อบิดา</label>
                                                        <input class="form-control"  value="{{$rowe->f_name}}"  name="f_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุลบิดา</label>
                                                        <input class="form-control"  value="{{$rowe->f_surname}}" name="f_surname" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้ามารดา</label>
                                                        <select class="form-control" name="m_prefix" id="position">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option value="นาง" @if($m_prefix=='นาง')selected @endif >นาง</option>
                                                            <option value="นางสาว"@if($m_prefix=='นางสาว')selected @endif >นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อมารดา</label>
                                                        <input class="form-control" value="{{$rowe->f_name}}"  name="m_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุลมารดา</label>
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
                                                        <label for="position">กิจการ</label>
                                                        <input class="form-control"   value="{{$rowe->business}}" name="business"  id="business" type="text">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">ตำแหน่งงาน</label>
                                                        <input class="form-control"  value="{{$rowe->position}}" name="position"  id="position" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" value="1" name="workplace_type"@if($workplace_type=='1')checked @endif  id="workplace_type"> 
                                                        <label for="position">ที่เดียวกับที่ตั้งที่อยู่ของนายจ้าง</label>   
                                                        <input type="radio" value="0" checked name="workplace_type"@if($workplace_type=='0')checked @endif  id="workplace_type"> 
                                                        <label for="position">อื่นๆ</label>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(TH)</label>
                                                        <input class="form-control" value="{{$rowe->workplace_address_th}}"  type="text" name="address_th"  id="address_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(TH)</label>
                                                        <input class="form-control"  value="{{$rowe->workplace_group_th}}" type="text" name="group_th"  id="group_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(TH)</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->workplace_road_th}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(TH)</label>
                                                        <input class="form-control"  type="text" value="{{$rowep->name_th}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">อำเภอ(TH)</label> 
                                                        <input class="form-control"  type="text" value="{{$rowed->name_th}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(TH)</label></label> 
                                                        <input class="form-control"  type="text" value="{{$rowesd->name_th}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control"  value="{{$rowe->workplace_zipcode}}" name="zipcode" id="zipcode" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(EN)</label>
                                                        <input class="form-control"  value="{{$rowe->workplace_address_en}}" type="text" name="address_en"  id="address_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->workplace_group_en}}" name="group_en"  id="group_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(EN)</label>
                                                        <input class="form-control  "type="text" value="{{$rowe->workplace_road_en}}" name="road_en"  id="road_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$rowep->name_en}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">อำเภอ(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$rowed->name_th}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(EN)</label></label>
                                                        <input class="form-control"  type="text" value="{{$rowesd->name_th}}" name="road_th"  id="road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control"  type="number" value="{{$rowe->workplace_zipcode}}" id="zipcode_en" name="zipcode_en" readonly>
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
                                                        <label for="position">ประเภทหนังสือเดินทาง</label>    
                                                        <label for="position">ไม่มีหนังสือเดินทาง</label>   
                                                        <input type="radio"  name="passport_type" @if($passport_type=='ไม่มีหนังสือเดินทาง')checked @endif id="passport_type" value="ไม่มีหนังสือเดินทาง"> 
                                                        <label for="position">PASSPORT</label> 
                                                        <input type="radio"  name="passport_type" @if($passport_type=='PASSPORT')checked @endif id="passport_type" value="Passport"> 
                                                        <label for="position">BorderPass</label> 
                                                        <input type="radio"  name="passport_type" @if($passport_type=='BorderPass')checked @endif id="passport_type" value="BorderPass">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">เลขหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->passport_number}}" name="passport_number"  id="passport_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">สถานที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->passport_place}}" name="passport_place"  id="passport_place"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">ประเทศที่ออก</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->passport_country}}" name="passport_country"  id="passport_country"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control"  type="date" value="{{$rowe->passport_create}}" name="passport_create"  id="passport_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันหมดอายุหนังสือเดินทาง</label>
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
                                                        <label for="position">เลขที่ใบอนุญาติทำงาน</label>
                                                        <input class="form-control"  type="number" value="{{$rowe->permit_number}}" name="permit_number"  id="permit_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันที่ออกใบอนุญาติทำงาน</label>
                                                        <input class="form-control"  type="date" value="{{$rowe->permit_create}}" name="permit_create"  id="permit_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันหมดอายุใบอนุญาติทำงาน</label>
                                                        <input class="form-control"  type="text" value="{{$rowe->permit_expire}}" name="permit_expire"  id="permit_expire"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                   
           
                        
                                    </form> 
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                     
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <!-- <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="width:100%;">ดูรายละเอียดข้อมูล</div>
                            <div class="row"><a class="btn btn-info" style="width:100%;margin:5px" href="{{ url("$segment/$folder/detail/$id") }}">ข้อมูลนายจ้าง</a></div>
                            <div class="row"><a class="btn btn-info" style="width:100%;margin:5px" href="{{ url("$segment/$folder/detail_employee/$id") }}">ข้อมูลแรงงาน</a></div>
                            <div class="row"><a class="btn btn-info" style="width:100%;margin:5px" href="{{ url("$segment/$folder/detail_follower/$id") }}">ข้อมูลผู้ติดตาม</a></div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url("$segment/file_pdf")}}"  method="post" target="_blank">
                        @csrf 
                        <input type="text" value="{{$id}}" hidden id="pdf_id" name="pdf_id">
                            <div class="row" style="width:100%;">ดูเอกสาร(PDF)</div>
                            <div class="row">
                                <select class="form-control" name="pdf_country" id="pdf_country">
                                    <option value="" hidden>เลือกประเทศ</option>
                                    <option value="lao" >ลาว</option>
                                    <option value="cambodia" >กัมพูชา</option>
                                    <option value="myanmar" >พม่า</option>
                                </select>
                            </div>
                            <div class="row">
                                <button class="btn btn-info" style="width:100%;margin:5px"  id="doc_type" name="doc_type" value="1">ดีมาน</button>
                                <button class="btn btn-info" style="width:100%;margin:5px"  id="doc_type" name="doc_type" value="2">ตท.2</button>
                                <button class="btn btn-info" style="width:100%;margin:5px"  id="doc_type" name="doc_type" value="3">หนังสือมอบอำนาจ</button>
                                <button class="btn btn-info" style="width:100%;margin:5px"  id="doc_type" name="doc_type" value="4">แจ้งที่พัก</button>
                                <button class="btn btn-info" style="width:100%;margin:5px"  id="doc_type" name="doc_type" value="5">ใบรับแจ้ง</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        
    </div>
    </div> <!-- end row -->

    </div>

    
</div>
