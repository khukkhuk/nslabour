<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">รายงานตัว</h4>

                <div class="page-title-right">
                    <ul class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">ต่อ Work+Visa</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder/report") }}">รายงานตัว</a><li>
                        <!-- <li class="breadcrumb-item active">รายงานตัว<li> -->
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form id="menuForm" method="post" action="">                        
                                        @csrf
                                        <!-- <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div> 
                                        <hr>   -->

                                        <h4>กรอกข้อมูลรายงานตัว</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">ชื่อนายจ้าง</label>
                                                        <!-- <input type="text" class="form-control" name="employer_name" id="employer_name"> -->
                                                        <!-- <input class="form-control" name="employer_name" id="employer_name" type="text">
                                                            <div id="suggesstion"></div>  -->
                                                            <input type="text" hidden id="employer_id" name="employer_id">
                                                            <input class="form-control" list="employer_name">
                                                            <datalist id="employer_name">
                                                                @foreach($rows as $row)
                                                                    <option value="{{$row->name_th}}">
                                                                @endforeach
                                                            </datalist>  
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="position">ชื่อคนงาน</label>
                                                        <!-- <input type="text" class="form-control" name="employee_name" id="employee_name"> -->
                                                            <input type="text" hidden id="employee_id" name="employee_id">
                                                            <input class="form-control" list="employee_name">
                                                            <datalist id="employee_name">
                                                                    <!-- <option value="{{$row->name_th}}"> -->
                                                            </datalist>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">เลขพาส</label>
                                                        <input type="text" hidden name="title_id" id="title_id">
                                                        <input class="form-control" name="passport_number" id="passport_number" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="position">ประเภท</label>
                                                        <input type="text" hidden name="typename" id="typename">
                                                        <input type="text" hidden name="period" id="period">
                                                        <select class="form-control" name="select_period" id="select_period">
                                                            <option value="" hidden>ฺเลือกประเภท</option>
                                                            <option value="1">BorderPass(7)</option>
                                                            <option value="2">BorderPass(30)</option>
                                                            <option value="3">Passpost(90)</option>
                                                            <option value="4">ต่างจังหวัด(90)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">วันเริ่มรายงานตัว</label>
                                                        <input type="date" name="report_date" id="report_date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label for="" style=" vertical-align: top;">หมายเหตุ</label>
                                                        <textarea class="form-control" name="note" id="note" placholder="หมายเหตุ" name="" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <hr>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script>
        
    </script>
</div>
