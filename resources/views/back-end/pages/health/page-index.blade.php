<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ข้อมูลการตรวจสุขภาพ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลการตรวจสุขภาพ </li>
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

                                    <h4 class="card-title">ข้อมูลการตรวจสุขภาพ</h4>
                                    
                                    <div class="row">
                                        <div class="col-8">
                                            <select name="status_active" id="status_active" class="form-control float-left w130 myLike">
                                                <option value="">ทั้งหมด</option>
                                                <option value="in progress">ไม่ไป</option>
                                                <option value="completed">ไปได้</option>
                                            </select>
                                            <input type="text" class="form-control float-left ml-1 w200 myLike" placeholder="ค้นหา : ชื่อ" name="name" autocomplete="off">

                                          </div>
                                        <div class="col-4 text-right">
                                            <a class="btn btn-info btn-sm mt-1" href="{{url("$segment/$folder/add")}}"><i class="bx bx-plus font-size-16 align-middle mr-1"></i> เพิ่มข้อมูล</a>
                                            {{-- <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a> --}}
                                        </div>
                                    </div>

                                    <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                                    
                                        <input type="text" value="{{$segment}}" id="segment" hidden>
                                        <input type="text" value="{{$folder}}" id="folder" hidden>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



<div id="formhealth" hidden>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post"> <!-- formdata -->
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="radio" name="business_type" id="business_type_p" value="person"> บุคคล 
                                                    <input type="radio" name="business_type" id="business_type_o" value="office"> บริษัท/หจก
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="">ชื่อบริษัท</label>
                                                    <input class="form-control" type="text" name="company_name" id="company_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="position">ชื่อนายจ้าง</label>
                                                    <input class="form-control"  type="text" name="employer_name" id="employer_name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="position">นามสกุล</label>
                                                    <input class="form-control"  type="text" name="employer_surname" id="employer_surname">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="position">ชื่อคนงาน</label>
                                                    <input class="form-control"  type="text" name="employee_name" id="employee_name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="position">นามสกุล</label>
                                                    <input class="form-control"  type="text" name="employee_surname" id="employee_surname">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="position">สัญชาติ</label>
                                                    <input class="form-control"  type="text" name="national" id="national">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="">สถานที่ตรวจ</label>      
                                                    <input type="radio" name="inspector" id="inspector_h" value="hospital"> <label for="">โรงพยาบาล</label>   
                                                    <input type="radio" name="inspector" id="inspector_c" value="company"> <label for="">บริษัท</label> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="position">สิทธิ์ประกันโรงพยาบาล</label>
                                                    <input type="text" class="form-control" name="insurance_right" id="insurance_right">   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="position">วันเริ่มประกัน</label>
                                                    <input class="form-control" type="date" name="insurance_create" id="insurance_create">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="position">วันหมดประกัน</label>
                                                    <input class="form-control" type="date" name="insurance_expire" id="insurance_expire">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="position">ระยะเวลาประกัน</label>
                                                        <select class="form-control" name="insurance_period" id="insurance_period">
                                                            <option value="" hidden>----</option>
                                                            <option value="3">3 เดือน</option>
                                                            <option value="6">6 เดือน</option>
                                                            <option value="1">1 ปี</option>
                                                            <option value="2">2 ปี</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="position">ประกันสังคม</label>
                                                    <input class="" name="social_security" id="social_security" value="check" type="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" hidden id="title_id" name="title_id">
                                                    <input type="text" hidden id="health_id" name="health_id">
                                                    <button type="submit" class="btn btn-success" style="width:25%">ยืนยัน</button>
                                                    <button type="reset" class="btn btn-danger" style="width:25%">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- formHealth -->
    <script>
        
    </script>
</div>
