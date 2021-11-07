var fullUrl = window.location.origin + '/webpanel/pinkcard';

// Table
var oTable;
var segment = $('#segment').val();
var folder = $('#folder').val();
$(function () {
    oTable = $('#data-table').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: false,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        ajax: {
            url: fullUrl+"/datatable",
            data: function (d) {
                d.Like={};
                $('.myLike').each(function() {
                if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
                    d.Like[$(this).attr('name')] = $.trim($(this).val());
                }
                });
                oData = d;
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0
            {data: 'created',    title :'วันที่',    className: 'text-center w30'}, // 1
            {data: 'name_th',    title :'ชื่อนายจ้าง',    className: 'text-center w30'}, //2
            {data: 'company_name',    title :'ที่อยู่',    className: 'text-center w30'}, //3
            {data: 'tel_number',    title :'เบอร์โทร',    className: 'text-center w30'}, //3
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'created_at',    title :'สถานที่ทำงาน',    className: 'text-center w30'}, //4
            {data: 'business',    title :'กิจการ',    className: 'text-center w30'}, //4
            {data: 'type',    title :'รายการ',    className: 'text-center w30'}, //5
            {data: 'id',    title :'',    className: 'text-center w70'}, //5
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            // console.log(aData);
            $('td:eq(1)', nRow).html(''
            + aData['title_created'].substr(0,10)
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['address_th'], 
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            + aData['tel'], 
            ).addClass('input');

            $('td:eq(5)', nRow).html(''
            + aData['em_name']+' '+aData['em_surname'], 
            ).addClass('input');

            $('td:eq(6)', nRow).html(''
            + aData['address_th'], 
            ).addClass('input');

            $('td:eq(7)', nRow).html(''
            +aData['business'], 
            ).addClass('input');

            $('td:eq(8)', nRow).html(''
            +aData['type_name'],     
            ).addClass('input');
            
            $('td:eq(9)', nRow).html(''
            +'<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample'+dataIndex+'" aria-expanded="false" aria-controls="collapseExample">ดำเนินการ</button>'
            +'<div class="collapse" id="collapseExample'+dataIndex+'"><a style="width:70%;margin:5px 0px" href="'+segment+'/'+folder+'/detail/'+aData["borderpass_id"]+'"class="btn btn-sm btn-success">ดูข้อมูล</a></div>'
            +'<div class="collapse" id="collapseExample'+dataIndex+'"><a style="width:70%;margin:5px 0px" href="'+segment+'/'+folder+'/edit/'+aData["borderpass_id"]+'"class="btn btn-sm btn-success">แก้ไขข้อมูล</a></div>'
            ).addClass('input');
        }
    });
    oTable = $('#data-table-workpermit').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: false,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        ajax: {
            url: fullUrl+"/datatable_workpermit",
            data: function (d) {
                d.Like={};
                $('.myLike').each(function() {
                if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
                    d.Like[$(this).attr('name')] = $.trim($(this).val());
                }
                });
                oData = d;
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0
            {data: 'created',    title :'วันที่',    className: 'text-center w30'}, // 1
            {data: 'name_th',    title :'ชื่อนายจ้าง',    className: 'text-center w30'}, //2
            {data: 'company_name',    title :'ที่อยู่',    className: 'text-center w30'}, //3
            {data: 'tel_number',    title :'เบอร์โทร',    className: 'text-center w30'}, //3
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'created_at',    title :'สถานที่ทำงาน',    className: 'text-center w30'}, //4
            {data: 'business',    title :'กิจการ',    className: 'text-center w30'}, //4
            {data: 'type',    title :'สถานะ',    className: 'text-center w30'}, //5
            {data: 'id',    title :'',    className: 'text-center w70'}, //5
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            // console.log(aData);
            $('td:eq(1)', nRow).html(''
            + aData['title_created'].substr(0,10)
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['address_th'], 
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            + aData['tel'], 
            ).addClass('input');

            $('td:eq(5)', nRow).html(''
            + aData['em_name']+' '+aData['em_surname'], 
            ).addClass('input');

            $('td:eq(6)', nRow).html(''
            + aData['address_th'], 
            ).addClass('input');

            $('td:eq(7)', nRow).html(''
            +aData['business'], 
            ).addClass('input');

            $('td:eq(8)', nRow).html(''
            +aData['type_name'],     
            ).addClass('input');
            
            $('td:eq(9)', nRow).html(''
            +'<button class="btn btn-primary" type="button">ดูเอกสาร</button>'
            ).addClass('input');
        }
    });
    
    oTable = $('#data-table-visa').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: false,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        dom: 'Bfrtip',
        buttons: [
            {
              extend: 'excel',
              filename: 'ข้อมูลผู้ใช้ระบบ',
              title: 'ข้อมูลผู้ใช้ระบบ',
              className:'btn btn-success',
              exportOptions: {
                columns: ':visible',
                stripHtml: true,
                //columns: [ 0, 1,2,3,4]
              },
            },
          ],

        ajax: {
            url: fullUrl+"/datatable_visa",
            data: function (d) {
                d.Like={};
                $('.myLike').each(function() {
                if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
                    d.Like[$(this).attr('name')] = $.trim($(this).val());
                }
                });
                oData = d;
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'passport_number',    title :'เลขพาส',    className: 'text-center w30'}, //4
            {data: 'country',    title :'สัญชาติ',    className: 'text-center w30'}, //4
            {data: 'visa_status',    title :'ไปได้/ไม่ได้',    className: 'text-center w30'}, //5
            {data: 'visa_note',    title :'หมายเหตุ',    className: 'text-center w70'}, //5 
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            // console.log(aData);
            $('td:eq(1)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['passport_number'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['country'], 
            ).addClass('input');

            option1 = '<option value="ไม่ได้">ไม่ได้</option>';
            option2 = '<option value="ไปได้">ไปได้</option>';

            if(aData['visa_status']=="ไม่ได้"){
               option1 = '<option value="ไม่ได้" selected>ไม่ได้</option>';
            }else if(aData['visa_status']=="ไปได้"){
               option2 = '<option value="ไปได้" selected>ไปได้</option>';
            }else{
                option1 ='<option hidden selected>เลือกสถานะ</option><option value="ไม่ได้">ไม่ได้</option>';
            }
            listdata = '<select OnClick="selectlist(\'#visa_status'+aData['title_id']+'\',\''+aData['title_id']+'\')" class="form-control" name="visa_status" id="visa_status'+aData['title_id']+'">'
                        +option1
                        +option2
                        +'</select>';
            $('td:eq(4)', nRow).html(''
            + listdata
            + '<input type="text" hidden name="old_status'+aData['title_id']+'" id="old_status'+aData['title_id']+'" value="'+aData['visa_status']+'">', 
            );

            if(aData['visa_note'] == null){
                aData['visa_note'] ="-";
            }
            $('td:eq(5)', nRow).html(''
            + aData['visa_note'], 
            ).addClass('input');
           
        }
    });
    oTable = $('#data-table-nationalproof').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: false,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        dom: 'Bfrtip',
        buttons: [
            {
              extend: 'excel',
              filename: 'ข้อมูลผู้ใช้ระบบ',
              title: 'ข้อมูลผู้ใช้ระบบ',
              className:'btn btn-success',
              exportOptions: {
                columns: ':visible',
                stripHtml: true,
                //columns: [ 0, 1,2,3,4]
              },
            },
          ],
        ajax: {
            url: fullUrl+"/datatable_nationalproof",
            data: function (d) {
                d.Like={};
                $('.myLike').each(function() {
                if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
                    d.Like[$(this).attr('name')] = $.trim($(this).val());
                }
                });
                oData = d;
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'passport_number',    title :'เลขพาส',    className: 'text-center w30'}, //4
            {data: 'country',    title :'สัญชาติ',    className: 'text-center w30'}, //4
            {data: 'nationalproof_status',    title :'ไปได้/ไม่ได้',    className: 'text-center w30'}, //5
            {data: 'nationalproof_note',    title :'หมายเหตุ',    className: 'text-center w70'}, //5 
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            // console.log(aData);
            $('td:eq(1)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['passport_number'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['country'], 
            ).addClass('input');

            option1 = '<option value="ไม่ได้">ไม่ได้</option>';
            option2 = '<option value="ไปได้">ไปได้</option>';

            if(aData['nationalproof_status']=="ไม่ได้"){
               option1 = '<option value="ไม่ได้" selected>ไม่ได้</option>';
            }else if(aData['nationalproof_status']=="ไปได้"){
               option2 = '<option value="ไปได้" selected>ไปได้</option>';
            }else{
                option1 ='<option hidden selected>เลือกสถานะ</option><option value="ไม่ได้">ไม่ได้</option>';
            }
            listdata = '<select OnClick="selectlist(\'#nationalproof_status'+aData['title_id']+'\',\''+aData['title_id']+'\')" class="form-control" name="nationalproof_status" id="nationalproof_status'+aData['title_id']+'">'
                        +option1
                        +option2
                        +'</select>';
            $('td:eq(4)', nRow).html(''
            + listdata
            + '<input type="text" hidden name="old_status'+aData['title_id']+'" id="old_status'+aData['title_id']+'" value="'+aData['nationalproof_status']+'">', 
            );

            if(aData['nationalproof_note'] == null){
                aData['nationalproof_note'] ="-";
            }
            $('td:eq(5)', nRow).html(''
            + aData['nationalproof_note'], 
            ).addClass('input');
           
        }
    });
    oTable = $('#data-table-pinkcard').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: false,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        dom: 'Bfrtip',
        buttons: [
            {
              extend: 'excel',
              filename: 'ข้อมูลผู้ใช้ระบบ',
              title: 'ข้อมูลผู้ใช้ระบบ',
              className:'btn btn-success',
              exportOptions: {
                columns: ':visible',
                stripHtml: true,
                //columns: [ 0, 1,2,3,4]
              },
            },
          ],
        ajax: {
            url: fullUrl+"/datatable_pinkcard",
            data: function (d) {
                d.Like={};
                $('.myLike').each(function() {
                if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
                    d.Like[$(this).attr('name')] = $.trim($(this).val());
                }
                });
                oData = d;
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'passport_number',    title :'เลขพาส',    className: 'text-center w30'}, //4
            {data: 'country',    title :'สัญชาติ',    className: 'text-center w30'}, //4
            {data: 'pinkcard_status',    title :'ไปได้/ไม่ได้',    className: 'text-center w30'}, //5
            {data: 'pinkcard_note',    title :'หมายเหตุ',    className: 'text-center w70'}, //5 
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            // console.log(aData);
            $('td:eq(1)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['passport_number'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['country'], 
            ).addClass('input');

            option1 = '<option value="ไม่ได้">ไม่ได้</option>';
            option2 = '<option value="ไปได้">ไปได้</option>';

            if(aData['pinkcard_status']=="ไม่ได้"){
               option1 = '<option value="ไม่ได้" selected>ไม่ได้</option>';
            }else if(aData['pinkcard_status']=="ไปได้"){
               option2 = '<option value="ไปได้" selected>ไปได้</option>';
            }else{
                option1 ='<option hidden selected>เลือกสถานะ</option><option value="ไม่ได้">ไม่ได้</option>';
            }
            listdata = '<select OnClick="selectlist(\'#pinkcard_status'+aData['title_id']+'\',\''+aData['title_id']+'\')" class="form-control" name="pinkcard_status" id="pinkcard_status'+aData['title_id']+'">'
                        +option1
                        +option2
                        +'</select>';
            $('td:eq(4)', nRow).html(''
            + listdata
            + '<input type="text" hidden name="old_status'+aData['title_id']+'" id="old_status'+aData['title_id']+'" value="'+aData['pinkcard_status']+'">', 
            );

            if(aData['pinkcard_note'] == null){
                aData['pinkcard_note'] ="-";
            }
            $('td:eq(5)', nRow).html(''
            + aData['pinkcard_note'], 
            ).addClass('input');
           
        }
    });
    oTable = $('#data-table-health').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: false,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        ajax: {
            url: fullUrl+"/datatable_health",
            data: function (d) {
                d.Like={};
                $('.myLike').each(function() {
                if( $.trim($(this).val()) && $.trim($(this).val()) != '0' ){
                    d.Like[$(this).attr('name')] = $.trim($(this).val());
                }
                });
                oData = d;
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0 
            {data: 'name_th',    title :'ชื่อนายจ้าง',    className: 'text-center w30'}, //2 
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'country',    title :'สัญชาติ',   className: 'text-center w30'}, //4
            // {data: 'amount',    title :'จำนวน',    className: 'text-center w30'}, //4
            {data: 'inspector',    title :'สถานที่ตรวจ',    className: 'text-center w30'}, //4
            {data: 'insurance_period',    title :'ระยะเวลาประกัน',    className: 'text-center w30'}, //4
            {data: 'insurance_create',    title :'เริ่ม',    className: 'text-center w30'}, //4
            {data: 'insurance_expire',    title :'หมด',    className: 'text-center w30'}, //4
            {data: 'insurance_right',    title :'โรงพยาบาล',    className: 'text-center w30'}, //5
            {data: 'id',    title :'',    className: 'text-center w30'}, //5
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            // console.log(aData);
            $('td:eq(1)', nRow).html(''
            + aData['name_th'].substr(0,10)
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            +aData['em_name']+'  '+aData['em_surname'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['country'], 
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            // + aData['amount'], 
            ).addClass('input');

            $('td:eq(5)', nRow).html(''
            + aData['inspector'], 
            ).addClass('input');

            $('td:eq(6)', nRow).html(''
            + aData['insurance_period'], 
            ).addClass('input');

            $('td:eq(7)', nRow).html(''
            + aData['insurance_create'],
            ).addClass('input');

            $('td:eq(8)', nRow).html(''
            + aData['insurance_expire'],
            ).addClass('input');
            
            $('td:eq(9)', nRow).html(''
            + aData['insurance_right'],
            ).addClass('input');
            
            $('td:eq(9)', nRow).html(''
            +'<button class="btn btn-primary" type="button" OnClick="formHealth('+aData['title_id']+')" >ดูรายละเอียด</button>'
             ).addClass('input');
        }
    });
    $('.myWhere,.myLike,.myCustom,#onlyTrashed').keyup('change', function(e){
        oTable.draw();
    });

    
    // console.log($("#select_ep_th").val());
    $("#workplace_province_id_edit").html($("#select_ep_th").val());
    $("#workplace_district_id_edit").html($("#select_ed_th").val());
    $("#workplace_subdistrict_id_edit").html($("#select_esd_th").val());

});


