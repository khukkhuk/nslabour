<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">แก้ไขข้อผู้ดูแล</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">รายการผู้ดูแล</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อผู้ดูแล </li>
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

                                    <form id="menuForm" method="post" action="" onsubmit="return check_edit();">                        
                                        @csrf
                                       
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="role">ระดับ</label>
                                                            <select class="form-control" name="role" id="role">
                                                                <option value="" hidden>กรุณาเลือก</option>
                                                                <option value="admin" @if($row->role == "admin") selected @endif>ผู้ดูแลระบบ</option>
                                                                <option value="Manager" @if($row->role == "Manager") selected @endif>Manager</option>
                                                                <option value="customerservice" @if($row->role == "customerservice") selected @endif>Customer Service</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status">สถานะ</label>
                                                            <select class="form-control" name="status_check" id="status_check">
                                                                <option value="" hidden>กรุณาเลือก</option>
                                                                <option value="pending" @if($row->status == "pending") selected @endif>รอดำเนินการ</option>
                                                                <option value="inactive" @if($row->status == "inactive") selected @endif>ปิดการใช้งาน</option>
                                                                <option value="active" @if($row->status == "active") selected @endif>ใช้งาน</option>
                                                                <option value="banned" @if($row->status == "banned") selected @endif>ระงับการใช้งาน</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="username">ชื่อ</label>
                                                            <input class="form-control" id="name" type="text" name="name" value="{{$row->name}}" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="username">ชื่อผู้ใช้งาน</label>
                                                            <input class="form-control" id="username" type="text" name="username" value="{{$row->email}}" placeholder="ชื่อผู้ใช้งาน" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="checkbox" id="resetpassword" name="resetpassword"> เปลี่ยนรหัสผ่าน
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="password">รหัสผ่าน</label>
                                                            <div class="input-group col-mb-6">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="รหัสผ่าน" autocomplete="off" disabled>
                                                                <div class="input-group-append">                                            
                                                                    <div class="input-group-text">
                                                                        <span class="card-link show_pass"><i class="far fa-eye" data-id="password"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label" for="confirm_password">ยืนยันรหัสผ่าน</label>
                                                            <div class="input-group col-mb-6">
                                                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="ยืนยันรหัสผ่าน" autocomplete="off" disabled>
                                                                <div class="input-group-append">                                            
                                                                    <div class="input-group-text">
                                                                        <span class="card-link show_pass_confirm"><i class="far fa-eye" data-id="confirm_password"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
