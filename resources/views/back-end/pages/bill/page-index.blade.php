<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ข้อมูลบิล</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลบิล </li>
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

                                    <h4 class="card-title">ข้อมูลบิลทั้งหมด</h4>
                                    
                                    <div class="row">
                                        <div class="col-8">
                                            <select name="status_active" id="status_active" class="form-control float-left w130 myLike">
                                                <option value="">ทั้งหมด</option>
                                                <option value="in progress">กำลังดำเนินการ</option>
                                                <option value="completed">สำเร็จแล้ว</option>
                                            </select>
                                            <input type="text" class="form-control float-left ml-1 w200 myLike" placeholder="ค้นหา : ชื่อ" name="name" autocomplete="off">

                                          </div>
                                        <div class="col-4 text-right">
                                            <a class="btn btn-info btn-sm mt-1" href="{{url("$segment/$folder/add")}}"><i class="bx bx-plus font-size-16 align-middle mr-1"></i> เพิ่มข้อมูล</a>
                                            {{-- <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a> --}}
                                        </div>
                                    </div>

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
                                            <th style="width:50%">ชื่อเมนู</th>
                                            <th style="width:10%" class="text-center">วันที่สร้าง</th>
                                            <th style="width:10%" class="text-center">สถานะ</th>
                                            <th style="width:10%" class="text-center">จัดการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(@$rows)
                                            @foreach(@$rows as $key => $row)
                                                @php $secondary = \App\Models\Backend\MenuModel::where('_id',$row->id)->get(); @endphp
                                            <tr role="row" class="odd" data-row="{{ $key + 2 }}" data-id="{{ $row->id }}">
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="select" class="custom-control-input ChkBox" id="ChkBox{{$row->id}}" value="{{$row->id}}">
                                                        <label class="custom-control-label" for="ChkBox{{$row->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$row->name}}
                                                    @if(count($secondary)>0) 
                                                    <span class="badge badge-success" type="button" data-toggle="collapse" data-target=".multi-collapse{{$key}}" aria-expanded="false" aria-controls="col2{{$key}} col3{{$key}} col4{{$key}} col5{{$key}}">เมนูย่อย</span>
                                                    @endif    
                                                    <div class="collapse multi-collapse{{$key}}" id="col2{{$key}}">   
                                                        <ul class="list-group" style="margin-top:5px">
                                                        @foreach($secondary as $col2)
                                                            <li class="list-group-item d-flex justify-content-between p-2">
                                                                <span>{{$col2->name}}</span>
                                                                <div class="justify-content-end">
                                                                    <a class="badge" href="javascript:">{{date('d-m-Y',strtotime($col2->created))}}</a>
                                                                    <a class="badge badge-dark badge-status" data-id="{{$col2->id}}" href="javascript:void(0)"><span id="sub_status_{{$col2->id}}">{{$col2->status}}</span></a>
                                                                    <a class="badge badge-warning" href="{{url("$segment/$folder/$col2->id")}}"><i class="far fa-edit"></i></a>
                                                                    <a class="badge badge-danger deleteItem" data-id="{{$col2->id}}" href="javascript:"><i class="far fa-trash-alt"></i></a>
                                                                </div>
                                                            </li>
                                                        @endforeach  
                                                        </ul>                               
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-switch custom-switch-md mb-3" dir="ltr">
                                                        <input type="checkbox" class="custom-control-input status" data-id="{{$row->id}}" id="customSwitchsizemd{{$key+1}}" @if($row->status=='on') checked @endif>
                                                        <label class="custom-control-label" for="customSwitchsizemd{{$key+1}}"></label>
                                                        
                                                    </div>
                                                </td>
                                                <td class="text-center">        
                                                    <button class="btn btn-sm btn-success" >ข้อมูลลูกจ้าง</button>
                                                    <a href="{{url("$segment/$folder/$row->id")}}" class="btn btn-sm btn-info" title="Edit"><i class="far fa-edit"></i></a>                                                
                                                    <a href="javascript:" class="btn btn-sm btn-danger deleteItem" data-id="{{$row->id}}" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        
                                        </tbody>
                                    </table> --}}
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post"> <!-- formdata -->
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="radio" name="business_type" id="business_type" value="person"> บุคคล 
                                                    <input type="radio" name="business_type" id="business_type" value="company"> บริษัท/หจก
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">ชื่อบริษัท</label>
                                                    <input class="form-control" type="text" name="company_name" id="company_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="position">ชื่อนายจ้าง</label>
                                                    <input class="form-control"  type="text" name="employer_name" id="employer_name">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="position">นามสกุล</label>
                                                    <input class="form-control"  type="text" name="employer_surname" id="employer_surname">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="position">ชื่อคนงาน</label>
                                                    <input class="form-control"  type="text" name="employee_name" id="employee_name">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="position">นามสกุล</label>
                                                    <input class="form-control"  type="text" name="employee_surname" id="employee_surname">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="position">สัญชาติ</label>
                                                    <input class="form-control"  type="text" name="national" id="national">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">สถานที่ตรวจ</label>      
                                                    <input type="radio" name="inspector" id="inspector" value="hospital"> <label for="">โรงพยาบาล</label>   
                                                    <input type="radio" name="inspector" id="inspector" value="company"> <label for="">บริษัท</label> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="position">สิทธิ์ประกันโรงพยาบาล</label>
                                                    <input type="text" class="form-control" name="inspector" id="inspector">   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="position">วันเริ่มประกัน</label>
                                                    <input class="form-control" type="date" name="insurance_create" id="insurance_create">
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="position">วันหมดประกัน</label>
                                                    <input class="form-control" type="text" name="insurance_expire" id="insurance_expire">
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label for="position">ระยะเวลาประกัน</label>
                                                        <select class="form-control" name="insurance_period" id="insurance_period">
                                                            <option value=""></option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="position">ประกันสังคม</label>
                                                    <input class="" name="social_security" id="social_security" type="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
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
