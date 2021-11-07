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
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form id="menuForm" method="post" action="" onsubmit="return check_add();">                        
                                        @csrf
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div>
                                        <hr>   

                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="position">ตำแหน่ง</label>
                                                        <select class="form-control" name="position" id="position">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option value="main">เมนูหลัก</option>
                                                            <option value="secondary">เมนูย่อย</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="position">เป็นเมนูย่อยของเมนู :</label>
                                                            <select class="form-control" name="_id" id="_id" disabled>
                                                                <option value="" hidden>กรุณาเลือก</option>
                                                                @if($main)
                                                                @foreach($main as $i => $c)
                                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                                @endforeach
                                                                @endif
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="icon">Icon</label> :
                                            <small class="text-muted"><a href="{{url("$segment/$folder/icon")}}" target="_blank">Box Icons</a></small>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span id="icon-preview"><i></i></span>
                                                    </span>
                                                </span>
                                                <input class="form-control" id="icon" name="icon" type="text" placeholder="icon" autocomplete="off">
                                            </div>                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="username">ชื่อเมนู</label>
                                            <input class="form-control" id="name" type="text" name="name" placeholder="กรุณากรอกชื่อเมนู" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="url">ลิงค์เมนู</label>
                                            <input class="form-control" id="url" type="text" name="url" placeholder="กรุณากรอกลิงค์แสดงผลเมนูเช่น /menu" autocomplete="off">
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