$('#select_employer').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    // alert($("#select_employer").val());
    $.ajax({
        url:'/ajax/get_employee',
        method:"post",
        dataType:'html',
        data:{
            'id':$('#select_employer').val(),
        },
        success:function(result){
            // alert(result);
            $("#select_employee").html(result);
        },
        error: function(xhr, status, error) {
            alert("error"); 
          }
    })
})

$('#select_employee').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    // alert($("#select_employer").val());
    $.ajax({
        url:'/ajax/get_formdata',
        method:"get",
        dataType:'json',
        data:{
            'employee_id':$('#select_employee').val(),
            'employer_id':$('#select_employer').val(),
        },
        success:function(result){
            rowe = result.resulte;
            rowr = result.resultr;
            // console.log(rowe);
            console.log(rowe);
            // console.log(rowe['m_prefix']);
            // console.log(rowr["id_card"]);
            if(rowe['type']=="person"){
                $("#type_person").prop("checked", true);
            }else{
                $("#type_office").prop("checked",true);
            }
            $("#id_card").val(rowr["id_card"]);
            $("#name_th").val(rowr["name_th"]);
            $("#surname_th").val(rowr["surname_th"]);
            $("#nickname_th").val(rowr["nickname_th"]);
            $("#prefix_th").val(rowr["prefix_th"]);
            $("#prefix_en").val(rowr["prefix_en"]);
            $("#company_name").val(rowr["company_name"]);
            $("#legal_number").val(rowr["legal_number"]);
            $("#name_en").val(rowr["name_en"]);
            $("#surname_en").val(rowr["surname_en"]);
            $("#nickname_en").val(rowr["nickname_en"]);
            $("#address_th").val(rowr["address_th"]);
            $("#address_en").val(rowr["address_en"]);
            $("#group_th").val(rowr["group_th"]);
            $("#group_en").val(rowr["group_en"]);
            $("#road_th").val(rowr["road_th"]);
            $("#road_en").val(rowr["road_en"]);
            $("#province").html(result.select_p_th);
            $("#subdistrict").html(result.select_sd_th);
            $("#district").html(result.select_d_th);
            $("#province_en").val(result.select_p_en);
            $("#district_en").val(result.select_d_en);
            $("#subdistrict_en").val(result.select_sd_en);
            $("#zipcode").val(rowr["zipcode"]);
            $("#zipcode_en").val(rowr["zipcode"]);
            $("#tel_number").val(rowr["tel_number"]);
            $("#email").val(rowr["email"]);

            $("#prefix").val(rowe["prefix"]);
            $("#name").val(rowe["name"]);
            $("#surname").val(rowe["surname"]);
            $("#nickname").val(rowe["nickname"]);
            $("#gender").val(rowe["gender"]);
            $("#b_date").val(rowe["b_date"]);
            $("#age").val(rowe["age"]);
            $("#b_place").val(rowe["b_date"]);
            $("#em_tel_number").val(rowe["tel_number"]);

            // $("#couple_status").val(rowe["couple_status"]);
            
            if(rowe["couple_status"]=="โสด"){
                $("#couple_1").prop("checked", true);
            }
            else if(rowe["couple_status"]=="สมรส"){
                $("#couple_2").prop("checked", true);
            }
            else if(rowe["couple_status"]=="หย่า"){
                $("#couple_3").prop("checked", true);
            }
            else if(rowe["couple_status"]=="หม้าย"){
                $("#couple_4").prop("checked", true);
            }
            $("#business").val(rowe["business"]);
            $("#e_position").val(rowe["position"]);
            
            if(rowe["workplace_type"]=="0"){
                $("#workplace_1").prop("checked", true);
            }
            else if(rowe["workplace_type"]=="1"){
                $("#workplace_2").prop("checked", true);
            }

            $("#e_address_th").val(rowe["address_th"]);
            $("#e_group_th").val(rowe["group_th"]);
            $("#e_road_th").val(rowe["road_th"]);
            $("#e_address_en").val(rowe["address_en"]);
            $("#e_group_en").val(rowe["group_en"]);
            $("#e_road_en").val(rowe["road_en"]);

            $("#e_zipcode").val(rowe["zipcode"]);
            $("#ezipcode").val(rowe["zipcode"]);
            
            $("#e_province_id").html(result.select_ep_th);
            $("#e_district_id").html(result.select_ed_th);
            $("#e_subdistrict_id").html(result.select_esd_th);
            
            $("#e_province_en").val(result.select_ep_en);
            $("#e_district_en").val(result.select_ed_en);
            $("#e_subdistrict_en").val(result.select_esd_en);

            $("#e_zipcode_th").val(rowe["e_zipcode"]);
            $("#e_zipcode_en").val(rowe["e_zipcode"]);
            $("#m_prefix").val(rowe["m_prefix"]);
            $("#m_name").val(rowe["m_name"]);
            $("#m_surname").val(rowe["m_surname"]);
            $("#f_prefix").val(rowe["f_prefix"]);
            $("#f_name").val(rowe["f_name"]);
            $("#f_surname").val(rowe["f_surname"]);

            if(rowe["passport_type"]=="ไม่มีหนังสือเดินทาง"){
                $("#passport_1").prop("checked", true);
            }
            else if(rowe["workplace_type"]=="Passport"){
                $("#passport_2").prop("checked", true);
            }
            else if(rowe["workplace_type"]=="BorderPass"){
                $("#passport_3").prop("checked", true);
            }

            $("#passport_number").val(rowe["passport_number"]);
            $("#passport_place").val(rowe["passport_place"]);
            $("#passport_country").val(rowe["passport_country"]);
            $("#passport_create").val(rowe["passport_create"]);
            $("#passport_expire").val(rowe["passport_expire"]);
            $("#permit_number").val(rowe["permit_number"]); 
            $("#permit_create").val(rowe["permit_create"]);
            $("#permit_expire").val(rowe["permit_expire"]);

            $("#employee_id").val(rowe["id"]);
            $("#employer_id").val(rowr["id"]);
        }
    })
})

