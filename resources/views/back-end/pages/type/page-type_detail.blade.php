<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">จัดการข้อมูลรายการ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">จัดการราคา</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลรายการ</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                        <a href="{{ url("$segment/$folder") }}" class="btn btn-info">ย้อนกลับ</a>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="type">ประเภท</label>
                                                    <input value="{{$row->type}}" readonly type="text" class="form-control" name="type" id="type">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="type_name">รายการ</label>
                                                    <input value="{{$row->type_name}}" readonly type="text" class="form-control" name="type_name" id="type_name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cost">ราคา/หน่วย</label>
                                                    <input value="{{$row->cost}}" readonly type="text" class="form-control" name="cost" id="cost">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    

    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-success" id="add-type_detail">เพิ่มข้อมูล</button>
                                    <input type="text" id="old_id" name="old_id" hidden>
                                    <table id="data-table-type_detail" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                                    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div id="form-add-detail" style="display:none">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">   
                                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="">รายการ/ขั้นตอน</label>
                                                    <input type="text" class="form-control" name="type_name" id="type_name">
                                                </div>
                                                <div class="col-6">
                                                    <label for="">ราคา</label>
                                                    <input type="text" class="form-control" name="price" id="price">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" name="status" id="status" value="insert" hidden>
                                                    <input hidden type="text" name="id" id="id" value="{{$id}}">
                                                    <button class="btn btn-success" id="">เพิ่มข้อมูล</button>
                                                    <button class="btn btn-danger" type="reset">ยกเลิก</button>
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
    </div>
    
    <div id="form-edit-detail" style="display:none">
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">   
                                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="">รายการ/ขั้นตอน</label>
                                                    <input type="text" class="form-control" name="type_name_edit" id="type_name_edit">
                                                </div>
                                                <div class="col-6">
                                                    <label for="">ราคา</label>
                                                    <input type="text" class="form-control" name="price_edit" id="price_edit">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" name="status" id="status" value="update" hidden>
                                                    <input hidden type="text" name="detail_id" id="detail_id" value="">
                                                    <button class="btn btn-success" id="">เพิ่มข้อมูล</button>
                                                    <button class="btn btn-danger" type="reset">ยกเลิก</button>
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
    </div>
    <script>
        
    </script>
</div>
