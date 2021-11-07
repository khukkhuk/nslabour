<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">รายการผู้ใช้งานระบบ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">รายการผู้ใช้งานระบบ </li>
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
                        <div class="col-8">
                            <select name="status_user" id="status_user" class="form-control float-left w130 myLike">
                                <option value="">ทั้งหมด</option>
                                <option value="pending">รอดำเนินการ</option>
                                <option value="active">ใช้งาน</option>
                                <option value="inactive">ปิดการใช้งาน</option>
                                <option value="banned">ระงับการใช้งาน</option>
                            </select>
                            <input type="text" class="form-control float-left ml-1 w200 myLike" placeholder="ค้นหา : ชื่อ" name="name" autocomplete="off">
                            <input type="text" class="form-control float-left ml-1 w200 myLike" placeholder="ค้นหา : อีเมล์" name="email" autocomplete="off">
                          </div>
                        <div class="col-4 text-right">
                            <a class="btn btn-info btn-sm mt-1" href="{{url("$segment/$folder/add")}}"><i class="bx bx-plus font-size-16 align-middle mr-1"></i> เพิ่มข้อมูล</a>
                            <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">ผู้ใช้งานระบบทั้งหมด</h4>
                                    <p class="card-title-desc">รายการผู้ใช้งานระบบทั้งหมด ของระบบหลังบ้าน คุณสามารถเพิ่มลบแก้ไข สมาชิกได้ ผู้ที่สามารถใช้งานเมนูได้คือ ระดับ : Administrator</p>

                                    <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>

                                    {{-- <table id="sort_table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="width:1%" class="text-center">#</th>
                                            <th style="width:1%" class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="select" class="custom-control-input selectAll" id="selectAll">
                                                    <label class="custom-control-label" for="selectAll"></label>
                                                </div>
                                            </th>
                                            <th style="width:20%">ชื่อ</th>
                                            <th style="width:15%">ชื่อผู้ใช้งาน</th>
                                            <th class="text-center" style="width:15%">ระดับ</th>
                                            <th style="width:10%" class="text-center">วันที่สร้าง</th>
                                            <th style="width:10%" class="text-center">สถานะ</th>
                                            <th style="width:10%" class="text-center">จัดการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(@$rows)
                                            @foreach(@$rows as $key => $row)
                                                @php $secondary = \App\Models\Backend\MenuModel::where('_id',$row->id)->get(); @endphp
                                            <tr role="row" class="odd" data-row="{{ $key + 1 }}" data-id="{{ $row->id }}">
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="select" class="custom-control-input ChkBox" id="ChkBox{{$row->id}}" value="{{$row->id}}">
                                                        <label class="custom-control-label" for="ChkBox{{$row->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td class="text-center">{{$row->role}}</td>
                                                <td class="text-center">{{date('d/m/Y',strtotime($row->created_at))}}</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-switch custom-switch-md mb-3" dir="ltr">
                                                        <input type="checkbox" class="custom-control-input status" data-id="{{$row->id}}" id="customSwitchsizemd{{$key+1}}" @if($row->status=='active') checked @endif>
                                                        <label class="custom-control-label" for="customSwitchsizemd{{$key+1}}"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{url("$segment/$folder/$row->id")}}" class="btn btn-sm btn-info" title="Edit"><i class="far fa-edit"></i></a>                                                
                                                    <a href="javascript:" class="btn btn-sm btn-danger deleteItem" data-id="{{$row->id}}" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        
                                        </tbody>
                                    </table> --}}

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <input id="segment" name="segment" value="{{$segment}}" hidden>
    <input id="folder" name="folder" value="{{$folder}}" hidden>
</div>