$('#province').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){
        var province_id = $(this).val();
        var _token = $('#_token').val();
        $('[name="zipcode"]').val('');
        $('[name="subdistrict"]').val('กรุณาเลือกตำบล');
        $.ajax({
            url:'/ajax/get_distirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {   
                
                $("#district").html(result);
            }
        })
        $.ajax({
            url:'/ajax/get_province_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#province_en").val(result);
            }
        })
        }
    }
)


$('#district').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var district_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_subdistirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result){
                $("#subdistrict").html(result);
            },
            error: function(xhr, status, error) {
                alert("error");
                $("#subdistrict").html(xhr.responseText);
              }
            
        })
        $.ajax({
            url:'/ajax/get_district_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#district_en").val(result);
            }
        })
        }
    }
),

$('#subdistrict').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var subdistrict_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_zipcode',
            method:"get",
            dataType: 'json',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result){
                $('#zipcode').val(result);
                $('#zipcode_en').val(result);
            },
            error: function(xhr, status, error) {
                // alert("error");
                $('#zipcode').val(result);
                $('#zipcode_en').val(result);
              }
            
        })
        $.ajax({
            url:'/ajax/get_subdistrict_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#subdistrict_en").val(result);
            }
        })
        }
    }
),


$('#province_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){
        var province_id = $(this).val();
        var _token = $('#_token').val();
        $('[name="zipcode"]').val('');
        $('[name="subdistrict_edit"]').val('กรุณาเลือกตำบล');
        $.ajax({
            url:'/ajax/get_distirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {   
                
                $("#district_edit").html(result);
            }
        })
        $.ajax({
            url:'/ajax/get_province_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#p_en").val(result);
            }
        })
        }
    }
)


