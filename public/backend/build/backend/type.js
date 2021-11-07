var fullUrl = window.location.origin + '/webpanel/type';


var oTable;
$(function () {
    oTable = $('#data-table').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: true,
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
            {data: 'type',    title :'ประเภท',    className: 'text-left w200'}, // 1
            {data: 'type_name',    title :'รายการ',    className: 'text-center w70'}, // 2
            {data: 'cost',    title :'ราคา/หน่วย',    className: 'text-center w70', orderable: false, searchable: false}, // 3
            {data: 'id',    title :'',    className: 'text-center w70', orderable: false, searchable: false}, // 4
            
        ],
        rowCallback: function (nRow, aData, dataIndex) {
           

            $('td:eq(1)', nRow).html(''
            +aData['type']
            ).addClass('input');
            
            $('td:eq(2)', nRow).html(''
            +aData['type_name']
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            +aData['cost']
            ).addClass('input');

            $('td:eq(4)', nRow).html(''
            +'<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample'+dataIndex+'" aria-expanded="false" aria-controls="collapseExample">ดำเนินการ</button>'
            +'<div class="collapse" id="collapseExample'+dataIndex+'"><a style="width:70%;margin:5px 0px" href="'+fullUrl+'/edit/'+aData['id']+'" disabled class="btn btn-sm btn-success">แก้ไขข้อมูล</a></div>'
            +'<div class="collapse" id="collapseExample'+dataIndex+'"><a style="width:70%;margin:5px 0px" href="'+fullUrl+'/type_detail/'+aData['id']+'" class="btn btn-sm btn-success">จัดการขั้นตอน</a></div>'
            ).addClass('input');

        }
    });
    oTable = $('#data-table-type_detail').DataTable({
        "sDom": "<'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
        processing: true,
        serverSide: true,
        stateSave: true,
        scroller: true,
        scrollCollapse: true,
        scrollX: true,
        ordering: true,
        // scrollY: ''+($(window).height()-370)+'px',
        iDisplayLength: 25,
        ajax: {
            url: fullUrl+"/datatable_type_detail",
            data:{id:$("#id").val(),
            },
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex',    title :'#',    className: 'text-center w10'}, // 0
            {data: 'name',    title :'รายการ',    className: 'text-left w200'}, // 1
            {data: 'cost',    title :'ราคา/หน่วย',    className: 'text-center w70', orderable: false, searchable: false}, // 3
            {data: 'id',    title :'',    className: 'text-center w70'}, // 4
            
        ],
        rowCallback: function (nRow, aData, dataIndex) {
           

            $('td:eq(1)', nRow).html(''
            +aData['name']
            ).addClass('input');
            
            $('td:eq(2)', nRow).html(''
            +aData['cost']
            ).addClass('input');

            $('td:eq(3)', nRow).html(''
            +'<div id="'+aData['id']+'" class="btn btn-info edit_detail">แก้ไขข้อมูล</div>'
            )

            
        }
    });
    $('.myWhere,.myLike,.myCustom,#onlyTrashed').on('change', function(e){
        oTable.draw();
    });
});


$('#add-type_detail').click(function(){
    if($('#form-add-detail').is(":hidden")){
        $('#form-add-detail').show();
    }else{
        $('#form-add-detail').hide();
    }
})

$(document).on('click', '.edit_detail', function(){
    id = $(this).attr("id");
    console.log(id)
    if(($('#form-edit-detail').is(":hidden"))||(id != $("#old_id").val())){
        $.ajax({ type: 'get', url: fullUrl + '/getdata/' + id, success: function (res){
            $("#type_name_edit").val(res.name);
            $("#price_edit").val(res.cost);
            $("#detail_id").val(res.id);
         } });
         $('#form-edit-detail').show();
         $('#old_id').val(id);
    }else{
        $('#form-edit-detail').hide();
    }
});
$('#position').on('change',function(){
    if($('option:selected',this).val()=='secondary'){ $('#_id').prop('selectedIndex',0).prop('disabled',false) }else{ $('#_id').prop('disabled',true) }
})

function check_add()
{
    var position = $('#position').val();
    var name = $('#name').val(); 
    var url = $('#url').val(); 
    if(position == "")
    {
        toastr.error('กรุณาเลือกตำแหน่งเมนู');
        return false;
    }
    if(name == "")
    {
        toastr.error('กรุณากรอกชื่อเมนู');
        return false;
    }
    if(url == "")
    {
        toastr.error('กรุณากรอกลิงค์เข้าเมนู');
        return false;
    }
}

//== Script Ajax Regular ==
$('#icon').on('keyup',function(){
    $('#icon-preview').find('i').removeAttr('class').addClass($(this).val());
});
function status(ids)
{
    const $this = $(this), id = ids;
    $.ajax({ type: 'get', url: fullUrl + '/status/' + id, success: function (res) { if (res == false) { $(this).prop('checked', false) } } });
}
function badge_status(ids)
{
    const $this = $(this), id = ids;
    $.ajax({type:'get',url:fullUrl+'/sub_status/'+id,success:function(res){if(res.value==true){$('#sub_status_'+id).html(res.text);}}});
}

$('.status').on('click', function () {
    const $this = $(this), id = $(this).data('id');
    $.ajax({ type: 'get', url: fullUrl + '/status/' + id, success: function (res) { if (res == false) { $(this).prop('checked', false) } } });
})
$('.badge-status').on('click',function(){
    const $this = $(this), id = $(this).data('id');
    $.ajax({type:'get',url:fullUrl+'/sub_status/'+id,success:function(res){if(res.value==true){$('#sub_status_'+id).html(res.text);}}});
})
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

function dragsort(id, from, to) {
    $.ajax({ url: fullUrl + '/dragsort', type: 'post', data: { id: id, from: from, to: to, _token: $('input[name="_token"]').val() }, dataType: 'json', success: function (data) {/*if(data==true){ if(confirm('Refresh to change the display effect.')==true){ location.reload();}}*/ } })
}

