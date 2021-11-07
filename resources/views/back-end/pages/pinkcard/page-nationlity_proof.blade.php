<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ตีVisa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">บัตรชมพู</a></li>
                        <li class="breadcrumb-item active">ตีVisa </li>
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

                                    <form id="menuForm" method="post" action="" onsubmit="return check_add();">                        
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
                                                        <label for="position">นายจ้าง/สถานประกอบการ</label>
                                                        <input class="form-control myLike" name="name" id="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="position">เบอร์โทร</label>
                                                        <input class="form-control myLike" name="num_search" id="num_search" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                    </form>
                                    <input type="text" hidden value="nationalproof" id="worktype" name="worktype">
                                    <table id="data-table-nationalproof" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    {{--<table id="sort_table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="width:1%" class="text-center">#</th>
                                            <th style="width:1%" class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="select" class="custom-control-input selectAll" id="selectAll">
                                                    <label class="custom-control-label" for="selectAll"></label>
                                                </div>
                                            </th>
                                            <th style="width:50%">ชื่อคนงาน</th>
                                            <th style="width:10%" class="text-center">เลขพาส</th>
                                            <th style="width:10%" class="text-center">สัญชาติ</th>
                                            <th style="width:10%" class="text-center">ไปได้/ไม่ได้</th>
                                            <th style="width:10%" class="text-center">หมายเหตุ</th>
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
                                    </table>--}}
                                    </table>
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
