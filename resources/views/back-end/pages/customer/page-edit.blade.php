<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">แก้ไขข้อมูลนายจ้าง</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">ข้อมูลนายจ้าง</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลนายจ้าง</li>
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

                                    <form id="menuForm" method="post" action="">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        @csrf
                                        <!-- <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div> 
                                        <hr>   -->

                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ย้อนกลับ</a>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <input type="radio" checked name="type" id="type">
                                                        <label for="position">บุคคล</label>   
                                                        <input type="radio" name="type" id="type"> 
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
                                                        <input class="form-control" value="{{$rows->id_card}}" name="id_card" id="id_card" required type="number">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">เลขนิติบุคคล</label>
                                                        <input class="form-control" value="{{$rows->legal_number}}" name="legal_number" id="legal_number" required type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">ชื่อบริษัท</label>
                                                        <input class="form-control" value="{{$rows->company_name}}" name="company_name" id="company_name" required type="text">
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
                                                        <input class="form-control" value="{{$rows->name_th}}"  name="name_th" id="name_th" required type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล(TH)</label>
                                                        <input class="form-control" value="{{$rows->surname_th}}" name="surname_th" id="surname_th" required type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อเล่น(TH)</label></label>
                                                        <input class="form-control" value="{{$rows->nickname_th}}"name="nickname_th" id="nickname_th" required type="text">
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
                                                            <option value="Mr.">นาย</option>
                                                            <option value="Mrs.">นาง</option>
                                                            <option value="Miss">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ(EN)</label>
                                                        <input class="form-control"name="name_en"   id="name_en" type="text">
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
                                                                @foreach(@$rows_province as $rowP){ 
                                                                    <option value="{{$rowP->id}}">{{$rowP->name_th}}</option>
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
                                                        <input class="form-control" name="zipcode" id="zipcode" readonly type="text">
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
                                                        <input class="form-control"  type="text" id="province_en" name="province_en" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="district">อำเภอ(EN)</label>
                                                        <input class="form-control"  type="text" id="district_en" name="district_en" readonly>
                                                        <!-- <div id="fetch_amphure"></div> -->
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(EN)</label>
                                                        <input class="form-control"  type="text" id="subdistrict_en" name="subdistrict_en" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control" name="zipcode_en" id="zipcode_en" readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="position">เบอร์โทร</label>
                                                        <input class="form-control"name="tel_number"  id="tel_number" type="number">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="position">E-mail</label>
                                                        <input class="form-control"name="email"  id="email" type="email">
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
                                                        <input class="form-control"name="business"  id="business" type="text">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">ตำแหน่งงาน</label>
                                                        <input class="form-control"name="position"  id="position" type="text">
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
                                                        <input class="form-control"type="text" name="workplace_address"  id="workplace_address"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(TH)</label>
                                                        <input class="form-control"type="text" name="workplace_group"  id="workplace_group"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(TH)</label>
                                                        <input class="form-control"type="text" name="workplace_road"  id="workplace_road"> 
                                                    </div>
                                                    @php
                                                    ///print_r($rows_province);
                                                    @endphp
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(TH)</label>
                                                        <select name="workplace_province" id="workplace_province" class="form-control">
                                                            <option value="">เลือกจังหวัด</option>
                                                                @foreach(@$rows_province as $rowP){ 
                                                                    <option value="{{$rowP->id}}">{{$rowP->name_th}}</option>
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
                                                        <select name="workplace_district" class="form-control" id="workplace_district">
                                                            <option value="">เลือกอำเภอ</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(TH)</label></label>
                                                        <select name="workplace_subdistrict" class="form-control" id="workplace_subdistrict">
                                                            <option value="">เลือกตำบล</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control" name="workplace_zipcode" id="workplace_zipcode" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(EN)</label>
                                                        <input class="form-control"type="text" name="workplace_address_en"  id="workplace_address_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(EN)</label>
                                                        <input class="form-control"type="text" name="workplace_group_en"  id="workplace_group_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(EN)</label>
                                                        <input class="form-control"type="text" name="workplace_road_en"  id="workplace_road_en"> 
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">จังหวัด(EN)</label>
                                                        <input class="form-control"  type="text" id="workplace_province_en" name="workplace_province_en">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">อำเภอ(EN)</label>
                                                        <input class="form-control"  type="text" id="workplace_district_en" name="workplace_district_en" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ตำบล(EN)</label></label>
                                                        <input class="form-control"  type="text" id="workplace_subdistrict_en" name="workplace_subdistrict_en" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control"  type="number" id="workplace_zipcode_en" name="workplace_zipcode_en" readonly>
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
                                                        <input type="radio" checked name="passport_type" id="passport_type"> 
                                                        <label for="position">ไม่มีหนังสือเดินทาง</label>   
                                                        <input type="radio" name="passport_type" id="passport_type"> 
                                                        <label for="position">PASSPORT</label> 
                                                        <input type="radio" name="passport_type" id="passport_type"> 
                                                        <label for="position">BorderPass</label> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label for="position">เลขหนังสือเดินทาง</label>
                                                        <input class="form-control"type="text" name="passport_number"  id="passport_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">สถานที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control"type="text" name="passport_place"  id="passport_place"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">ประเทศที่ออก</label>
                                                        <input class="form-control"type="text" name="passport_country"  id="passport_country"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันที่ออกหนังสือเดินทาง</label>
                                                        <input class="form-control"type="date" name="passport_create"  id="passport_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันหมดอายุหนังสือเดินทาง</label>
                                                        <input class="form-control"type="date" name="passport_expire"  id="passport_expire"> 
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
                                                        <input class="form-control"type="number" name="permit_number"  id="permit_number"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันที่ออกใบอนุญาติทำงาน</label>
                                                        <input class="form-control"type="date" name="permit_create"  id="permit_create"> 
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="position">วันหมดอายุใบอนุญาติทำงาน</label>
                                                        <input class="form-control"type="text" name="permit_expire"  id="permit_expire"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                       
                        
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" hidden value="{{$rows->id}}" name="id" id="id">
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