$('#district_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var district_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_subdistirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result){
                $("#subdistrict_edit").html(result);
            },
            error: function(xhr, status, error) {
                alert("error");
              }
            
        })
        $.ajax({
            url:'/ajax/get_district_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#d_en").val(result);
            }
        })
        }
    }
),

$('#subdistrict_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var subdistrict_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_zipcode',
            method:"get",
            dataType: 'json',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result){
                $('#zipcode').val(result);
                $('#zipcode_en').val(result);
            },
            error: function(xhr, status, error) {
                alert("error");
              }
            
        })
        $.ajax({
            url:'/ajax/get_subdistrict_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#sd_en").val(result);
            }
        })
        }
    }
),


$('#province_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){
        var province_id = $(this).val();
        var _token = $('#_token').val();
        $('[name="zipcode"]').val('');
        $('[name="subdistrict_edit"]').val('กรุณาเลือกตำบล');
        $.ajax({
            url:'/ajax/get_distirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {   
                
                $("#district_edit").html(result);
            }
        })
        $.ajax({
            url:'/ajax/get_province_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#p_en").val(result);
            }
        })
        }
    }
)


$('#district_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var district_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_subdistirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result){
                $("#subdistrict_edit").html(result);
            },
            error: function(xhr, status, error) {
                alert("error");
              }
            
        })
        $.ajax({
            url:'/ajax/get_district_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#d_en").val(result);
            }
        })
        }
    }
),

