var fullUrl = window.location.origin + '/webpanel/home';

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
            {data: 'em_name',    title :'ชื่อลูกจ้าง',    className: 'text-center w30'}, //3
            {data: 'passport_number',    title :'เลขพาส',    className: 'text-center w30'}, //3
            {data: 'type',    title :'ประเภท',    className: 'text-center w30'}, //4
            {data: 'business',    title :'วันเริ่มรายงานตัว',    className: 'text-center w30'}, //4
            {data: 'notes',    title :'หมายเหตุ',    className: 'text-center w30'}, //5
            {data: 'id',    title :'',    className: 'text-center w70'}, //5
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            console.log(aData);
            $('td:eq(1)', nRow).html(''
            + aData['title_created'].substr(0,10)
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            + aData['tel'], 
            ).addClass('input');

            $('td:eq(5)', nRow).html(''
            + aData['em_name']+' '+aData['em_surname'], 
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
    oTable = $('#data-table-report').DataTable({
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
            url: fullUrl+"/datatable_report",
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
            {data: 'created',    title :'วันที่รายงานตัว',    className: 'text-center w30'}, // 1
            {data: 'created',    title :'วันที่รายงานตัวครั้งต่อไป',    className: 'text-center w30'}, // 1
            {data: 'name_th',    title :'ชื่อนายจ้าง',    className: 'text-center w30'}, //2
            {data: 'tel_number',    title :'เบอร์โทร',    className: 'text-center w30'}, //3
            {data: 'name_th',    title :'ชื่อคนงาน',    className: 'text-center w30'}, //4
            {data: 'created_at',    title :'สถานที่ทำงาน',    className: 'text-center w30'}, //4
            {data: 'business',    title :'กิจการ',    className: 'text-center w30'}, //4
            {data: 'type',    title :'รายการ',    className: 'text-center w30'}, //5
            {data: 'id',    title :'',    className: 'text-center w70'}, //5
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            console.log(aData);
            $('td:eq(1)', nRow).html(''
            + aData['report_date'].substr(0,10)
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['report_expire'].substr(0,10)
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            +aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
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

    $('.myWhere,.myLike,.myCustom,#onlyTrashed').keyup('change', function(e){
        oTable.draw();
    });

});

$('#select_employer').change(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    // alert($("#select_employer").val());
    $.ajax({
        url:'/ajax/get_data_employee',
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
        url:'/ajax/get_data_formdata',
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
$(document).on('change','input', '#employer_name', function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'webpanel/home/get_employer',
        method:"post",
        data:{
            'name_th':$(this).val(),
        },
        success:function(result){
			$("#employer_id").val(result[0].id);

            $.ajax({
                url:'webpanel/home/get_employee',
                method:"post",
                data:{
                    'id':result[0].id,
                },
                success:function(result){
                    $("#employee_name").html("<option hidden value=''>");
                    console.log(result)
                    data="";
                    for(i=0;i<result.length;i++){
                        data += "<option value='"+result[i].name+"'>"
                    }
                    $("#employee_name").html(data);
                },
            })
        },
    })
})
$(document).on('change','input', '#employee_name', function(){
    $.ajax({
        url:'webpanel/home/employee_data',
        method:"post",
        data:{
            'name_th':$(this).val(),
            'employer_id':$("#employer_id").val(),
        },
        success:function(result){
            console.log(result)
            $("#title_id").val(result.id);
            $("#employee_id").val(result.employee_id);
            $("#passport_number").val(result.passport_number);
        }
    })
})
$("#select_period").change(function(){
    if($(this).val()=="1"){
        period = "7"
        typename = "Borderpass"   
    }else if($(this).val()=="2"){
        period = "30"
        typename = "Borderpass"
    }else if($(this).val()=="3"){
        period = "90"
        typename = "Passport"
    }else if($(this).val()=="4"){
        period = "90"
        typename = "ต่างจังหวัด"
    }
    $("#period").val(period)
    $("#typename").val(typename)
})
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



