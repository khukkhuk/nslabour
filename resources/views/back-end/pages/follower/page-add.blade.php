<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">เพิ่มข้อมูลแรงงาน</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/customer")}}">ข้อมูลนายจ้าง</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder/index/$id")}}">ข้อมูลแรงงาน</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลแรงงาน </li>
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

                                    <form id="menuForm" enctype="multipart/form-data" method="POST" action="">

                                        @csrf
                                        <!-- <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div> 
                                        <hr>   -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้า</label>
                                                        <select class="form-control" name="prefix" id="prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option value="นาย">นาย</option>
                                                            <option value="นาง">นาง</option>
                                                            <option value="นางสาว">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ</label>
                                                        <input class="form-control" name="name" id="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล</label>
                                                        <input class="form-control" name="surname" id="surname" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

   
                                        <div class="col-12 col-xs-12 col-md-12 col-xl-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <h6>ไฟล์รูปภาพประกอบกรณีมีให้ผู้ประเมินรับชม</h6>
                                                    <img class="img-thumbnail" id="preview" style="width:100%">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-12 col-xs-12 col-md-12 col-xl-12">
                                                    <small class="help-block">*รองรับไฟล์ <strong class="text-danger">(jpg, jpeg, png)</strong> เท่านั้น</small>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" onchange="loadFile(event)" name="image" id="image" accept="image/*" />
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       


                                        <hr>
                                        <div class="form-group">
                                            <input type="text" hidden value="{{$id}}" id="employee_id" name="employee_id">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/employee/index/$id")}}">ยกเลิก</a>
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