$('#subdistrict_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var subdistrict_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_zipcode',
            method:"get",
            dataType: 'json',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result){
                $('#zipcode').val(result);
                $('#zipcode_en').val(result);
            },
            error: function(xhr, status, error) {
                alert("error");
              }
            
        })
        $.ajax({
            url:'/ajax/get_subdistrict_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#sd_en").val(result);
            }
        })
        }
    }
),



$('#workpalce_province_id_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){
        var province_id = $(this).val();
        // alert(province_id);
        var _token = $('#_token').val();
        $('[name="zipcode"]').val('');
        $('[name="workplace_district_id_edit"]').val('กรุณาเลือกตำบล');
        $.ajax({
            url:'/ajax/get_distirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {   
                
                $("#workplace_district_id_edit").html(result);
            }
        })
        $.ajax({
            url:'/ajax/get_province_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':province_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#w_ep_en").val(result);
            }
        })
        }
    }
)


$('#workplace_district_id_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var district_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_subdistirct',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result){
                $("#workplace_subdistrict_id_edit").html(result);
            },
            error: function(xhr, status, error) {
                alert("error");
              }
            
        })
        $.ajax({
            url:'/ajax/get_district_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':district_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#w_ed_en").val(result);
            }
        })
        }
    }
),

$('#workplace_subdistrict_id_edit').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(this).val()!=''){

        var subdistrict_id = $(this).val();
        var _token = $('#_token').val();
        $.ajax({
            url:'/ajax/get_zipcode',
            method:"get",
            dataType: 'json',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result){
                $('#w_zipcode').val(result);
                $('#w_zipcode_en').val(result);
            },
            error: function(xhr, status, error) {
                alert("error");
              }
            
        })
        $.ajax({
            url:'/ajax/get_subdistrict_en',
            method:"get",
            dataType: 'html',
            data:{
                'id':subdistrict_id,
                '_token':_token,
            },
            success:function(result)
            {
                $("#w_esd_en").val(result);
            }
        })
        }
    }
),


