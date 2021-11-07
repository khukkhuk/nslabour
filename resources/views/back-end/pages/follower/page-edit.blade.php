<style>
    .img-preview {
        width: 100%;
        max-height: 145px;
        overflow: hidden;
    }

    .img-preview>img {
        height: 100%;
    }

    #tree {
        width: auto;
        height: 350px;
        overflow-x: auto;
        overflow-y: auto;
        border-radius: .25rem;
    }

    #tree>ul {
        padding-top: 10px;
    }

    #preview {
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
    }

    #preview:after {
        font-family: 'Font Awesome 5 Free';
        font-size: 9em !important;
        content: "\f03e";
        color: #999;
        display: block;
        margin: 30px;
    }

    .img-thumbnail {
        text-align: center;
    }
</style>
<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">สร้างข้อมูลเมนู</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/customer")}}">รายการลูกจ้าง</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder/index/$id")}}">รายการลูกค้า</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลลูกจ้าง </li>
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

                                        @php $prefix = $rows->prefix;  @endphp
                                        <h4>ข้อมูลผู้ติดตาม</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="position">คำนำหน้า</label>
                                                        <select class="form-control" name="prefix" id="prefix">
                                                            <option value="" hidden>กรุณาเลือก</option>
                                                            <option @if($prefix == "นาย")selected @endif value="นาย">นาย</option>
                                                            <option @if($prefix == "นาง")selected @endif value="นาง">นาง</option>
                                                            <option @if($prefix == "นางสาว")selected @endif value="นางสาว">นางสาว</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">ชื่อ</label>
                                                        <input class="form-control" value="{{$rows->name}}" name="name" id="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">นามสกุล</label>
                                                        <input class="form-control" value="{{$rows->surname}}" name="surname" id="surname" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-xs-12 col-md-12 col-xl-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <h6>ไฟล์รูปภาพประกอบกรณีมีให้ผู้ประเมินรับชม</h6>
                                                    <img src="@if(@$rows->image){{$rows->image}}@endif" class="img-thumbnail" id="preview" style="width:100%">
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
                                            <input type="text" hidden value="{{$id}}" id="id" name="id">
                                            <input type="text" hidden value="{{$employer_id}}" id="employer_id" name="employer_id">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/employee/index/$employer_id")}}">ยกเลิก</a>
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
