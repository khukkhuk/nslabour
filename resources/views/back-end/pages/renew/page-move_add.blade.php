<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">จัดทำข้อมูลย้ายดวงตรา</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">จัดทำข้อมูลย้ายดวงตรา </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


                                    <form id="menuForm" method="post" action="">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        @csrf
                                        <!-- <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div> 
                                        <hr>   -->

    
    <div class="row">
        <div class="col-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                
                                    รายการ 
                                    <select class="form-control" required name="select_type" id="select_type">
                                        <option value="move" selected>ย้ายดวงตรา</option>
                                    </select>
                                                </div>
                                    
                                    <div class="form-group col-md-3">
                                    เลือกประเทศ
                                    <select class="form-control" required name="select_country" id="select_country">
                                        <option value="" hidden>เลือกประเทศ</option>
                                        <option value="ลาว">ลาว</option>
                                        <option value="กัมพูชา">กัมพูชา</option>
                                        <option value="พม่า">พม่า</option>
                                    </select>
                                                </div>
                                    
                                    <div class="form-group col-md-3">
                                    เลือกนายจ้าง
                                    <select class="form-control" required name="select_employer" id="select_employer">
                                        <option value="" hidden>เลือกนายจ้าง</option>
                                        @foreach($rows as $row)
                                            <option value="{{$row->id}}">{{$row->prefix_th}}{{$row->name_th}} {{$row->surname_th}}</option>
                                        @endforeach

                                    </select>
                                                </div>
                                    
                                    <div class="form-group col-md-3">
                                    เลือกแรงงาน
                                    <select class="form-control" required name="select_employee" id="select_employee">
                                        <option value="" hidden>เลือกแรงงาน</option>
                                    </select>     
                                                </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" name="type" id="type_person" value="person">
                                                        <label for="position">บุคคล</label>   
                                                        <input type="radio" name="type" id="type_office" value="office"> 
                                                        <label for="position">บริษัท</label>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">เลขบัตรประชาชน</label>
                                                        <input class="form-control" name="id_card" id="id_card" required type="number">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">เลขนิติบุคคล</label>
                                                        <input class="form-control" name="legal_number" id="legal_number" required type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">ชื่อบริษัท</label>
                                                        <input class="form-control" name="company_name" id="company_name" required type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้า</label>
                                                        <select class="form-control" name="prefix_th" id="prefix_th" required>
                                                            <option value="นาย">นาย</option>
                                                            <option value="นาง">นาง</option>
                                                            <option value="นางสาว">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ(TH)</label>
                                                        <input class="form-control" name="name_th" id="name_th" required type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล(TH)</label>
                                                        <input class="form-control"name="surname_th" id="surname_th" required type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อเล่น(TH)</label></label>
                                                        <input class="form-control" name="nickname_th" id="nickname_th" required type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้า(EN)</label>
                                                        <select class="form-control" name="prefix_en"  id="prefix_en">
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Mrs.">Mrs.</option>
                                                            <option value="Miss">Miss</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ(EN)</label>
                                                        <input class="form-control"name="name_en"  id="name_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล(EN)</label>
                                                        <input class="form-control"name="surname_en"  id="surname_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อเล่น(EN)</label></label>
                                                        <input class="form-control"name="nickname_en"  id="nickname_en" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(TH)</label>
                                                        <input class="form-control"name="address_th"  id="address_th" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(TH)</label>
                                                        <input class="form-control"name="group_th"  id="group_th" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(TH)</label>
                                                        <input class="form-control"name="road_th"  id="road_th" type="text">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>จังหวัด(TH)</label>
                                                        <select name="province" id="province" class="form-control">
                                                            <option value="">เลือกจังหวัด</option>
                                                               
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
                                                        <select name="district" id="district" class="form-control">
                                                            <option value="">เลือกอำเภอ</option>
                                                        </select>
                                                        <!-- <div id="fetch_amphure"></div> -->
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(TH)</label>
                                                        <select name="subdistrict" id="subdistrict" class="form-control">
                                                            <option value="">เลือกตำบล</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control" name="zipcode" id="zipcode" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(EN)</label>
                                                        <input class="form-control"name="address_en"  id="address_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(EN)</label>
                                                        <input class="form-control"name="group_en"  id="group_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(EN)</label>
                                                        <input class="form-control"name="road_en"  id="road_en" type="text">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>จังหวัด(EN)</label>
                                                        <input class="form-control"  type="text" id="province_en" name="province_en">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="district">อำเภอ(EN)</label>
                                                        <input class="form-control"  type="text" id="district_en" name="district_en">
                                                        <!-- <div id="fetch_amphure"></div> -->
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(EN)</label>
                                                        <input class="form-control"  type="text" id="subdistrict_en" name="subdistrict_en">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control" name="zipcode_en" id="zipcode_en" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="position">เบอร์โทร</label>
                                                        <input class="form-control"name="tel_number"  id="tel_number" type="text">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="position">E-mail</label>
                                                        <input class="form-control"name="email"  id="email" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4>ข้อมูลหนังสือเดินทาง</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้า</label>
                                                        <select class="form-control" name="prefix" id="prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option checked value="นาย">นาย</option>
                                                            <option value="นาง">นาง</option>
                                                            <option value="นางสาว">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ</label>
                                                        <input class="form-control" required name="name" id="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล</label>
                                                        <input class="form-control" required name="surname" id="surname" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">เพศ</label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option value="ชาย">ชาย</option>
                                                            <option value="หญิง">หญิง</option>
                                                            <option value="อื่นๆ">อื่นๆ</option>
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
                                                        <input type="date" required class="form-control" name="b_date" id="b_date">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">อายุ</label>
                                                        <input type="number" required class="form-control" name="age" id="age" min="1" max="99">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">สถานที่เกิด</label>
                                                        <input class="form-control" required name="b_place" id="b_place" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">เบอร์โทร</label>
                                                        <input class="form-control" required name="em_tel_number" id="em_tel_number" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">สถานภาพ</label>
                                                        <input type="radio" name="couple_status" value="โสด" id="couple_1">โสด
                                                        <input type="radio" name="couple_status" value="สมรส" id="couple_2">สมรส
                                                        <input type="radio" name="couple_status" value="หย่า" id="couple_3">หย่า
                                                        <input type="radio" name="couple_status" value="หม้าย" id="couple_4">หม้าย
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
                                                        <select class="form-control" name="f_prefix" id="f_prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option select value="นาย">นาย</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อบิดา</label>
                                                        <input class="form-control" required name="f_name" id="f_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุลบิดา</label>
                                                        <input class="form-control" required name="f_surname" id="f_surname" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้ามารดา</label>
                                                        <select class="form-control" name="m_prefix" id="m_prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option selected value="นาง">นาง</option>
                                                            <option value="นางสาว">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อมารดา</label>
                                                        <input class="form-control" required name="m_name" id="m_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุลมารดา</label>
                                                        <input class="form-control" required name="m_surname" id="m_surname" type="text">
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
                                                        <input class="form-control" required name="business"  id="business" type="text">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">ตำแหน่งงาน</label>
                                                        <input class="form-control" required name="e_position"  id="e_position" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" value="1" name="workplace_type" id="workplace_1"> 
                                                        <label for="position">ที่เดียวกับที่ตั้งที่อยู่ของนายจ้าง</label>   
                                                        <input type="radio" value="0" name="workplace_type" id="workplace_2"> 
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
                                                        <input class="form-control" required type="text" name="e_address_th"  id="e_address_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(TH)</label>
                                                        <input class="form-control" required type="text" name="e_group_th"  id="e_group_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(TH)</label>
                                                        <input class="form-control" required type="text" name="e_road_th"  id="e_road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(TH)</label>
                                                        <select name="e_province_id" required id="e_province_id" class="form-control">
                                                            <option value="">เลือกจังหวัด</option>
                                                                
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">อำเภอ(TH)</label>
                                                        <select name="e_district_id" required class="form-control" id="e_district_id">
                                                            <option value="">เลือกอำเภอ</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(TH)</label></label>
                                                        <select name="e_subdistrict_id" required class="form-control" id="e_subdistrict_id">
                                                            <option value="">เลือกตำบล</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control" required name="e_zipcode" id="e_zipcode" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(EN)</label>
                                                        <input class="form-control" required type="text" name="e_address_en"  id="e_address_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(EN)</label>
                                                        <input class="form-control" required type="text" name="e_group_en"  id="e_group_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(EN)</label>
                                                        <input class="form-control required "type="text" name="e_road_en"  id="e_road_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(EN)</label>
                                                        <input class="form-control" required type="text" id="e_province_en" name="e_province_en">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">อำเภอ(EN)</label>
                                                        <input class="form-control" required type="text" id="e_district_en" name="e_district_en">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(EN)</label></label>
                                                        <input class="form-control" required type="text" id="e_subdistrict_en" name="e_subdistrict_en">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control" required type="number" id="ezipcode" name="ezipcode">
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
                                                        <input type="radio" required name="passport_type" id="passport_1" value="ไม่มีหนังสือเดินทาง"> 
                                                        <label for="position">PASSPORT</label> 
                                                        <input type="radio" required name="passport_type" id="passport_2" value="Passport"> 
                                                        <label for="position">BorderPass</label> 
                                                        <input type="radio" required name="passport_type" id="passport_3" value="BorderPass">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">เลขหนังสือเดินทาง</label>
                                                        <input class="form-control" required type="text" name="passport_number"  id="passport_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">สถานที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control" required type="text" name="passport_place"  id="passport_place"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">ประเทศที่ออก</label>
                                                        <input class="form-control" required type="text" name="passport_country"  id="passport_country"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control" required type="date" name="passport_create"  id="passport_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันหมดอายุหนังสือเดินทาง</label>
                                                        <input class="form-control" required type="date" name="passport_expire"  id="passport_expire"> 
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
                                                        <input class="form-control" required type="number" name="permit_number"  id="permit_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันที่ออกใบอนุญาติทำงาน</label>
                                                        <input class="form-control" required type="date" name="permit_create"  id="permit_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันหมดอายุใบอนุญาติทำงาน</label>
                                                        <input class="form-control" required type="text" name="permit_expire"  id="permit_expire"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                   
                                                                    
                                       
                        
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" hidden id="employer_id" name="employer_id">
                                            <input type="text" hidden id="employee_id" name="employee_id">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script type="text/javascript">
        
    </script>
</div>