$('#workplace_type').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var workplace = $('#workplace_type').val();
    if(workplace!=0){
        
        $("#workplace_province").val($("#province").val());
        $("#workplace_district").val($("#district").val());
        $("#workplace_subdistrict").val($("#subdistrict").val());
        $("#workplace_zipcode").val($("#zipcode").val());

        $("#workplace_province_en").val($("#province_en").val());
        $("#workplace_district_en").val($("#district_en").val());
        $("#workplace_subdistrict_en").val($("#subdistrict_en").val());
        $("#workplace_zipcode_en").val($("#zipcode_en").val());
    }    
})
function selectlist(name,id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(id);
    console.log($(name).val());
    // console.log($("#old_status"+id).val());
    if($(name).val()!= $("#old_status"+id).val() ){
        if(($(name).val()=="ไปได้" )||($(name).val()=="ไม่ได้")){
            $.ajax({ type: 'post', 
                url: "webpanel/pinkcard/setStatus",
                method:'post',
                data:{
                        'id':id,
                        'status':$(name).val(),
                        'type':$("#worktype").val(),
                    },
                success: function () {
                    alert("แก้ไขสถานะสำเร็จ");
                    window.location.href = "webpanel/pinkcard/"+$("#worktype").val();
                }
            });
        }else{
            console.log("กรุณาเลือกสถานะ");
        }
    }else{
        console.log("ค่าเดิม");
    }
}
function add_detail(){
    var status = $("#btn_add_detail").val();
    if(status == "true"){
        status = false;
    }else{
        status = true;
    }
    $('#add_detail').attr('hidden', status);
    $('#btn_add_detail').val(status);
}
function addDoc(type,id){
    detail_id = id;
    // alert(detail_id)
    $('#detail_id').val(detail_id);
    $('#addDoc').attr('hidden',false);
    $("#showtype").html(type);
}
function submitDetail(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({ type: 'post', 
        url: "webpanel/borderpass/borderpass_detail",
        method:'post',
        data:{
                'id':id,
                'type':'status',
            },
        success: function () {
            Swal.fire({
                title: "ยืนยันการบันทึกเวลาส่ง", 
                type: "Confirm",
                icon: "warning", 
                showCancelButton: true,
                preConfirm: () => {
                    Swal.fire({
                        title: "บันทึกเวลาสำเร็จ", 
                        type: "success",
                        icon: "Success", 
                    })
                    setTimeout(function(){
                        window.location.href = "webpanel/borderpass/borderpass_detail/"+$("#borderpass_id").val();
                    },1000);
                }
            
            })
        }
    });

}
function showDoc(id){
    $("#div_show").attr("hidden",false);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    // var id = $("#btn_showDoc").val();
    // alert(id);
    $.ajax({ type: 'post', 
        url: "webpanel/borderpass/showdoc",
        data:{
                'id':id,
            },
        success: function (res) {
            // alert(res);
                $("#showdoc").html(res);     
        }
    });
}
function formHealth (id){
    alert(id);
}
function check_add() {
    var role = $('#role').val();
    var status_check = $('#status_check').val();
    var name = $('#name').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();

    if (role == "") {
        toastr.error('กรุณาเลือกระดับของผู้ใช้งานนี้');
        return false;
    }
    if (status_check == "") {
        toastr.error('กรุณาเลือกสถานะการใช้งาน');
        return false;
    }
    if (name == "" || username == "" || password == "" || confirm_password == "") {
        toastr.error('กรุณากรอกข้อมูลให้ครบถ้วนก่อนบันทึกรายการ');
        return false;
    }
    if (password != confirm_password) {
        toastr.error('กรุณากรอกรหัสผ่านให้เหมือนกัน');
        return false;
    }
}
function confirm_check(id){
    $.ajax({ type: 'get', 
        url: "webpanel/borderpass/confirmcheck/"+id,
        success: function (res) {
                $("#formnote").html(res);     
        } 
    });
}
function formnote(id){
    $("#notes").attr("hidden",false);  
    $("#id").val(id);  
    $("#btn_form").attr("hidden",false);  
}
function note(id){
    $.ajax({ type: 'get', 
        url: "webpanel/borderpass/shownote/"+id,
        success: function (res) {
                $("#shownote").html(res);     
        } 
    });
}
function check_edit() {
    var role = $('#role').val();
    var status_check = $('#status_check').val();
    var name = $('#name').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    var resetpassword = $('#resetpassword').val();

    if (role == "") {
        toastr.error('กรุณาเลือกระดับของผู้ใช้งานนี้');
        return false;
    }
    if (status_check == "") {
        toastr.error('กรุณาเลือกสถานะการใช้งาน');
        return false;
    }
    if (name == "" || username == "") {
        toastr.error('กรุณากรอกข้อมูลให้ครบถ้วนก่อนบันทึกรายการ');
        return false;
    }
    if (password != confirm_password) {
        toastr.error('กรุณากรอกรหัสผ่านให้เหมือนกัน');
        return false;
    }
}


