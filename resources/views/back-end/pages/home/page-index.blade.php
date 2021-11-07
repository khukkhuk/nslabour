<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ข้อมูลรายงานตัว</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลรายงานตัว </li>
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

                                    <h4 class="card-title">ข้อมูลรายงานตัวทั้งหมด</h4>
                                    
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
                                            {{-- <a class="btn btn-danger btn-sm mt-1" href="javascript:void(0);" type="reset" id="delSelect" disabled><i class="bx bx-mibx bx-selectionnus font-size-16 align-middle mr-1"></i> ลบข้อมูล</a> --}}
                                        </div>
                                    </div>
                                    
                                    <table id="sort_table" class="table table-striped table-bordered dt-responsive nowrap" style="text-align:center ;border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="width:1%" class="text-center">#</th>
                                            <th style="width:10%" class="text-center">จำนวนวันที่เหลือ</th>
                                            <th style="width:10%">วันที่รายงานตัว</th>
                                            <th style="width:10%" class="text-center">รายงานตัวครั้งถัดไป</th>
                                            <th style="width:10%" class="text-center">ชื่อนายจ้าง</th>
                                            <th style="width:10%" class="text-center">ชื่อลูกจ้าง</th>
                                            <th style="width:10%" class="text-center">เบอร์โทร</th>
                                            <th style="width:10%" class="text-center">กิจการ</th>
                                            <th style="width:10%" class="text-center">รายการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(@$rows)
                                                @php $i = 0; @endphp
                                            @foreach(@$rows as $key => $row)
                                            @php
                                                $i++;
                                                $report_date = $row->report_date;
                                                $report_expire = $row->report_expire;
                                                $date_ = date("Y-m-d");
                                                $diff = strtotime($report_expire) - strtotime($date_) ;
                                                if($diff < 1){
                                                    $date_report = "เกินระยะเวลาที่กำหนด";
                                                }else{
                                                    $date_report = ceil(abs($diff / 86400));
                                                }
                                                if($date_report =="เกินระยะเวลาที่กำหนด"){
                                                    $style = "white-space:nowrap;background-color:red;padding:3px;color:white;border-radius:12px;width:auto;height:25px";
                                                }
                                                elseif($date_report >14){
                                                    $style = "white-space:nowrap;background-color:green;padding:3px;color:white;border-radius:12px;width:auto;height:25px";
                                                }
                                                elseif($date_report <= 14){
                                                    $style = "white-space:nowrap;background-color:red;padding:3px;color:white;border-radius:12px;width:auto;height:25px";
                                                }
                                                
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><center><p style="{{$style}}">
                                                @if($date_report < 1)
                                                        เกินระยะเวลาที่กำหนด
                                                @else
                                                        {{$date_report}} วัน
                                                @endif
                                                    </p></td>
                                                <td>{{$row->report_date}}</td>
                                                <td>{{$row->report_expire}}</td>
                                                <td>{{$row->name_th}} {{$row->surname_th}}</td>
                                                <td>{{$row->em_name}} {{$row->em_surname}}</td>
                                                <td>{{$row->tel}}</td>
                                                <td>{{$row->business}}</td>
                                                <td>{{$row->report_name}}</td>
                                            </tr>    
                                            @endforeach
                                            @endif
                                        
                                        </tbody>
                                    </table> 
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
    <script>
        
    </script>
</div>
