$(document).ready(function(){
    deleteForCss();
    deleteAction();
});

function deleteForCss(){
    $('#delete').hide();
    
    $('.index-check').click(function(){
        $('#delete').show();
        var isbool = false;
        $.each($('.index-check'), function (index, item){
            if($($('.index-check')[index]).is(":checked") == true){
                isbool = true;
                return false;
            }
        })
        if(!isbool)
            $('#delete').hide();
    });
    
}

function deleteAction() {
    $('#delete').click(function(){
        $('#memos-form').attr('action','../models/m_delete.php');
        $('#memos-form').submit();
    });
}