//== Script Ajax Regular ==
$('#resetpassword').change(function () {
    if ($(this).prop("checked") == true) {
        $('#password').attr('disabled', false);
        $('#confirm_password').attr('disabled', false);
    }
    else if ($(this).prop("checked") == false) {
        $('#password').attr('disabled', true);
        $('#confirm_password').attr('disabled', true);
        $('#password').val(null);
        $('#confirm_password').val(null);
    }
});

$('.show_pass').click(function () {
    var password = $('#password').attr('type');
    if (password == "password") {
        $('#password').attr('type', 'text');
    }
    else {
        $('#password').attr('type', 'password');
    }
});


$('.show_pass_confirm').click(function () {
    var confirm_password = $('#confirm_password').attr('type');
    if (confirm_password == "password") {
        $('#confirm_password').attr('type', 'text');
    }
    else {
        $('#confirm_password').attr('type', 'password');
    }
});
function status(ids)
{
    const $this = $(this), id = ids;
    // const $this = $(this), id = $(this).data('id');
    $.ajax({ type: 'get', url: fullUrl + '/status/' + id, success: function (res) { if (res == false) { $(this).prop('checked', false) } } });
}
// $('.status').on('click', function () {
    // const $this = $(this), id = $(this).data('id');
    // $.ajax({ type: 'get', url: fullUrl + '/status/' + id, success: function (res) { if (res == false) { $(this).prop('checked', false) } } });
