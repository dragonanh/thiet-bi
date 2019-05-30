/**
 * Created by JetBrains PhpStorm.
 * User: tuanbm
 * Date: 9/10/12
 * Time: 10:20 AM
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function () {
    // initialization code goes here
    $(".sf_admin_batch_checkbox").click(function () {
//      if (this.checked == false) {
//        document.getElementById('sf_admin_list_batch_checkbox').checked = false;
//      }
        var checkAll = true;
        $('.sf_admin_batch_checkbox').each(function () {
            if (this.checked == false) {
                checkAll = false;
            }
        });
        if (checkAll == true) {
            document.getElementById('sf_admin_list_batch_checkbox').checked = true;
        } else {
            document.getElementById('sf_admin_list_batch_checkbox').checked = false;
        }
    });

    $('div.control-group input:text:not([readonly]):not([disabled])').eq(0).focus();
    $('div.sf_admin_form_row.error input').eq(0).focus();
    $('div.control-group.error input').eq(0).focus();
    var placeholderAddSim = 'Nhập danh sách sim và giá theo từng dòng (giữa sim và giá phải có khoảng trắng) \nVD: \n0912221102   1.000.000\n0969696969   2.000.000\n...';
    if(!$('#txtAddMultiSim').val() || $('#txtAddMultiSim').val() == placeholderAddSim) {
        displayPlaceHolderWithBreakline($('#txtAddMultiSim'), placeholderAddSim);
    }
    var placeholderDeleteSim = 'Nhập danh sách sim theo từng dòng \nVD: \n0912221102\n0969696969\n...';
    displayPlaceHolderWithBreakline($('#txtDeleteMultiSim'),placeholderDeleteSim);

});

function displayPlaceHolderWithBreakline(textArea,placeholder) {
    textArea.attr('value', placeholder);
    textArea.focus(function(){
        if($(this).val() === placeholder){
            $(this).attr('value', '');
            $(this).removeClass('fakePlaceholder')
        }
    });

    textArea.blur(function(){
        if($(this).val() ===''){
            $(this).attr('value', placeholder);
            $(this).addClass('fakePlaceholder')
        }
    });
    // remove the focus, if it is on by default
    textArea.blur();
}

function checkRequestStatus(request){
    switch (request.status){
        case 401:
            alert('Phiên làm việc đã hết hạn vui lòng đăng nhập lại để tiếp tục.');
            window.location.reload(true);
            break
    }
}
