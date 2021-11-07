var fullUrl = window.location.origin + '/webpanel/employee';

// Table
var oTable;
var segment = $('#segment').val();
var folder = $('#folder').val();
$(function () {
num = 1;
textbox = "";
    var employer_id = ($("#employer_id").val());
    oTable = $('#data-table').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
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
            // url: "webpanel/customer/datatable_employee/<?php echo $_GET['id'];?>",
            url: "webpanel/employee/datatable/"+employer_id,
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
            {data: 'name',    title :'ชื่อ-นามสกุล',    className: 'text-center w70'}, // 1
            {data: 'gender',    title :'เพศ',    className: 'text-center w70'}, //2
            {data: 'age',    title :'อายุ',    className: 'text-center w30'}, //3
            {data: 'tel_number',    title :'เบอร์โทรศัพท์',    className: 'text-center w30'}, //3
            // {data: 'follower',    title :'ผู้ติดตาม',    className: 'text-center w30'}, //4
            // {data: 'status',    title :'สถานะ',    className: 'text-center w30'}, //5
            {data: 'id', title :'จัดการ', className: 'text-center w30'}, //6
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            $('td:eq(1)', nRow).html(''
            + aData['prefix']+aData['name']+'  '+aData['surname'], 
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['gender'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['age'], 
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            + aData['tel_number'], 
            ).addClass('input');


            $('td:eq(5)', nRow).html(''
            + aData['created_at'], 
            ).addClass('input');

            $('td:last-child', nRow).html(''
            // + ' <a href="'+segment+'/follower/index/'+aData["id"]+'" class="btn btn-sm btn-success">ข้อมูลผู้ติดตาม</a>'
            + ' <div class="btn btn-sm btn-success btn_employee" Onclick="sub_datatable('+aData["id"]+','+employer_id+')">ข้อมูลผู้ติดตาม</div>'
            + ' <a href="'+segment+'/'+folder+'/'+aData["id"]+'" class="btn btn-sm btn-info" title="Edit"><i class="far fa-edit"></i></a>'
        	+ ' <a href="javascript:" class="btn btn-sm btn-danger" onclick="deleteItem('+aData["id"]+')" data-id="'+aData["id"]+'" title="Edit"><i class="far fa-trash-alt"></i></a>'
			).addClass('input');
        }
    });
    $('.myWhere,.myLike,.myCustom,#onlyTrashed').on('change', function(e){
        oTable.draw();
    });
    
});
function sub_datatable(id){
    // alert(id);
    // $('#subdata-table').dataTable().fnDestroy();
    console.log("btn");
    btn_add='<a class="btn btn-info btn-sm mt-1" href="webpanel/follower/add/'+id+'"><i class="bx bx-plus font-size-16 align-middle mr-1"></i> เพิ่มข้อมูล</a>'
    $("#tag_subtable").html("<h4>ข้อมูลผู้ติดตาม</h4>")
    $("#add_subtable").html(btn_add);
    // tag_subtable
    oTable = $('#subdata-table').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
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
            // url: "webpanel/customer/datatable_employee/<?php echo $_GET['id'];?>",
            url: "webpanel/follower/datatable/"+id,
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
            {data: 'name',    title :'ชื่อ-นามสกุล',    className: 'text-center w70'}, // 1
            {data: 'updated',    title :'แก้ไขล่าสุด',    className: 'text-center w30'}, //3
            {data: 'id', title :'จัดการ', className: 'text-center w30'}, //6
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            $('td:eq(1)', nRow).html(''
            + aData['prefix']+aData['name']+'  '+aData['surname'], 
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['updated'].substr(0,10) 
            ).addClass('input');
 
            $('td:last-child', nRow).html(''
            + ' <a href="'+segment+'/follower/'+aData["id"]+'" class="btn btn-sm btn-info" title="Edit"><i class="far fa-edit"></i></a>'
        	+ ' <a href="javascript:" class="btn btn-sm btn-danger" onclick="deleteItem('+aData["id"]+')" data-id="'+aData["id"]+'" title="Edit"><i class="far fa-trash-alt"></i></a>'
			).addClass('input');
        },
        "bDestroy": true,
    });

}
function cancel(){
    $("#addfollower").empty();
    $("#addbtn").empty();
    num=1;
}
function addbtn(){
    btn = 
    '</div>'
    +'<div class="btn btn-info" onClick="addmore()">+</div>'
    +'</div>'
    $("#addbtn").html(btn);
}
function removetextbox(num){
    $("#row"+num).remove();
}
function addmore(){ 
        $('<div class="row" id="row'+num+'"><div class="col-md-12">'
        +'<div class="row">'
        +'<div class="form-group col-md-2">'
        +'<label for="position">คำนำหน้า</label>'
        +'<select class="form-control" name="fprefix'+num+'" id="position">'
        +'<option value="" hidden>กรุณาเลือก</option>'
        +'<option value="นาย">นาย</option>'
        +'<option value="นาง">นาง</option>'
        +'<option value="นางสาว">นางสาว</option>'
        +'</select>'
        +'</div>'
        +'<div class="form-group col-md-2">'
        +'<label for="position">ชื่อ</label>'
        +'<input class="form-control" value="'+num+'" name="fname'+num+'" type="text">'
        +'</div>'
        +'<div class="form-group col-md-2">'
        +'<label for="position">นามสกุล</label>'
        +'<input class="form-control" value="" name="fsurname'+num+'" type="text">'
        +'</div>'
        +'<div class="btn btn-danger" style ="margin-top:2.2%;height:35px" onClick="removetextbox('+num+')">ลบ</div>'
        +'</div></div></div>'
        ).appendTo('#addfollower');
        num++;
}

$('#btn_employee').click(function(){
    console.log("btn");
});
$('#province_id').change(function(){
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
                
                $("#district_id").html(result);
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


$('#district_id').change(function(){
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
                $("#subdistrict_id").html(result);
            },
            error: function(xhr, status, error) {
                alert("error");
                $("#subdistrict_id").html(xhr.responseText);
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

$('#subdistrict_id').change(function(){
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
            return fetch('/webpanel/follower/destroy/'+id)
                // .then(response => {  Swal.fire('Saved!', '', 'success')})
                .then(data => location.reload())
                .catch(error => { Swal.showValidationMessage(`Request failed: ${error}`) })
        }
    });
}



