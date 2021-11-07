<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ข้อมูลลูกค้า</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/customer")}}">ข้อมูลลูกค้า</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder/index/$id")}}">ข้อมูลแรงงาน</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลลูกค้า </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form id="menuForm" method="POST" action="">

                                        @csrf
                                        <!-- <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div> 
                                        <hr>   -->

                                        
                                        <h4>ข้อมูลหนังสือเดินทาง</h4>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder/index/$id")}}">ย้อนกลับ</a>
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
                                                        <input class="form-control" required name="tel_number" id="tel_number" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">สถานภาพ</label>
                                                        <input type="radio" name="couple_status" selected value="โสด" id="couple_status">โสด
                                                        <input type="radio" name="couple_status" value="สมรส" id="couple_status">สมรส
                                                        <input type="radio" name="couple_status" value="หย่า" id="couple_status">หย่า
                                                        <input type="radio" name="couple_status" value="หม้าย" id="couple_status">หม้าย
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
                                                            <option select value="นาย">นาย</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อบิดา</label>
                                                        <input class="form-control" required name="f_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุลบิดา</label>
                                                        <input class="form-control" required name="f_surname" type="text">
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
                                                            <option selected value="นาง">นาง</option>
                                                            <option value="นางสาว">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อมารดา</label>
                                                        <input class="form-control" required name="m_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุลมารดา</label>
                                                        <input class="form-control" required name="m_surname" type="text">
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
                                                        <input class="form-control" required name="position"  id="position" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" value="1" name="workplace_type" id="workplace_type"> 
                                                        <label for="position">ที่เดียวกับที่ตั้งที่อยู่ของนายจ้าง</label>   
                                                        <input type="radio" value="0" checked name="workplace_type" id="workplace_type"> 
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
                                                        <input class="form-control" required type="text" name="address_th"  id="address_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(TH)</label>
                                                        <input class="form-control" required type="text" name="group_th"  id="group_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(TH)</label>
                                                        <input class="form-control" required type="text" name="road_th"  id="road_th"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(TH)</label>
                                                        <select name="province_id" required id="province_id" class="form-control">
                                                            <option value="">เลือกจังหวัด</option>
                                                                @foreach(@$rows as $key => $row){
                                                                    <option value="{{$row->id}}">{{$row->name_th}}</option>
                                                                @endforeach
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
                                                        <select name="district_id" required class="form-control" id="district_id">
                                                            <option value="">เลือกอำเภอ</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(TH)</label></label>
                                                        <select name="subdistrict_id" required class="form-control" id="subdistrict_id">
                                                            <option value="">เลือกตำบล</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control" required name="zipcode" id="zipcode" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(EN)</label>
                                                        <input class="form-control" required type="text" name="address_en"  id="address_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(EN)</label>
                                                        <input class="form-control" required type="text" name="group_en"  id="group_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(EN)</label>
                                                        <input class="form-control required "type="text" name="road_en"  id="road_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(EN)</label>
                                                        <input class="form-control" required type="text" id="province_en" name="province_en">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">อำเภอ(EN)</label>
                                                        <input class="form-control" required type="text" id="district_en" name="district_en" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(EN)</label></label>
                                                        <input class="form-control" required type="text" id="subdistrict_en" name="subdistrict_en" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control" required type="number" id="zipcode_en" name="zipcode_en" readonly>
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
                                                        <input type="radio" required name="passport_type" id="passport_type" value="ไม่มีหนังสือเดินทาง"> 
                                                        <label for="position">PASSPORT</label> 
                                                        <input type="radio" required name="passport_type" id="passport_type" value="Passport"> 
                                                        <label for="position">BorderPass</label> 
                                                        <input type="radio" required name="passport_type" id="passport_type" value="BorderPass">
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
                                            <input type="text" hidden value="{{$id}}" id="id" name="id">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder/index/$id")}}">ยกเลิก</a>
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
