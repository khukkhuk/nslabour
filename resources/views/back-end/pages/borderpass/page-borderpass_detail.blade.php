<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">borderpass</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลการดำเนินการ borderpass</li>
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

                                    <h4 class="card-title">ข้อมูลการดำเนินการ borderpass</h4>
                                    
                                    <div class="row">
                                        <div class="col-4 text-right">
                                            {{-- <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a> --}}
                                        </div>
                                    </div>
                                    <button class="btn btn-info" style="float:right;margin-bottom:15px" id="btn_add_detail" onClick="add_detail()" value="true">เพิ่มรายละเอียด</button>
                                    <div hidden id="add_detail" class="row">
                                        <div  class="col-3 text-center" style="margin: 15px 0px;margin-left:34%;background-color:#f8f9fa;padding:5px;border-radius:5px;">
                                            <form action="webpanel/borderpass/borderpass_detail" method="post">
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                    @csrf
                                                <h4>
                                                    บันทึกเวลาการทำงาน
                                                </h4>
                                                <label for="">เลือกรายการ</label>
                                                <select class="form-control" name="select_type" id="select_type">
                                                    <!-- ทำเล่มใหม่ , ติด Visa-->
                                                    
                                                    @if($result->type_name!="เปลี่ยนเล่ม")
                                                    <option value="เอกสารนายจ้าง">เอกสารนายจ้าง</option>
                                                    <option value="เอกสารคนงาน">เอกสารคนงาน</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="รูปคนงาน">รูปคนงาน</option>
                                                    <option value="ดีมาน">ดีมาน</option>
                                                    <option value="ดีมานส่งจัดหางาน">ดีมานส่งจัดหางาน</option>
                                                    <option value="ดีมานส่งประเทศต้นทาง">ดีมานส่งประเทศต้นทาง</option>
                                                    <option value="เนมลิส">เนมลิส</option>
                                                    <option value="ตท.2(1900)">ตท.2(1900)</option>
                                                    <option value="ตท.2 ส่งจัดหางาน">ตท.2 ส่งจัดหางาน</option>
                                                    <option value="ใบเสร็จ">ใบเสร็จ</option>
                                                    <option value="คอลลิ่งวีซ่า">คอลลิ่งวีซ่า</option>
                                                    <option value="คอลลิ่งวีซ่าไปประเทศต้นทาง">คอลลิ่งวีซ่าไปประเทศต้นทาง</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="เปิดVisa">เปิดVisa</option>
                                                    <option value="บัตรสมาร์ทการ์ด">บัตรสมาร์ทการ์ด</option>
                                                    <option value="ตรวจสุขภาพ">ตรวจสุขภาพ</option>
                                                    <option value="ใบรับแจ้ง">ใบรับแจ้ง</option>
                                                    <option value="ใบรับแจ้งส่งจัดหางาน">ใบรับแจ้งส่งจัดหางาน</option>
                                                    <option value="แจ้งที่พัก">แจ้งที่พัก</option>
                                                    <option value="แจ้งที่พักส่ง">แจ้งที่พักส่ง ตม.</option>
                                                    <option value="เอกสารส่งภาษี">เอกสารส่งภาษี</option>
                                                    @else
                                                    <!-- เปลี่ยนเล่ม -->
                                                    <option value="เอกสารนายจ้าง">เอกสารนายจ้าง</option>
                                                    <option value="เอกสารคนงาน">เอกสารคนงาน</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="รูปคนงาน">รูปคนงาน</option>
                                                    <option value="ส่งไปประเทศต้นทาง">ส่งไปประเทศต้นทาง</option>
                                                    <option value="ได้เล่มใหม่">ได้เล่มใหม่</option>
                                                    @endif

                                                </select>    
                                                <label style="margin-top:5px;" for="">วันที่รับ</label>
                                                <input class="form-control"style="margin-bottom:5px" type="date" id="select_date" name="select_date">
                                                <input type="text" hidden value="{{$result->id}}" id="borderpass_id" name="borderpass_id">
                                                <input type="text" hidden value="data" id="type" name="type">
                                                <input class="btn btn-info" type="submit" value="ยืนยัน">
                                                <input class="btn btn-warning" type="reset" value="ยกเลิก">
                                            </form>
                                        </div>
                                    </div>
                                    <table id="sort_table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="width:1%" class="text-center">#</th>
                                            <th style="width:20%" class="text-center">รายการ</th>
                                            <th style="width:10%" class="text-center">วันที่รับ</th>
                                            <th style="width:10%" class="text-center">ผู้รับ</th>
                                            <th style="width:10%" class="text-center">วันที่ส่ง</th>
                                            <th style="width:10%" class="text-center">ผู้ส่ง</th>
                                            <th style="width:10%" class="text-center">แก้ไขล่าสุด</th>
                                            <th style="width:10%" class="text-center">ดูเอกสาร</th>
                                            <th style="width:10%" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(@count($rows) >0)
                                            @foreach(@$rows as $key => $row)
                                                @php $sentby = \App\Models\Backend\user::where('id',$row->sent_by)->first(); @endphp
                                                @php $createdby = \App\Models\Backend\user::where('id',$row->created_by)->first(); @endphp
                                                <tr role="row" class="odd" data-row="{{ $key + 2 }}" data-id="{{ $row->id }}">
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">{{$row->type}}</td>
                                                    <td class="text-center">{{substr($row->created,0,10)}}</td>
                                                    <td class="text-center">{{$createdby->name}}</td>
                                                    <td class="text-center">@if($sentby) {{$sentby->name}} @endif</td>
                                                    <td class="text-center">{{$row->sent}}</td>
                                                    <td class="text-center">{{substr($row->updated,0,10)}}</td>
                                                    <td class="text-center"><button class="btn btn-info" id="btn_showDoc" value="" onClick="showDoc({{$row->id}})">ดูเอกสาร</button></td>
                                                    <td class="text-center"><button class="btn btn-info" id="btn_adddoc" value="" onClick="addDoc('{{$row->type}}',{{$row->id}})">เพิ่มไฟล์เอกสาร</button></td>
                                                    <td class="text-center"><button class="btn btn-success" style="white-space: nowrap;" id="btn_submitDetail" onClick="submitDetail({{$row->id}})" >บันทึกเวลาส่ง</button></td>
                                                </tr>
                                            @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="8" style="text-align:center">ไม่มีข้อมูล</td>
                                                </tr>
                                            @endif
                                        
                                        </tbody>
                                    </table>

                                        <input type="text" value="{{$segment}}" id="segment" hidden>
                                        <input type="text" value="{{$folder}}" id="folder" hidden>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="card" id="div_show" hidden>
                        <div class="card-body">
                            <div id="showdoc"></div>
                        </div>
                    </div>

                        <div hidden class="card" id="addDoc">
                            <div class="body">
                                <div class="card-title">
                                <center>เพิ่มเอกสารรายการ<p id="showtype"></p>
                                </div>
                        <div>
                            <form action="webpanel/borderpass/borderpass_detail" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                                    @csrf
                                 <center><input type="file" id="fileupload" name="fileupload" style="width:500px;margin-bottom:15px" class="form-control" accept=".doc,.docx,application/msword,application/pdf">
                                <input type="text" hidden value="" id="detail_id" name="detail_id">
                                <input type="text" hidden value="{{$result->id}}" id="borderpass_id" name="borderpass_id">
                                <input type="text" hidden value="file" id="type" name="type">
                                <center><input type="submit" class="btn btn-success" value="เพิ่มเอกสาร"></center>
                            </form>
                        </div>

                            </div>
                        </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script>
        
    </script>
</div>
