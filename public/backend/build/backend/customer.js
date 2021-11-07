var fullUrl = window.location.origin + '/webpanel/customer';

// Table
var oTable;
var segment = $('#segment').val();
var folder = $('#folder').val();
$(function () {
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
            url: "webpanel/customer/datatable",
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
            {data: 'prefix_th',    title :'ชื่อ-นามสกุล',    className: 'text-center w70'}, // 1
            {data: 'type',    title :'ชื่อผู้ใช้งาน',    className: 'text-center w70'}, //2
            {data: 'company_name',    title :'ชื่อบริษัท',    className: 'text-center w30'}, //3
            {data: 'id_card',    title :'เลขบัตรประชาชน',    className: 'text-center w30'}, //3
            {data: 'created_at',    title :'วันที่สร้าง',    className: 'text-center w30'}, //4
            // {data: 'status',    title :'สถานะ',    className: 'text-center w30'}, //5
            {data: 'id', title :'จัดการ', className: 'text-center w30'}, //6
        ],
        rowCallback: function (nRow, aData, dataIndex) {
            $('td:eq(1)', nRow).html(''
            + aData['prefix_th']+aData['name_th']+'  '+aData['surname_th'], 
            ).addClass('input');

            $('td:eq(2)', nRow).html(''
            + aData['type'], 
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            + aData['company_name'], 
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            + aData['id_card'], 
            ).addClass('input');


            $('td:eq(5)', nRow).html(''
            + aData['created_at'], 
            ).addClass('input');

            $('td:last-child', nRow).html(''
            + ' <a href="'+segment+'/employee/index/'+aData["id"]+'" class="btn btn-sm btn-success">ข้อมูลแรงงาน</a>'
            + ' <a href="'+segment+'/'+folder+'/'+aData["id"]+'" class="btn btn-sm btn-info" title="Edit"><i class="far fa-edit"></i></a>'
        	+ ' <a href="javascript:" class="btn btn-sm btn-danger" onclick="deleteItem('+aData["id"]+')" data-id="'+aData["id"]+'" title="Edit"><i class="far fa-trash-alt"></i></a>'
			).addClass('input');
        }
    });
    $('.myWhere,.myLike,.myCustom,#onlyTrashed').on('change', function(e){
        oTable.draw();
    });
});

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
            return fetch(fullUrl + '/destroy?id=' + id)
                .then(response => response.json())
                .then(data => location.reload())
                .catch(error => { Swal.showValidationMessage(`Request failed: ${error}`) })
        }
    });
}



