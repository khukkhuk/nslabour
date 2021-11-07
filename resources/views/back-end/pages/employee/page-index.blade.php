<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ข้อมูลแรงงาน</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/customer") }}">ข้อมูลนายจ้าง</a></li>
                        <li class="breadcrumb-item active">ข้อมูลแรงงาน </li>
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


                                    <div class="row">
                                        <div class="col-8">
                                            <!-- <select name="status_active" id="status_active" class="form-control float-left w130 myLike">
                                                <option value="">ทั้งหมด</option>
                                                <option value="on">ใช้งาน</option>
                                                <option value="off">ไม่ใช้งาน</option>
                                            </select> -->
                                            <input type="text" class="form-control float-left ml-1 w200 myLike" placeholder="ค้นหา : ชื่อ" name="name" autocomplete="off">

                                          </div>
                                        <div class="col-4 text-right">
                                            <a class="btn btn-info btn-sm mt-1" href="{{url("$segment/$folder/add/$id")}}"><i class="bx bx-plus font-size-16 align-middle mr-1"></i> เพิ่มข้อมูล</a>
                                            {{-- <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a> --}}
                                        </div>

                                            
                                            {{-- <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a> --}}
                                        </div>
                                    </div>

                                    <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                                    
                                    <hr>
                                    <div id="tag_subtable"></div>
                                    <div id="add_subtable"></div>
                                    <table id="subdata-table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                                        <input type="text" value="{{$segment}}" id="segment" hidden>
                                        <input type="text" value="{{$folder}}" id="folder" hidden>
                                        <input type="text" value="{{$id}}" hidden id="employer_id" name="employer_id">
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