// })
$('#selectAll').on('click', function () {
    if ($(this).is(':checked')) { $('#delSelect').prop('disabled', false); $('.ChkBox').prop('checked', true) } else { $('#delSelect').prop('disabled', true); $('.ChkBox').prop('checked', false) }
})
$('.ChkBox').click(function () {
    const checked = []; const $this = $(this).prop("checked");
    $('.ChkBox').each(function () { if ($(this).is(':checked')) { checked.push($this) } })
    if (checked.length > 0) { $('#delSelect').prop('disabled', false); } else { $('#delSelect').prop('disabled', true); }
})
function deleteItem(ids)
{
    const id = [ids];
    if (id.length > 0) { destroy(id) }
}
$('.deleteItem').on('click', function () {
    const id = [$(this).data('id')];
    if (id.length > 0) { destroy(id) }
})
$('#delSelect').on('click', function () {
    const id = $('.ChkBox:checked').map(function () { return $(this).val() }).get();
    console.log(id);
    if (id.length > 0) { destroy(id) }
});
function destroy(id) {
    Swal.fire({
        title: "ลบข้อมูล", text: "คุณต้องการลบข้อมูลใช่หรือไม่?", icon: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch(fullUrl + '/destroy?id=' + id)
                .then(response => response.json())
                .then(data => location.reload())
                .catch(error => { Swal.showValidationMessage(`Request failed: ${error}`) })
        }
    });
}



