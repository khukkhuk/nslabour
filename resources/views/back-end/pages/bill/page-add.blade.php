<div class="fadeOut">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">บันทึกบิลรายรับ</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url("$segment") }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item"><a href="{{ url("$segment/$folder") }}">ข้อมูลบิล</a></li>
                        <li class="breadcrumb-item">บันทึกบิลรายรับ</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


                                    <form id="menuForm" method="post" action="">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        @csrf
                                        <!-- <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                                        </div> 
                                        <hr>   -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="position">เลขที่ใบบิลรายาจ่าย</label>
                                                <input class="form-control" required type="text" name="bill_number"  id="bill_number"> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="position">วันที่ออกเอกสาร</label>
                                                <input class="form-control" required type="date" name="bill_date"  id="bill_date"> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">ชื่อสถานประกอบการ/ผู้ขาย</label>
                                                <input class="form-control" required type="text" name="company"  id="company" value="บริษัท เอ็น เอส เลเบอร์ จํากัด691 ถ.ท่าแฉลบ ต.ตลาด อ.เมือง จ.จันทบุรี 22000"> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tax ID</label>
                                                <input type="text" name="tax_id" id="tax_id" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">ชื่อลูกค้า</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">เบอร์โทร</label>
                                                <input type="text" name="tel_number" id="tel_number" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">หมายเหตุ</label>
                                                <textarea name="notes" id="notes" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">ผู้รับเงิน</label>
                                                <input type="text" name="payee" id="payee" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">ผู้จ่ายเงิน</label>
                                                <input type="text" name="payer" id="payer" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <hr>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

    <div class="col-12">
        <div class="card">
            <div class="card-body">
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-12">
                            
                            <button type="button" class="btn btn-info" OnClick="addbill()">เพิ่มข้อมูล</button>
                            <input type="number" hidden name="maxline" id="maxline" value="1">
                                <table style="width:100%" class="table text-center">
                                    <tr style="background-color:">
                                        <th style="width:5%">จำนวน</th>
                                        <th style="width:15%">รายการ</th>
                                        <th style="width:10%">หน่วยละ</th>
                                        <th style="width:10%">จำนวนเงิน</th>
                                    </tr>
                                    <tbody id="table-row">
                                        <tr>
                                            <td><input class="form-control amount" type="number" id="amount1" name="amount1" min="0" max="999"></td>
                                            <td><input type="text" hidden id="type1" name="type1">
                                                <input type="text" hidden id="type_name1" name="type_name1">
                                                <input type="text" hidden id="sort_data1" name="sort_data1">
                                                <select class="form-control selecttype" name="select_type1" id="select_type1">
                                                    <option value="" hidden>เลือกรายการ</option>
                                                    @foreach($rows as $row)
                                                        <option value="{{$row->id}}">{{$row->type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input class="form-control" type="text1" id="cost1"></td>
                                            <td><input class="form-control" type="text1" id="total_per1"></td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">ยอดรวม</label>
                                <input type="text" style="width:100%" class="form-control" name="total" id="total">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" hidden id="employer_id" name="employer_id">
                                <input type="text" hidden id="employee_id" name="employee_id">
                                <button class="btn btn-primary" type="submit" name="signup" value="Create">บันทึกข้อมูล</button>
                                <a class="btn btn-danger" href="{{url("$segment/$folder")}}">ยกเลิก</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="backend/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        
// function addbill(){
//     num = parseInt($("#maxline").val());
//     $("#maxline").val(num+1);
//     num = parseInt($("#maxline").val());
    
//     data =   '<tr><td><input class="form-control amount" type="number" id="amount'+num+'" name="amount'+num+'"></td>'
//             +'<td><input type="text" hidden value="" id="type'+num+' name="type'+num+'">'
//             +'<input type="text" hidden value="" id="type_name'+num+'" name="type_name'+num+'">'
//             // +'<select class="form-control selecttype" id="select_type'+num+'" name="select_type'+num+'">'+$("#select_type1").html()+'</select></td>'
//             +'<select class="form-control selecttype" id="select_type'+num+'" name="select_type'+num+'">'+$("#select_type1").html()+'</select></td>'
//             // +'<select class="select"></select></td>'
//             +'<td><input class="form-control" type="text" id="cost'+num+'" name="cost'+num+'"></td>'
//             +'<td><input class="form-control" type="text" id="total_per'+num+'" name="total_per'+num+'"></td></tr>';
//     $(data).appendTo($("#table-row"));
// }
// $(".selecttype").change(function (){
//     alert("c");
//     id = $(this).val();
//     sort = $(this).attr("id").substr(11,15);
//     $.ajax({ type: 'get', 
//         url: "webpanel/bill/getdata/"+id,
//         success: function (res) {
//             $("#cost"+sort).val(res['cost']);
//         } 
//     });
// })
// $(".amount").keyup(function(){
//         id = $(this).attr("id").substr(6,10);
//         $("#total_per"+id).val(parseInt($(this).val()) * parseInt($("#cost"+id).val()));
//         total="";
//         for(line = $("#maxline").val();0<line;line--){
//             total += parseInt($("#total_per"+line).val());
//             console.log(total);
//         }
//         $("#total").val(total)
// })
    </script>
</div>
