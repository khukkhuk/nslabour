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
                                        

                                        <h4>ข้อมูลสถานประกอบการ</h4>
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
                                                        <input class="form-control"name="name_en" value="{{$rows->company_name}}" id="name_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล(EN)</label>
                                                        <input class="form-control"name="surname_en" value="{{$rows->company_name}}" id="surname_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อเล่น(EN)</label></label>
                                                        <input class="form-control"name="nickname_en" value="{{$rows->company_name}}" id="nickname_en" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(TH)</label>
                                                        <input class="form-control"name="address_th" value="{{$rows->company_name}}"  id="address_th" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(TH)</label>
                                                        <input class="form-control"name="group_th" value="{{$rows->company_name}}" id="group_th" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(TH)</label>
                                                        <input class="form-control"nSame="road_th" value="{{$rows->company_name}}" id="road_th" type="text">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>จังหวัด(TH)</label>
                                                        <input type="text" class="form-control" value="{{$rowP->name_th}}" >
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="district">อำเภอ(TH)</label>
                                                        <input type="text" class="form-control" value="{{$rowD->name_th}}" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(TH)</label>
                                                        <input type="text" class="form-control" value="{{$rowSD->name_th}}" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(TH)</label>
                                                        <input class="form-control" name="zipcode" id="zipcode" value="{{$rows->zipcode}}"  readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="form-group col-md-2">
                                                        <label for="position">ที่อยู่(EN)</label>
                                                        <input class="form-control"name="address_en"value="{{$rows->company_name}}"  id="address_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">หมู่(EN)</label>
                                                        <input class="form-control"name="group_en" value="{{$rows->company_name}}" id="group_en" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ถนน(EN)</label>
                                                        <input class="form-control"name="road_en" value="{{$rows->company_name}}" id="road_en" type="text">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>จังหวัด(EN)</label>
                                                        <input class="form-control"  type="text" value="{{$rowP->name_en}}" id="province_en" name="province_en" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="district">อำเภอ(EN)</label>
                                                        <input type="text" class="form-control" value="{{$rowD->name_en}}" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="subdistrict">ตำบล(EN)</label>
                                                        <input type="text" class="form-control" value="{{$rowSD->name_th}}" >
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">รหัสไปรษณีย์(EN)</label>
                                                        <input class="form-control" name="zipcode_en"  value="{{$rows->zipcode}}"id="zipcode_en" readonly type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="position">เบอร์โทร</label>
                                                        <input class="form-control"name="tel_number" value="{{$rows->company_name}}" id="tel_number" type="number">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="position">E-mail</label>
                                                        <input class="form-control"name="email" value="{{$rows->company_name}}" id="email" type="email">
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
            </div>
        </div> <!-- end col -->
        <div class="col-sm-3">
        <div class="row">
        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">ข้อมูลนายจ้าง</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">ข้อมูลแรงงาน</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">ข้อมูลผู้ติดตาม</a>
                        </div>
                    </div>
                </div>
                
            </div><div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">ดีมาน</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">ตท.2</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">หนังสือมอบอำนาจ</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">แจ้งที่พัก</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-info" style="width:100%;margin:5px" href="">ใบรับแจ้ง</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div> <!-- end row -->

    </div>

    
</div>
